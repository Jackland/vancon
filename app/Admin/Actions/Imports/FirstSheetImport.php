<?php

namespace App\Admin\Actions\Imports;

use App\Models\DeclareInfo;
use Illuminate\Support\Collection;
use Illuminate\Validation\ValidationException;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Imports\HeadingRowFormatter;

HeadingRowFormatter::default('none');

class FirstSheetImport implements ToCollection, WithBatchInserts, WithChunkReading, WithHeadingRow, ToModel
{
    private $round;


    //简称
    protected $name_salutation = [
        'Mr.',
        'Ms.',
        'lng',
        'Dr.',
        'Dr.lng.'
    ];

    //申报类型

    protected $purchase_type = [
        'LC',
        'AC',
        'ELC',
        'NLC'
    ];


    public function __construct(int $round)
    {
        $this->round = $round;
    }

    /**
     * @param array $row
     * @return string
     */
    public function model(array $row)
    {
        $row = array_map('trim', $row);
        $info = DeclareInfo::query()->where('tax',$row['tax'])->first();
        if( $info ) {
            return null;
        }
        if (!in_array($row['name_salutation'], $this->name_salutation)) {
            throw new \Exception('name_salutation错误，只能选择以下其中一个：' . implode('；', $this->name_salutation));
        }
        if (!in_array($row['purchase_type'], $this->purchase_type)) {
            throw new \Exception('purchase_type错误，只能选择以下其中一个：' . implode('；', $this->purchase_type));
        }

        return new DeclareInfo([
            'company' => $row['company'],
            'name_salutation' => $row['name_salutation'],
            'first_name' => $row['first_name'],
            'last_name' => $row['last_name'],
            'tax' => $row['tax'],
            'purchase_type' => $row['purchase_type'],
            'var_sales' => $row['var_sales'],
            'street' => $row['street'],
            'city' => $row['city'],
            'province' => $row['province'],
            'postal_code' => $row['postal_code'],
            'country' => $row['country'],
        ]);

        //DeclareInfo::query()->updateOrCreate(['tax' => $row['tax'], 'status' => 0], $row);
    }

    public function collection(Collection $rows)
    {
        //
    }

    //批量导入1000条
    public function batchSize(): int
    {
        return 1000;
    }

    //以1000条数据基准切割数据
    public function chunkSize(): int
    {
        return 1000;
    }
}

<?php

namespace App\Admin\Actions\Imports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class DataExcel implements WithMultipleSheets
{
    private $round;

    public function __construct(int $round)
    {
        $this->round = $round;
    }

    public function sheets(): array
    {
        return [
            new FirstSheetImport($this->round),
        ];
    }
}

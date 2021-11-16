<?php


namespace App\Admin\Actions\Form;
use App\Admin\Actions\Imports\DataExcel;
use App\Admin\Actions\Imports\FirstSheetImport;
use Dcat\Admin\Widgets\Form;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class Import extends Form
{
    public function handle(array $input)
    {
        //文件地址
        //$file = env('APP_URL').'/upload/'.$input['file'];
        // $obj = Excel::import(new FirstSheetImport(time()), $input['file'],'public');
        //return $this->success('导入成功');


        try {
            $obj = Excel::import(new FirstSheetImport(time()), $input['file'],'public');
            return $this->success('导入成功');
        } catch (ValidationException $validationException) {
            return $validationException->getMessage();
        } catch (\Throwable $throwable) {
          return $this->error($throwable->getMessage());
        }
    }
    public function form()
    {
        $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空']);
    }

}


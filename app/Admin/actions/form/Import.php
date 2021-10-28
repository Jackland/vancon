<?php


namespace App\Admin\Actions\Form;
use App\Admin\Actions\Imports\DataExcel;
use Dcat\Admin\Widgets\Form;
use Symfony\Component\HttpFoundation\Response;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class Import extends Form
{
    public function handle(array $input)
    {
        //文件地址
        $file = env('APP_URL').'/upload/'.$input['file'];

        try {
            $obj = Excel::import(new DataExcel(time()), $input['file'],'public');

            //dcat-2.0版本写法
            return $this->response()->success('导入成功')->redirect('/');
            //dcat-1.7
            //return $this->success('导入成功');
        } catch (ValidationException $validationException) {
            return $validationException->getMessage();
        } catch (\Throwable $throwable) {
            //dcat 2.0写法
            $this->response()->status = false;
            return $this->response()->error('上传失败')->refresh();
            //dcat 1.7
            //return $this->error('上传失败')->refresh();
        }
    }

    public function form()
    {
        $this->file('file', '上传数据（Excel）')->rules('required', ['required' => '文件不能为空']);
    }

}


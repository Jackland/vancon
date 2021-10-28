<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\Reast;
use App\Admin\Repositories\DeclareInfo;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class DeclareInfoController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new DeclareInfo(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('company');
            $grid->column('name_salutation');
            $grid->column('first_name');
            $grid->column('last_name');
            $grid->column('tax');
            $grid->column('purchase_type');
            $grid->column('var_sales');
            $grid->column('street');
            $grid->column('city');
            $grid->column('province');
            $grid->column('postal_code');
            $grid->column('country');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->export();

            $grid->tools(function (Grid\Tools $tools) {
                // excle 导入
                $tools->append(new Reast());
            });

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new DeclareInfo(), function (Show $show) {
            $show->field('id');
            $show->field('company');
            $show->field('name_salutation');
            $show->field('first_name');
            $show->field('last_name');
            $show->field('tax');
            $show->field('purchase_type');
            $show->field('var_sales');
            $show->field('street');
            $show->field('city');
            $show->field('province');
            $show->field('postal_code');
            $show->field('country');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new DeclareInfo(), function (Form $form) {
            $form->display('id');
            $form->text('company');
            $form->text('name_salutation');
            $form->text('first_name');
            $form->text('last_name');
            $form->text('tax');
            $form->text('purchase_type');
            $form->text('var_sales');
            $form->text('street');
            $form->text('city');
            $form->text('province');
            $form->text('postal_code');
            $form->text('country');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }

}

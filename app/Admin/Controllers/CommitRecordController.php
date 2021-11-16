<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\CommitRecord;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Controllers\AdminController;

class CommitRecordController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new CommitRecord(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('tax');
            $grid->column('status');
            $grid->column('message');
            $grid->column('created_at');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('tax');
                $filter->equal('status');
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
        return Show::make($id, new CommitRecord(), function (Show $show) {
            $show->field('id');
            $show->field('tax');
            $show->field('status');
            $show->field('message');
            $show->field('created_at');
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
        return Form::make(new CommitRecord(), function (Form $form) {
            $form->display('id');
            $form->text('tax');
            $form->text('status');
            $form->text('message');
            $form->text('created_at');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

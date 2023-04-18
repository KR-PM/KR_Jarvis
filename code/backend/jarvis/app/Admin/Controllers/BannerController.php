<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Banner;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BannerController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Banner(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('destination_url');
            $grid->column('img_url');
            $grid->column('mobile_img_url');
            $grid->column('order');
            $grid->column('enabled');
            $grid->column('start_time');
            $grid->column('end_time');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

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
        return Show::make($id, new Banner(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('destination_url');
            $show->field('img_url');
            $show->field('mobile_img_url');
            $show->field('order');
            $show->field('enabled');
            $show->field('start_time');
            $show->field('end_time');
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
        return Form::make(new Banner(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('destination_url');
            $form->text('img_url');
            $form->text('mobile_img_url');
            $form->text('order');
            $form->text('enabled');
            $form->text('start_time');
            $form->text('end_time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

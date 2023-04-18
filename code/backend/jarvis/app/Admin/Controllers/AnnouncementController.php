<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Announcement;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class AnnouncementController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Announcement(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('content');
            $grid->column('start_time');
            $grid->column('end_time');
            $grid->column('enabled');
            $grid->column('order');
            $grid->column('is_show_in_announce_page');
            $grid->column('is_popup');
            $grid->column('is_important');
            $grid->column('is_show_scrolling_text');
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
        return Show::make($id, new Announcement(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('content');
            $show->field('start_time');
            $show->field('end_time');
            $show->field('enabled');
            $show->field('order');
            $show->field('is_show_in_announce_page');
            $show->field('is_popup');
            $show->field('is_important');
            $show->field('is_show_scrolling_text');
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
        return Form::make(new Announcement(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('content');
            $form->text('start_time');
            $form->text('end_time');
            $form->text('enabled');
            $form->text('order');
            $form->text('is_show_in_announce_page');
            $form->text('is_popup');
            $form->text('is_important');
            $form->text('is_show_scrolling_text');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

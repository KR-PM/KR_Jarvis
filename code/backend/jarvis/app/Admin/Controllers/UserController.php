<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use App\Enums\JobTitleEnum;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('account');
            $grid->column('name');
            $grid->column('age');
            $grid->column('job')->enumDescription(JobTitleEnum::class)->label();
            $grid->column('email');
            $grid->column('phone');
            $grid->column('created_at')->hide();
            $grid->column('updated_at')->sortable()->hide();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('account')->width(3);
                $filter->equal('name')->width(3);
                $filter->equal('job')->select(JobTitleEnum::asSelectArray())->width(3);
                $filter->equal('email')->width(3);
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('account');
            $show->field('name');
            $show->field('age');
            $show->field('job');
            $show->field('email');
            $show->field('phone');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('account');
            $form->text('name');
            $form->text('age');
            $form->text('job');
            $form->text('email');
            $form->text('phone');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}

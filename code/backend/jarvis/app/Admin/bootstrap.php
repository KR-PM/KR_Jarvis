<?php

/**
 * Dcat-admin - admin builder based on Laravel.
 * @author jqh <https://github.com/jqhph>
 *
 * Bootstraper for Admin.
 *
 * Here you can remove builtin form field:
 *
 * extend custom field:
 * Dcat\Admin\Form::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Column::extend('php', PHPEditor::class);
 * Dcat\Admin\Grid\Filter::extend('php', PHPEditor::class);
 *
 * Or require js and css assets:
 * Admin::css('/packages/prettydocs/css/styles.css');
 * Admin::js('/packages/prettydocs/js/main.js');
 *
 */
use Dcat\Admin\Form;
use Dcat\Admin\Grid;

Grid::resolving(function (Grid $grid) {
    $grid->disableRefreshButton();
    $grid->disableRowSelector();
    $grid->disableViewButton();
    $grid->disableBatchDelete();
    $grid->filter()->panel();
    $grid->filter()->expand();
    $grid->showColumnSelector();
});

Form::resolving(function (Form $form) {
    $form->disableViewButton();
    $form->disableResetButton();
    $form->disableViewCheck();
    $form->disableEditingCheck();
    $form->disableCreatingCheck();
});

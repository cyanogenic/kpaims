<?php

namespace App\Admin\Controllers;

use App\Models\Brand;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class BrandController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Brand(), function (Grid $grid) {
            $grid->column('id')->sortable();
            // 直接使用房问题不工作的替代方案(https://github.com/jqhph/dcat-admin/issues/1473)
            $grid->column('full_name')->display(function ($full_name) { return $full_name; });
                
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
        return Show::make($id, new Brand(), function (Show $show) {
            $show->field('id');
            $show->field('name_zh');
            $show->field('name_en');
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
        return Form::make(new Brand(), function (Form $form) {
            $form->display('id');
            $form->text('name_zh');
            $form->text('name_en');
        
            $form->display('created_at');
            $form->display('updated_at');

            $form->saving(function (Form $form) {
                if ($form->name_zh == '' && $form->name_en == '') {
                    return $form->response()->error('请至少输入中英文名称中的一个');
                }
            });
        });
    }
}

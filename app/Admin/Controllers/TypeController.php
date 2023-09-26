<?php

namespace App\Admin\Controllers;

use App\Models\Type;
use Dcat\Admin\Form;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Layout\Row;
use Dcat\Admin\Tree;
use Dcat\Admin\Http\Controllers\AdminController;

class TypeController extends AdminController
{
    public function index(Content $content)
    {
        return $content->header('外设分类')
            ->body(function (Row $row) {
                $tree = new Tree(new Type);
                $tree->disableCreateButton();

                $row->column(12, $tree);
            });
    }

    protected function form()
    {
        return Form::make(new Type(), function (Form $form) {
            // $form->display('id');

            $form->select('parent_id')
                ->options(Type::class::selectOptions())
                ->saving(function ($v) {
                    return (int) $v;
                });
            $form->text('title')->required();   
        });
    }

    // /**
    //  * Make a grid builder.
    //  *
    //  * @return Grid
    //  */
    // protected function grid()
    // {
    //     return Grid::make(new Type(), function (Grid $grid) {
    //         $grid->column('id')->sortable();
    //         $grid->column('parent_id');
    //         $grid->column('order');
    //         $grid->column('title');
    //         $grid->column('created_at');
    //         $grid->column('updated_at')->sortable();
        
    //         $grid->filter(function (Grid\Filter $filter) {
    //             $filter->equal('id');
        
    //         });
    //     });
    // }

    // /**
    //  * Make a show builder.
    //  *
    //  * @param mixed $id
    //  *
    //  * @return Show
    //  */
    // protected function detail($id)
    // {
    //     return Show::make($id, new Type(), function (Show $show) {
    //         $show->field('id');
    //         $show->field('parent_id');
    //         $show->field('order');
    //         $show->field('title');
    //         $show->field('created_at');
    //         $show->field('updated_at');
    //     });
    // }

    // /**
    //  * Make a form builder.
    //  *
    //  * @return Form
    //  */
    // protected function form()
    // {
    //     return Form::make(new Type(), function (Form $form) {
    //         $form->display('id');
    //         $form->text('parent_id');
    //         $form->text('order');
    //         $form->text('title');
        
    //         $form->display('created_at');
    //         $form->display('updated_at');
    //     });
    // }
}

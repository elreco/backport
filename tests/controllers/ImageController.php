<?php

namespace Tests\Controllers;

use App\Http\Controllers\Controller;
use Elreco\Backport\Controllers\ModelForm;
use Elreco\Backport\Facades\Backport;
use Elreco\Backport\Form;
use Elreco\Backport\Grid;
use Elreco\Backport\Layout\Content;
use Tests\Models\Image;

class ImageController extends Controller
{
    use ModelForm;

    /**
     * Index interface.
     *
     * @return Content
     */
    public function index()
    {
        return Backport::content(function (Content $content) {
            $content->header('header');
            $content->description('description');

            $content->body($this->grid());
        });
    }

    /**
     * Edit interface.
     *
     * @param $id
     *
     * @return Content
     */
    public function edit($id)
    {
        return Backport::content(function (Content $content) use ($id) {
            $content->header('header');
            $content->description('description');

            $content->body($this->form()->edit($id));
        });
    }

    /**
     * Create interface.
     *
     * @return Content
     */
    public function create()
    {
        return Backport::content(function (Content $content) {
            $content->header('Upload image');

            $content->body($this->form());
        });
    }

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Backport::grid(Image::class, function (Grid $grid) {
            $grid->id('ID')->sortable();

            $grid->created_at();
            $grid->updated_at();

            $grid->disableFilter();
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Backport::form(Image::class, function (Form $form) {
            $form->display('id', 'ID');

            $form->image('image1');
            $form->image('image2')->rotate(90);
            $form->image('image3')->flip('v');
            $form->image('image4')->move(null, 'renamed.jpeg');
            $form->image('image5')->name(function ($file) {
                return 'asdasdasdasdasd.'.$file->guessExtension();
            });
            $form->image('image6')->uniqueName();

            $form->display('created_at', 'Created At');
            $form->display('updated_at', 'Updated At');
        });
    }
}

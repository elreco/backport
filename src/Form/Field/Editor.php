<?php

namespace Wiledia\Backport\Form\Field;

use Wiledia\Backport\Form\Field;

class Editor extends Field
{
    /*protected static $js = [
        '//cdn.ckeditor.com/4.5.10/standard/ckeditor.js',
    ];*/

    public function render()
    {
        $this->script = "$('#{$this->id}').summernote({height:150});";

        return parent::render();
    }
}

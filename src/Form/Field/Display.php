<?php

namespace Wiledia\Backport\Form\Field;

use Closure;
use Wiledia\Backport\Form\Field;

class Display extends Field
{
    protected $callback;

    public function with(Closure $callback)
    {
        $this->callback = $callback;
    }

    public function render()
    {
        if ($this->callback instanceof Closure) {
            $this->value = $this->callback->call($this->form->model(), $this->value);
        }

        return parent::render();
    }
}

<?php

namespace Wiledia\Backport\Form\Field;

use Wiledia\Backport\Form\Field;

class Nullable extends Field
{
    public function __construct()
    {
    }

    public function __call($method, $parameters)
    {
        return $this;
    }
}

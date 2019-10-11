<?php

namespace Elreco\Backport\Form\Field;

use Elreco\Backport\Form\Field;

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

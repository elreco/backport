<?php

namespace Elreco\Backport\Settings\Field;

use Elreco\Backport\Settings\Field;

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

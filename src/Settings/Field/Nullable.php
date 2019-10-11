<?php

namespace Wiledia\Backport\Settings\Field;

use Wiledia\Backport\Settings\Field;

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

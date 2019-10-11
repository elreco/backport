<?php

namespace Wiledia\Backport\Form\Field;

class Date extends Text
{

    protected $format = 'yyyy-mm-dd';

    public function format($format)
    {
        $this->format = $format;

        return $this;
    }

    public function prepare($value)
    {
        if ($value === '') {
            $value = null;
        }

        return $value;
    }

    public function render()
    {
        $this->options['format'] = $this->format;
        $this->options['locale'] = config('app.locale');
        $this->options['allowInputToggle'] = true;
        $this->options['autoclose'] = '!0';
        $this->options['minView'] = '2';

        $this->script = "$('#{$this->getElementClassString()}').datetimepicker(".json_encode($this->options).');';

        $this->prepend('<i class="fa fa-calendar fa-fw"></i>');

        return parent::render();
    }
}

<?php

namespace Wiledia\Backport\Form\Field;

class Color extends Text
{
    protected static $css = [
        '/vendor/backport/vendors/custom/bootstrap-colorpicker/colorpicker.css',
    ];

    protected static $js = [
        '/vendor/backport/vendors/custom/bootstrap-colorpicker/colorpicker.js',
    ];

    /**
     * Use `hex` format.
     *
     * @return $this
     */
    public function hex()
    {
        return $this->options(['format' => 'hex']);
    }

    /**
     * Use `rgb` format.
     *
     * @return $this
     */
    public function rgb()
    {
        return $this->options(['format' => 'rgb']);
    }

    /**
     * Use `rgba` format.
     *
     * @return $this
     */
    public function rgba()
    {
        return $this->options(['format' => 'rgba']);
    }

    /**
     * Render this filed.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function render()
    {
        $options = json_encode($this->options);

        $this->script = <<<EOT
$('#{$this->getElementClassString()}').colorpicker($options);
$('#{$this->getElementClassString()}').on('colorpickerChange', function(event) {
  $('#{$this->getElementClassString()}-square').css('color', event.color.toString());
});
EOT;


        $this->prepend('<i class="fas fa-square" id="'.$this->getElementClassString().'-square" style="color: '.$this->value.'"></i>');

        return parent::render();
    }
}

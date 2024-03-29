<?php

namespace Elreco\Backport\Form\Field;

/**
 * Class ListBox.
 *
 * @see https://github.com/istvan-ujjmeszaros/bootstrap-duallistbox
 */
class Listbox extends MultipleSelect
{
    protected $settings = [];

    protected static $css = [
        '/vendor/backport/vendors/custom/bootstrap-duallistbox/bootstrap-duallistbox.css',
    ];

    protected static $js = [
        '/vendor/backport/vendors/custom/bootstrap-duallistbox/jquery.bootstrap-duallistbox.js',
    ];

    public function settings(array $settings)
    {
        $this->settings = $settings;

        return $this;
    }

    public function render()
    {
        $settings = array_merge($this->settings, [
            'infoText'          => trans('admin.listbox.text_total'),
            'infoTextEmpty'     => trans('admin.listbox.text_empty'),
            'infoTextFiltered'  => trans('admin.listbox.filtered'),
            'filterTextClear'   => trans('admin.listbox.filter_clear'),
            'filterPlaceHolder' => trans('admin.listbox.filter_placeholder'),
        ]);

        $settings = json_encode($settings);

        $this->script = <<<SCRIPT

$("{$this->getElementClassSelector()}").bootstrapDualListbox($settings);

SCRIPT;

        return parent::render();
    }
}

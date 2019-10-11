<?php

namespace Wiledia\Backport\Grid\Displayers;

use Wiledia\Backport\Backport;

class RowSelector extends AbstractDisplayer
{
    public function display()
    {
        Backport::script($this->script());

        return <<<EOT
<input type="checkbox" class="{$this->grid->getGridRowName()}-checkbox" data-id="{$this->getKey()}" />
EOT;
    }

    protected function script()
    {
        return <<<EOT
$('.{$this->grid->getGridRowName()}-checkbox').iCheck({checkboxClass:'bp-checkbox empty-label', insert: '&nbsp;<span></span>'}).on('ifChanged', function () {
    if (this.checked) {
        $(this).closest('tr').css('background-color', '#e4eaf0');
    } else {
        $(this).closest('tr').css('background-color', '');
    }
});

var {$this->grid->getSelectedRowsName()} = function () {
    var selected = [];
    $('.{$this->grid->getGridRowName()}-checkbox:checked').each(function(){
        selected.push($(this).data('id'));
    });

    return selected;
};

EOT;
    }
}

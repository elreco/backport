<?php

namespace Wiledia\Backport\Grid\Displayers;

use Wiledia\Backport\Backport;

class Select extends AbstractDisplayer
{
    public function display($options = [])
    {
        if ($options instanceof \Closure) {
            $options = $options->call($this, $this->row);
        }

        $name = $this->column->getName();

        $class = "grid-select-{$name}";

        $script = <<<EOT

$('.$class').select2().on('change', function(){

    var pk = $(this).data('key');
    var value = $(this).val();

    $.ajax({
        url: "{$this->grid->resource()}/" + pk,
        type: "POST",
        data: {
            $name: value,
            _token: BP.token,
            _method: 'PUT'
        },
        success: function (data) {
            toastr.success(data.message);
        }
    });
});

EOT;

        Backport::script($script);

        $key = $this->row->{$this->grid->getKeyName()};

        $optionsHtml = '';

        foreach ($options as $option => $text) {
            $selected = $option == $this->value ? 'selected' : '';
            $optionsHtml .= "<option value=\"$option\" $selected>$text</option>";
        }

        return <<<EOT
<select style="width: 100%;" class="$class btn btn-mini" data-key="$key">
$optionsHtml
</select>

EOT;
    }
}

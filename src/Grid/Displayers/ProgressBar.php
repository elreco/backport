<?php

namespace Elreco\Backport\Grid\Displayers;

class ProgressBar extends AbstractDisplayer
{
    public function display($style = 'primary', $size = 'sm', $max = 100)
    {
        $style = collect((array) $style)->map(function ($style) {
            return 'progress-bar-'.$style;
        })->implode(' ');

        return <<<EOT

<div class="progress progress-$size">
    <div class="progress-bar $style" role="progressbar" aria-valuenow="{$this->value}" aria-valuemin="0" aria-valuemax="$max" style="width: {$this->value}%">
      <span class="sr-only">{$this->value}</span>
    </div>
</div>

EOT;
    }
}

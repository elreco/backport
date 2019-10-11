<?php

namespace Wiledia\Backport\Grid\Displayers;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Facades\Storage;

class ImageText extends AbstractDisplayer
{
    public function display($image = '', $linetop = '', $linebottom = false)
    {

        if($linebottom) {

            return <<<EOT
<div class="image-text" style=" ">
    <img src="$image" />
    <div class="content">
        <div class="top">
        $linetop
        </div>
        <div class="bottom">
        $linebottom
        </div>
    </div>
</div>
EOT;
        } else {
            return <<<EOT
<div class="image-text">
    <img src="$image">
    <div class="content" />
        <div class="top">
        $linetop
        </div>
    </div>
</div>
EOT;
        }

    }
}

<?php

namespace Wiledia\Backport\Grid\Tools;

use Wiledia\Backport\Backport;

class RefreshButton extends AbstractTool
{
    /**
     * Script for this tool.
     *
     * @return string
     */
    protected function script()
    {
        $message = trans('admin.refresh_succeeded');

        return <<<EOT

$('.grid-refresh').on('click', function() {
    $.pjax.reload('#pjax-container');
    toastr.success('{$message}');
});

EOT;
    }

    /**
     * Render refresh button of grid.
     *
     * @return string
     */
    public function render()
    {
        Backport::script($this->script());

        $refresh = trans('admin.refresh');

        return <<<EOT
<button class="btn btn-sm btn-secondary grid-refresh mr-1" role="button" title="$refresh"><i class="fa fa-sync"></i><span class="d-none d-sm-inline-block">&nbsp;&nbsp;$refresh</span></button>
EOT;
    }
}

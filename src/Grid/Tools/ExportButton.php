<?php

namespace Wiledia\Backport\Grid\Tools;

use Wiledia\Backport\Backport;
use Wiledia\Backport\Grid;

class ExportButton extends AbstractTool
{
    /**
     * @var Grid
     */
    protected $grid;

    /**
     * Create a new Export button instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;
    }

    /**
     * Set up script for export button.
     */
    protected function setUpScripts()
    {
        $script = <<<SCRIPT

$('.{$this->grid->getExportSelectedName()}').click(function (e) {
    e.preventDefault();

    var rows = {$this->grid->getSelectedRowsName()}().join(',');
    if (!rows) {
        return false;
    }

    var href = $(this).attr('href').replace('__rows__', rows);
    location.href = href;
});

SCRIPT;

        Backport::script($script);
    }

    /**
     * Render Export button.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->grid->allowExport()) {
            return '';
        }

        $this->setUpScripts();

        $export = trans('admin.export');
        $all = trans('admin.all');
        $currentPage = trans('admin.current_page');
        $selectedRows = trans('admin.selected_rows');

        $page = request('page', 1);

        return <<<EOT


<div class="btn-group">
    <button type="button" class="btn btn-sm btn-secondary dropdown-toggle" title="{$export}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fa fa-download"></i><span class="d-none d-sm-inline-block">&nbsp;&nbsp;{$export}</span>
    </button>
    <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 38px, 0px);">
        <a href="{$this->grid->getExportUrl('all')}" target="_blank" class="dropdown-item">{$all}</a>
        <a href="{$this->grid->getExportUrl('page', $page)}" target="_blank" class="dropdown-item">{$currentPage}</a>
        <a href="{$this->grid->getExportUrl('selected', '__rows__')}" target="_blank" class='{$this->grid->getExportSelectedName()} dropdown-item'>{$selectedRows}</a>
    </div>
</div>
EOT;
    }
}

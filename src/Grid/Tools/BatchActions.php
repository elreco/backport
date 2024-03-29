<?php

namespace Elreco\Backport\Grid\Tools;

use Elreco\Backport\Backport;
use Illuminate\Support\Collection;

class BatchActions extends AbstractTool
{
    /**
     * @var Collection
     */
    protected $actions;

    /**
     * @var bool
     */
    protected $enableDelete = true;

    /**
     * @var bool
     */
    private $isHoldSelectAllCheckbox = false;

    /**
     * BatchActions constructor.
     */
    public function __construct()
    {
        $this->actions = new Collection();

        $this->appendDefaultAction();
    }

    /**
     * Append default action(batch delete action).
     *
     * return void
     */
    protected function appendDefaultAction()
    {
        $this->add(new BatchDelete(trans('admin.delete')));
    }

    /**
     * Disable delete.
     *
     * @return $this
     */
    public function disableDelete()
    {
        $this->enableDelete = false;

        return $this;
    }

    /**
     * Disable delete And Hode SelectAll Checkbox.
     *
     * @return $this
     */
    public function disableDeleteAndHodeSelectAll()
    {
        $this->enableDelete = false;

        $this->isHoldSelectAllCheckbox = true;

        return $this;
    }

    /**
     * Add a batch action.
     *
     * @param $title
     * @param BatchAction|null $action
     *
     * @return $this
     */
    public function add($title, BatchAction $action = null)
    {
        $id = $this->actions->count();

        if (func_num_args() == 1) {
            $action = $title;
            $action->setId($id);
        } elseif (func_num_args() == 2) {
            $action->setId($id);
            $action->setTitle($title);
        }

        $this->actions->push($action);

        return $this;
    }

    /**
     * Setup scripts of batch actions.
     *
     * @return void
     */
    protected function setUpScripts()
    {
        Backport::script($this->script());

        foreach ($this->actions as $action) {
            $action->setGrid($this->grid);

            Backport::script($action->script());
        }
    }

    /**
     * Scripts of BatchActions button groups.
     *
     * @return string
     */
    protected function script()
    {
        return <<<EOT

$('.{$this->grid->getSelectAllName()}').iCheck({checkboxClass:'bp-checkbox empty-label', insert: '&nbsp;<span></span>'});

$('.{$this->grid->getSelectAllName()}').on('ifChanged', function(event) {
    if (this.checked) {
        $('.{$this->grid->getGridRowName()}-checkbox').iCheck('check');
    } else {
        $('.{$this->grid->getGridRowName()}-checkbox').iCheck('uncheck');
    }
});

EOT;
    }

    /**
     * Render BatchActions button groups.
     *
     * @return string
     */
    public function render()
    {
        if (!$this->enableDelete) {
            $this->actions->shift();
        }

        if ($this->actions->isEmpty()) {
            return '';
        }

        $this->setUpScripts();

        $data = [
            'actions'                 => $this->actions,
            'selectAllName'           => $this->grid->getSelectAllName(),
            'isHoldSelectAllCheckbox' => $this->isHoldSelectAllCheckbox,
        ];

        return view('backport::grid.batch-actions', $data)->render();
    }
}

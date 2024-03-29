<?php

namespace Elreco\Backport\Grid;

use Elreco\Backport\Grid;
use Elreco\Backport\Grid\Tools\AbstractTool;
use Elreco\Backport\Grid\Tools\BatchActions;
use Elreco\Backport\Grid\Tools\FilterButton;
use Elreco\Backport\Grid\Tools\RefreshButton;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Collection;

class Tools implements Renderable
{
    /**
     * Parent grid.
     *
     * @var Grid
     */
    protected $grid;

    /**
     * Collection of tools.
     *
     * @var Collection
     */
    protected $tools;

    /**
     * Create a new Tools instance.
     *
     * @param Grid $grid
     */
    public function __construct(Grid $grid)
    {
        $this->grid = $grid;

        $this->tools = new Collection();

        $this->appendDefaultTools();
    }

    /**
     * Append default tools.
     */
    protected function appendDefaultTools()
    {
        $this->append(new BatchActions())
            ->append(new RefreshButton())
            ->append(new FilterButton());
    }

    /**
     * Append tools.
     *
     * @param AbstractTool|string $tool
     *
     * @return $this
     */
    public function append($tool)
    {
        $this->tools->push($tool);

        return $this;
    }

    /**
     * Prepend a tool.
     *
     * @param AbstractTool|string $tool
     *
     * @return $this
     */
    public function prepend($tool)
    {
        $this->tools->prepend($tool);

        return $this;
    }

    /**
     * Disable filter button.
     *
     * @return void
     */
    public function disableFilterButton()
    {
        $this->tools = $this->tools->reject(function ($tool) {
            return $tool instanceof FilterButton;
        });
    }

    /**
     * Disable refresh button.
     *
     * @return void
     */
    public function disableRefreshButton()
    {
        $this->tools = $this->tools->reject(function ($tool) {
            return $tool instanceof RefreshButton;
        });
    }

    /**
     * Disable batch actions.
     *
     * @return void
     */
    public function disableBatchActions()
    {
        $this->tools = $this->tools->reject(function ($tool) {
            return $tool instanceof BatchActions;
        });
    }

    /**
     * @param \Closure $closure
     */
    public function batch(\Closure $closure)
    {
        call_user_func($closure, $this->tools->first(function ($tool) {
            return $tool instanceof BatchActions;
        }));
    }

    /**
     * Render header tools bar.
     *
     * @return string
     */
    public function render()
    {
        return $this->tools->map(function ($tool) {
            if ($tool instanceof AbstractTool) {
                return $tool->setGrid($this->grid)->render();
            }

            return (string) $tool;
        })->implode(' ');
    }
}

<?php

namespace Tests\Models;

use Wiledia\Backport\Traits\AdminBuilder;
use Wiledia\Backport\Traits\ModelTree;
use Illuminate\Database\Eloquent\Model;

class Tree extends Model
{
    use AdminBuilder, ModelTree;

    /**
     * Create a new Eloquent model instance.
     *
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        $connection = config('backport.database.connection') ?: config('database.default');

        $this->setConnection($connection);

        $this->setTable(config('backport.database.menu_table'));

        parent::__construct($attributes);
    }
}

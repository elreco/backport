<?php

namespace Wiledia\Backport\Settings;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{

    protected $casts = [
        'field' => 'array',
    ];
    /**
     * Settings constructor.
     *
     * @param array $attributes
     */

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);
        $this->setConnection(config('backport.database.connection') ?: config('database.default'));
        $this->setTable(config('backport.database.settings_table', 'backport_settings'));
    }
}

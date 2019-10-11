<?php

namespace Wiledia\Backport\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class Admin.
 *
 * @method static \Wiledia\Backport\Grid grid($model, \Closure $callable)
 * @method static \Wiledia\Backport\Form form($model, \Closure $callable)
 * @method static \Wiledia\Backport\Show show($model, $callable = null)
 * @method static \Wiledia\Backport\Tree tree($model, \Closure $callable = null)
 * @method static \Wiledia\Backport\Layout\Content content(\Closure $callable = null)
 * @method static \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void css($css = null)
 * @method static \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void js($js = null)
 * @method static \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void script($script = '')
 * @method static \Illuminate\Contracts\Auth\Authenticatable|null user()
 * @method static string title()
 * @method static void navbar(\Closure $builder = null)
 * @method static void registerAuthRoutes()
 * @method static void extend($name, $class)
 * @method static void disablePjax()
 */
class Backport extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \Wiledia\Backport\Backport::class;
    }
}

<?php

namespace Wiledia\Backport;

use Closure;
use Wiledia\Backport\Controllers\AuthController;
use Wiledia\Backport\Layout\Content;
use Wiledia\Backport\Traits\HasAssets;
use Wiledia\Backport\Widgets\Navbar;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use InvalidArgumentException;

/**
 * Class Admin.
 */
class Backport
{
    use HasAssets;

    /**
     * The Laravel admin version.
     *
     * @var string
     */
    const VERSION = '1.0.3';

    /**
     * @var Navbar
     */
    protected $navbar;

    /**
     * @var string
     */
    public static $metaTitle;

    /**
     * @var array
     */
    public static $extensions = [];

    /**
     * @var []Closure
     */
    public static $booting;

    /**
     * @var []Closure
     */
    public static $booted;

    /**
     * Returns the long version of backport.
     *
     * @return string The long application version
     */
    public static function getLongVersion()
    {
        return sprintf('BackPort <comment>version</comment> <info>%s</info>', self::VERSION);
    }

    /**
     * @param $model
     * @param Closure $callable
     *
     * @return \Wiledia\Backport\Grid
     *
     * @deprecated since v1.6.1
     */
    public function grid($model, Closure $callable)
    {
        return new Grid($this->getModel($model), $callable);
    }

    /**
     * @param $model
     * @param Closure $callable
     *
     * @return \Wiledia\Backport\Form
     *
     *  @deprecated since v1.6.1
     */
    public function form($model, Closure $callable)
    {
        return new Form($this->getModel($model), $callable);
    }

    /**
     * @param $model
     * @param Closure $callable
     *
     * @return \Wiledia\Backport\Settings
     *
     *  @deprecated since v1.6.1
     */
    public function settings($model, Closure $callable)
    {
        return new Settings($this->getModel($model), $callable);
    }

    /**
     * Build a tree.
     *
     * @param $model
     *
     * @return \Wiledia\Backport\Tree
     */
    public function tree($model, Closure $callable = null)
    {
        return new Tree($this->getModel($model), $callable);
    }

    /**
     * Build show page.
     *
     * @param $model
     * @param mixed $callable
     *
     * @return Show
     *
     * @deprecated since v1.6.1
     */
    public function show($model, $callable = null)
    {
        return new Show($this->getModel($model), $callable);
    }

    /**
     * @param Closure $callable
     *
     * @return \Wiledia\Backport\Layout\Content
     *
     * @deprecated since v1.6.1
     */
    public function content(Closure $callable = null)
    {
        return new Content($callable);
    }

    /**
     * @param $model
     *
     * @return mixed
     */
    public function getModel($model)
    {
        if ($model instanceof Model) {
            return $model;
        }

        if (is_string($model) && class_exists($model)) {
            return $this->getModel(new $model());
        }

        throw new InvalidArgumentException("$model is not a valid model");
    }

    /**
     * Left sider-bar menu.
     *
     * @return array
     */
    public function menu()
    {
        $menuModel = config('backport.database.menu_model');

        return (new $menuModel())->toTree();
    }

    /**
     * Set admin title.
     *
     * @return void
     */
    public static function setTitle($title)
    {
        self::$metaTitle = $title;
    }

    /**
     * Get admin title.
     *
     * @return Config
     */
    public function title()
    {
        return self::$metaTitle ? self::$metaTitle : config('backport.title');
    }

    /**
     * Get current login user.
     *
     * @return mixed
     */
    public function user()
    {
        return Auth::guard('backport')->user();
    }

    /**
     * Set navbar.
     *
     * @param Closure|null $builder
     *
     * @return Navbar
     */
    public function navbar(Closure $builder = null)
    {
        if (is_null($builder)) {
            return $this->getNavbar();
        }

        call_user_func($builder, $this->getNavbar());
    }

    /**
     * Get navbar object.
     *
     * @return \Wiledia\Backport\Widgets\Navbar
     */
    public function getNavbar()
    {
        if (is_null($this->navbar)) {
            $this->navbar = new Navbar();
        }

        return $this->navbar;
    }

    /**
     * Register the auth routes.
     *
     * @return void
     */
    public function registerAuthRoutes()
    {
        $attributes = [
            'prefix'     => config('backport.route.prefix'),
            'middleware' => config('backport.route.middleware'),
        ];

        app('router')->group($attributes, function ($router) {

            /* @var \Illuminate\Routing\Router $router */
            $router->namespace('Wiledia\Backport\Controllers')->group(function ($router) {

                /* @var \Illuminate\Routing\Router $router */
                $router->resource('auth/users', 'UserController');
                $router->resource('auth/roles', 'RoleController');
                $router->resource('auth/permissions', 'PermissionController');
                $router->resource('auth/menu', 'MenuController', ['except' => ['create']]);
                $router->resource('auth/logs', 'Logs\OperationController', ['only' => ['index', 'destroy']]);
            });

            $authController = config('backport.auth.controller', AuthController::class);

            /* @var \Illuminate\Routing\Router $router */
            $router->get('auth/login', $authController.'@getLogin');
            $router->post('auth/login', $authController.'@postLogin');
            $router->get('auth/logout', $authController.'@getLogout');
            $router->get('auth/setting', $authController.'@getSetting');
            $router->put('auth/setting', $authController.'@putSetting');
        });
    }

    /**
     * Register the log routes.
     *
     * @return void
     */
    public function registerLogRoutes()
    {
        $attributes = [
            'prefix'     => config('backport.route.prefix'),
            'middleware' => config('backport.route.middleware'),
        ];

        app('router')->group($attributes, function ($router) {
            /* @var \Illuminate\Routing\Router $router */
            $router->namespace('Wiledia\Backport\Controllers\Logs')->group(function ($router) {

                /* @var \Illuminate\Routing\Router $router */
                $router->resource('logs/operation', 'OperationController', ['only' => ['index', 'destroy']]);
                $router->get('logs/laravel', 'LogController@index')->name('logs-index');
                $router->get('logs/laravel{file}', 'LogController@index')->name('logs-file');
                $router->get('logs/laravel/{file}/tail', 'LogController@tail')->name('logs-tail');
            });
        });
    }

    /**
     * Extend a extension.
     *
     * @param string $name
     * @param string $class
     *
     * @return void
     */
    public static function extend($name, $class)
    {
        static::$extensions[$name] = $class;
    }

    /**
     * @param callable $callback
     */
    public static function booting(callable $callback)
    {
        static::$booting[] = $callback;
    }

    /**
     * @param callable $callback
     */
    public static function booted(callable $callback)
    {
        static::$booted[] = $callback;
    }

    /*
     * Disable Pjax for current Request
     *
     * @return void
     */
    public function disablePjax()
    {
        if (request()->pjax()) {
            request()->headers->set('X-PJAX', false);
        }
    }
}

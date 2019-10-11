<?php

namespace Wiledia\Backport\Controllers;

use Wiledia\Backport\Backport;

class Dashboard
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function title()
    {
        return view('backport::dashboard.title');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function environment()
    {
        $envs = [
            ['name' => 'PHP version',       'value' => 'PHP/'.PHP_VERSION],
            ['name' => 'Laravel version',   'value' => app()->version()],
            ['name' => 'CGI',               'value' => php_sapi_name()],
            ['name' => 'Uname',             'value' => php_uname()],
            ['name' => 'Server',            'value' => array_get($_SERVER, 'SERVER_SOFTWARE')],

            ['name' => 'Cache driver',      'value' => config('cache.default')],
            ['name' => 'Session driver',    'value' => config('session.driver')],
            ['name' => 'Queue driver',      'value' => config('queue.default')],

            ['name' => 'Timezone',          'value' => config('app.timezone')],
            ['name' => 'Locale',            'value' => config('app.locale')],
            ['name' => 'Env',               'value' => config('app.env')],
            ['name' => 'URL',               'value' => config('app.url')],
        ];

        return view('backport::dashboard.environment', compact('envs'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function extensions()
    {
        $extensions = [
            'helpers' => [
                'name' => 'backport-ext/helpers',
                'link' => 'https://github.com/backport-extensions/helpers',
                'icon' => 'gears',
            ],
            'log-viewer' => [
                'name' => 'backport-ext/log-viewer',
                'link' => 'https://github.com/backport-extensions/log-viewer',
                'icon' => 'database',
            ],
            'backup' => [
                'name' => 'backport-ext/backup',
                'link' => 'https://github.com/backport-extensions/backup',
                'icon' => 'copy',
            ],
            'config' => [
                'name' => 'backport-ext/config',
                'link' => 'https://github.com/backport-extensions/config',
                'icon' => 'toggle-on',
            ],
            'api-tester' => [
                'name' => 'backport-ext/api-tester',
                'link' => 'https://github.com/backport-extensions/api-tester',
                'icon' => 'sliders',
            ],
            'media-manager' => [
                'name' => 'backport-ext/media-manager',
                'link' => 'https://github.com/backport-extensions/media-manager',
                'icon' => 'file',
            ],
            'scheduling' => [
                'name' => 'backport-ext/scheduling',
                'link' => 'https://github.com/backport-extensions/scheduling',
                'icon' => 'clock-o',
            ],
            'reporter' => [
                'name' => 'backport-ext/reporter',
                'link' => 'https://github.com/backport-extensions/reporter',
                'icon' => 'bug',
            ],
            'redis-manager' => [
                'name' => 'backport-ext/redis-manager',
                'link' => 'https://github.com/backport-extensions/redis-manager',
                'icon' => 'flask',
            ],
        ];

        foreach ($extensions as &$extension) {
            $name = explode('/', $extension['name']);
            $extension['installed'] = array_key_exists(end($name), Backport::$extensions);
        }

        return view('backport::dashboard.extensions', compact('extensions'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public static function dependencies()
    {
        $json = file_get_contents(base_path('composer.json'));

        $dependencies = json_decode($json, true)['require'];

        return view('backport::dashboard.dependencies', compact('dependencies'));
    }
}

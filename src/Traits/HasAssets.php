<?php

namespace Wiledia\Backport\Traits;

trait HasAssets
{
    /**
     * @var array
     */
    public static $script = [];

    /**
     * @var array
     */
    public static $css = [];

    /**
     * @var array
     */
    public static $js = [];

    /**
     * @var array
     */
    public static $headerJs = [];

    /**
     * @var array
     */
    public static $baseCss = [
        'vendor/backport/vendors/base/vendors.bundle.css',
        'vendor/backport/themes/default/base/style.bundle.css',
        'vendor/backport/themes/default/skins/aside/brand.css',
        'vendor/backport/themes/default/skins/aside/brand.css',
    ];

    /**
     * @var array
     */
    public static $baseJs = [
        'vendor/backport/vendors/base/vendors.bundle.js',
        'vendor/backport/themes/default/base/scripts.bundle.js',
        'vendor/backport/app/scripts/bundle/app.bundle.js',
        'vendor/backport/app/scripts/custom/init.js',





    ];

    /**
     * @var string
     */
     public static $jQuery = 'vendor/backport/vendors/custom/jquery/jquery.js';

    /**
     * Add css or get all css.
     *
     * @param null $css
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function css($css = null)
    {
        if (!is_null($css)) {
            self::$css = array_merge(self::$css, (array) $css);

            return;
        }

        static::$css = array_merge(static::baseCss(), static::$css, (array) $css, (array) config('backport.additional_css'));

        return view('backport::partials.css', ['css' => array_unique(static::$css)]);
    }

    /**
     * @param null $css
     *
     * @return array|void
     */
    public static function baseCss($css = null)
    {
        if (!is_null($css)) {
            static::$baseCss = $css;

            return;
        }

        $additional_css = config('backport.additional_css');
        /*
        array_unshift(static::$baseCss, "vendor/backport/AdminLTE/dist/css/skins/{$skin}.min.css");
        */

        return static::$baseCss;
    }

    /**
     * Add js or get all js.
     *
     * @param null $js
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function js($js = null)
    {
        if (!is_null($js)) {
            self::$js = array_merge(self::$js, (array) $js);

            return;
        }

        static::$js = array_merge(static::baseJs(), static::$js, (array) $js, (array) config('backport.additional_js'));

        return view('backport::partials.js', ['js' => array_unique(static::$js)]);
    }

    /**
     * Add js or get all js.
     *
     * @param null $js
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function headerJs($js = null)
    {
        if (!is_null($js)) {
            self::$headerJs = array_merge(self::$headerJs, (array) $js);

            return;
        }

        static::$headerJs = array_merge(static::$headerJs, (array) $js);

        return view('backport::partials.js', ['js' => array_unique(static::$headerJs)]);
    }

    /**
     * @param null $js
     *
     * @return array|void
     */
    public static function baseJs($js = null)
    {
        if (!is_null($js)) {
            static::$baseJs = $js;

            return;
        }

        return static::$baseJs;
    }

    /**
     * @param string $script
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View|void
     */
    public static function script($script = '')
    {
        if (!empty($script)) {
            self::$script = array_merge(self::$script, (array) $script);

            return;
        }

        return view('backport::partials.script', ['script' => array_unique(self::$script)]);
    }

    /**
     * @return string
     */
    public function jQuery()
    {
        return admin_asset(static::$jQuery);
    }
}

<?php

namespace Elreco\Backport\Grid\Filter\Presenter;

use Elreco\Backport\Backport;

class DateTime extends Presenter
{
    /**
     * @var array
     */
    protected $options = [];

    /**
     * @var string
     */
    protected $format = 'YYYY-MM-DD HH:mm:ss';

    /**
     * DateTime constructor.
     *
     * @param array $options
     */
    public function __construct($options = [])
    {
        $this->options = $this->getOptions($options);
    }

    /**
     * @param array $options
     *
     * @return mixed
     */
    protected function getOptions(array  $options) : array
    {
        $options['format'] = array_get($options, 'format', $this->format);
        $options['locale'] = array_get($options, 'locale', config('app.locale'));

        return $options;
    }

    protected function prepare()
    {
        $script = "$('#{$this->filter->getId()}').datetimepicker(".json_encode($this->options).');';

        Backport::script($script);
    }

    public function variables() : array
    {
        $this->prepare();

        return [
            'group' => $this->filter->group,
        ];
    }
}

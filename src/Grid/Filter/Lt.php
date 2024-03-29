<?php

namespace Elreco\Backport\Grid\Filter;

class Lt extends AbstractFilter
{
    /**
     * {@inheritdoc}
     */
    protected $view = 'backport::filter.lt';

    /**
     * Get condition of this filter.
     *
     * @param array $inputs
     *
     * @return array|mixed|void
     */
    public function condition($inputs)
    {
        $value = array_get($inputs, $this->column);

        if (is_null($value)) {
            return;
        }

        $this->value = $value;

        return $this->buildCondition($this->column, '<=', $this->value);
    }
}

<?php

namespace App\Http\Filters;

class WorkinghourFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'date',
    ];

    /**
     * Filter the query to include book only contains the given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function date($value)
    {
        return $this->builder->where('date', $value);
    }
}

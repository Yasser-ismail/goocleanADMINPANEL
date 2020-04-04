<?php

namespace App\Http\Filters;

class AppoientmentFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'serial',
    ];

    /**
     * Filter the query to include book only contains the given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function serial($value)
    {
        return $this->builder->where('serial', $value);
    }
}

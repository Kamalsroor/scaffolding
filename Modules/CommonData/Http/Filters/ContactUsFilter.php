<?php

namespace Modules\CommonData\Http\Filters;

use App\Http\Filters\BaseFilters;

class ContactUsFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'phone',
        'description',
        'email',
        'term',
        'columnFilters',
        'search',
        'sort',
        'deleted',
    ];



    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function deleted($value)
    {
        if ($value) {
            return $this->builder->onlyTrashed();
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function name($value , $type = '=')
    {
        if ($value) {
            return $this->builder->where('name', $type, $value);
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function phone($value , $type = '=')
    {
        if ($value) {
            return $this->builder->where('phone', $type, $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given email.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($value , $type = '=')
    {
        if ($value) {
            return $this->builder->where('email', $type, $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function description($q , $value)
    {
        if ($value) {
            return $this->builder->where('description', $q, $value);
        }

        return $this->builder;
    }





}

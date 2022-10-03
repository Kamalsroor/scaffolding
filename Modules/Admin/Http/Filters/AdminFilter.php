<?php

namespace Modules\Admin\Http\Filters;

use App\Http\Filters\BaseFilters;

class AdminFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'active',
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
    protected function name($q , $value)
    {
        if ($value) {
            return $this->builder->where('name', $q, $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given email.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function email($q , $value)
    {
        if ($value) {
            return $this->builder->where('email', $q, $value);
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function active($q , $value)
    {
        if ($value) {
            return $this->builder->where('active', $q, $value);
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given code.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function columnFilters($value)
    {
        if ($value) {
            $type = '';
            if(isset($value['field']) && isset($value['value'])){
                $inputValue = $value['value'];
                switch ($value['type']) {
                    case 'like':
                        $q = "%$inputValue%";
                        return $this->{$value['field']}($value['type'] ,  $q);
                        break;

                    default:
                        $q = $inputValue;
                        return $this->{$value['field']}($value['type'] ,  $q);
                        // return $this->builder->where($value['field'], $value['type'], $inputValue);
                        break;
                }
                return $this->builder->where($value['field'], $value['type'], $inputValue);
            }
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given code.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function search($array)
    {
        if ($array && is_array($array)) {
            $type = 'like';
            foreach ($array as $key => $value) {
                switch ( $type ) {
                    case 'like':
                        $q = "%$value%";
                        $this->{$key}( $type  ,  $q);
                        break;
                    default:
                        $q = $value;
                        $this->{$key}( $type  ,  $q);
                        // return $this->builder->where($key,  $type , $value);
                        break;
                }
                // $this->builder->where($key,  $type , $value);
            }

        }

        return $this->builder;
    }

    /**
     * Filter the query by a given key.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function sort($value)
    {

        if (isset($value['field']) && $value['field'] != '' && $value['type'] != 'none') {
            $type = isset($value['type'])  ? $value['type'] : 'asc';
            return $this->builder->orderBy($value['field'] ,$type);
        }

        return $this->builder;
    }

}

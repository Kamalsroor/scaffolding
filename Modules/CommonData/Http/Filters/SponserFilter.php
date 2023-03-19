<?php

namespace Modules\CommonData\Http\Filters;

use App\Http\Filters\BaseFilters;

class SponserFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'name',
        'featured',
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
    protected function name($value , $type = '=')
    {
        if ($value && $type != 'like') {
            return $this->builder->whereTranslation('name', $value);
        }else if($value && $type == 'like'){
          return $this->builder->whereTranslationLike('name', $value);
        }

        return $this->builder;
    }
        /**
     * Filter the query by a given feature.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function featured($value)
    {
        if ($value) {
            return $this->builder->featured();
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





}

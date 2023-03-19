<?php

namespace Modules\CommonData\Http\Filters;

use App\Http\Filters\BaseFilters;

class SliderFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
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
    protected function title($value , $type = '=')
    {
        if ($value && $type != 'like') {
            return $this->builder->whereTranslation('title', $value);
        }else if($value && $type == 'like'){
          return $this->builder->whereTranslationLike('title', $value);
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

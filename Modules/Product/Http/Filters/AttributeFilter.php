<?php

namespace Modules\Product\Http\Filters;

use App\Http\Filters\BaseFilters;
use Str;

class AttributeFilter extends BaseFilters
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
        'parent_id',
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
     * Filter the query by a given name.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function parentId($value , $type = null)
    {
        if ($value !== null) {
            return $this->builder->where('parent_id', $value);
        }

        return $this->builder;
    }

}

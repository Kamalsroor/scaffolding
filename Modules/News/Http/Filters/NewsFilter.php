<?php

namespace Modules\News\Http\Filters;

use App\Http\Filters\BaseFilters;

class NewsFilter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [
        'title',
        'description',
        'active',
        'category_id',
        'term',
        'columnFilters',
        'language',
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
    protected function language($value)
    {
        if ($value) {
            return $this->builder->where('language',$value)->orWhere('language','all');
        }

        return $this->builder;
    }

    /**
     * Filter the query by a given title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function categoryId($value)
    {
        if ($value) {
            return $this->builder->where('category_id', $value);
        }

        return $this->builder;
    }


      /**
     * Filter the query by a given title.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function title($value , $type = '=')
    {
        if ($value) {

          return $this->builder->where('title',$type, $value);
        }

        return $this->builder;
    }



    /**
     * Filter the query by a given description.
     *
     * @param string|int $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function description($value)
    {
        if ($value) {
            return $this->builder->where('description',  $value);
        }

        return $this->builder;
    }


    /**
     * Filter the query by a given active.
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

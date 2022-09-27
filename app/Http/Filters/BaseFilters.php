<?php

namespace App\Http\Filters;

use Illuminate\Support\Str;
use Illuminate\Http\Request;

abstract class BaseFilters
{
    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * The Eloquent builder.
     *
     * @var \Illuminate\Database\Eloquent\Builder
     */
    protected $builder;

    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Create a new BaseFilters instance.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Apply the filters.
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function apply($builder)
    {
        $this->builder = $builder;
        foreach ($this->getFilters() as $filter) {
            $value = $this->request->query($filter);
            if ($this->request->has($filter)) {
                $methodName = Str::camel($filter);
            } else {
                $methodName = 'default' . Str::studly($filter);
            }

            if (method_exists($this, $methodName)) {
                if ($value && isJson($value)) {
                    $value = json_decode($value , true);
                }
                $this->$methodName($value);
            }
        }

        return $this->builder;
    }

     
  

    /**
     * Fetch all relevant filters from the request.
     *
     * @return array
     */
    public function getFilters()
    {
        return property_exists($this, 'filters')
        && is_array($this->filters) ? $this->filters : [];
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

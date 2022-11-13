<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Filter extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $namespace = Str::of($name)->plural()->studly();

        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');

        $filterStub =  __DIR__.'/../stubs/Filters/Filter.stub';

        static::put(
            app_path("Http/Filters"),
            $name.'Filter.php',
            self::qualifyContent(
                $filterStub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Filter File for ' . $name . ' Created Successfully 🎉');


    }




    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {
        $columnsCode = '';
        $columnsFilterFun = '';
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'file':
                        break;
                    default:
                        $columnsCode .= "'".$column['name']."',
                        ";
                        $columnsFilterFun .= "

                        /**
                         * Filter the query by a given ".$column['name'].".
                         *
                         * @param string|int \$value
                         * @return \Illuminate\Database\Eloquent\Builder
                         */
                        protected function ".$column['name']."(\$q , \$value)
                        {
                            if (\$value) {
                                return \$this->builder->where('".$column['name']."', \$q, \$value);
                            }

                            return \$this->builder;
                        }

                        ";
                        break;
                }
            }
        }

        $t = "<?php

namespace App\Http\Filters;

use App\Http\Filters\BaseFilters;

class {{studlySingular}}Filter extends BaseFilters
{
    /**
     * Registered filters to operate upon.
     *
     * @var array
     */
    protected \$filters = [
        ";
        $t .= $columnsCode;
        if($hasActive){
            $t .= "'active',";
        }
        $t .= "
        'columnFilters',
        'sort',
        'deleted',
    ];



    /**
     * Filter the query by a given name.
     *
     * @param string|int \$value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function deleted(\$value)
    {
        if (\$value) {
            return \$this->builder->onlyTrashed();
        }

        return \$this->builder;
    }

    ";
    if($hasActive){
        $t .= "
    /**
     * Filter the query by a given name.
     *
     * @param string|int \$value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function active(\$q , \$value)
    {
        if (\$value) {
            return \$this->builder->where('active', \$q, \$value);
        }

        return \$this->builder;
    }
    ";
}

$t .= $columnsFilterFun;
$t .= "




    /**
     * Filter the query by a given code.
     *
     * @param string|int \$value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function columnFilters(\$value)
    {
        if (\$value) {
            \$type = '';
            if(isset(\$value['field']) && isset(\$value['value'])){
                \$inputValue = \$value['value'];
                switch (\$value['type']) {
                    case 'like':
                        \$q = \"%\$inputValue%\";
                        return \$this->{\$value['field']}(\$value['type'] ,  \$q);
                        break;

                    default:
                        \$q = \$inputValue;
                        return \$this->{\$value['field']}(\$value['type'] ,  \$q);
                        break;
                }
                return \$this->builder->where(\$value['field'], \$value['type'], \$inputValue);
            }
        }

        return \$this->builder;
    }

    /**
     * Filter the query by a given key.
     *
     * @param string|int \$value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function sort(\$value)
    {

        if (isset(\$value['field']) && \$value['field'] != '' && \$value['type'] != 'none') {
            \$type = isset(\$value['type'])  ? \$value['type'] : 'asc';
            return \$this->builder->orderBy(\$value['field'] ,\$type);
        }

        return \$this->builder;
    }

}


        ";

        return $t ;
    }
}

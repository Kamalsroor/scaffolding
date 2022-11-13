<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Repository extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command, $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();


        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');


        $stub = __DIR__.'/../stubs/Repositories/Repository.stub';

        static::put(
            app_path("Repositories"),
            $name.'Repository.php',
            self::qualifyContent(
                $stub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Repository File for ' . $name . ' Created Successfully 🎉');

    }


    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {
        $columnsCode = '';
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'num':
                        $columnsCode .= "'".$column['name']."' => ['required', 'numeric'],
                        ";
                        break;
                    case 'str':
                        $columnsCode .= "'".$column['name']."' => ['required', 'string', 'max:255'],
                        ";
                        break;
                    default:
                        $columnsCode .= "'".$column['name']."' => ['required'],
                        ";
                        break;
                }
            }
        }

        $t = "<?php

namespace App\Repositories;

use App\Interfaces\{{studlySingular}}RepositoryInterface;
use App\Models\{{studlySingular}};

class {{studlySingular}}Repository extends CrudRepository  implements {{studlySingular}}RepositoryInterface
{
    // model property on class instances
    protected \$model;

    // Constructor to bind model to repo
    public function __construct({{studlySingular}} \$model)
    {
        \$this->model = \$model;
    }

}


        ";

        return $t ;
    }

}

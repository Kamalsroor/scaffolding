<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class InterfacesGenerator extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command, $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();


        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');

        $stub = __DIR__.'/../stubs/Interfaces/RepositoryInterface.stub';

        static::put(
            app_path("Interfaces"),
            $name.'RepositoryInterface.php',
            self::qualifyContent(
                $stub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Repository Interface File for ' . $name . ' Created Successfully 🎉');

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

namespace App\Interfaces;

interface {{studlySingular}}RepositoryInterface extends CrudRepositoryInterface
{

}

        ";

        return $t ;
    }
}

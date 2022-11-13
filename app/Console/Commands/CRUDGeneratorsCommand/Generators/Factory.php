<?php

namespace App\Console\Commands\Generators;

use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Factory extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Factory.stub';

        static::put(
            database_path('factories'),
            $name.'Factory.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );
    }
}

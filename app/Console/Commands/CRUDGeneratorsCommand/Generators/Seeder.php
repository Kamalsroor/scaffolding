<?php

namespace App\Console\Commands\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Seeder extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Seeder.stub';

        static::put(
            database_path('seeders'),
            $name.'Seeder.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );
    }
}

<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Policy extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $stub = __DIR__.'/../stubs/Policy/Policy.stub';

        static::put(
            app_path("Policies"),
            $name.'Policy.php',
            self::qualifyContent(
                $stub,
                $name
            )
        );

        $command->info('Policy File for ' . $name . ' Created Successfully 🎉');

    }
}

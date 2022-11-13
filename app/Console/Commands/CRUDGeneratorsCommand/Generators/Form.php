<?php

namespace App\Console\Commands\Generators;

use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;
use Illuminate\Support\Str;

class Form extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $namespace = Str::of($name)->plural()->studly();

        $translatable = $command->option('translatable');


        $FormVueStub =  __DIR__.'/../stubs/Views/vuePage/Forms.stub';

        static::put(
            resource_path("js/FormComponents/Forms"),
            $name.'Form.vue',
            self::qualifyContent(
                $FormVueStub,
                $name
            )
        );
    }
}

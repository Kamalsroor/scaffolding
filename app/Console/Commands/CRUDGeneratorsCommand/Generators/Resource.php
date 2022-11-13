<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Resource extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command  , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $namespace = Str::of($name)->plural()->studly();

        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');

        $stub =  __DIR__.'/../stubs/Resources/Resource.stub';

        static::put(
            app_path("Http/Resources"),
            $name.'Resource.php',
            self::qualifyContent(
                $stub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Resources File for ' . $name . ' Created Successfully 🎉');

    }



    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {
        $columnsCode = '';
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'file':
                        $columnsCode .= "'".$column['name']."_url' => \$this->getFirstMediaUrl(),
                        '".$column['name']."' => \$this->getFirstMediaResource(),
                        ";
                        break;
                    default:
                        $columnsCode .= "'".$column['name']."' => \$this->".$column['name'].",
                        ";
                        break;
                }
            }
        }

        $t = "<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class {{studlySingular}}Resource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  \$request
     * @return array
     */
    public function toArray(\$request)
    {
        return [
            'id' => \$this->id,
            ";
            $t .= $columnsCode;
    if($hasSlug){
        $t .= "'slug' => \$this->slug,
        ";
    }
    if($hasOrder){
        $t .= "'order_id' => \$this->order_id,
        ";
    }
    if($hasActive){
        $t .= "'active' => \$this->active,
        ";
    }
            $t .= "
            // 'can' => \$this->can,
            'deleted' => isset(\$this->deleted_at),
            'deleted_at' => \$this->deleted_at ? \$this->deleted_at->format('Y-M-d H:s A') : null,
        ];
    }
}


        ";

        return $t ;
    }
}

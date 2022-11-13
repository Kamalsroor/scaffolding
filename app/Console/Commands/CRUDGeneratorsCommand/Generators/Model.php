<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Model extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();


        $hasMedia = $command->option('has-media');
        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');



        static::put(
            app_path("Models"),
            $name.'.php',
            self::qualifyContent(
                __DIR__.'/../stubs/Model/Model.stub',
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );


        $command->info('Model File for ' . $name . ' Created Successfully 🎉');

    }


    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {

        $columnsCode = '';
        $castsCode = '';
        $hasFile = false;
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'file':
                        $hasFile = true;

                        break;
                    case 'switch':
                        $castsCode .= "
                         '".$column['name']."' => 'boolean',
                        
                        "; 
                        $columnsCode .= "'".$column['name']."',
                        ";
                        break;
                    default:
                        $columnsCode .= "'".$column['name']."',
                        ";
                        break;
                }
            }
        }


        $t = '';

        $t .= "<?php

namespace App\Models;

use App\Http\Filters\Filterable;
use App\Http\Filters\{{studlySingular}}Filter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;";
if($hasFile){
    $t .= "
use App\Models\Media\HasMedia;";
}
if($hasSlug){
    $t .= "
use App\Models\Slug\HasSlug;
use App\Models\Slug\SlugOptions;";
}
$t .="

use App\Models\Scope\OrderByScope;
use App\Traits\HasCan;

class {{studlySingular}} extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;
    use HasCan;";
    if($hasSlug){
        $t .= "
    use HasSlug;";
    }
    if($hasFile){
        $t .= "
    use HasMedia;";
    }
    $t .="
    use OrderByScope;



    /**
     * The Database Connection Name.
     *
     * @var string
     */
    protected \$connection = 'tenant';


    /**
     * The query parameter's filter of the model.
     *
     * @var string
     */
    protected \$filter = {{studlySingular}}Filter::class;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected \$fillable = [
        ";
    $t .= $columnsCode;
        if($hasActive){
    $t .= "
            'active',";
        }
        if($hasOrder){
    $t .= "
            'order_id',";
        }
        if($hasSlug){
    $t .= "
            'slug',";
        }

    $t .= "

    ];


    /**
     *
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected \$appends = [
        'can',
    ];

    protected \$casts = [
        ";
    $t .= $castsCode;
    if($hasActive){
    $t .= "
        'active' => 'boolean'";
    }
    $t .= "
    ];



    ";
    if($hasSlug){
    $t .= "

    /**
     * Get the options for generating the slug.
     */
    public function getSlugOptions() : SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name')
            ->saveSlugsTo('slug');
    }


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    ";
    }
    $t .= "



}

        ";
        return $t ;

    }
}

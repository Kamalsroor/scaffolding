<?php

namespace App\Console\Commands\CRUDGeneratorsCommand;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Lang;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Test;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\View;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Model;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Filter;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Policy;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Seeder;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Factory;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Request;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Resource;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Migration;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Breadcrumb;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Controller;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Form;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\VirtualResource;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\VirtualModel;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Import;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\InterfacesGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\Generators\Repository;
use Artisan;
use Exception;
use Module;

class CrudMakeCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // {module : Class (Singular), e.g User, Place, Car}
    // php artisan make:v2-crud service --columns=name,des --has-active  --has-media
    protected $signature = 'make:v2-crud
                            {name : Class (Singular), e.g User, Place, Car}
                            {--columns=*}
                            {--has-vue}
                            {--has-active}
                            {--has-order}
                            {--has-slug}
                            {--has-api}
                            {--has-media}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create all Crud operations with a single command';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $name = $this->argument('name');
        $module = $this->ask('What is module name?');
        if($module == null || $module == ""){
            $this->handle();
        }

        if($module){
          // dd($module);

          $moduleExisist = Module::find($module);
          if(!$moduleExisist){
            $moduleMaked = $this->call("module:make" , ['name' => [$module]]);
            // exec('php artisan module:make '.$module.' > /dev/null &');

            dd('make $module', $moduleMaked);
          }else{

            dd($moduleExisist->getName());
          }
        }

        $columns = [];
        if(is_array($this->option('columns')) && count($this->option('columns')) > 0){
            $columns = $this->handleColumns($this->option('columns'));
        }
        Migration::generate($this , $columns);
        Model::generate($this , $columns);
        Controller::generate($this , $columns);
        Resource::generate($this , $columns);
        Filter::generate($this , $columns);
        Request::generate($this, $columns);
        InterfacesGenerator::generate($this, $columns);
        Repository::generate($this, $columns);
        Policy::generate($this);
        View::generate($this , $columns , $module);
        app(Modifier::class)->routes($name);
        app(Modifier::class)->permission($name);
        app(Modifier::class)->lang($name);

        $this->info('Api Crud for ' . $name . ' Created Successfully 🎉');

        // dd( $columns);
        // Lang::generate($this);
        // Breadcrumb::generate($this);
        // View::generate($this);
        // Form::generate($this);
        // Repository::generate($this);
        // InterfacesGenerator::generate($this);
        // Migration::generate($this);
        // Factory::generate($this);
        // Seeder::generate($this);
        // Policy::generate($this);
        // Controller::generate($this);
        // // Request::generate($this);
        // Filter::generate($this);
        // Test::generate($this);
        // VirtualResource::generate($this);
        // VirtualModel::generate($this);
        // Import::generate($this);

        // $name = $this->argument('name');

        // app(Modifier::class)->routes($name);

        // app(Modifier::class)->sidebar($name);

        // app(Modifier::class)->seeder($name);

        // app(Modifier::class)->permission($name);

        // app(Modifier::class)->softDeletes($name);

        // $seederName = Str::of($name)->singular()->studly() . 'Seeder';

        // $this->info('Api Crud for ' . $name . ' Created Successfully 🎉');
        // $this->warn('Please run "composer dump-autoload && php artisan migrate && php artisan db:seed --class=' . $seederName . ' && php artisan l5-swagger:generate"');
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handleColumns($columns)
    {
        $newArray = [];
        foreach ($columns as $key => $value) {
            $type = $this->choice('What is type For '.$value.' ?', ['num' , 'str' ,'long_text', 'switch' , 'file','arr']);
            $newArray[$key]['name'] = $value;
            $newArray[$key]['type'] = $type;
            // $newArray[$key]['options'] = $this->handleTypes($value , $type);
        }
        foreach ($newArray as $key => $value) {
            // $type = $this->choice('What is type For '.$value.' ?', ['num' , 'str' , 'arr']);
            // $newArray[$key]['name'] = $value;
            // $newArray[$key]['type'] = $type;
            $newArray[$key]['options'] = $this->handleTypes($value['name'] , $value['type']);
        }
        $Table_Data = [] ;
        foreach ($newArray as $key => $value) {
            $Table_Data[$key]['name'] = $value['name'];
            $Table_Data[$key]['type'] = $value['type'];
            $Table_Data[$key]['options'] = count($value['options']) > 0 ? 'Yes' : 'No';
            $Table_Data[$key]['show_in_table'] = isset($value['options']['show_tables']) ? ($value['options']['show_tables'] ? 'Yes' : 'No') : 'No';
        }
        $this->table(
            ['Name', 'Type','options','Show In Table'],
            $Table_Data
        );
        if ($this->confirm('Do you wish to continue?' ,true)) {
            return $newArray;
        }
        return $this->handleColumns($columns);
    }


    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handleTypes($column , $type)
    {
        switch ($type) {
            case 'arr':
                return [
                    'fileds' => [],
                    'show_tables' => $this->confirm('show ' . $column .' in Table?' ,true)
                ];
                break;
            case 'file':
                return [
                    'type' => $this->choice('What is File type For '.$column.' ?', ['pdf' , 'image']) ,
                    'show_tables' => $this->confirm('show ' . $column .' in Table?' ,true)
                ];
                break;
            default:
                return [
                    'show_tables' => $this->confirm('show ' . $column .' in Table?' ,true)
                ];
                break;
        }
    }
}


<?php

namespace App\Console\Commands\Generators;
namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Controller extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();

        $namespace = Str::of($name)->plural()->studly();

        $hasMedia = $command->option('has-media');
        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');

        // // ApiController
        // static::put(
        //     app_path("Http/Controllers/Api"),
        //     $name.'Controller.php',
        //     self::qualifyContent(
        //         __DIR__.'/../stubs/Controllers/Api/Controller.stub',
        //         $name
        //     )
        // );

        $stub =  __DIR__.'/../stubs/Controllers/Dashboard/Controller.stub';

        // DashboardController
        static::put(
            app_path("Http/Controllers/DashboardV2"),
            $name.'Controller.php',
            self::qualifyContent(
                $stub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Controller File for ' . $name . ' Created Successfully 🎉');
    }



    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {

        $columnsCode = '';
        $FileCode = '';
        $hasFile = false;
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'file':
                        $hasFile = true;
                        $FileCode .= " \$".$column['name']." = \$this->BaseRepository->AddMediaCollection('".$column['name']."' , \${{lowercaseSingular}});
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

namespace App\Http\Controllers\DashboardV2;

use App\Http\Requests\Dashboard\{{studlySingular}}Request;
use Illuminate\Http\Request;
use App\Http\Resources\{{studlySingular}}Resource;
use App\Interfaces\{{studlySingular}}RepositoryInterface;
use App\Models\{{studlySingular}};

class {{studlySingular}}Controller extends BaseController
{


    public {{studlySingular}}RepositoryInterface \$BaseRepository;
    protected \$model;

    public function __construct({{studlySingular}}RepositoryInterface \$BaseRepository , {{studlySingular}} \${{lowercaseSingular}})
    {
        // \$this->authorizeResource({{studlySingular}}::class);
        \$this->BaseRepository = \$BaseRepository;
        \$this->model = \${{lowercaseSingular}};
    }

    public function index(Request \$request)
    {
        \$queries = ['columnFilters','perPage', 'page','sort','deleted','length'];
        return {{studlySingular}}Resource::collection(
            \$this->BaseRepository->all(\$request->only(\$queries))
        )->additional(['meta' => [
            ";
            if($hasOrder){

        $t .= " 'last_order_id' => \$this->BaseRepository->max('order_id'),";

            }
            $t .= "
        ]]);
    }


    public function show(\$id)
    {
        return new {{studlySingular}}Resource(
            \$this->BaseRepository->find(\$id)
        );
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Dashboard\{{studlySingular}}Request \$request
     * @return \Illuminate\Http\Response
     */
    public function store({{studlySingular}}Request \$request)
    {
        \${{lowercaseSingular}} = \$this->BaseRepository->create(\$request->validated());
        ";
        $t .= $FileCode;
        $t .= "
        return response()->success('success' , new {{studlySingular}}Resource(\${{lowercaseSingular}}));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Dashboard\{{studlySingular}}Request \$request
     * @return \Illuminate\Http\Response
     */
    public function update({{studlySingular}}Request \$request , \$id)
    {
        \${{lowercaseSingular}} = \$this->BaseRepository->update(\$request->validated() , \$id);
        ";
        $t .= $FileCode;
        $t .= "
        return response()->success('update successfully' ,  new {{studlySingular}}Resource(\${{lowercaseSingular}}));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Dashboard\{{studlySingular}}Request \$request
     * @return \Illuminate\Http\Response
     */
    public function destroy(\$id)
    {
        \${{lowercaseSingular}} = \$this->BaseRepository->findInAll(\$id);
        if(\${{lowercaseSingular}}->trashed()){
            \$this->BaseRepository->forceDelete(\${{lowercaseSingular}});
        }else{
            \$this->BaseRepository->destroy(\${{lowercaseSingular}});
        }
        return response()->success('deleted successfully');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param App\Http\Requests\Dashboard\{{studlySingular}}Request \$request
     * @return \Illuminate\Http\Response
     */
    public function restore(\$id)
    {
        \$this->BaseRepository->restore(\$this->BaseRepository->findTrashed(\$id));
        return response()->success('restored successfully');
    }


}



        ";
        return $t ;

    }
}

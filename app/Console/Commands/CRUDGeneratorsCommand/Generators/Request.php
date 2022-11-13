<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;

class Request extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command  , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();


        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');

        $namespace = Str::of($name)->plural()->studly();

        $stub =  __DIR__.'/../stubs/Requests/Request.stub';

        static::put(
            app_path("Http/Requests/Dashboard"),
            $name.'Request.php',
            self::qualifyContent(
                $stub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Request File for ' . $name . ' Created Successfully 🎉');

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
                    case 'long_text':
                        $columnsCode .= "'".$column['name']."' => ['required', 'string', 'max:10000'],
                        ";
                        break;
                    case 'switch':
                        $columnsCode .= "'".$column['name']."' => ['required', 'boolean'],
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

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class {{studlySingular}}Request extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            ";
        $t .= $columnsCode;

        if($hasOrder){
            $t .= "'order_id' => ['required','numeric','min:1'],
            ";
        }
        if($hasActive){
            $t .= "'active' => ['required','boolean'],
            ";
        }

        $t .=
            "
        ];
    }

}


        ";

        return $t ;
    }
}

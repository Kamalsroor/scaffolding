<?php

namespace App\Console\Commands\CRUDGeneratorsCommand\Generators;

use Illuminate\Support\Str;
use App\Console\Commands\CRUDGeneratorsCommand\CrudGenerator;
use App\Console\Commands\CRUDGeneratorsCommand\CrudMakeCommand;
use Stichoza\GoogleTranslate\GoogleTranslate;

class Migration extends CrudGenerator
{
    public static function generate(CrudMakeCommand $command , $columns)
    {
        $name = Str::of($command->argument('name'))->singular()->studly();
        $hasActive = $command->option('has-active');
        $hasOrder = $command->option('has-order');
        $hasSlug = $command->option('has-slug');
        $filterStub = __DIR__.'/../stubs/migration.stub';


        $table = Str::of($name)->snake()->lower()->plural();

        static::put(
            database_path("migrations"),
            date('Y_m_d_His')."_create_{$table}_table.php",
            self::qualifyContent(
                $filterStub,
                $name,
                self::handelStub($hasActive , $hasOrder , $hasSlug  ,$columns)
            )
        );

        $command->info('Migration File for ' . $name . ' Created Successfully 🎉');
    }

    public static function handelStub($hasActive , $hasOrder , $hasSlug , $columns)
    {
        $columnsCode = '';
        if(isset($columns) && is_array($columns) && count($columns) > 0){

            foreach ($columns as $key => $column) {
                switch ($column['type']) {
                    case 'num':
                        $columnsCode .= "\$table->integer('".$column['name']."')->nullable();
                        ";
                        break;
                    case 'str':
                        $columnsCode .= "\$table->string('".$column['name']."')->nullable();
                        ";
                        break;
                    case 'long_text':
                        $columnsCode .= "\$table->longText('".$column['name']."')->nullable();
                        ";
                        break;
                    case 'switch':
                        $columnsCode .= "\$table->boolean('".$column['name']."')->nullable();
                        ";
                        break;
                    case 'file':
                        break;
                    default:
                        $columnsCode .= "// \$table->string('".$column['name']."')->nullable();
                        ";
                        break;
                }
            }
        }

        $t = "
<?php

    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration;

    class Create{{studlyPlural}}Table extends Migration
    {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up()
        {
            Schema::create('{{lowercasePlural}}', function (Blueprint \$table) {
                \$table->id();
                ";
                $t .= $columnsCode;
            if($hasActive){
        $t .= "
                \$table->boolean('active')->nullable();";
            }
            if($hasOrder){
        $t .= "
                \$table->integer('order_id')->nullable();";
            }
            if($hasSlug){
        $t .= "
                \$table->string('slug')->nullable();";
            }
        $t .="
                \$table->timestamps();
                \$table->softDeletes();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('{{lowercasePlural}}');
        }
    }


        ";

        return $t ;
    }
}

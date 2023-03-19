<?php

namespace Modules\Product\Database\Seeders;

use App\Models\Media;
use Attribute;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Product\Entities\Product;
use Modules\Product\Entities\Permission;
use Modules\Product\Entities\Role;
use Modules\Product\Interfaces\ProductRepositoryInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class ProductDatabaseSeeder extends Seeder
{
  public ProductRepositoryInterface $BaseRepository;

  public function __construct(ProductRepositoryInterface $BaseRepository , Product $product)
  {
      // $this->authorizeResource(Service::class);
      $this->BaseRepository = $BaseRepository;
      $this->model = $product;
  }



  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    // dd('this is product seeder ');
    $this->call(AttributeSeeder::class);
    $amount = 20;
    // // The output
    // $output = new ConsoleOutput();

    // // creates a new progress bar (50 units)
    // $progressBar = new ProgressBar($output, $amount);
    // $sections = $this->sections();
    // $faker = \Faker\factory::create();

    // // starts and displays the progress bar
    // $progressBar->start();
    // $locales = config('translatable.locales');

    // $products = Product::factory($amount)->make()->each(function ($product) use ($progressBar , $sections  , $faker , $locales) {

    //   // advances the progress bar 1 unit
    //   if ($product->save()) {
    //     $this->BaseRepository->AddMediaCollectionById(Media::inRandomOrder()->first()->id , $product);
    //     $Count = rand(1,8);
    //     // dd($sections);

    //     for ($i=0; $i < $Count; $i++) {
    //       $section = $sections[rand(0,8)];
    //       $inputs = json_decode($section['inputs'] , true);
    //       foreach ($inputs as $key => $value) {
    //         if($value['type'] == 'text'){

    //           foreach($locales as $locale){

    //             $inputs[$key]['value'][$locale] = \Str::replace('.', '' , $faker->realText($faker->numberBetween(10 , 50)));
    //           }
    //         }
    //         if($value['type'] == 'textarea'){

    //           foreach($locales as $locale){

    //             $inputs[$key]['value'][$locale] =  $faker->realText($faker->numberBetween(120 , 300)) . ' <br><br><br> ' .  $faker->realText($faker->numberBetween(120 , 300));
    //           }
    //         }

    //       }

    //         $complaed = handelVueTamplate($section['html'] ,  $inputs);

    //         // $section = $product->Sections()->updateOrCreate([
    //         //   'id' => isset($value['id']) ? $value['id'] : 0,
    //         // ],[
    //         //   'order_id' => $i + 1,
    //         //   'section_id' => $section['section_id'],
    //         //   'inputs' => $inputs,
    //         //   'html' => $section['html'],
    //         //   'complaed_html' => $complaed,
    //         // ]);

    //     }
    //   }

    //   // you can also advance the progress bar by more than 1 unit
    //   $progressBar->advance();
    //   // $progressBar->advance(3);
    // });


    // // ensures that the progress bar is at 100%
    // $progressBar->finish();




  }

  public function sections()
  {
    return $product_sections = array(
      array('id' => '86','product_id' => '44','order_id' => '0','section_id' => 'secetion1','inputs' => '[{"name":"subtitle","type":"text","value":{"en":"Biometrics Facial Recognition","de":"Biometrics Facial Recognition"},"validations":[]},{"name":"subtitle_color","type":"color","value":"#E6EEF4","validations":[]},{"name":"title","type":"text","value":{"en":"Face Screen","de":"Face Screen"},"validations":[]},{"name":"title_color","type":"color","value":"#00DAE9","validations":[]},{"name":"des","type":"textarea","value":{"en":"des1","de":"des2"},"validations":[]},{"name":"des_color","type":"color","value":"#E6EEF4","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image19.png","id":0},"validations":[]}]','html' => '<section  :style="{\'background-image\': \'url(\' + background.path + \')\'}" class="bg-[url(\'.\')] bg-cover bg-no-repeat flex   p-8 md:p-18 lg:p-24">
        <div class="w-[fit-content] sm:w-2/4 flex flex-col gap-4">

            <p class=" font-semibold text-xl" :style="{\'color\': \'\' + subtitle_color + \'\'}">
               {{subtitle[local]}}
               </p>
              <h1 class="font-bold text-3xl lg:text-5xl " :style="{\'color\': \'\' + title_color + \'\'}">
                {{title[local]}}

            </h1>
            <p  :style="{\'color\': \'\' + des_color + \'\'}">
              {{des[local]}}

            </p>
        </div>

    </section>','complaed_html' => '{"en":"<section style=\\"background-image: url( \'\\/storage\\/sections\\/product\\/details\\/image19.png\' )\\" class=\\"bg-[url(\'.\')] bg-cover bg-no-repeat flex p-8 md:p-18 lg:p-24\\"> <div class=\\"w-[fit-content] sm:w-2\\/4 flex flex-col gap-4\\"> <p class=\\" font-semibold text-xl\\" style=\\"color: #E6EEF4 \\"> Biometrics Facial Recognition <\\/p> <h1 class=\\"font-bold text-3xl lg:text-5xl \\" style=\\"color: #00DAE9 \\"> Face Screen <\\/h1> <p style=\\"color: #E6EEF4 \\"> des1 <\\/p> <\\/div> <\\/section>","de":"<section style=\\"background-image: url( \'\\/storage\\/sections\\/product\\/details\\/image19.png\' )\\" class=\\"bg-[url(\'.\')] bg-cover bg-no-repeat flex p-8 md:p-18 lg:p-24\\"> <div class=\\"w-[fit-content] sm:w-2\\/4 flex flex-col gap-4\\"> <p class=\\" font-semibold text-xl\\" style=\\"color: #E6EEF4 \\"> Biometrics Facial Recognition <\\/p> <h1 class=\\"font-bold text-3xl lg:text-5xl \\" style=\\"color: #00DAE9 \\"> Face Screen <\\/h1> <p style=\\"color: #E6EEF4 \\"> des2 <\\/p> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '115','product_id' => '44','order_id' => '1','section_id' => 'secetion2','inputs' => '[{"name":"subtitle","type":"text","value":{"en":"INCREASED EFFICIENCY","de":"INCREASED EFFICIENCY"},"validations":[]},{"name":"title","type":"text","value":{"en":"FOR AIRPORTS","de":"FOR AIRPORTS"},"validations":[]},{"name":"title_color","type":"color","value":"#001E2F","validations":[]},{"name":"des","type":"textarea","value":{"en":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.","de":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports."},"validations":[]},{"name":"des_color","type":"color","value":"#001E2F","validations":[]},{"name":"background_color","type":"color","value":"#E6EEF4","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 20.png","id":0},"validations":[]}]','html' => '<section class="p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0 bg-[#E6EEF4]" :style="{\'background-color\': \'\' + background_color + \'\'}">
                <div class="w-full md:w-8/12 mr-3">

                    <h2 class="text-[#001E2F] font-bold text-2xl" :style="{\'color\': \'\' + title_color + \'\'}">
                        {{subtitle[local]}} <br> {{title[local]}}
                    </h2>

                    <p class="text-[#001E2F] my-4 mb-0" :style="{\'color\': \'\' + des_color + \'\'}"  >
                      {{des[local]}}
                    </p>

                </div>
                <div class="w-full flex justify-center items-center md:w-4/12 ml-3">
                    <img class="w-[250px] md:[w-300px] lg:w-[100%]" :src="background.path" alt="">
                </div>
            </section>','complaed_html' => '{"en":"<section class=\\"p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0 bg-[#E6EEF4]\\" style=\\"background-color: #E6EEF4 \\"> <div class=\\"w-full md:w-8\\/12 mr-3\\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> INCREASED EFFICIENCY <br> FOR AIRPORTS <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex justify-center items-center md:w-4\\/12 ml-3\\"> <img class=\\"w-[250px] md:[w-300px] lg:w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 20.png\\" alt=\\"\\"> <\\/div> <\\/section>","de":"<section class=\\"p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0 bg-[#E6EEF4]\\" style=\\"background-color: #E6EEF4 \\"> <div class=\\"w-full md:w-8\\/12 mr-3\\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> INCREASED EFFICIENCY <br> FOR AIRPORTS <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex justify-center items-center md:w-4\\/12 ml-3\\"> <img class=\\"w-[250px] md:[w-300px] lg:w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 20.png\\" alt=\\"\\"> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '116','product_id' => '44','order_id' => '2','section_id' => 'secetion3','inputs' => '[{"name":"title","type":"text","value":{"en":"FACE SCREEN","de":"FACE SCREEN"},"validations":[]},{"name":"title_color","type":"color","value":"#001E2F","validations":[]},{"name":"des","type":"textarea","value":{"en":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.","de":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports."},"validations":[]},{"name":"des_color","type":"color","value":"#001E2F","validations":[]},{"name":"background_color","type":"color","value":"#00DAE9","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 21.png","id":0},"validations":[]}]','html' => '<section class="bg-[#00DAE9] p-8 md:p-18 lg:p-24 flex flex-col gap-8  md:flex-row md:gap-0" :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div class="w-full flex  md:w-6/12 md:mr-3">
                <img class="w-full sm:max-w-[400px] md:w-[calc(100% - 0.75rem)] mx-auto":src="background.path" alt="">
        </div>
        <div class="w-full md:w-6/12 md:ml-3 flex flex-col justify-center ">

            <h2 class="text-[#001E2F] font-bold text-2xl" :style="{\'color\': \'\' + title_color + \'\'}">
                {{title[local]}}
            </h2>

            <p class="text-[#001E2F] my-4 mb-0" :style="{\'color\': \'\' + des_color + \'\'}"   >
              {{des[local]}}
            </p>


        </div>
    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#00DAE9] p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0\\" style=\\"background-color: #00DAE9 \\"> <div class=\\"w-full flex md:w-6\\/12 md:mr-3\\"> <img class=\\"w-full sm:max-w-[400px] md:w-[calc(100% - 0.75rem)] mx-auto\\"src=\\"\\/storage\\/sections\\/product\\/details\\/image 21.png\\" alt=\\"\\"> <\\/div> <div class=\\"w-full md:w-6\\/12 md:ml-3 flex flex-col justify-center \\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> FACE SCREEN <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <\\/section>","de":"<section class=\\"bg-[#00DAE9] p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:gap-0\\" style=\\"background-color: #00DAE9 \\"> <div class=\\"w-full flex md:w-6\\/12 md:mr-3\\"> <img class=\\"w-full sm:max-w-[400px] md:w-[calc(100% - 0.75rem)] mx-auto\\"src=\\"\\/storage\\/sections\\/product\\/details\\/image 21.png\\" alt=\\"\\"> <\\/div> <div class=\\"w-full md:w-6\\/12 md:ml-3 flex flex-col justify-center \\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> FACE SCREEN <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '117','product_id' => '44','order_id' => '3','section_id' => 'secetion4','inputs' => '[{"name":"subtitle","type":"text","value":{"en":"PAPERLESS AIRPORT","de":"PAPERLESS AIRPORT"},"validations":[]},{"name":"title","type":"text","value":{"en":"AND ABC","de":"AND ABC"},"validations":[]},{"name":"title_color","type":"color","value":"#001E2F","validations":[]},{"name":"des","type":"textarea","value":{"en":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.","de":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports."},"validations":[]},{"name":"des_color","type":"color","value":"#001E2F","validations":[]},{"name":"background_color","type":"color","value":"#00DAE9","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 22.png","id":0},"validations":[]}]','html' => '<section class="bg-[#00DAE9]  p-8 pb-0 md:p-18 md:pb-0 lg:p-24 lg:pb-0 flex flex-col gap-8  md:flex-row md:gap-0" :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div class="w-full md:w-6/12 md:mr-3 flex flex-col justify-center pb-8">

            <h2 class="text-[#001E2F] font-bold text-2xl" :style="{\'color\': \'\' + title_color + \'\'}">
              {{subtitle[local]}} <br> {{title[local]}}
            </h2>

            <p class="text-[#001E2F] my-4 mb-0" :style="{\'color\': \'\' + des_color + \'\'}"   >
              {{des[local]}}
            </p>


        </div>
        <div class="w-full flex  md:w-6/12 md:ml-3 items-end">
                <img class="mx-auto max-w-[100%] sm:max-w-[400px] md:max-w-[100%] lg:max-w-[100%]" :src="background.path" alt="">
        </div>

    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#00DAE9] p-8 pb-0 md:p-18 md:pb-0 lg:p-24 lg:pb-0 flex flex-col gap-8 md:flex-row md:gap-0\\" style=\\"background-color: #00DAE9 \\"> <div class=\\"w-full md:w-6\\/12 md:mr-3 flex flex-col justify-center pb-8\\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> PAPERLESS AIRPORT <br> AND ABC <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex md:w-6\\/12 md:ml-3 items-end\\"> <img class=\\"mx-auto max-w-[100%] sm:max-w-[400px] md:max-w-[100%] lg:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 22.png\\" alt=\\"\\"> <\\/div> <\\/section>","de":"<section class=\\"bg-[#00DAE9] p-8 pb-0 md:p-18 md:pb-0 lg:p-24 lg:pb-0 flex flex-col gap-8 md:flex-row md:gap-0\\" style=\\"background-color: #00DAE9 \\"> <div class=\\"w-full md:w-6\\/12 md:mr-3 flex flex-col justify-center pb-8\\"> <h2 class=\\"text-[#001E2F] font-bold text-2xl\\" style=\\"color: #001E2F \\"> PAPERLESS AIRPORT <br> AND ABC <\\/h2> <p class=\\"text-[#001E2F] my-4 mb-0\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex md:w-6\\/12 md:ml-3 items-end\\"> <img class=\\"mx-auto max-w-[100%] sm:max-w-[400px] md:max-w-[100%] lg:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 22.png\\" alt=\\"\\"> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '118','product_id' => '44','order_id' => '4','section_id' => 'secetion5','inputs' => '[{"name":"subtitle","type":"text","value":{"en":"Biometrics Facial Recognition","de":"Biometrics Facial Recognition"},"validations":[]},{"name":"subtitle_color","type":"color","value":"#001E2F","validations":[]},{"name":"title","type":"text","value":{"en":"Face Screen","de":"Face Screen"},"validations":[]},{"name":"title_color","type":"color","value":"#F55800","validations":[]},{"name":"des","type":"textarea","value":{"en":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports.","de":"With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports."},"validations":[]},{"name":"des_color","type":"color","value":"#0F1921","validations":[]},{"name":"background_color","type":"color","value":"#F3F5F5","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 23.png","id":0},"validations":[]}]','html' => '<section class="bg-[#F3F5F5]  flex flex-col gap-8  md:flex-row md:justify-center items-center "  :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div class="md:w-6/12 flex flex-col gap-4 p-8  md:p-18 lg:pb-0  lg:p-24 lg:pt-0">
            <p class="text-[#001E2F] font-semibold text-xl"  :style="{\'color\': \'\' + subtitle_color + \'\'}">
              {{subtitle[local]}}
            </p>
            <h1 class="font-bold text-3xl lg:text-5xl text-[#F55800]"  :style="{\'color\': \'\' + title_color + \'\'}">
              {{title[local]}}
            </h1>
            <p class="text-[#0F1921]" :style="{\'color\': \'\' + des_color + \'\'}"  >
              {{des[local]}}        </p>
        </div>
        <div class="w-full flex justify-end md:block md:w-6/12">
            <img class="max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
        </div>
    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#F3F5F5] flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"md:w-6\\/12 flex flex-col gap-4 p-8 md:p-18 lg:pb-0 lg:p-24 lg:pt-0\\"> <p class=\\"text-[#001E2F] font-semibold text-xl\\" style=\\"color: #001E2F \\"> Biometrics Facial Recognition <\\/p> <h1 class=\\"font-bold text-3xl lg:text-5xl text-[#F55800]\\" style=\\"color: #F55800 \\"> Face Screen <\\/h1> <p class=\\"text-[#0F1921]\\" style=\\"color: #0F1921 \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex justify-end md:block md:w-6\\/12\\"> <img class=\\"max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 23.png\\" alt=\\"\\"> <\\/div> <\\/section>","de":"<section class=\\"bg-[#F3F5F5] flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"md:w-6\\/12 flex flex-col gap-4 p-8 md:p-18 lg:pb-0 lg:p-24 lg:pt-0\\"> <p class=\\"text-[#001E2F] font-semibold text-xl\\" style=\\"color: #001E2F \\"> Biometrics Facial Recognition <\\/p> <h1 class=\\"font-bold text-3xl lg:text-5xl text-[#F55800]\\" style=\\"color: #F55800 \\"> Face Screen <\\/h1> <p class=\\"text-[#0F1921]\\" style=\\"color: #0F1921 \\" vhtml=\\"des[local]\\"> With passenger traffic expected to double to 7.8 billion people in 2036, MODI rises to the challenge of providing the solution through biometric technology. The use of biometric data guarantees passengers faster and more secure self-service processes for identity checks at airports. <\\/p> <\\/div> <div class=\\"w-full flex justify-end md:block md:w-6\\/12\\"> <img class=\\"max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 23.png\\" alt=\\"\\"> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '119','product_id' => '44','order_id' => '5','section_id' => 'secetion6','inputs' => '[{"name":"title","type":"text","value":{"en":"RELIABLE EVEN IN POOR CONDITIONS","de":"RELIABLE EVEN IN POOR CONDITIONS"},"validations":[]},{"name":"title_color","type":"color","value":"#001E2F","validations":[]},{"name":"des","type":"textarea","value":{"en":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.","de":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification."},"validations":[]},{"name":"des_color","type":"color","value":"#001E2F","validations":[]},{"name":"background_color","type":"color","value":"#F3F5F5","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 24.png","id":0},"validations":[]}]','html' => '<section  class="p-8 md:p-18 lg:p-24 flex gap-8 md:flex-row md:gap-0 bg-[#F3F5F5] flex-col-reverse" :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div class="w-full   md:w-6/12 flex items-center">
            <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
        </div>
        <div class="md:w-6/12 flex flex-col gap-4 ">
            <h2 class="text-[#001E2F] font-semibold text-2xl" :style="{\'color\': \'\' + title_color + \'\'}">
                {{title[local]}}
            </h2>

            <p class="text-[#001E2F]" :style="{\'color\': \'\' + des_color + \'\'}"  >
               {{des[local]}}
            </p>

        </div>

    </section>','complaed_html' => '{"en":"<section class=\\"p-8 md:p-18 lg:p-24 flex gap-8 md:flex-row md:gap-0 bg-[#F3F5F5] flex-col-reverse\\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"w-full md:w-6\\/12 flex items-center\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 24.png\\" alt=\\"\\"> <\\/div> <div class=\\"md:w-6\\/12 flex flex-col gap-4 \\"> <h2 class=\\"text-[#001E2F] font-semibold text-2xl\\" style=\\"color: #001E2F \\"> RELIABLE EVEN IN POOR CONDITIONS <\\/h2> <p class=\\"text-[#001E2F]\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>","de":"<section class=\\"p-8 md:p-18 lg:p-24 flex gap-8 md:flex-row md:gap-0 bg-[#F3F5F5] flex-col-reverse\\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"w-full md:w-6\\/12 flex items-center\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 24.png\\" alt=\\"\\"> <\\/div> <div class=\\"md:w-6\\/12 flex flex-col gap-4 \\"> <h2 class=\\"text-[#001E2F] font-semibold text-2xl\\" style=\\"color: #001E2F \\"> RELIABLE EVEN IN POOR CONDITIONS <\\/h2> <p class=\\"text-[#001E2F]\\" style=\\"color: #001E2F \\" vhtml=\\"des[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '120','product_id' => '44','order_id' => '6','section_id' => 'secetion7','inputs' => '[{"name":"title_1","type":"text","value":{"en":"FAST AND IMMEDIATE IDENTIFICATION","de":"FAST AND IMMEDIATE IDENTIFICATION"},"validations":[]},{"name":"title_color_1","type":"color","value":"#F55800","validations":[]},{"name":"des_1","type":"textarea","value":{"en":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.","de":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification."},"validations":[]},{"name":"des_color_1","type":"color","value":"#F5F5F5","validations":[]},{"name":"title_2","type":"text","value":{"en":"RELIABLE EVEN IN POOR CONDITIONS","de":"RELIABLE EVEN IN POOR CONDITIONS"},"validations":[]},{"name":"title_color_2","type":"color","value":"#F55800","validations":[]},{"name":"des_2","type":"textarea","value":{"en":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.","de":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification."},"validations":[]},{"name":"des_color_2","type":"color","value":"#F5F5F5","validations":[]},{"name":"background_color","type":"color","value":"#001E2F","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 25.png","id":0},"validations":[]}]','html' => '<section class="bg-[#001E2F]  flex flex-col gap-8 p-8 md:p-18 lg:p-24" :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div>
            <img class="sm:w-[500px] md:w-[600px] lg:w-[800px] mx-auto" :src="background.path" alt="">
        </div>
        <div>
            <p class="text-[#F55800] font-bold" :style="{\'color\': \'\' + title_color_1 + \'\'}">
              {{title_1[local]}}

            </p>
            <p class="text-[#F5F5F5]" :style="{\'color\': \'\' + des_color_1 + \'\'}" >
               {{des_1[local]}}
            </p>
        </div>
        <div>
            <p class="text-[#F55800] font-bold" :style="{\'color\': \'\' + title_color_2 + \'\'}">
              {{title_2[local]}}

            </p>
            <p class="text-[#F5F5F5]" :style="{\'color\': \'\' + des_color_2 + \'\'}" >
               {{des_2[local]}}
            </p>
        </div>
    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#001E2F] flex flex-col gap-8 p-8 md:p-18 lg:p-24\\" style=\\"background-color: #001E2F \\"> <div> <img class=\\"sm:w-[500px] md:w-[600px] lg:w-[800px] mx-auto\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 25.png\\" alt=\\"\\"> <\\/div> <div> <p class=\\"text-[#F55800] font-bold\\" style=\\"color: #F55800 \\"> FAST AND IMMEDIATE IDENTIFICATION <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des_1[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <div> <p class=\\"text-[#F55800] font-bold\\" style=\\"color: #F55800 \\"> RELIABLE EVEN IN POOR CONDITIONS <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des_2[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>","de":"<section class=\\"bg-[#001E2F] flex flex-col gap-8 p-8 md:p-18 lg:p-24\\" style=\\"background-color: #001E2F \\"> <div> <img class=\\"sm:w-[500px] md:w-[600px] lg:w-[800px] mx-auto\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 25.png\\" alt=\\"\\"> <\\/div> <div> <p class=\\"text-[#F55800] font-bold\\" style=\\"color: #F55800 \\"> FAST AND IMMEDIATE IDENTIFICATION <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des_1[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <div> <p class=\\"text-[#F55800] font-bold\\" style=\\"color: #F55800 \\"> RELIABLE EVEN IN POOR CONDITIONS <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des_2[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '121','product_id' => '44','order_id' => '7','section_id' => 'secetion8','inputs' => '[{"name":"title","type":"text","value":{"en":"FACIAL RECOGNITION ON THE MOVE","de":"FACIAL RECOGNITION ON THE MOVE"},"validations":[]},{"name":"title_color","type":"color","value":"#FFD767","validations":[]},{"name":"des","type":"textarea","value":{"en":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.","de":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification."},"validations":[]},{"name":"des_color","type":"color","value":"#F5F5F5","validations":[]},{"name":"background_color","type":"color","value":"#001E2F","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 24.png","id":0},"validations":[]}]','html' => '<section class="bg-[#001E2F] p-8 md:p-18 lg:p-24  flex flex-col gap-8  md:flex-row md:justify-center items-center " :style="{\'background-color\': \'\' + background_color + \'\'}">

       <div class="w-full flex md:block md:w-7/12">
           <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
       </div>
       <div class="md:w-5/12 flex flex-col gap-4 ">
           <p class="text-[#FFD767] font-semibold text-xl" :style="{\'color\': \'\' + title_color + \'\'}">
            {{title[local]}}
           </p>
           <p class="text-[#F5F5F5]" :style="{\'color\': \'\' + des_color + \'\'}"  >
               {{des[local]}}
            </p>

       </div>
    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#001E2F] p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #001E2F \\"> <div class=\\"w-full flex md:block md:w-7\\/12\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 24.png\\" alt=\\"\\"> <\\/div> <div class=\\"md:w-5\\/12 flex flex-col gap-4 \\"> <p class=\\"text-[#FFD767] font-semibold text-xl\\" style=\\"color: #FFD767 \\"> FACIAL RECOGNITION ON THE MOVE <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>","de":"<section class=\\"bg-[#001E2F] p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #001E2F \\"> <div class=\\"w-full flex md:block md:w-7\\/12\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 24.png\\" alt=\\"\\"> <\\/div> <div class=\\"md:w-5\\/12 flex flex-col gap-4 \\"> <p class=\\"text-[#FFD767] font-semibold text-xl\\" style=\\"color: #FFD767 \\"> FACIAL RECOGNITION ON THE MOVE <\\/p> <p class=\\"text-[#F5F5F5]\\" style=\\"color: #F5F5F5 \\" vhtml=\\"des[local]\\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <\\/section>"}','deleted_at' => NULL),
      array('id' => '122','product_id' => '44','order_id' => '8','section_id' => 'secetion9','inputs' => '[{"name":"subtitle","type":"text","value":{"en":"FaceEye1","de":"FaceEye"},"validations":[]},{"name":"subtitle_color","type":"color","value":"#F55800","validations":[]},{"name":"title","type":"text","value":{"en":"Camera for Facial Recognition","de":"Camera for Facial Recognition"},"validations":[]},{"name":"title_color","type":"color","value":"#001E2F","validations":[]},{"name":"des","type":"textarea","value":{"en":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification.","de":"The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification."},"validations":[]},{"name":"des_color","type":"color","value":"#001E2F","validations":[]},{"name":"background_color","type":"color","value":"#F3F5F5","validations":[]},{"name":"background","type":"image","value":{"path":"'.url('/').'\\/storage\\/sections\\/product\\/details\\/image 27.png","id":0},"validations":[]}]','html' => '<section class="bg-[#F3F5F5 p-8 md:p-18 lg:p-24  flex flex-col gap-8  md:flex-row md:justify-center items-center " :style="{\'background-color\': \'\' + background_color + \'\'}">
        <div class="md:w-6/12 flex flex-col gap-4 ">
            <h1 class="text-[#F55800] font-bold text-3xl" :style="{\'color\': \'\' + subtitle_color + \'\'}">
               {{subtitle[local]}}
            </h1>

            <p class="text-[#001E2F] text-xl font-semibold" :style="{\'color\': \'\' + title_color + \'\'}">
               {{title[local]}}
            </p>
            <p class="text-[#001E2F] "   :style="{\'color\': \'\' + des_color + \'\'}">
                {{des[local]}}
            </p>
        </div>
        <div class="w-full flex md:block md:w-6/12">
            <img class="mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]" :src="background.path" alt="">
        </div>
    </section>','complaed_html' => '{"en":"<section class=\\"bg-[#F3F5F5 p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"md:w-6\\/12 flex flex-col gap-4 \\"> <h1 class=\\"text-[#F55800] font-bold text-3xl\\" style=\\"color: #F55800 \\"> FaceEye1 <\\/h1> <p class=\\"text-[#001E2F] text-xl font-semibold\\" style=\\"color: #001E2F \\"> Camera for Facial Recognition <\\/p> <p class=\\"text-[#001E2F] \\" vhtml=\\"des[local]\\" style=\\"color: #001E2F \\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <div class=\\"w-full flex md:block md:w-6\\/12\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 27.png\\" alt=\\"\\"> <\\/div> <\\/section>","de":"<section class=\\"bg-[#F3F5F5 p-8 md:p-18 lg:p-24 flex flex-col gap-8 md:flex-row md:justify-center items-center \\" style=\\"background-color: #F3F5F5 \\"> <div class=\\"md:w-6\\/12 flex flex-col gap-4 \\"> <h1 class=\\"text-[#F55800] font-bold text-3xl\\" style=\\"color: #F55800 \\"> FaceEye <\\/h1> <p class=\\"text-[#001E2F] text-xl font-semibold\\" style=\\"color: #001E2F \\"> Camera for Facial Recognition <\\/p> <p class=\\"text-[#001E2F] \\" vhtml=\\"des[local]\\" style=\\"color: #001E2F \\"> The cameras specially developed for biometric person detection within this unit make a delusion pointless. The interplay between the color camera, infrared camera, daytime and night-time LEDs makes it possible to record the best possible picture of a person even in unfavorable conditions such as backlight or darkness. <br><br><br> The proactive, automatic settings of the unit, e.g. the automatic camera alignment (Camera Tilting Unit) to capture both tall and wheelchair users, the additional lighting integrated into the camera unit such as LED and infrared sensors, which are used depending on the ambient lighting, allows the perfect person identification. <\\/p> <\\/div> <div class=\\"w-full flex md:block md:w-6\\/12\\"> <img class=\\"mx-auto max-w-[80%] sm:max-w-[400px] md:max-w-[100%]\\" src=\\"\\/storage\\/sections\\/product\\/details\\/image 27.png\\" alt=\\"\\"> <\\/div> <\\/section>"}','deleted_at' => NULL)
    );



  }
}

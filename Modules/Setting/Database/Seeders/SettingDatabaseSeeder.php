<?php

namespace Modules\Setting\Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Setting\Entities\Setting;
use Modules\Setting\Entities\Permission;
use Modules\Setting\Entities\Role;
use Modules\Setting\Interfaces\SettingRepositoryInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class SettingDatabaseSeeder extends Seeder
{
  public SettingRepositoryInterface $BaseRepository;

  public function __construct(SettingRepositoryInterface $BaseRepository , Setting $setting)
  {
      // $this->authorizeResource(Service::class);
      $this->BaseRepository = $BaseRepository;
      $this->model = $setting;
  }



  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    // dd('this is setting seeder ');
    // $this->call(RoleSeeder::class);
    $amount = 20;
    // The output
    $output = new ConsoleOutput();

    // creates a new progress bar (50 units)
    $images = $this->images();
    $progressBar = new ProgressBar($output, count($images));
    $faker = \Faker\factory::create();

    // starts and displays the progress bar
    $progressBar->start();

    foreach ($images as $key => $image) {
      $page = $image['page'];
      if(isset($image['tabs'])){
        foreach ($image['tabs'] as $key => $tab) {
          $rules = Setting::getValidationRules($page , $tab['tab']);
          $validSettings = array_keys($rules);

          $inputs = [];
          foreach ($tab['inputs'] as $key => $value) {

            if($value['type'] == 'image'){
              $Media = Media::whereName($value['value'])->first();
              $value['value'] = $Media ? $Media->id : null;
            }
            $inputs[$value['name']] = $value['value'];

          }

          $this->BaseRepository->updateSettings($inputs , $validSettings , $page );
        }
      }else{
          $rules = Setting::getValidationRules($page);
          $validSettings = array_keys($rules);

          $inputs = [];
          foreach ($image['inputs'] as $key => $value) {

            if($value['type'] == 'image'){
              $Media = Media::whereName($value['value'])->first();
              $value['value'] = $Media ? $Media->id : null;
            }
            $inputs[$value['name']] = $value['value'];

          }

          $this->BaseRepository->updateSettings($inputs , $validSettings , $page );
      }
    }


    // ensures that the progress bar is at 100%
    $progressBar->finish();




  }

  public function images()
  {
    return $images = [
      [
        'page' => 'app',
        'inputs' => [
          [
            'name' => 'global_navbar_logo',
            'type' => 'image',
            'value' => 'white-logo.svg',
          ]
        ]
      ],
      [
        'page' => 'footer',
        'inputs' => [
          [
            'name' => 'footer_logo',
            'type' => 'image',
            'value' => 'white-logo.svg',
          ]
        ]
      ],
      [
        'page' => 'home',
        'tabs' => [
          [

            'tab' => 'event_section',
            'inputs' => [
              [
                'name' => 'home_event_section_background_image',
                'type' => 'image',
                'value' => 'unsplash_42t-DKecmPk.png',
              ]
            ]
          ]
        ]
      ]
    ];



  }
}

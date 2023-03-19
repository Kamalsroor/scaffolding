<?php

namespace Modules\CommonData\Database\Seeders;

use App\Models\Media;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\CommonData\Entities\Slider;
use Modules\CommonData\Entities\Permission;
use Modules\CommonData\Entities\Role;
use Modules\CommonData\Interfaces\SliderRepositoryInterface;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class SliderDatabaseSeeder extends Seeder
{

  public SliderRepositoryInterface $BaseRepository;

  public function __construct(SliderRepositoryInterface $BaseRepository , Slider $slide)
  {
      // $this->authorizeResource(Service::class);
      $this->BaseRepository = $BaseRepository;
      $this->model = $slide;
  }


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // dd('this is sponser seeder ');
        // $this->call(RoleSeeder::class);
            $amount = 20;
            // The output
            $output = new ConsoleOutput();

            // creates a new progress bar (50 units)
            $progressBar = new ProgressBar($output, $amount);

            // starts and displays the progress bar
            $progressBar->start();


            $slider =Slider::factory($amount)->make()->each(function ($slider) use ($progressBar ) {
              // advances the progress bar 1 unit
              // dd($sponser);
              if ($slider->save()) {
                  $this->BaseRepository->AddMediaCollectionById(Media::inRandomOrder()->first()->id , $slider);

                  $progressBar->advance();
              }

              // you can also advance the progress bar by more than 1 unit
              // $progressBar->advance(3);
          });


        // ensures that the progress bar is at 100%
        $progressBar->finish();




    }
}

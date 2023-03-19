<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\News\Entities\Category;
use Modules\News\Entities\News;
use Modules\News\Entities\Permission;
use Modules\News\Entities\Role;
use Modules\News\Entities\Tag;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        // $this->call(RoleSeeder::class);
            $amount = 20;
            // The output
            $output = new ConsoleOutput();

            // creates a new progress bar (50 units)
            $progressBar = new ProgressBar($output, $amount);

            // starts and displays the progress bar
            $progressBar->start();


            $newsData = News::factory($amount)->make()->each(function ($news) use ($progressBar ) {
              // advances the progress bar 1 unit
              // dd($news);
              if ($news->save()) {
                  $progressBar->advance();
              }
            $news->tags()->attach(Tag::inRandomOrder()->take(rand(5,15))->get());

              // you can also advance the progress bar by more than 1 unit
              // $progressBar->advance(3);
          });


        // ensures that the progress bar is at 100%
        $progressBar->finish();




    }
}

<?php

namespace Modules\News\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\News\Entities\Sponser;
use Modules\News\Entities\Permission;
use Modules\News\Entities\Role;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class NewsDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


      // $this->call(CategorySeeder::class);
      // $this->call(TagSeeder::class);
      // $this->call(NewsSeeder::class);
    }
}

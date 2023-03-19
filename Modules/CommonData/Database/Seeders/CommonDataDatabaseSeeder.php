<?php

namespace Modules\CommonData\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\CommonData\Entities\Sponser;
use Modules\CommonData\Entities\Permission;
use Modules\CommonData\Entities\Role;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class CommonDataDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // $this->call(SponserDatabaseSeeder::class);
      // $this->call(SubscribeDatabaseSeeder::class);
      // $this->call(ContactUsDatabaseSeeder::class);
      // $this->call(SliderDatabaseSeeder::class);
      // $this->call(ServiceDatabaseSeeder::class);
    }
}

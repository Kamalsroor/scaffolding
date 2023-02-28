<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Entities\Admin;
use Modules\Admin\Entities\Permission;
use Modules\Admin\Entities\Role;
use Symfony\Component\Console\Helper\ProgressBar;
use Symfony\Component\Console\Output\ConsoleOutput;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $exitCode = Artisan::call('Admin:refresh-permissions');

      $Permissions = Permission::get()->pluck('id')->toArray();
      $amount = 1000;
      // The output
      $output = new ConsoleOutput();

      // creates a new progress bar (50 units)
      $progressBar = new ProgressBar($output, $amount);

      // starts and displays the progress bar
      $progressBar->start();
      $roles = Role::factory($amount)->make()->each(function ($role) use ($progressBar  ,$Permissions) {

        // advances the progress bar 1 unit
        if ($role->save()) {
            $role->syncPermissions($Permissions);
            $progressBar->advance();
        }

        // you can also advance the progress bar by more than 1 unit
        // $progressBar->advance(3);
    });


      // ensures that the progress bar is at 100%
      $progressBar->finish();

      $output->write(' Finished', true);

    }
}

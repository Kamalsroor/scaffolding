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

class AdminDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // dd('this is admin seeder ');
        $this->call(RoleSeeder::class);
        $Roles = Role::get()->pluck('id')->toArray();
            $amount = 10;
            // The output
            $output = new ConsoleOutput();

            // creates a new progress bar (50 units)
            $progressBar = new ProgressBar($output, $amount);

            // starts and displays the progress bar
            $progressBar->start();
            $admins = Admin::factory($amount)->make()->each(function ($admin) use ($progressBar  ,$Roles) {

              // advances the progress bar 1 unit
              if ($admin->save()) {
                  $admin->assignRole($Roles[rand(0,count($Roles) - 1)]);
                  $progressBar->advance();
              }

              // you can also advance the progress bar by more than 1 unit
              // $progressBar->advance(3);
          });


        // ensures that the progress bar is at 100%
        $progressBar->finish();

        // $admin = Admin::factory(20000)->create();
        // $admins = Admin::factory(20000)->create();
        // Admin::whereIn('id',$admins->pluck('id')->toArray())->delete();
        $admin = Admin::factory()->createOne([
            'name' => 'admin',
            'email' => 'admin@demo.com',
        ]);


      $this->command->table(['ID', 'Name', 'Email', 'Password', 'Type'], [
          [$admin->id, $admin->name, $admin->email, 'password', 'Admin'],

      ]);


    }
}

<?php

namespace Modules\Admin\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Artisan;
use Modules\Admin\Entities\Admin;

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
        $exitCode = Artisan::call('Admin:refresh-permissions');
        // dd('this is admin seeder ');

        $admin = Admin::factory()->createOne([
          'name' => 'admin',
          'email' => 'admin@demo.com',
      ]);


      $this->command->table(['ID', 'Name', 'Email', 'Password', 'Type'], [
          [$admin->id, $admin->name, $admin->email, 'password', 'Admin'],

      ]);


    }
}

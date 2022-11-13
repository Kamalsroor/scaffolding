<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Admin\Entities\Admin;
use Modules\CommonData\Database\Seeders\CommonDataDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(CommonDataDatabaseSeeder::class);
        $this->call(AdminDatabaseSeeder::class);

        $user = User::factory()->createOne([
            'name' => 'user',
            'email' => 'user@demo.com',
        ]);
        $admin = Admin::create([
            'name' => 'admin',
            'email' => 'admin@demo.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'unhashed_password' => 'password',
        ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

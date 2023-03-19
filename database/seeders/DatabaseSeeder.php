<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Media;
use App\Models\User;
use File;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Modules\Admin\Database\Seeders\AdminDatabaseSeeder;
use Modules\Admin\Entities\Admin;
use Modules\CommonData\Database\Seeders\CommonDataDatabaseSeeder;
use Modules\Product\Database\Seeders\ProductDatabaseSeeder;
use Illuminate\Http\UploadedFile;
use Modules\News\Database\Seeders\NewsDatabaseSeeder;
use Modules\Setting\Database\Seeders\SettingDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      ini_set('memory_limit', '512M');//allocate memory


        // \File::copyDirectory(storage_path('app/daymmy'), storage_path('app/public/daymmy'));
        // $images = \Storage::disk('daymmy')->allfiles();
        // foreach ($images as $key => $image) {
        //   // \App\Models\User::factory(10)->create();
        //   $file = pathToUploadedFile(\Storage::disk('daymmy')->path($image));

        //   $file_name = str_replace(" ","_",$file->getClientOriginalName());

        //   $media = Media::create([
        //     'name' => $file_name,
        //     'file_name' => $file_name,
        //     'mime_type' => $file->getMimeType(),
        //     'size' => $file->getSize(),
        //     'author_id' => auth()->id()
        //   ]);

        //   $directory = "media/{$media->created_at->format('Y/m/d')}/{$media->id}";
        //   $media = Media::find($media->id);
        //   $media->update([
        //   'file_path' => $directory.'/'.$media->file_name
        //   ]);
        //   $file->storeAs($directory, $media->file_name, 'public');

        // }

        if(app()->environment('production')){
          sleep(3);
      }

        $this->call(AdminDatabaseSeeder::class);
        $this->call(ProductDatabaseSeeder::class);
        $this->call(CommonDataDatabaseSeeder::class);
        $this->call(NewsDatabaseSeeder::class);
        $this->call(SettingDatabaseSeeder::class);

        $user = User::factory()->createOne([
            'name' => 'user',
            'email' => 'user@demo.com',
        ]);
        // $admin = Admin::create([
        //     'name' => 'admin',
        //     'email' => 'admin@demo.com',
        //     'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        //     'unhashed_password' => 'password',
        // ]);

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}

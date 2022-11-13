<?php

namespace App\Console\Commands\CRUDGeneratorsCommand;

use Config;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class Modifier
{
    public static function routes($name)
    {
        $pattern = '\/\*  The routes of generated crud will set here: Don\'t remove this line  \*\/';

        $place = '/*  The routes of generated crud will set here: Don\'t remove this line  */';

        $dashboard = file_get_contents(base_path('routes/dashboard.php'));

        $api = file_get_contents(base_path('routes/api.php'));

        $controllerName = Str::of($name)->singular()->studly().'Controller';

        $resource = Str::of($name)->plural()->snake();
        $singularName = Str::of($name)->singular()->snake();

        $dashboardRoute = "
        Route::controller($controllerName::class)->group(function () {
            Route::put('/$resource/{id}/active','activeToggle');
            Route::delete('/$resource/{id}/restore','restore');
        });
        Route::resource('/$resource', $controllerName::class);\n$place
        ";

        $dashboard = preg_replace("/$pattern/", $dashboardRoute, $dashboard);

        // $api = preg_replace("/$pattern/", $apiRoutes, $api);

        file_put_contents(base_path('routes/dashboard.php'), $dashboard);

        // file_put_contents(base_path('routes/api.php'), $api);
    }

    public static function lang($name)
    {
        $pattern = '\/\*  The lang of generated crud will set here: Don\'t remove this line  \*\/';
        $place = '/*  The lang of generated crud will set here: Don\'t remove this line  */';


        $dashboard = file_get_contents(resource_path('js/translations/locales/en.js'));


        $resources = Str::of($name)->plural()->snake('-')->studly()->lower();
        $Resource = Str::of($name)->singular()->studly();
        $Resources = Str::of($name)->plural()->studly();

        $dashboardRoute = "
    $resources: {
        singular: '$Resource',
        plural: '$Resources',
        id: 'ID',
    },\n$place

        ";

        $dashboard = preg_replace("/$pattern/", $dashboardRoute, $dashboard);

        // $api = preg_replace("/$pattern/", $apiRoutes, $api);

        file_put_contents(resource_path('js/translations/locales/en.js'), $dashboard);

        // file_put_contents(base_path('routes/api.php'), $api);
    }



    public static function vue_routes($name)
    {
        $pattern = '\/\*  The routes of generated crud will set here: Don\'t remove this line  \*\/';

        $place = '/*  The routes of generated crud will set here: Don\'t remove this line  */';

        $dashboard = file_get_contents(base_path('routes/dashboard.php'));

        $api = file_get_contents(base_path('routes/api.php'));

        $controllerName = Str::of($name)->singular()->studly().'Controller';

        $resource = Str::of($name)->plural()->snake();
        $singularName = Str::of($name)->singular()->snake();

        $dashboardRoute = "
            Route::controller($controllerName::class)->group(function () {
                Route::put('/$resource/{id}/active','activeToggle');
                Route::delete('/$resource/{id}/restore','restore');
            });
            Route::resource('/$resource', $controllerName::class);\n$place
        ";

        $dashboard = preg_replace("/$pattern/", $dashboardRoute, $dashboard);


        file_put_contents(base_path('routes/dashboard.php'), $dashboard);
    }

    public function sidebar($name)
    {
        $pattern = '\{\{-- The sidebar of generated crud will set here: Don\'t remove this line --\}\}';

        $place = '{{-- The sidebar of generated crud will set here: Don\'t remove this line --}}';

        $resource = Str::of($name)->plural()->snake();

        $sidebarFile = file_get_contents(resource_path('views/layouts/sidebar.blade.php'));

        $sidebar = "@include('dashboard.$resource.partials.actions.sidebar')\n$place";

        $sidebarFile = preg_replace("/$pattern/", $sidebar, $sidebarFile);

        file_put_contents(resource_path('views/layouts/sidebar.blade.php'), $sidebarFile);
    }

    public function permission($name)
    {
        $resource = Str::of($name)->snake('-')->singular()->lower();
        $nameAfterStr = '';
        $nameAfterStr .= $resource;
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // list permissions
        $permissions = config('permissions.permissions');
        // // create permissions
        // foreach ($permissions as $model => $actions) {
        //     foreach ($actions as  $action) {
        //         Permission::updateOrCreate(['name' => $action.'-'.$model],['guard_name' => 'admin']);
        //     }
        // }
        $permissions[$nameAfterStr] = ['edit','show','list','create','delete' ,'restore' ,'force-delete'];

        // create permissions
        // Permission::updateOrCreate(['name' => "manage.$resource"]);

        // $permissions = @json_decode(file_get_contents(storage_path('permissions.json'))) ?? [];

        // $permissions[] = "manage.$resource";
        // Config::set('permissions.permissions' , $permissions);
        $permissionsStr = json_encode($permissions);
        $permissionsStr = Str::replace( '{' ,'['.PHP_EOL , $permissionsStr );
        $permissionsStr = Str::replace( '}' ,PHP_EOL.'],'.PHP_EOL , $permissionsStr );
        $permissionsStr = Str::replace( ':' ,'=>' , $permissionsStr );
        $permissionsStr = Str::replace( '"],' ,'"],'.PHP_EOL , $permissionsStr );
        // dd($permissionsStr );
        file_put_contents(config_path('permissions.php'), "<?php

        return [
            'permissions' => $permissionsStr

        ];

        ");
    }


    public function softDeletes($name)
    {
        $resource = Str::of($name)->singular()->snake();
        $resourceSingular = Str::of($name)->singular()->studly();

        $soft_deletes_route_bindings = @json_decode(file_get_contents(storage_path('soft_deletes_route_binding.json'))) ?? [];
        $soft_deletes_route_bindings->{"trashed_".$resource}  = "App\\Models\\$resourceSingular";

        file_put_contents(storage_path('soft_deletes_route_binding.json'), json_encode($soft_deletes_route_bindings, JSON_PRETTY_PRINT));
    }

    public function seeder($name)
    {
        $resource = Str::of($name)->singular()->studly();

        $pattern = '\/\*  The seeders of generated crud will set here: Don\'t remove this line  \*\/';

        $place = '/*  The seeders of generated crud will set here: Don\'t remove this line  */';

        $seederFile = file_get_contents(database_path('seeds/DummyDataSeeder.php'));

        $seeder = "\$this->call({$resource}Seeder::class);\n$place";

        $seederFile = preg_replace("/$pattern/", $seeder, $seederFile);

        file_put_contents(database_path('seeds/DummyDataSeeder.php'), $seederFile);
    }
}

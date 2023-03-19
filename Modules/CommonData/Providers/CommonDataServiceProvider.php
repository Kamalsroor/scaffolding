<?php

namespace Modules\CommonData\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Factory;

class CommonDataServiceProvider extends ServiceProvider
{
    /**
     * @var string $moduleName
     */
    protected $moduleName = 'CommonData';

    /**
     * @var string $moduleNameLower
     */
    protected $moduleNameLower = 'common_data';

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerTranslations();
        $this->registerConfig();
        $this->registerViews();
        $this->registerRepositories();
        $this->loadMigrationsFrom(module_path($this->moduleName, 'Database/Migrations'));
        $this->commands([
            // \Modules\CommonData\Console\RefreshPermissionsCommand::class,
        ]);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {




        $this->app->register(RouteServiceProvider::class);
    }


        /**
     * Register views.
     *
     * @return void
     */
    public function registerRepositories()
    {

        $toBind = [
            \Modules\CommonData\Interfaces\SponserRepositoryInterface::class => \Modules\CommonData\Repositories\SponserRepository::class,
            \Modules\CommonData\Interfaces\SubscribeRepositoryInterface::class => \Modules\CommonData\Repositories\SubscribeRepository ::class,
            \Modules\CommonData\Interfaces\ContactUsRepositoryInterface::class => \Modules\CommonData\Repositories\ContactUsRepository ::class,
            \Modules\CommonData\Interfaces\SliderRepositoryInterface::class => \Modules\CommonData\Repositories\SliderRepository ::class,
            \Modules\CommonData\Interfaces\ServiceRepositoryInterface::class => \Modules\CommonData\Repositories\ServiceRepository ::class,
            // All repositories are registered in this map
        ];

        foreach ($toBind as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([
            module_path($this->moduleName, 'Config/config.php') => config_path($this->moduleNameLower . '.php'),
            // module_path($this->moduleName, 'Config/permission.php') => config_path('permission.php'),
        ], 'config');
        $this->mergeConfigFrom(
            module_path($this->moduleName, 'Config/config.php'), $this->moduleNameLower,
        );
        // $this->mergeConfigFrom(
        //     module_path($this->moduleName, 'Config/permission.php'), 'permission'
        // );
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $viewPath = resource_path('views/modules/' . $this->moduleNameLower);

        $sourcePath = module_path($this->moduleName, 'Resources/views');

        $this->publishes([
            $sourcePath => $viewPath
        ], ['views', $this->moduleNameLower . '-module-views']);

        $this->loadViewsFrom(array_merge($this->getPublishableViewPaths(), [$sourcePath]), $this->moduleNameLower);
    }

    /**
     * Register translations.
     *
     * @return void
     */
    public function registerTranslations()
    {
        $langPath = resource_path('lang/modules/' . $this->moduleNameLower);

        if (is_dir($langPath)) {
            $this->loadTranslationsFrom($langPath, $this->moduleNameLower);
            $this->loadJsonTranslationsFrom($langPath, $this->moduleNameLower);
        } else {
            $this->loadTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
            $this->loadJsonTranslationsFrom(module_path($this->moduleName, 'Resources/lang'), $this->moduleNameLower);
        }
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
    }

    private function getPublishableViewPaths(): array
    {
        $paths = [];
        foreach (\Config::get('view.paths') as $path) {
            if (is_dir($path . '/modules/' . $this->moduleNameLower)) {
                $paths[] = $path . '/modules/' . $this->moduleNameLower;
            }
        }
        return $paths;
    }
}

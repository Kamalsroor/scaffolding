<?php

namespace Modules\CommonData\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The module namespace to assume when generating URLs to actions.
     *
     * @var string
     */
    protected $moduleNamespace = 'Modules\CommonData\Http\Controllers';

    /**
     * Called before routes are registered.
     *
     * Register any model bindings or pattern based filters.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();
        $this->mapV1ApiRoutes();

    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->moduleNamespace)
            ->group(module_path('CommonData', '/Routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api','auth:admin')
            ->namespace($this->moduleNamespace)
            ->group(module_path('CommonData', '/Routes/api.php'));
    }

    /**
     * Define the "v1_api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapV1ApiRoutes()
    {
        Route::prefix('api/v1')
            ->middleware('api','localization')
            ->namespace($this->moduleNamespace.'\Api')
            ->group(module_path('CommonData', '/Routes/v1_api.php'));
    }
}

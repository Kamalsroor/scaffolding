<?php
namespace App\Providers;


use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {

    }


    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


        $toBind = [
            \App\Interfaces\CrudRepositoryInterface::class => \App\Repositories\CrudRepository::class,

            // All repositories are registered in this map
        ];




        foreach ($toBind as $interface => $implementation) {
            $this->app->bind($interface, $implementation);
        }

        // $this->app->bind('App\Interfaces\CrudRepositoryInterface', 'App\Repositories\CrudRepository');
    }
}

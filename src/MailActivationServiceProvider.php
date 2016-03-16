<?php
namespace mp3063\MailActivation;

use Illuminate\Support\ServiceProvider;

class MailActivationServiceProvider extends ServiceProvider
{
    
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/migrations/' => base_path('/database/migrations'),
            __DIR__.'/views/'      => base_path('/resources/views'),
        ], 'views_migrations');
        $this->publishes([
            __DIR__.'/publish/routes.php' => app_path('/Http/routes.php'),
            __DIR__.'/publish/User.php'   => app_path('/User.php'),
        ], 'routes_model');
    }
    
    
    
    /**
     * registerCheck the application services.
     *
     * @return void
     */
    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('mp3063\MailActivation\controllers\AuthWithActivationController');
    }
}

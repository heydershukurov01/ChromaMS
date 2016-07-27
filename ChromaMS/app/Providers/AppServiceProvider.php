<?php

namespace ChromaMS\Providers;

use ChromaMS\View\Composers;

use ChromaMS\View\ThemeViewFinder;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //On Page Loading 

        // Shows Message that your reset pass link has been send and vaslidation 

        $this->app['view']->composer(['layouts.auth' , 'layouts.backend'] , Composers\AddStatusMessage::class);

        // Shows Admin name
        $this->app['view']->composer('layouts.backend' , Composers\AddAdminUser::class);
        // FrontEND page generator  
        $this->app['view']->composer('layouts.frontend' , Composers\InjectPages::class);

        $this->app['view']->setFinder($this->app['theme.finder']);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('theme.finder' , function($app) {
            $finder = new ThemeViewFinder($app['files'], $app['config']['view.paths']);
            
            $config = $app['config']['cms.theme'];

            $finder->setBasePath($app['path.public'].'/'.$config['folder']);
            $finder->setActiveTheme($config['active']);

            return $finder;      
        });
    }
}

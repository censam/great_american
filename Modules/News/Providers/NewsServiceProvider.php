<?php namespace Modules\News\Providers;

use Illuminate\Support\ServiceProvider;

class NewsServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBindings();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return array();
    }

    private function registerBindings()
    {
        $this->app->bind(
            'Modules\News\Repositories\NewsRepository',
            function () {
                $repository = new \Modules\News\Repositories\Eloquent\EloquentNewsRepository(new \Modules\News\Entities\News());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\News\Repositories\Cache\CacheNewsDecorator($repository);
            }
        );
// add bindings

    }
}

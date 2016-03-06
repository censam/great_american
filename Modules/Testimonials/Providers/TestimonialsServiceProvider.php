<?php namespace Modules\Testimonials\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Testimonials\Composers\LatestTestimonialsComposer;
use Modules\Testimonials\Composers\AllTestimonialsComposer;
class TestimonialsServiceProvider extends ServiceProvider
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
        view()->composer('mortgage',LatestTestimonialsComposer::class);
        view()->composer('testimonials',AllTestimonialsComposer::class);
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
            'Modules\Testimonials\Repositories\TestimonialsRepository',
            function () {
                $repository = new \Modules\Testimonials\Repositories\Eloquent\EloquentTestimonialsRepository(new \Modules\Testimonials\Entities\Testimonials());

                if (! config('app.cache')) {
                    return $repository;
                }

                return new \Modules\Testimonials\Repositories\Cache\CacheTestimonialsDecorator($repository);
            }
        );
// add bindings

    }
}

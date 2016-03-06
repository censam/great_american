<?php namespace Modules\Testimonials\Repositories\Cache;

use Modules\Testimonials\Repositories\TestimonialsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTestimonialsDecorator extends BaseCacheDecorator implements TestimonialsRepository
{
    public function __construct(TestimonialsRepository $testimonials)
    {
        parent::__construct();
        $this->entityName = 'testimonials.testimonials';
        $this->repository = $testimonials;
    }

    public function randomTestimonials()
    {
    	return $this->cache
            ->tags($this->entityName, 'global')
            ->remember("{$this->locale}.{$this->entityName}.randomTestimonials", $this->cacheTime,
                function () {
                    return $this->repository->randomTestimonials();
                }
            );
    }
}

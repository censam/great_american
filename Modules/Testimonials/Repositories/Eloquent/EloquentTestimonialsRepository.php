<?php namespace Modules\Testimonials\Repositories\Eloquent;

use Modules\Testimonials\Repositories\TestimonialsRepository;
use Modules\Core\Repositories\Eloquent\EloquentBaseRepository;

class EloquentTestimonialsRepository extends EloquentBaseRepository implements TestimonialsRepository
{
	public function randomTestimonials()
	{
		return $this->model->orderByRaw('RAND()')->take(4)->get();
	}
}

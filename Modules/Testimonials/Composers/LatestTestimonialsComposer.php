<?php namespace Modules\Testimonials\Composers;

use Illuminate\Contracts\View\View;
use Modules\Testimonials\Repositories\TestimonialsRepository;

class LatestTestimonialsComposer
{


public function __construct(TestimonialsRepository $testimonials)
{
	$this->testimonials = $testimonials;
}
public function compose(View $view)
{
	$view->with('randomTestimonials',$this->testimonials->randomTestimonials());
}

}
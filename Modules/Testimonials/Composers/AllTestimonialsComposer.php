<?php namespace Modules\Testimonials\Composers;

use Illuminate\Contracts\View\View;
use Modules\Testimonials\Repositories\TestimonialsRepository;

class AllTestimonialsComposer
{


public function __construct(TestimonialsRepository $testimonials)
{
	$this->testimonials = $testimonials;
}
public function compose(View $view)
{
	$view->with('testimonials',$this->testimonials->all());
}

}
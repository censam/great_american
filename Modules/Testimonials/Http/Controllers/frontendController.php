<?php namespace Modules\Testimonials\Http\Controllers;

use Illuminate\Contracts\Foundation\Application;
use Modules\Core\Http\Controllers\BasePublicController;
use Modules\Testimonials\Repositories\TestimonialsRepository;

class FrontEndController extends BasePublicController
{
    /**
     * @var TestimonialsRepository
     */
    private $testimonials;
    
    public function __construct(TestimonialsRepository $$testimonials)
    {
        
        $this->testimonials = $testimonials;
        
    }

    public function index()
    {
        $testimonials = $this->testimonials->all();
        return view('testimonials::public.logobox',compact('testimonials'));
    }

}
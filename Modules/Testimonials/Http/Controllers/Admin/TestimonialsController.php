<?php namespace Modules\Testimonials\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\Testimonials\Http\Requests\CreateTestimonialRequest;
use Modules\Testimonials\Http\Requests\UpdateTestimonialRequest;
use Modules\Testimonials\Entities\Testimonials;
use Modules\Testimonials\Repositories\TestimonialsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;
use Modules\Media\Repositories\FileRepository;
use Modules\Media\Image\Imagy;

class TestimonialsController extends AdminBaseController
{
    /**
     * @var TestimonialsRepository
     */
    private $testimonials;
     /**
     * @var Imagy
     */
    private $imagy;
    
    public function __construct(TestimonialsRepository $testimonials)
    {
        parent::__construct();

        $this->testimonials = $testimonials;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $testimonials = $this->testimonials->all();

        return view('testimonials::admin.testimonials.index', compact('testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('testimonials::admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateTestimonialRequest $request
     * @return Response
     */
    public function store(CreateTestimonialRequest $request)
    {
        $this->testimonials->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('testimonials::testimonials.title.testimonials')]));

        return redirect()->route('admin.testimonials.testimonials.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Testimonials $testimonials
     * @return Response
     */
    public function edit(Testimonials $testimonials, FileRepository $fileRepository)
    {   
        $userImage = $fileRepository->findFileByZoneForEntity('userImage', $testimonials);

        return view('testimonials::admin.testimonials.edit', compact('testimonials','userImage'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Testimonials $testimonials
     * @param  UpdateTestimonialRequest $request
     * @return Response
     */
    public function update(Testimonials $testimonials, UpdateTestimonialRequest $request)
    {   

        $this->testimonials->update($testimonials, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('testimonials::testimonials.title.testimonials')]));

        return redirect()->route('admin.testimonials.testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Testimonials $testimonials
     * @return Response
     */
    public function destroy(Testimonials $testimonials)
    {
        $this->testimonials->destroy($testimonials);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('testimonials::testimonials.title.testimonials')]));

        return redirect()->route('admin.testimonials.testimonials.index');
    }
}

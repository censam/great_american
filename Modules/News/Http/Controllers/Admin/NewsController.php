<?php namespace Modules\News\Http\Controllers\Admin;

use Laracasts\Flash\Flash;
use Modules\News\Http\Requests\CreateNewsRequest;
use Modules\News\Http\Requests\UpdateNewsRequest;
use Modules\News\Entities\News;
use Modules\News\Repositories\NewsRepository;
use Modules\Core\Http\Controllers\Admin\AdminBaseController;

class NewsController extends AdminBaseController
{
    /**
     * @var NewsRepository
     */
    private $news;

    public function __construct(NewsRepository $news)
    {
        parent::__construct();

        $this->news = $news;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $news = $this->news->all();

        return view('news::admin.news.index', compact('news'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('news::admin.news.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateNewsRequest $request
     * @return Response
     */
    public function store(CreateNewsRequest $request)
    {
        $this->news->create($request->all());

        flash()->success(trans('core::core.messages.resource created', ['name' => trans('news::news.title.news')]));

        return redirect()->route('admin.news.news.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  News $news
     * @return Response
     */
    public function edit(News $news)
    {
        return view('news::admin.news.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  News $news
     * @param  UpdateNewsRequest $request
     * @return Response
     */
    public function update(News $news, UpdateNewsRequest $request)
    {
        $this->news->update($news, $request->all());

        flash()->success(trans('core::core.messages.resource updated', ['name' => trans('news::news.title.news')]));

        return redirect()->route('admin.news.news.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  News $news
     * @return Response
     */
    public function destroy(News $news)
    {
        $this->news->destroy($news);

        flash()->success(trans('core::core.messages.resource deleted', ['name' => trans('news::news.title.news')]));

        return redirect()->route('admin.news.news.index');
    }
}

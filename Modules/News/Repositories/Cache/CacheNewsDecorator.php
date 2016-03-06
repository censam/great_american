<?php namespace Modules\News\Repositories\Cache;

use Modules\News\Repositories\NewsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNewsDecorator extends BaseCacheDecorator implements NewsRepository
{
    public function __construct(NewsRepository $news)
    {
        parent::__construct();
        $this->entityName = 'news.news';
        $this->repository = $news;
    }
}

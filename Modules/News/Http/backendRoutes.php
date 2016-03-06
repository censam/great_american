<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/news'], function (Router $router) {
    $router->bind('news', function ($id) {
        return app('Modules\News\Repositories\NewsRepository')->find($id);
    });
    get('news', ['as' => 'admin.news.news.index', 'uses' => 'NewsController@index']);
    get('news/create', ['as' => 'admin.news.news.create', 'uses' => 'NewsController@create']);
    post('news', ['as' => 'admin.news.news.store', 'uses' => 'NewsController@store']);
    get('news/{news}/edit', ['as' => 'admin.news.news.edit', 'uses' => 'NewsController@edit']);
    put('news/{news}/edit', ['as' => 'admin.news.news.update', 'uses' => 'NewsController@update']);
    delete('news/{news}', ['as' => 'admin.news.news.destroy', 'uses' => 'NewsController@destroy']);
// append

});

<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/testimonials'], function (Router $router) {
    $router->bind('testimonials', function ($id) {
        return app('Modules\Testimonials\Repositories\TestimonialsRepository')->find($id);
    });
    get('testimonials', ['as' => 'admin.testimonials.testimonials.index', 'uses' => 'TestimonialsController@index']);
    get('testimonials/create', ['as' => 'admin.testimonials.testimonials.create', 'uses' => 'TestimonialsController@create']);
    post('testimonials', ['as' => 'admin.testimonials.testimonials.store', 'uses' => 'TestimonialsController@store']);
    get('testimonials/{testimonials}/edit', ['as' => 'admin.testimonials.testimonials.edit', 'uses' => 'TestimonialsController@edit']);
    put('testimonials/{testimonials}/edit', ['as' => 'admin.testimonials.testimonials.update', 'uses' => 'TestimonialsController@update']);
    delete('testimonials/{testimonials}', ['as' => 'admin.testimonials.testimonials.destroy', 'uses' => 'TestimonialsController@destroy']);
// append

});

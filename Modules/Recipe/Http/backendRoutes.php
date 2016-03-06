<?php

use Illuminate\Routing\Router;
/** @var Router $router */

$router->group(['prefix' =>'/recipe'], function (Router $router) {
    $router->bind('recipes', function ($id) {
        return app('Modules\Recipe\Repositories\RecipeRepository')->find($id);
    });
    get('recipes', ['as' => 'admin.recipe.recipe.index', 'uses' => 'RecipeController@index']);
    get('recipes/create', ['as' => 'admin.recipe.recipe.create', 'uses' => 'RecipeController@create']);
    post('recipes', ['as' => 'admin.recipe.recipe.store', 'uses' => 'RecipeController@store']);
    get('recipes/{recipes}/edit', ['as' => 'admin.recipe.recipe.edit', 'uses' => 'RecipeController@edit']);
    put('recipes/{recipes}/edit', ['as' => 'admin.recipe.recipe.update', 'uses' => 'RecipeController@update']);
    delete('recipes/{recipes}', ['as' => 'admin.recipe.recipe.destroy', 'uses' => 'RecipeController@destroy']);
// append

});

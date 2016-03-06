<?php

use Illuminate\Routing\Router;
 // $router->get('recipes', 'FrontEndController@index');
get('/recipes','FrontEndController@index');
get('/recipes/{recipe}','FrontEndController@show');

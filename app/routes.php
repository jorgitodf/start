<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/home', 'HomeController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/posts/show/{id}', 'PostsController@show'];


return $route;
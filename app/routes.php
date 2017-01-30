<?php

$route[] = ['/', 'HomeController@index'];
$route[] = ['/home', 'HomeController@index'];
$route[] = ['/posts', 'PostsController@index'];
$route[] = ['/posts/show/{id}', 'PostsController@show'];
$route[] = ['/posts/delete/{id}', 'PostsController@delete'];


return $route;
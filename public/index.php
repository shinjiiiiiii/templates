<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Test\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "TestController@index");
$router->get('/login', "UserController@showLogin");
$router->get('/register', "UserController@showRegister");
$router->get('/logout', "UserController@logout");
// $router->get('/tournoi/:tournoi/', "TournoiController@slug");
// $router->get('/store', "BoomerController@store");

// $router->post('/tournoi/:tournoi', "JoueurController@store");
// $router->post('/login', "UserController@Login");
// $router->post('/register', "UserController@Register");
// $router->post('/store', "ArticleController@store");
// $router->post('/delete', "ArticleController@delete");

$router->run();

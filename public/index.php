<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Test\Router($_SERVER["REQUEST_URI"]);
// $router->get('/', "TournoiController@index");
// $router->get('/tournoi/:tournoi/', "TournoiController@slug");

// $router->post('/tournoi/:tournoi', "JoueurController@store");

$router->run();

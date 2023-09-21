<?php
require "Router.php";
use OurApplication\Routing\Router;
use OurApplication\Controller\PriceController;

Router::get('/', function() {
    echo "Welcome home";
});
Router::get('/hello/world', function() {
    echo "Hello world";
});
Router::get('/greet/(\w+)', function($name) {
    echo "Hello {$name}";
});
Router::get('/greet/(\w+)/title/(\w+)', function($name, $title) {
    echo "Hello {$title} {$name}";
});
Router::delete('/verb', function() {
    echo $_SERVER['REQUEST_METHOD'];
});
Router::post('/verb', function() {
    echo $_SERVER['REQUEST_METHOD'];
});
Router::get('/price', [PriceController::class, 'showPrice']);

Router::cleanup();
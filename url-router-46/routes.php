<?php
require "Router.php";
use OurApplication\Routing\Router;

Router::get('/', function() {
    echo "Welcome home";
});
Router::get('/hello/world', function() {
    echo "Hello world";
});
<?php
Route::get('/', function() {
    echo "Welcome";
});

Router::get('/say/{name}', function($name) {
    echo "Welcome {$name}";
});
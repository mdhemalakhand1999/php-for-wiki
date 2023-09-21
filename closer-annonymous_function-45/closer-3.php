<?php
function scope() {
    $value = 1;
    // access global variable from annonymous function, we must need "use" for this
    $checkscope = function() use ($value) {
        echo $value;
    };
    $checkscope();
}
scope();


// change value from annonymous function ( for this we will pass reffrence with use)
function scope2() {
    $value = 1;
    // access global variable from annonymous function, we must need "use" for this
    $checkscope = function() use (&$value) {
        echo "<br/>";
        $value = 20;
        echo $value;
    };
    $checkscope();
}
scope2();
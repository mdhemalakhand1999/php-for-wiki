<?php
$url = $_SERVER['REQUEST_URI'];
/**
 * IN preg match started by "~" and end by "~" "^/ mean after slesh, (\w+) mean any word, " /?$ "mean if has slesh and after that it has something 
 */
if(preg_match("~^/hello/(\w+)/?$~", $url, $matches)) {
    echo $matches[1];
}
// match if its home
if(preg_match("~^/$~", $url)) {
   echo "Welcome to home"; 
}

// match localhost:8080/number/123/do/square

if(preg_match("~^/number/(\d+)/do/(\w+)/?$~", $url, $matches)) {
    echo $matches[1];
    echo "<br/>";
    echo $matches[2];
}
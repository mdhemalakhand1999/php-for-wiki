<?php
namespace OurApplication\Routing;
class Router {
    // 1. get get url from server
    private static function getUrl() {
        return $_SERVER['REQUEST_URI'];
    }
    // 3. match with pattern and get result
    private static function getMatches($pattern) {
        $url = self::getUrl();
        if(preg_match($pattern, $url, $matches)) {
            return $matches;
        }
        return false;
    }
    // 2. prepare for common pattern
    static function get($pattern, $callback) {
        $pattern = "~^{$pattern}$~";
        $params = self::getMatches($pattern);
        // if param exists then only call callback
        if($params) {
            if(is_callable($callback)) {
                $functionArguments = array_slice($params, 1); // get all without first param
                $callback(...$functionArguments);
            }
        }
    }
}
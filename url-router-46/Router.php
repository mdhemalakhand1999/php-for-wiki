<?php
namespace OurApplication\Routing;
class Router {
    private static $nomatch = true;
    // 1. get get url from server
    private static function getUrl() {
        return $_SERVER['REQUEST_URI'];
    }
    // common arguments
    private static function process($pattern, $callback) {
        $pattern = "~^{$pattern}/?$~";
        $params = self::getMatches($pattern);
        // if param exists then only call callback
        if($params) {
            // if params exists then $nomatch will be false
            self::$nomatch = false;
            if(is_callable($callback)) {
                $functionArguments = array_slice($params, 1); // get all without first param
                $callback(...$functionArguments);
            }
        }
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
        if($_SERVER['REQUEST_METHOD'] != 'GET') {
            return;
        }
        self::process($pattern, $callback);
    }
    static function post($pattern, $callback) {
        if($_SERVER['REQUEST_METHOD'] != 'POST') {
            return;
        }
        self::process($pattern, $callback);
    }
    static function delete($pattern, $callback) {
        if($_SERVER['REQUEST_METHOD'] != 'DELETE') {
            return;
        }
        self::process($pattern, $callback);
    }
    // if nomatch true then only show this message
    static function cleanup() {
        if(self::$nomatch) {
            echo "No routes are matched";
        }
    }
}
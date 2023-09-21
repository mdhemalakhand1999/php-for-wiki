<?php
namespace OurApplication\Controller;
class PriceController {
    private static $instance;
    static function getInstance() {
        if(!self::$instance) {
            self::$instance = new self();
        }
        return self::$instance;
    }
    public function showPrice() {
        echo "<h2>Price is 10 taka</h2>";
    }
}
<?php
require "vendor/autoload.php";
use Doctrine\DBAL\DriverManager;
// connection database
$connectionParams = [
    'dbname' => 'lwhh_php_db07',
    'user' => 'root',
    'password' => '',
    'host' => 'localhost',
    'driver' => 'mysqli',
];
$conn = DriverManager::getConnection($connectionParams);
try {
    if($conn->connect()) { 
        echo "Connected";
        // $result = $conn->query("SELECT * FROM students WHERE section='A' AND class=1");
        $result = $conn->executeQuery("SELECT * FROM students WHERE section=? AND class=?", ['A', 1]);
        // while($data = $result->fetch()) {
        //     print_r($data);
        // }
        print_r($result->fetchAll());
    } else {
        echo "Failed";
    }
    } catch(Exception $e) {
}
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

try {
    // Create a connection
    $conn = DriverManager::getConnection($connectionParams);

    // Check if the connection was successful
    if ($conn->connect()) { 
       $query = "SELECT * FROM students WHERE section='A' AND class=1";
       $data = $conn->fetchAllAssociative($query);
       print_r($data);

    $query = "SELECT count(*) FROM students WHERE section='A' AND class=1";
    $data = $conn->fetchOne($query);
    print_r($data);
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
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
        echo $conn->delete('persons', ['id' => 1]);
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
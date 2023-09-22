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
    $qb = $conn->createQueryBuilder();
    // Check if the connection was successful
    if ($conn->connect()) { 
        $qb->select('*')->from('students')->setMaxResults(10);
        echo $qb->getSQL().PHP_EOL;
        $result = $qb->execute()->fetchAll();
        print_r($result);
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
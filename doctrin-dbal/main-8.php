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
        $qb->select('*')
        ->from('students')
        ->where('class=?')
        ->andWhere('section=?')
        ->setParameter(1, 1)
        ->setParameter(2, 'A')
        ->setMaxResults(2);
        print_r($qb->execute()->fetchAll());
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
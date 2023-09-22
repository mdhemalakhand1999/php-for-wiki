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
        // insert data
        $qb->insert('students')
        ->values(
            [
                'name' => '?',
                'roll' => '?',
                'sex' => '?',
                'class' => '?',
                'section' => '?'
            ]
        )
        ->setParameter(0, 'MD Hemal Akhand')
        ->setParameter(1, 1)
        ->setParameter(2, 'Male')
        ->setParameter(3, 'Five')
        ->setParameter(4, 'A')
        ->execute();
        // update data
        $qb->update('students')
        ->set('name', '?')
        ->set('sex', '?')
        ->where('id', '?')
        ->setParameter(0, 'Suraiya akter rika')
        ->setParameter(1, 'Female')
        ->setParameter(2, 4)
        ->execute();
        $qb->delete('students')
        ->where('id = ?')
        ->setParameter(1, 8)
        ->execute();
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
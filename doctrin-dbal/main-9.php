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
        /**
         * A small doc
         * S for status alias
         * st for student alias
         */
       $qb->select('s.*')
       ->from('status', 's')
       ->join('s', 'students', 'st', 's.student_id = st.id AND s.student_status = ?')
       ->setParameter(1, 1);
       print_r($qb->execute()->fetchAll());
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
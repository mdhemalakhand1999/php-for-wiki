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
        $queryBuilder = $conn->createQueryBuilder();
        $queryBuilder
            ->select('*')
            ->from('students')
            ->where('section = :section')
            ->andWhere('class = :class')
            ->setParameters([
                'section' => 'A',
                'class' => 1,
            ]);

        // Execute the query and fetch the results using Result
        $result = $queryBuilder->executeQuery();
        $students = $result->fetchAllAssociative();

        // Output the results (for demonstration)
        print_r($students);
    } else {
        echo "Failed to connect to the database.";
    }
} catch (Exception $e) {
    echo "An error occurred: " . $e->getMessage();
}
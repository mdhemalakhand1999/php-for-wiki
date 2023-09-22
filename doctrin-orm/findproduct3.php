<?php
use Shop\Model\User;
require "bootstrap.php";
$userRepo = $entityManager->getRepository(User::class);
$users = $userRepo->findAll();
foreach($users as $user) {
    foreach($user->getProducts() as $product) {
        echo $product->getName();
        echo "<br/>";
    }
}
<?php
use Shop\Model\Product;
use Shop\Model\User;
require_once "bootstrap.php";
$user = $entityManager->find(User::class, 1);
$newProductName = "Mac Pro Ultra/U2 2023";
$product = new Product;
$product->setUser($user);
$product->setName($newProductName);
$entityManager->persist($product);
$entityManager->flush();
echo "Created Product with ID " . $product->getId() . "<br/>";
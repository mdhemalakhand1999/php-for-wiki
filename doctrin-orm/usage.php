<?php
use Shop\Model\Product;
require_once "bootstrap.php";
$newProductName = "Keybord";
$product = new Product;
$product->setName($newProductName);
$entityManager->persist($product);
$entityManager->flush();
echo "Created Product with ID " . $product->getId() . "<br/>";

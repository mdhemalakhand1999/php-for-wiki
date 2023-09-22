<?php
// list_products.php
use Shop\Model\Product;
require_once "bootstrap.php";
$productRepository = $entityManager->getRepository(Product::class);
$products = $productRepository->findAll();
foreach ($products as $product) {
    echo sprintf("Name: %s ID: id %d created by: %s\n", $product->getName(), $product->getID(), $product->getUser()->getName());
}
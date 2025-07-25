<?php
session_start();
require_once __DIR__ . '/../dbconnect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($id <= 0) die('Invalid product ID');

$sql = "SELECT id, name, price, image_url FROM product WHERE id = $id";
$result = $conn->query($sql);
$product = $result->fetch_assoc();
if (!$product) die('Product not found.');

$cart = $_SESSION['cart'] ?? [];

if (isset($cart[$id])) {
  $cart[$id]['quantity'] += 1;
} else {
  $cart[$id] = [
    'name' => $product['name'],
    'price' => $product['price'],
    'quantity' => 1,
    'image_url' => $product['image_url']
  ];
}

$_SESSION['cart'] = $cart;
header('Location: cart.php');
exit;

<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];
$image = $_POST['image'];
$quantity = $_POST['quantity'];

if (isset($_SESSION['cart'])) {
    $data = $_SESSION['cart'];
} else {
    $data = [];
}

$data[$id] = [
    'id' => $id,
    'name' => $name,
    'price' => $price,
    'quantity' => $quantity,
    'total' => ($quantity * $price),
    'image' => $image
];

$_SESSION['cart'] = $data;

echo json_encode($_SESSION['cart']);

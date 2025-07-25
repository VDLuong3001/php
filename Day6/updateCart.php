<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');

$id = $_POST['id'];
$quantity = $_POST['quantity'];

if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
    $tempProd = $cart[$id];

    $cart[$id] = [
        'id' => $tempProd['id'],
        'name' => $tempProd['name'],
        'quantity' => $quantity,
        'price' => $tempProd['price'],
        'total' => ($quantity * $tempProd['price']),
        'image' => $tempProd['image']
    ];

    $_SESSION['cart'] = $cart;
}

echo json_encode($_SESSION['cart']);

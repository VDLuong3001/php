<?php
session_start();
include_once(__DIR__ . '/../../dbconnect.php');

$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
} else {
    $cart = [];
}
?>

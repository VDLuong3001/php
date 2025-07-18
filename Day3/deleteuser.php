<?php
include 'connect_userDB.php';
$id = $_GET['id'];
$conn->query("DELETE FROM users WHERE id=$id");
header("Location: listUsers.php");
?>

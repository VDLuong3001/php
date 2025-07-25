<?php
session_start();

if (isset($_SESSION['user_id'])) {
    unset($_SESSION['user_id']);
    unset($_SESSION['username']);
    header('Location: login.php');
    exit();
} else {
    echo 'User not logged in!';
    die;
}

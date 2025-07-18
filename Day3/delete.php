<?php
$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "demo";
$conn = new mysqli($host, $username, $passwd, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("DELETE FROM accounts WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: ex1.php");
        exit;
    } else {
        header("Location: ex1.php?error=1");
        exit;
    }

    $stmt->close();
} else {
    header("Location: ex1.php?error=1");
    exit;
}

$conn->close();
?>

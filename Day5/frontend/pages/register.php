<?php
session_start();
include_once(__DIR__ . '/../dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username && $email && $password) {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $conn->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "All fields required.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Register</title>
</head>
<body>
  <h1>Register</h1>
  <form method="post" action="">
    <label>Username:</label><br>
    <input name="username" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Register</button>
  </form>
</body>
</html>

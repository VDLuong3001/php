<?php
session_start();
include_once(__DIR__ . '/../dbconnect.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    $stmt = $conn->prepare("SELECT id, password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();

    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['kh_tendangnhap_logged'] = $username;

        header("Location: /demoshop/index.php");
        exit();
    } else {
        echo "Invalid login!";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Login</title>
</head>
<body>
  <h1>Login</h1>
  <form method="post" action="">
    <label>Username:</label><br>
    <input name="username" required><br>

    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>

    <button type="submit">Login</button>
  </form>
</body>
</html>

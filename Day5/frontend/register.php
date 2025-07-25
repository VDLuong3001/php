<?php
session_start();
require_once 'config.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username']);
  $email = trim($_POST['email']);
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  if (empty($username) || empty($email) || empty($password) || empty($confirm)) {
    $errors[] = "Please fill in all fields.";
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
  } elseif ($password !== $confirm) {
    $errors[] = "Passwords do not match.";
  } else {

    $stmt = $conn->prepare("SELECT id FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
      $errors[] = "Username already taken.";
    } else {
   
      $hashed = password_hash($password, PASSWORD_DEFAULT);
      $insert = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
      $insert->bind_param("sss", $username, $email, $hashed);

      if ($insert->execute()) {
        $_SESSION['username'] = $username;
        header("Location: index.php");
        exit;
      } else {
        $errors[] = "Error creating account. Please try again.";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title>Register - Demoshop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card p-4 shadow" style="width: 100%; max-width: 400px;">
  <h3 class="text-center mb-3">Register</h3>

  <?php if (!empty($errors)): ?>
    <div class="alert alert-danger">
      <?php foreach ($errors as $err) echo "<div>$err</div>"; ?>
    </div>
  <?php endif; ?>

  <form method="POST">
    <div class="mb-3">
      <label class="form-label">Username</label>
      <input type="text" name="username" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Password</label>
      <input type="password" name="password" class="form-control" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Confirm Password</label>
      <input type="password" name="confirm" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary w-100">Create Account</button>
  </form>

  <p class="mt-3 text-center">Already have an account? <a href="signin.php">Login</a></p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();

if (isset($_SESSION['username'])) {
  header('Location: index.php');
  exit;
}

$error = '';

$host = 'localhost';
$db = 'demoshop';
$user = 'root';
$pass = '';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $username = trim($_POST['username'] ?? '');
  $password = $_POST['password'] ?? '';

  $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
  $stmt->bind_param('s', $username);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();
    if ($password === $user['password']) {
      $_SESSION['username'] = $user['username'];
      $_SESSION['role'] = $user['role']; // ✅ thêm role vào session
      header('Location: index.php');
      exit;
    } else {
      $error = 'Wrong password!';
    }
  } else {
    $error = 'Username not found!';
  }

  $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title>Sign In - Demoshop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center py-4 bg-body-tertiary" style="min-height: 100vh;">

<main class="form-signin w-100 m-auto" style="max-width: 400px;">
  <form method="post">
    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

    <?php if ($error): ?>
      <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>

    <div class="form-floating mb-2">
      <input type="text" name="username" class="form-control" id="floatingInput" placeholder="Username" required>
      <label for="floatingInput">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-3 mb-3 text-muted text-center">© <?= date('Y') ?> Demoshop</p>
  </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

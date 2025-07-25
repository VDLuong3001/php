<?php
session_start();

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Demoshop Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      display: flex;
      align-items: center;
      padding-top: 40px;
      padding-bottom: 40px;
      background-color: #f8f9fa;
    }
    .form-signin {
      max-width: 400px;
      padding: 15px;
      margin: auto;
    }
  </style>
</head>
<body>

<main class="form-signin w-100 m-auto">
  <form action="../backend/handle_login.php" method="POST">
    <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>

    <?php if (isset($_SESSION['login_error'])): ?>
      <div class="alert alert-danger"><?= $_SESSION['login_error']; unset($_SESSION['login_error']); ?></div>
    <?php endif; ?>

    <div class="form-floating mb-2">
      <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
      <label for="username">Username</label>
    </div>
    <div class="form-floating mb-3">
      <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
      <label for="password">Password</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
    <p class="mt-3 mb-3 text-muted text-center">&copy; <?= date('Y') ?> Demoshop</p>
  </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

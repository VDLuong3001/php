<?php
session_start();
require_once __DIR__ . '/../dbconnect.php';

$sql = "SELECT id, name, description, price, image_url, category FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title>Demoshop - Home</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
  <link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
</head>
<body>

<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="moon-stars-fill" viewBox="0 0 16 16"><path d="..."/></symbol>
  <symbol id="sun-fill" viewBox="0 0 16 16"><path d="..."/></symbol>
  <symbol id="circle-half" viewBox="0 0 16 16"><path d="..."/></symbol>
  <symbol id="check2" viewBox="0 0 16 16"><path d="..."/></symbol>
</svg>

<div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
  <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center"
    id="bd-theme" type="button" data-bs-toggle="dropdown" aria-expanded="false"
    aria-label="Toggle theme">
    <svg class="bi my-1 theme-icon-active" aria-hidden="true"><use href="#moon-stars-fill"></use></svg>
    <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
  </button>
  <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
    <li><button class="dropdown-item" data-bs-theme-value="light"><svg class="bi me-2 opacity-50"><use href="#sun-fill"/></svg>Light</button></li>
    <li><button class="dropdown-item active" data-bs-theme-value="dark"><svg class="bi me-2 opacity-50"><use href="#moon-stars-fill"/></svg>Dark</button></li>
    <li><button class="dropdown-item" data-bs-theme-value="auto"><svg class="bi me-2 opacity-50"><use href="#circle-half"/></svg>Auto</button></li>
  </ul>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Demoshop</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
      data-bs-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item"><a class="nav-link" href="about.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="product.php">Products</a></li>
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact</a></li>
      </ul>
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" href="cart.php">🛒 Cart (<?= isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0 ?>)</a>
        </li>
        <?php if (isset($_SESSION['username'])): ?>
          <li class="nav-item"><span class="nav-link">Hi, <?= htmlspecialchars($_SESSION['username']) ?></span></li>
          <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="signin.php">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="register.php">Register</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div id="mainCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="uploads/slider/slider1.png" class="d-block w-100" alt="Slider 1">
    </div>
    <div class="carousel-item">
      <img src="uploads/slider/slider2.png" class="d-block w-100" alt="Slider 2">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#mainCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#mainCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<div class="container py-5">
  <h2 class="mb-4">Our Products</h2>
  <div class="row row-cols-1 row-cols-md-3 g-4">
    <?php while ($row = $result->fetch_assoc()): ?>
      <div class="col">
        <div class="card h-100 shadow-sm">
          <img src="<?= htmlspecialchars($row['image_url']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['name']) ?>">
          <div class="card-body">
            <h5 class="card-title"><?= htmlspecialchars($row['name']) ?></h5>
            <p class="card-text text-muted small"><?= htmlspecialchars($row['category']) ?></p>
            <p class="card-text"><?= htmlspecialchars($row['description']) ?></p>
            <p class="card-text fw-bold text-primary">$<?= number_format($row['price'], 2) ?></p>
          </div>
          <div class="card-footer text-end bg-transparent border-top-0">
            <a href="add_to_cart.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-primary">Add to Cart</a>
            <a href="detail.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-secondary">Details</a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<footer class="container mt-5 text-center text-muted">
  <hr>
  <p>© <?= date('Y') ?> Demoshop. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>

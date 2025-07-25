<?php
require_once __DIR__ . '/../dbconnect.php';

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($id <= 0) {
  die('Invalid product ID.');
}

$stmt = $conn->prepare("SELECT name, description, price, image_url, category FROM product WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
  die('Product not found.');
}

$product = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($product['name']) ?> - Demoshop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <a href="index.php" class="btn btn-sm btn-secondary mb-4">← Back to Home</a>

  <div class="row">
    <div class="col-md-6">
      <img src="<?= htmlspecialchars($product['image_url']) ?>" class="img-fluid rounded shadow" alt="<?= htmlspecialchars($product['name']) ?>">
    </div>
    <div class="col-md-6">
      <h2><?= htmlspecialchars($product['name']) ?></h2>
      <p class="text-muted">Category: <?= htmlspecialchars($product['category']) ?></p>
      <h4 class="text-primary">$<?= number_format($product['price'], 2) ?></h4>
      <p><?= htmlspecialchars($product['description']) ?></p>
      <button class="btn btn-success">Add to Cart</button>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
session_start();

$cart = $_SESSION['cart'] ?? [];
$total = 0;
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <title>Cart - Demoshop</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container py-5">
  <h2 class="mb-4">Your Shopping Cart</h2>

  <?php if (empty($cart)): ?>
    <div class="alert alert-warning">Your cart is empty.</div>
    <a href="index.php" class="btn btn-primary">Back to Shop</a>
  <?php else: ?>
    <table class="table table-bordered table-hover align-middle">
      <thead>
        <tr>
          <th>Image</th>
          <th>Product</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total</th>
          <th>Remove</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($cart as $id => $item): 
          $line_total = $item['price'] * $item['quantity'];
          $total += $line_total;
        ?>
        <tr>
          <td><img src="<?= htmlspecialchars($item['image_url']) ?>" width="80"></td>
          <td><?= htmlspecialchars($item['name']) ?></td>
          <td>$<?= number_format($item['price'], 2) ?></td>
          <td><?= $item['quantity'] ?></td>
          <td>$<?= number_format($line_total, 2) ?></td>
          <td><a href="remove_from_cart.php?id=<?= $id ?>" class="btn btn-sm btn-danger">Remove</a></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

    <h4 class="text-end">Total: <span class="text-primary">$<?= number_format($total, 2) ?></span></h4>
    <div class="text-end">
      <a href="index.php" class="btn btn-secondary">Continue Shopping</a>
      <a href="checkout.php" class="btn btn-success">Checkout</a>
    </div>
  <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

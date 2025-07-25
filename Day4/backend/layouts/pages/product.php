<?php
session_start();
include_once(__DIR__ . '/../../../dbconnect.php');

$sql = "SELECT id, name, price, stock_quantity, image_url FROM product ORDER BY id DESC";
$result = $conn->query($sql);
$products = [];
while ($row = $result->fetch_assoc()) {
    $products[] = $row;
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Product Management</title>
    <link href="/demoshop/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="/demoshop/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="/demoshop/assets/backend/css/dashboard.css" rel="stylesheet">
  </head>
  <body>
    <?php include_once(__DIR__ . '/../partials/header.php'); ?>

    <div class="container-fluid">
      <div class="row">
        <?php include_once(__DIR__ . '/../partials/sidebar.php'); ?>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
          <div class="d-flex justify-content-between align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h2>Product List</h2>
            <a href="product_create.php" class="btn btn-primary">
              <i class="fa fa-plus"></i> Add New Product
            </a>
          </div>

          <table class="table table-striped table-bordered align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($products as $p): ?>
              <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['name'] ?></td>
                <td><?= number_format($p['price'], 0, ',', '.') ?> ₫</td>
                <td><?= $p['stock_quantity'] ?></td>
                <td>
                  <img src="/demoshop/assets/<?= $p['image_url'] ?>" width="80">
                </td>
                <td>
                  <a href="product_update.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-warning">
                    <i class="fa fa-pencil"></i> Edit
                  </a>
                  <a href="product_delete.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?');">
                    <i class="fa fa-trash"></i> Delete
                  </a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </main>
      </div>
    </div>

    <?php include_once(__DIR__ . '/../partials/footer.php'); ?>
    <script src="/demoshop/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  </body>
</html>

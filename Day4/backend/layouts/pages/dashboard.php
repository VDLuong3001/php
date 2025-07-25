<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard - Product List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <!-- Header -->
  <?php include_once(__DIR__ . '/../partials/header.php'); ?>

  <div class="container-fluid">
    <div class="row">
      
      <!-- Sidebar -->
      <?php include_once(__DIR__ . '/../partials/sidebar.php'); ?>

      <!-- Main content -->
      <main class="col-md-10 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Product List</h1>
        </div>

        <?php
        include_once(__DIR__ . '/../../../dbconnect.php');

        $sql = "SELECT id, name, price, stock_quantity, image_url, category FROM product ORDER BY id DESC";
        $result = $conn->query($sql);

        $prods = [];
        while ($row = $result->fetch_array(MYSQLI_NUM)) {
          $prods[] = $row;
        }
        $result->free_result();
        $conn->close();
        ?>

        <a href="create.php" class="btn btn-primary mb-3">Create New</a>

        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped align-middle text-center">
            <thead class="table-dark">
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Category</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($prods as $item): ?>
              <tr>
                <td><?= $item[0] ?></td>
                <td><?= $item[1] ?></td>
                <td>$<?= number_format($item[2], 2) ?></td>
                <td><?= $item[3] ?></td>
                <td>
                  <img src="/demoshop/assets/<?= $item[4] ?>" style="max-width:100px;" alt="Image">
                </td>
                <td><?= $item[5] ?></td>
                <td>
                  <a href="update.php?id=<?= $item[0] ?>" class="btn btn-sm btn-warning">Update</a>
                  <a href="delete.php?id=<?= $item[0] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</a>
                </td>
              </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
      </main>
    </div>
  </div>

  <!-- Footer -->
  <?php include_once(__DIR__ . '/../partials/footer.php'); ?>

  <!-- Bootstrap Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

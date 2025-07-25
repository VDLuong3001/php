<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>About</title>
  <?php include_once(__DIR__ . '/../layouts/styles.php'); ?>
  <link href="/demoshop/assets/frontend/css/style.css" rel="stylesheet" />
</head>
<body class="d-flex flex-column h-100">
  <?php include_once(__DIR__ . '/../layouts/partials/header.php'); ?>

  <main role="main" class="mb-2 flex-fill">
    <div class="container mt-2">
      <h1 class="text-center">About Us</h1>
      <div class="row">
        <div class="col-md-12 text-center">
          <h5>DemoShop</h5>
          <h5>Simple Shopping Cart</h5>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col-md-12">
          <iframe
            src="https://www.google.com/maps/embed?...(your map link here)..."
            width="100%" height="450" style="border:0;" allowfullscreen=""
            loading="lazy" referrerpolicy="no-referrer-when-downgrade">
          </iframe>
        </div>
      </div>
    </div>
  </main>

  <?php include_once(__DIR__ . '/../layouts/partials/footer.php'); ?>
  <?php include_once(__DIR__ . '/../layouts/scripts.php'); ?>
</body>
</html>

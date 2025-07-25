<?php
session_start();
// Show errors
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>DemoShop</title>

  <?php include_once(__DIR__ . '/layouts/styles.php'); ?>

  <style>
    .carousel-item {
      height: 450px;
      object-fit: cover;
    }
    .card-icon {
      width: 120px;
      height: 120px;
      line-height: 120px;
      text-align: center;
      font-size: 52px;
      border-radius: 5px;
      background-color: #4A90E2;
      color: #FFF;
      margin: 0 auto 15px;
    }
  </style>
</head>
<body class="d-flex flex-column h-100">

<!-- header -->
<?php include_once(__DIR__ . '/layouts/partials/header.php'); ?>
<!-- end header -->

<main role="main" class="mb-2">

<?php
include_once(__DIR__ . '/../dbconnect.php');

$sql = "SELECT id, name, price, description, stock_quantity, image_url, category FROM products";
$result = $conn->query($sql);

$prods = [];
while ($row = $result->fetch_array(MYSQLI_NUM)) {
  $prods[] = $row;
}
$result->free();
$conn->close();
?>

<!-- Carousel -->
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="1"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="2"></button>
    <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="/demoshop/assets/frontend/img/slider-1.jpg" class="d-block w-100" />
      <div class="container">
        <div class="carousel-caption text-left">
          <h1>Nơi mua sắm tuyệt vời</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/demoshop/assets/frontend/img/slider-2.jpg" class="d-block w-100" />
      <div class="container">
        <div class="carousel-caption">
          <h1>Hàng triệu sản phẩm - Lựa chọn mỏi tay</h1>
        </div>
      </div>
    </div>
    <div class="carousel-item">
      <img src="/demoshop/assets/frontend/img/slider-3.jpg" class="d-block w-100" />
      <div class="container">
        <div class="carousel-caption text-right">
          <h1>Chất lượng là hàng đầu.</h1>
        </div>
      </div>
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>

<!-- Marketing -->
<div class="container marketing mt-5">
  <div class="row">
    <div class="col-lg-4 text-center">
      <div class="card-icon"><span class="fa fa-credit-card"></span></div>
      <h2>Đặt hàng</h2>
      <p>Chọn sản phẩm bạn yêu thích, và Đặt hàng.</p>
    </div>
    <div class="col-lg-4 text-center">
      <div class="card-icon"><span class="fa fa-archive"></span></div>
      <h2>Tạo đơn hàng</h2>
      <p>Theo dõi đơn hàng của bạn.</p>
    </div>
    <div class="col-lg-4 text-center">
      <div class="card-icon"><span class="fa fa-truck"></span></div>
      <h2>Giao hàng</h2>
      <p>Giao hàng tận nơi.</p>
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7">
      <h2 class="featurette-heading">Đặt hàng, Tạo đơn hàng, Giao hàng <span class="text-muted">Nhanh chóng</span></h2>
      <p class="lead">Nơi mua sắm tuyệt vời cho mọi lứa tuổi.</p>
    </div>
    <div class="col-md-5">
      <img src="/demoshop/assets/frontend/img/marketing-1.png" class="img-fluid" />
    </div>
  </div>

  <hr class="featurette-divider">

  <div class="row featurette">
    <div class="col-md-7 order-md-2">
      <h2 class="featurette-heading">Báo cáo Doanh thu tuyệt vời <span class="text-muted">Theo dõi đơn hàng của bạn.</span></h2>
      <p class="lead">Hệ thống theo dõi đơn hàng chi tiết, thông tin mọi lúc mọi nơi.</p>
    </div>
    <div class="col-md-5 order-md-1">
      <img src="/demoshop/assets/frontend/img/marketing-2.png" class="img-fluid" />
    </div>
  </div>

  <hr class="featurette-divider">
</div>

<!-- Products -->
<section class="jumbotron text-center">
  <div class="container">
    <h1 class="jumbotron-heading">Danh sách Sản phẩm</h1>
    <p class="lead text-muted">Các sản phẩm chất lượng, uy tín, cam kết từ nhà sản xuất, phân phối và bảo hành chính hãng.</p>
  </div>
</section>

<div class="sanphams py-5 bg-light">
  <div class="container">
    <div class="row row-cols-3">
      <?php foreach ($prods as $item) : ?>
      <div class="col">
        <div class="card mb-4 shadow-sm">
          <div class="card-header">
            <div class="ribbon-wrapper">
              <div class="ribbon red">NEW</div>
            </div>
            <div class="container-img">
              <a href="/demoshop/frontend/pages/details.php?id=<?= $item[0] ?>">
                <img class="card-img-top img-fluid" width="100%" height="350"
                  src="/demoshop/assets/<?= !empty($item[5]) ? $item[5] : 'shared/img/default-image_600.png' ?>" />
              </a>
            </div>
          </div>
          <div class="card-body">
            <a href="/demoshop/frontend/pages/details.php?id=<?= $item[0] ?>">
              <h5><?= htmlspecialchars($item[1]) ?></h5>
            </a>
            <h6><?= htmlspecialchars($item[6]) ?></h6>
            <p class="card-text"><?= htmlspecialchars($item[3]) ?></p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="btn-group">
                <a class="btn btn-sm btn-outline-secondary" href="/demoshop/frontend/pages/details.php?id=<?= $item[0] ?>">Xem chi tiết</a>
              </div>
              <small class="text-muted"><b><?= htmlspecialchars($item[2]) ?> đ</b></small>
            </div>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

</main>

<!-- footer -->
<?php include_once(__DIR__ . '/layouts/partials/footer.php'); ?>
<!-- scripts -->
<?php include_once(__DIR__ . '/layouts/scripts.php'); ?>
</body>
</html>

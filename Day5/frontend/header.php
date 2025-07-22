<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
  <a class="navbar-brand" href="/">DemoShop</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse"
    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
    aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="/demoshop/backend/pages/dashboard.php">Admin</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/demoshop/frontend/pages/about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/demoshop/frontend/pages/contact.php">Contact</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/demoshop/frontend/pages/viewCart.php">Cart</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto px-3">
      <?php if (isset($_SESSION['kh_tendangnhap_logged']) && !empty($_SESSION['kh_tendangnhap_logged'])) : ?>
        <li class="nav-item">
          <a class="nav-link">Welcome <?= htmlspecialchars($_SESSION['kh_tendangnhap_logged']); ?></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/demoshop/frontend/pages/logout.php">Logout</a>
        </li>
      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link" href="/demoshop/frontend/pages/login.php">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/demoshop/frontend/pages/register.php">Register</a>
        </li>
      <?php endif; ?>
    </ul>
  </div>
</nav>

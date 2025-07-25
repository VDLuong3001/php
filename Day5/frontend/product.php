<?php
session_start();
require_once __DIR__ . '/../dbconnect.php';

// Nếu chưa đăng nhập thì chuyển về trang đăng nhập
if (!isset($_SESSION['username'])) {
    header('Location: signin.php');
    exit;
}

// Kiểm tra role
$role = $_SESSION['role'] ?? 'user';
$isAdmin = ($role === 'admin');

// Truy vấn danh sách sản phẩm
$sql = "SELECT id, name, price, stock_quantity, image_url, category FROM product ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <title>Product Management - Demoshop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-dark text-white">

<div class="container mt-5">
    <h1 class="mb-4">Product List</h1>

    <?php if ($isAdmin): ?>
        <a href="product_add.php" class="btn btn-success mb-3">+ Add New Product</a>
    <?php endif; ?>

    <table class="table table-dark table-hover table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Price ($)</th>
                <th>Quantity</th>
                <th>Image</th>
                <th>Category</th>
                <?php if ($isAdmin): ?>
                    <th>Actions</th>
                <?php endif; ?>
            </tr>
        </thead>
        <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= htmlspecialchars($row['name']) ?></td>
                <td><?= number_format($row['price'], 2) ?></td>
                <td><?= $row['stock_quantity'] ?></td>
                <td><img src="<?= htmlspecialchars($row['image_url']) ?>" alt="" style="width:100px;"></td>
                <td><?= htmlspecialchars($row['category']) ?></td>
                <?php if ($isAdmin): ?>
                    <td>
                        <a href="product_edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="product_delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?');">Delete</a>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
</div>

</body>
</html>

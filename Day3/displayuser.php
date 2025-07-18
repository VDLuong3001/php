<?php include 'connect_productDB.php'; ?>

<!DOCTYPE html>
<html>
<head><title>Product List</title></head>
<body>
<h1>Product List</h1>
<a href="createProduct.php">Add New Product</a>
<table border="1">
    <tr>
        <th>ID</th><th>Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM products");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td><td>{$row['name']}</td>
            <td>{$row['price']}</td><td>{$row['stock_quantity']}</td>
            <td><img src='{$row['img_url']}' width='50'></td>
            <td>
                <a href='updateProduct.php?id={$row['id']}'>Edit</a> |
                <a href='deleteProduct.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>

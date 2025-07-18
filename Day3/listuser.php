<?php include 'connect_userDB.php'; ?>
<!DOCTYPE html>
<html>
<head><title>User List</title></head>
<body>
<h1>User List</h1>
<a href="createUser.php">Create New User</a>
<table border="1">
    <tr>
        <th>ID</th><th>Username</th><th>Email</th><th>Actions</th>
    </tr>
    <?php
    $result = $conn->query("SELECT * FROM users");
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
            <td>{$row['id']}</td>
            <td>{$row['username']}</td>
            <td>{$row['email']}</td>
            <td>
                <a href='updateUser.php?id={$row['id']}'>Edit</a> |
                <a href='deleteUser.php?id={$row['id']}'>Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>
</body>
</html>

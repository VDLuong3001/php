<?php include 'connect_userDB.php'; ?>

<?php
$id = $_GET['id'] ?? 0;
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><title>Update User</title></head>
<body>
<h1>Update User</h1>
<form method="post">
    Username: <?php echo htmlspecialchars($user['username']); ?><br>
    New Password: <input name="password" type="password" required><br>
    New Email: <input name="email" type="email" value="<?php echo htmlspecialchars($user['email']); ?>" required><br>
    <input type="submit" value="Update">
</form>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("UPDATE users SET password=?, email=? WHERE id=?");
    $stmt->bind_param("ssi", $hashed_password, $email, $id);
    $stmt->execute();
    header("Location: listUsers.php");
}
?>
</body>
</html>

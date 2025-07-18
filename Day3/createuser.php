<?php include 'connect_userDB.php'; ?>
<!DOCTYPE html>
<html>
<head><title>Create User</title></head>
<body>
<h1>Create New User</h1>
<form method="post">
    Username: <input name="username" required><br>
    Password: <input name="password" type="password" required><br>
    Email: <input name="email" type="email" required><br>
    <input type="submit" value="Create">
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    // Hash password!
    $hashed_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $email = $_POST['email'];

    $stmt = $conn->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $hashed_password, $email);
    $stmt->execute();
    header("Location: listUsers.php");
}
?>
</body>
</html>

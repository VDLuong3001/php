
<?php
$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "demo";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $conn = new mysqli($host, $username, $passwd, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $stmt = $conn->prepare("INSERT INTO accounts (email, password, fullname, phone) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $email, $password, $fullname, $phone);

    if ($stmt->execute()) {
        header("Location: ex1.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Account</title>
</head>
<body>
    <h1>Create Account</h1>
    <form action="create.php" method="post">
        <div>
            <label for="email">Email</label>
            <input name="email" id="email" required />
        </div>
        <div>
            <label for="password">Password</label>
            <input name="password" id="password" type="password" required />
        </div>
        <div>
            <label for="fullname">Full name</label>
            <input name="fullname" id="fullname" required />
        </div>
        <div>
            <label for="phone">Phone</label>
            <input name="phone" id="phone" required />
        </div>
        <div>
            <input type="submit" value="Create" />
        </div>
    </form>
</body>
</html>

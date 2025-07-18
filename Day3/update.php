<?php
$host = "localhost";
$username = "root";
$passwd = "";
$dbname = "demo";

$conn = new mysqli($host, $username, $passwd, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST['id'] ?? '';
    $email = $_POST['email'] ?? '';
    $fullname = $_POST['fullname'] ?? '';
    $phone = $_POST['phone'] ?? '';

    $stmt = $conn->prepare("UPDATE accounts SET email=?, fullname=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $email, $fullname, $phone, $id);

    if ($stmt->execute()) {
        header("Location: ex1.php");
        exit;
    } else {
        header("Location: update.php?id=" . urlencode($id));
        exit;
    }

    $stmt->close();
}
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("SELECT id, email, fullname, phone FROM accounts WHERE id=?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Update Account</title>
        </head>
        <body>
        <h1>Update Account</h1>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>" />
            <div>
                <label for="email">Email</label>
                <input name="email" id="email" value="<?php echo htmlspecialchars($row['email']); ?>" required />
            </div>
            <div>
                <label for="fullname">Full name</label>
                <input name="fullname" id="fullname" value="<?php echo htmlspecialchars($row['fullname']); ?>" required />
            </div>
            <div>
                <label for="phone">Phone</label>
                <input name="phone" id="phone" value="<?php echo htmlspecialchars($row['phone']); ?>" required />
            </div>
            <div>
                <input type="submit" value="Update" />
            </div>
        </form>
        </body>
        </html>
        <?php
    } else {
        header("Location: ex1.php");
        exit;
    }

    $stmt->close();
} else {
    header("Location: ex1.php");
    exit;
}

$conn->close();
?>

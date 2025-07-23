<?php
session_start();
require_once 'Customer.php';


if (!isset($_SESSION['customers'])) {
    $_SESSION['customers'] = [];
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $fullname = $_POST["fullname"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $gender = $_POST["gender"];
    $birthday = $_POST["birthday"];

    $newCustomer = new Customer($id, $username, $password, $fullname, $address, $phone, $gender, $birthday);
    $_SESSION['customers'][] = $newCustomer;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Info</title>
</head>
<body>
    <h2>Add New Customer</h2>
    <form method="post">
        ID: <input type="text" name="id" required><br><br>
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        Full Name: <input type="text" name="fullname" required><br><br>
        Address: <input type="text" name="address" required><br><br>
        Phone: <input type="text" name="phone" required><br><br>
        Gender:
        <select name="gender">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
        </select><br><br>
        Birthday: <input type="date" name="birthday" required><br><br>
        <input type="submit" value="Add Customer">
    </form>

    <h2>Customer List</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th><th>Username</th><th>Password</th><th>Full Name</th>
            <th>Address</th><th>Phone</th><th>Gender</th><th>Birthday</th>
        </tr>
        <?php
        foreach ($_SESSION['customers'] as $cust) {
            echo "<tr>
                <td>{$cust->id}</td>
                <td>{$cust->username}</td>
                <td>{$cust->password}</td>
                <td>{$cust->fullname}</td>
                <td>{$cust->address}</td>
                <td>{$cust->phone}</td>
                <td>{$cust->gender}</td>
                <td>{$cust->birthday}</td>
            </tr>";
        }
        ?>
    </table>

    <p><a href="destroy.php">Clear All Customers</a></p>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account List</title>
    <style>
        .create-btn {
            display: inline-block;
            padding: 8px 16px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        }

        .create-btn:hover {
            background-color: #0056b3;
        }

        table, th, td {
            border: 1px solid #333;
            border-collapse: collapse;
            padding: 8px;
        }

        .update-btn {
            display: inline-block;
            padding: 4px 8px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-family: Arial, sans-serif;
            margin-right: 4px;
        }

        .update-btn:hover {
            background-color: #1e7e34;
        }

        .delete-btn {
            display: inline-block;
            padding: 4px 8px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            font-family: Arial, sans-serif;
        }

        .delete-btn:hover {
            background-color: #b02a37;
        }
    </style>
</head>
<body>
    <a href="create.php" class="create-btn">Create New Account</a>

    <h1>Account List</h1>

    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Fullname</th>
                <th>LastLogin</th>
                <th>Actions</th> <!-- Actions column -->
            </tr>
        </thead>
        <tbody>
            <?php
            $conn = new mysqli('localhost', 'root', '', 'demo');

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT id, email, phone, fullname, last_login FROM accounts";
            $result = $conn->query($sql);

            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_array(MYSQLI_NUM)) {
                    ?>
                    <tr>
                        <td><?php echo htmlspecialchars($row[0]); ?></td>
                        <td><?php echo htmlspecialchars($row[1]); ?></td>
                        <td><?php echo htmlspecialchars($row[2]); ?></td>
                        <td><?php echo htmlspecialchars($row[3]); ?></td>
                        <td>
                            <?php
                            if (!is_null($row[4])) {
                                $timestamp = strtotime($row[4]);
                                $formattedDate = date('d/M/Y', $timestamp);
                                echo htmlspecialchars($formattedDate);
                            } else {
                                echo "N/A";
                            }
                            ?>
                        </td>
                        <td>
                            <a href="update.php?id=<?php echo urlencode($row[0]); ?>" class="update-btn">Update</a>
                            <a href="delete.php?id=<?php echo urlencode($row[0]); ?>" class="delete-btn" onclick="return confirm('Are you sure you want to delete this account?');">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                $result->free_result();
            } else {
                ?>
                <tr>
                    <td colspan="6">No Accounts</td>
                </tr>
                <?php
            }

            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>

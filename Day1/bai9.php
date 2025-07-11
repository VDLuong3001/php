<!DOCTYPE html>
<html>
<head>
    <title>Palindrome Checker</title>
</head>
<body>
    <h2>Check if a Number is Palindrome</h2>
    <form method="post">
        Enter a number: <input type="number" name="number" required>
        <input type="submit" value="Check">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["number"];
        $reversed = strrev($num);

        if ($num == $reversed) {
            echo "<p>$num is a <strong>Palindrome</strong></p>";
        } else {
            echo "<p>$num is <strong>Not Palindrome</strong></p>";
        }
    }
    ?>
</body>
</html>
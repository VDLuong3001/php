<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Maximum Number</title>
</head>
<body>
    <h1>Find the Maximum of 3 Numbers</h1>
    <form action="" method="post">
        <div>
            <label for="num1">Number 1:</label>
            <input type="number" name="num1" id="num1" required>
        </div>
        <div>
            <label for="num2">Number 2:</label>
            <input type="number" name="num2" id="num2" required>
        </div>
        <div>
            <label for="num3">Number 3:</label>
            <input type="number" name="num3" id="num3" required>
        </div>
        <div>
            <input type="submit" name="btnFindMax" value="Find Maximum">
        </div>
    </form>

    <?php
    if (isset($_POST['btnFindMax'])) {
        $num1 = (float)$_POST['num1'];
        $num2 = (float)$_POST['num2'];
        $num3 = (float)$_POST['num3'];

        $maxNum = max($num1, $num2, $num3);

        echo "<h2>The maximum number is: " . $maxNum . "</h2>";
    }
    ?>
</body>
</html>

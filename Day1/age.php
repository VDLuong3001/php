<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculate Age</title>
</head>
<body>
    <h1>Calculate Your Age</h1>
    <form action="" method="post">
        <div>
            <label for="bornYear">Year of Birth:</label>
            <input type="number" name="bornYear" id="bornYear" required>
        </div>
        <div>
            <label for="currentYear">Current Year:</label>
            <input type="number" name="currentYear" id="currentYear" required>
        </div>
        <div>
            <input type="submit" name="btnCalculate" value="Calculate Age">
        </div>
    </form>

    <?php
    if (isset($_POST['btnCalculate'])) {
        $bornYear = (int)$_POST['bornYear'];
        $currentYear = (int)$_POST['currentYear'];

        if ($bornYear > 0 && $currentYear >= $bornYear) {
            $age = $currentYear - $bornYear;
            echo "<h2>Your age is: " . $age . "</h2>";
        } else {
            echo "<h2>Please enter valid years.</h2>";
        }
    }
    ?>
</body>
</html>

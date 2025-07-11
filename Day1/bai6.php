<!DOCTYPE html>
<html>
<head>
    <title>Triangle Perimeter Calculator</title>
</head>
<body>
    <h2>Calculate Perimeter of a Triangle</h2>
    <form method="post">
        Side a: <input type="number" name="a" step="0.01" required><br><br>
        Side b: <input type="number" name="b" step="0.01" required><br><br>
        Side c: <input type="number" name="c" step="0.01" required><br><br>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];

        $perimeter = $a + $b + $c;

        echo "<p>Perimeter of the triangle is <strong>$perimeter</strong></p>";
    }
    ?>
</body>
</html>
ex8
<!DOCTYPE html>
<html>
<head>
    <title>Area of a Circle</title>
</head>
<body>
    <h2>Calculate Area of a Circle</h2>
    <form method="post">
        Enter radius: <input type="number" name="radius" step="0.01" required>
        <input type="submit" value="Calculate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $radius = $_POST["radius"];
        $area = pi() * pow($radius, 2);
        echo "<p>Area of the circle with radius $radius is <strong>$area</strong></p>";
    }
    ?>
</body>
</html>

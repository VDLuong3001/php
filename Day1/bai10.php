<!DOCTYPE html>
<html>
<head>
    <title>Fibonacci Sequence Generator</title>
</head>
<body>
    <h2>Generate Fibonacci Sequence</h2>
    <form method="post">
        Enter number of terms: <input type="number" name="n" min="1" required>
        <input type="submit" value="Generate">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $n = $_POST["n"];
        $fib = [];

        if ($n >= 1) $fib[] = 0;
        if ($n >= 2) $fib[] = 1;

        for ($i = 2; $i < $n; $i++) {
            $fib[] = $fib[$i - 1] + $fib[$i - 2];
        }

        echo "<p>Fibonacci sequence up to $n terms:</p>";
        echo "<strong>" . implode(", ", $fib) . "</strong>";
    }
    ?>
</body>
</html>
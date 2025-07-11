
<!DOCTYPE html>
<html>
<head>
    <title>Count Vowels in a String</title>
</head>
<body>
    <h2>Count Vowels</h2>
    <form method="post">
        Enter a string: <input type="text" name="text" required>
        <input type="submit" value="Count">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $text = $_POST["text"];
        $vowelCount = preg_match_all('/[aeiouAEIOU]/', $text);
        echo "<p>Number of vowels in \"<strong>$text</strong>\": <strong>$vowelCount</strong></p>";
    }
    ?>
</body>
</html>

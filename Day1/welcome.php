<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <form action="" method="post">
        <div>
            <label for="name">Your name</label>
            <input name="name" id="name"/>
        </div>
        <div>
            <input type="submit" name="btnSend" value="Send">
        </div>
    </form>

    <?php
    if (isset($_POST['btnSend'])) {
        $name = ($_POST['name']);
        echo "<h2>Welcome " . $name . "</h2>";
    }
    ?>
</body>
</html>

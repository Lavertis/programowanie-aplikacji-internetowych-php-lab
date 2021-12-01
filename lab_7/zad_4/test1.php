<?php
include_once "User.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test1 - Mechanizm działania sesji</title>
    <style>
        input, label {
            margin: 2px;
        }
    </style>
</head>
<body>
<div>
    <?php
    session_start();
    $user = new User("spacex", "123", "Elon Musk", "elon@spacex.com");
    $_SESSION["user"] = serialize($user);

    echo "<h2>Session ID</h2>";
    echo session_id();
    echo "<h2>\$_SESSION</h2>";
    foreach ($_SESSION as $key => $val) {
        if ($key === "user")
            unserialize($val)->show();
        else
            echo "<p>$key = $val</p>";
    }
    echo "<h2>\$_COOKIE</h2>";
    foreach ($_COOKIE as $key => $val) {
        echo "<p>$key = $val</p>";
    }
    ?>
    <a href="test2.php">Przejdź do strony 2</a>
</div>
</body>
</html>

<?php
include_once "classes/Database.php";
include_once "classes/User.php";
include_once "classes/UserManager.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proces logowania - testLogin.php</title>
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
    $db = new Database("localhost", "root", "", "klienci");

    $sessionId = session_id();
    $userId = $db->select("logged_in_users", "userId", "sessionId='$sessionId'");
    if (!$userId)
        header("location:loginProcess.php");

    echo "<p><a href='loginProcess.php?akcja=wyloguj'>Wyloguj</a></p>";
    echo "<h3>Dane zalogowanego użytkownika</h3>";
    $userData = $db->select("users", "*", "ID=$userId");
    foreach ($userData as $key => $value)
        echo "$key = $value<br>";
    ?>
</div>
</body>
</html>
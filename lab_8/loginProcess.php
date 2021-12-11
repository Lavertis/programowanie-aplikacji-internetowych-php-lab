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
    <title>Proces logowania - loginProcess.php</title>
    <style>
        input, label {
            margin: 2px;
        }
    </style>
</head>
<body>
<div>
    <?php
    $db = new Database("localhost", "root", "", "klienci");
    $userManager = new UserManager();
    //    $user = new User("elon", "musk", "Elon Musk", "elon@spacex.com");
    //    $user = new User("bill", "gates", "Bill Gates", "bill@microsoft.com");
    //    $user->saveToDB($db);

    if (filter_input(INPUT_GET, "akcja") == "wyloguj") {
        $userManager->logout($db);
        header("location:loginProcess.php");
    } else if (filter_input(INPUT_POST, "submit") == "Zaloguj") {
        $userId = $userManager->login($db);
        if ($userId > 0) {
            header("location:testLogin.php");
        } else {
            echo "<p>Błędna nazwa użytkownika lub hasło</p>";
            $userManager->loginForm();
        }
    } else
        $userManager->loginForm();
    ?>
</div>
</body>
</html>
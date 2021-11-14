<?php
include_once "classes/User.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tworzenie obiektów klasy User</title>
</head>
<body>
<div>
    <h2>Tworzenie obiektów klasy User</h2>
    <div>
        <?php
        $user1 = new User("kp", "123", "Kubus Puchatek", "kubus@stumilowylas.pl");
        $user1->show();
        echo "<br><br>";
        $user2 = new User("pk", "123", "Prosiaczek", "prosiaczek@stumilowylas.pl");
        $user2->show();
        $user2->setUserName("admin");
        $user2->setStatus(User::STATUS_ADMIN);
        echo "<br>";
        $user2->show();
        ?>
    </div>
</div>
</body>
</html>
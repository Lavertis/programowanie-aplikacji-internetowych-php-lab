<?php
include_once "RegistrationForm.php";
include_once "Database.php";
include_once "User.php"
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formularz rejestracji</title>
    <style>
        input, label {
            margin: 2px;
        }
    </style>
</head>
<body>
<div>
    <div>
        <?php
        $db = new Database("localhost", "root", "", "klienci");
        $registrationForm = new RegistrationForm();
        if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
            $user = $registrationForm->checkUser();
            if ($user === NULL)
                echo "<p>Niepoprawne dane rejestracji.</p>";
            else {
                echo "<p>Poprawne dane rejestracji:</p>";
                $user->show();
                $user->saveToDB($db);
            }
        }
        ?>
    </div>
    <br>
    <div>
        <h2>Users from DB</h2>
        <?php
        User::showAllUsersFromDB($db);
        ?>
    </div>
</div>
</body>
</html>
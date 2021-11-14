<?php
include_once "classes/RegistrationForm.php";
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
        $registrationForm = new RegistrationForm();
        if (filter_input(INPUT_POST, 'submit', FILTER_SANITIZE_FULL_SPECIAL_CHARS)) {
            $user = $registrationForm->checkUser();
            if ($user === NULL)
                echo "<p>Niepoprawne dane rejestracji.</p>";
            else {
                echo "<p>Poprawne dane rejestracji:</p>";
                $user->show();
            }
        }
        ?>
    </div>
</div>
</body>
</html>
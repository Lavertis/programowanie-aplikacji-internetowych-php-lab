<?php
include_once "functions.php";
include_once "classes/DatabasePDO.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zamówienie</title>
</head>
<body>
<div>
    <h2>Formularz zamówienia</h2>
    <form action="index.php" method="post">
        <table>
            <tr>
                <td><label for="surname">Nazwisko:</label></td>
                <td><input type="text" name="surname" id="surname"></td>
            </tr>
            <tr>
                <td><label for="age">Wiek</label></td>
                <td><input type="number" name="age" id="age"></td>
            </tr>
            <tr>
                <td><label for="country">Kraj</label></td>
                <td>
                    <select name="country" id="country" aria-label="Country select">
                        <option selected disabled hidden></option>
                        <option value="Czechy">Czechy</option>
                        <option value="Niemcy">Niemcy</option>
                        <option value="Polska">Polska</option>
                        <option value="Wielka Brytania">Wielka Brytania</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="email">Adres e-mail</label></td>
                <td><input type="text" name="email" id="email"></td>
            </tr>
        </table>

        <h4>Zamawiam tutorial z języka:</h4>
        <div>
            <?php
            $courses = ["CPP", "Java", "PHP"];
            foreach ($courses as $course) {
                echo "<input type='checkbox' name='courses[]' value='$course' id='$course'>";
                echo "<label for='courses[]'>$course </label>";
            }
            ?>
        </div>

        <h4>Sposób płatności:</h4>
        <div>
            <input type="radio" name="payment" id="mastercard" value="Master Card">
            <label for="mastercard">Master Card</label>
            <input type="radio" name="payment" id="visa" value="Visa">
            <label for="visa">Visa</label>
            <input type="radio" name="payment" id="transfer" value="Przelew">
            <label for="transfer">Przelew</label>
        </div>
        <br>

        <div>
            <button type="reset" name="reset" value="clear">Wyczyść</button>
            <button type="submit" name="submit" value="add-new-client">Zapisz</button>
            <button type="submit" name="submit" value="show-all-clients">Pokaż</button>
            <button type="submit" name="submit" value="show-php-clients">PHP</button>
            <button type="submit" name="submit" value="show-cpp-clients">CPP</button>
            <button type="submit" name="submit" value="show-java-clients">Java</button>
            <button type="submit" name="submit" value="statistics">Statystyki</button>
        </div>
    </form>
    <br>

    <div>
        <?php
        $db = new DatabasePDO("mysql:host=localhost;dbname=klienci", "root", "");
        actionSwitcher($db);
        ?>
    </div>

</div>
</body>
</html>
<?php
include_once "funkcje.php";
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
    <form action="pliki.php" method="post">
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
                        <option value="Poland">Polska</option>
                        <option value="Germany">Niemcy</option>
                        <option value="Great Britain">Wielka Brytania</option>
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
            $courses = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
            foreach ($courses as $course) {
                echo "<input type='checkbox' name='courses[]' value='$course' id='$course'>";
                echo "<label for='courses[]'>$course </label>";
            }
            ?>
        </div>

        <h4>Sposób płatności:</h4>
        <div>
            <input type="radio" name="payment" id="eurocard" value="eurocard">
            <label for="eurocard">Eurocard</label>
            <input type="radio" name="payment" id="visa" value="visa">
            <label for="visa">Visa</label>
            <input type="radio" name="payment" id="transfer" value="transfer">
            <label for="transfer">Przelew bankowy</label>
        </div>
        <br>

        <div>
            <button type="reset" name="reset" value="clear">Wyczyść</button>
            <button type="submit" name="submit" value="save">Zapisz</button>
            <button type="submit" name="submit" value="show">Pokaż</button>
            <button type="submit" name="submit" value="php">PHP</button>
            <button type="submit" name="submit" value="cpp">CPP</button>
            <button type="submit" name="submit" value="java">Java</button>
            <button type="submit" name="submit" value="statistics">Statystyki</button>
        </div>
    </form>
    <br>

    <div>
        <?php
        actionSwitcher();
        ?>
    </div>

</div>
</body>
</html>
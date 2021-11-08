<?php
const filePath = "ankieta.txt";
const languages = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];

function initializeSurveyResults()
{
    $data = "";
    foreach (languages as $language)
        $data .= "$language:0" . PHP_EOL;
    $data = rtrim($data, PHP_EOL);
    file_put_contents(filePath, $data) or die("Unable to open file!");
}

function saveSurveyResponse()
{
    $surveyResponse = filter_input(INPUT_POST, "languages", FILTER_SANITIZE_FULL_SPECIAL_CHARS, FILTER_REQUIRE_ARRAY);
    if (!$surveyResponse) return;

    $fileLines = explode(PHP_EOL, file_get_contents(filePath));
    $surveyResults = [];
    foreach ($fileLines as $line) {
        list($lang, $count) = explode(":", $line);
        $surveyResults[$lang] = intval($count);
    }

    foreach ($surveyResponse as $item) {
        if (array_key_exists($item, $surveyResults))
            $surveyResults[$item]++;
    }

    $data = "";
    foreach ($surveyResults as $key => $val) {
        $data .= "$key:$val" . PHP_EOL;
    }
    $data = rtrim($data, PHP_EOL);
    file_put_contents(filePath, $data) or die("Unable to open file!");
}

function showResults()
{
    $fileLines = explode(PHP_EOL, file_get_contents(filePath));
    echo "<table style='text-align: center'>";
    echo "<tr><th>Language</th><th>Votes</th></tr>";
    foreach ($fileLines as $line) {
        list($lang, $votes) = explode(":", $line);
        echo "<tr><td>$lang</td><td>$votes</td></tr>";
    }
    echo "</table>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ankieta</title>
</head>
<body>
<div>
    <h2>Wybierz technologie, które znasz</h2>
    <form action="ankieta.php" method="post">
        <div>
            <?php
            foreach (languages as $language) {
                echo "<div><input type='checkbox' name='languages[]' value='$language' id='$language'>";
                echo "<label for='languages[]'>$language </label></div>";
            }
            ?>
        </div>
        <br>
        <div>
            <button type="submit" name="submit" value="send">Wyślij</button>
        </div>
    </form>
    <br>
    <div>
        <?php
        $sent = filter_input(INPUT_POST, "submit", FILTER_VALIDATE_REGEXP, ["options" => ["regexp" => "/^send$/"]]);
        if (!file_exists(filePath) || file_get_contents(filePath) === "") {
            initializeSurveyResults();
        } else if ($sent) {
            saveSurveyResponse();
            header("location: ankieta.php");
        }

        showResults();
        ?>
    </div>
</div>
</body>
</html>
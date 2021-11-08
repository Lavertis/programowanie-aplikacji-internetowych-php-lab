<?php
const filePath = "dane.txt";

function actionSwitcher()
{
    $action = filter_input(INPUT_POST, "submit");
    if (!$action) return;

    switch ($action) {
        case "save":
            receiveOrder();
            break;
        case "show":
            showAllOrders();
            break;
        case "php":
            showOrdersWithCourse("php");
            break;
        case "cpp":
            showOrdersWithCourse("cpp");
            break;
        case "java":
            showOrdersWithCourse("java");
            break;
    }
}

function validateData(): array
{
    $args = [
        'surname' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'age' => ['filter' => FILTER_VALIDATE_INT, 'options' => ['min_range' => 12, 'max_range' => 40]],
        'country' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[^@]+@[^@]+\.[^@]+$/']],
        'courses' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY],
        'payment' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^(eurocard|visa|transfer)$/']]
    ];

    $dataArr = filter_input_array(INPUT_POST, $args); // przefiltruj dane z GET/POST zgodnie z ustawionymi w $args filtrami
    var_dump($dataArr); // pokaż tablicę po przefiltrowaniu – sprawdź wyniki filtrowania
    $errors = ""; // sprawdź, czy dane w tablicy $dane nie zawierają błędów walidacji

    foreach ($dataArr as $key => $val) {
        if ($val === false or $val === NULL)
            $errors .= $key . " ";
    }

    $isDataCorrect = ($errors === "");
    return [$isDataCorrect, $dataArr, $errors];
}

function receiveOrder()
{
    echo "<h3>Dodawanie do pliku:</h3>";
    list($isDataCorrect, $dataArr, $errors) = validateData();

    if ($isDataCorrect)
        saveOrderToFile($dataArr);
    else
        echo "<br>Niepoprawne dane: $errors";
}

function saveOrderToFile($dataArr)
{
    $data = ""; // zbierz wartości z tablicy danych (parametr $dataArr)
    foreach ($dataArr as $val) {
        if (is_array($val))
            $data .= implode(",", $val);
        else
            $data .= $val;
        $data .= " ";
    }
    $data = trim($data);
    $data .= PHP_EOL; // dodaj koniec linii za pomocą stałej PHP

    $file = fopen(filePath, "a") or die("Unable to open file!");
    fwrite($file, $data); // wykonaj operacje zapisu do pliku o zadanej nazwie:
    fclose($file);

    echo "<p>Zapisano: <br />$data</p>";
}

function showAllOrders()
{
    $array = file(filePath) or die("Unable to open file!");
    foreach ($array as $line) {
        echo "<div>$line</div>";
    }
}

function showOrdersWithCourse($course)
{
    $array = file(filePath) or die("Unable to open file!");
    foreach ($array as $line) {
        if (stripos($line, $course))
            echo "<div>$line</div>";
    }
}
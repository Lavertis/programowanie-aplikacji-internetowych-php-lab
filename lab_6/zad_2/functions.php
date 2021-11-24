<?php

function actionSwitcher(Database $db)
{
    $action = filter_input(INPUT_POST, "submit");
    if (!$action) return;

    switch ($action) {
        case "show-all-clients" :
            showAllClients($db);
            break;
        case "add-new-client" :
            echo addNewClient($db);
            break;
        case "delete-client":
            echo deleteClient($db);
            break;
        case "show-cpp-clients":
            showClientsWithOrder($db, "CPP");
            break;
        case "show-java-clients":
            showClientsWithOrder($db, "Java");
            break;
        case "show-php-clients":
            showClientsWithOrder($db, "PHP");
            break;
        case "statistics":
            showStatistics($db);
            break;
    }
}

function getClientsInHtmlTable(array $fields, array $clients): string
{
    $data = "<table style='text-align: center'>";
    $data .= "<tr>";
    foreach ($fields as $field)
        $data .= "<th>$field</th>";
    $data .= "</tr>";

    foreach ($clients as $client) {
        $data .= "<tr>";
        foreach ($fields as $field)
            $data .= "<td>" . $client[$field] . "</td>";
        $data .= "</tr>";
    }
    $data .= "</table>";

    return $data;
}

function showAllClients(Database $db)
{
    $fields = ["Id", "Nazwisko", "Zamowienie"];
    $clients = $db->select("klienci", $fields);
    echo getClientsInHtmlTable($fields, $clients);
}

function showClientsWithOrder(Database $db, string $order)
{
    $fields = ["Id", "Nazwisko", "Zamowienie"];
    $clients = $db->select("klienci", $fields, "Zamowienie LIKE '%$order%'");
    echo getClientsInHtmlTable($fields, $clients);
}

function getValidatedData(): array
{
    $args = [
        'surname' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^[A-Z]{1}[a-ząęłńśćźżó-]{1,25}$/']],
        'age' => ['filter' => FILTER_VALIDATE_INT, 'options' => ['min_range' => 12, 'max_range' => 60]],
        'country' => FILTER_SANITIZE_FULL_SPECIAL_CHARS,
        'email' => FILTER_VALIDATE_EMAIL,
        'courses' => ['filter' => FILTER_SANITIZE_FULL_SPECIAL_CHARS, 'flags' => FILTER_REQUIRE_ARRAY],
        'payment' => ['filter' => FILTER_VALIDATE_REGEXP, 'options' => ['regexp' => '/^(Master Card|Visa|Przelew)$/']]
    ];

    $dataArr = filter_input_array(INPUT_POST, $args);
    var_dump($dataArr);
    $errors = "";

    foreach ($dataArr as $key => $val) {
        if ($val === false or $val === NULL)
            $errors .= $key . " ";
    }

    $isDataCorrect = ($errors === "");
    return [$isDataCorrect, $dataArr, $errors];
}

function addNewClient(Database $db): ?string
{
    echo "<h3>Dodawanie do bazy danych:</h3>";
    list($isDataCorrect, $data, $errors) = getValidatedData();
    if (!$isDataCorrect) {
        echo "<br>Niepoprawne dane: $errors";
        return null;
    }
    $fields = ["Nazwisko", "Wiek", "Panstwo", "Email", "Zamowienie", "Platnosc"];
    $values = [];
    foreach ($data as $item) {
        if (is_array($item))
            array_push($values, "'" . implode(",", $item) . "'");
        else
            array_push($values, "'" . $item . "'");
    }
    return $db->insert("klienci", $fields, $values);
}

function deleteClient(Database $db): string
{
    $id = filter_input(INPUT_POST, "id", FILTER_VALIDATE_INT);
    $db->delete("klienci", $id);
    return "Usunięto Id = $id, jeśli takie było.";
}

function showStatistics(Database $db)
{
    $data = $db->select("klienci", "Wiek");
    $orderCount = count($data);
    $ageBelow18Count = 0;
    $ageBiggerOrEqualThan50Count = 0;
    foreach ($data as $item) {
        $age = intval($item["Wiek"]);
        if ($age < 18)
            $ageBelow18Count++;
        else if ($age >= 50)
            $ageBiggerOrEqualThan50Count++;
    }
    echo "<p>Liczba wszystkich zamówień: $orderCount</p>";
    echo "<p>Liczba zamówień od osób w wieku < 18 lat: $ageBelow18Count</p>";
    echo "<p>Liczba zamówień od osób w wieku >= 50 lat: $ageBiggerOrEqualThan50Count</p>";
}
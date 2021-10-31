<?php
function actionSwitcher()
{
    if (!isset($_POST["submit"])) return;
    $action = $_POST["submit"];
    switch ($action) {
        case "save":
            saveOrder();
            break;
        case "show":
            showAllOrders();
            break;
        case"php":
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

function saveOrder()
{
    $keys = ["surname", "age", "country", "email", "courses", "payment"];
    $data = "";
    foreach ($keys as $key) {
        if (!isset($_POST[$key]) || $_POST[$key] == "") return;

        if (is_array($_POST[$key]))
            $data .= implode(",", $_POST[$key]) . " ";
        else
            $data .= $_POST[$key] . " ";
        $data .= "\n";
    }
    $file = fopen("dane.txt", "a") or die("Unable to open file!");
    fwrite($file, $data);
    fclose($file);
}

function showAllOrders()
{
    $array = file("dane.txt") or die("Unable to open file!");
    foreach ($array as $line) {
        echo "<div>$line</div>";
    }
}

function showOrdersWithCourse($course)
{
    $array = file("dane.txt") or die("Unable to open file!");
    foreach ($array as $line) {
        if (stripos($line, $course))
            echo "<div>$line</div>";
    }
}
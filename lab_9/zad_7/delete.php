<?php
include_once '../Database.php';
$db = new Database('localhost', 'root', '', 'test');
if (isset($_POST['id']))
    if ($db->delete("strony", "id", $db->protect_int($_POST['id'])))
        echo 'Skasowano rekord o id=' . $_POST['id'];
    else
        echo 'Nie można skasować rekordu!';
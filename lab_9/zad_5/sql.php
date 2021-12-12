<?php
include_once '../Database.php';
$db = new Database('localhost', 'root', '', 'test');
if (isset($_POST['id'])) {
    echo "Wybrany:<br>";
    $id = $db->protect_string($_POST['id']);
    echo "SQL: SELECT tytul FROM strony WHERE id='$id';<br><br>";
    echo $db->stockSelect('SELECT id, tytul FROM strony WHERE id="' . $id . '";', ['id', 'tytul']);
} else {
    echo "<form action='sql.php' method='post'>";
    echo "Wpisz numer ID do pokazania: <input type='text' name='id'>";
    echo "<input type='submit' value='Uruchom'><br>";
    echo "Wszystkie:<br>";
    echo $db->stockSelect('SELECT id, tytul FROM strony;', ['id', 'tytul']);
}
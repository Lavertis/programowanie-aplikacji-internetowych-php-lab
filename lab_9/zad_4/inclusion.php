<?php
if (isset($_GET['plik'])) {
    $file = str_replace('\\', '/', $_GET['plik']);
    $file = str_replace('.', '/', $file);
    $fileArr = explode('/', $file);
    $file = $fileArr[count($fileArr) - 1];
    include($file . '.txt');
} else {
    echo 'Nie podano pliku!';
}
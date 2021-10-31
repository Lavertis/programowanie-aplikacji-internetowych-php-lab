<?php
function showPhotoLinks()
{
    echo '<a href="' . $_GET['pic'] . '">Zdjęcie</a><br/>';
    echo '<a href="mini-' . $_GET['pic'] . '">Miniatura</a><br/><br/>';
    echo '<a href="zdjecia.html">Powrót</a>';
}

function managePhotoUpload()
{
    if (!is_uploaded_file($_FILES["photo"]["tmp_name"]))
        return;

    $type = $_FILES["photo"]["type"];
    if ($type == "image/jpeg") {
        $fileName = doStuffWithPhoto();
        header('Content-Type: image/jpeg');
        header("location:zdjecia.php?pic=$fileName");
    } else {
        header('location:zdjecia.html');
    }
}

function doStuffWithPhoto(): string
{
    move_uploaded_file($_FILES['photo']['tmp_name'], './' . $_FILES['photo']['name']);
    $fileName = strtolower($_FILES['photo']['name']);
    $maxWidth = $_POST['width']; // szerokość preferowana przez użytkownika
    $maxHeight = $_POST['height']; // wysokość preferowana przez użytkownika
    list($newW, $newH) = calculateNewDimensions($maxWidth, $maxHeight, $fileName);
    scalePhoto($newW, $newH, $fileName);
    return $fileName;
}

function calculateNewDimensions($maxWidth, $maxHeight, $fileName): array
{
    $scaleY = 1;
    $scaleX = 1;
    list($width, $height) = getimagesize($fileName); // pobranie rozmiarów obrazu
    if ($width > $maxWidth) $scaleX = $maxWidth / $width;
    if ($height > $maxHeight) $scaleY = $maxHeight / $height;
    if ($scaleY <= $scaleX) $scale = $scaleY;
    else $scale = $scaleX;
    $newH = $height * $scale;
    $newW = $width * $scale;
    return [$newW, $newH];
}

function scalePhoto($newW, $newH, $fileName)
{
    $random = uniqid('img_'); // wygenerowanie losowej nazwy zdjęcia
    $tempFileName = $random . '.jpg';
    copy($fileName, './' . $tempFileName); // utworzenie kopii zdjęcia
    $new = imagecreatetruecolor($newW, $newH); // czarny obraz
    $picture = imagecreatefromjpeg($tempFileName);
    list($width, $height) = getimagesize($tempFileName);
    imagecopyresampled($new, $picture, 0, 0, 0, 0, $newW, $newH, $width, $height);
    imagejpeg($new, './mini-' . $fileName, 100);
    imagedestroy($new);
    imagedestroy($picture);
    unlink($tempFileName);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odbiór zdjęć</title>
</head>
<body>
<div>
    <?php
    if (isset($_GET['pic']) && !empty($_GET['pic']))
        showPhotoLinks();
    elseif (isset($_POST["save"]) && !isset($_GET["pic"]))
        managePhotoUpload();
    ?>
</div>
</body>
</html>
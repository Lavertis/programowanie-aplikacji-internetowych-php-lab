<?php
function showPhotoLinks()
{
    echo '<a href="' . $_GET['pic'] . '.jpg">Zdjęcie</a><br/>';
    echo '<a href="' . $_GET['pic'] . '_thumbnail.jpg">Miniatura</a><br/><br/>';
    echo '<a href="zdjecia.html">Powrót</a>';
}

function redirectToPhotoLinksPage()
{
    if (!is_uploaded_file($_FILES["photo"]["tmp_name"]))
        return;

    $type = $_FILES["photo"]["type"];
    if ($type == "image/jpeg") {
        $fileName = managePhoto();
        header('Content-Type: image/jpeg');
        header("location:zdjecia.php?pic=$fileName");
    } else {
        header('location:zdjecia.html');
    }
}

function managePhoto(): string
{
    $fileName = strtolower($_FILES['photo']['name']);
    move_uploaded_file($_FILES['photo']['tmp_name'], "./$fileName");
    $maxWidth = $_POST['width']; // szerokość preferowana przez użytkownika
    $maxHeight = $_POST['height']; // wysokość preferowana przez użytkownika
    list($newW, $newH) = getNewDimensions($maxWidth, $maxHeight, $fileName);
    createThumbnail($newW, $newH, $fileName);
    return pathinfo($fileName)["filename"];
}

function getNewDimensions($maxWidth, $maxHeight, $fileName): array
{
    $scaleX = $scaleY = 1;
    list($width, $height) = getimagesize($fileName); // pobranie rozmiarów obrazu
    if ($width > $maxWidth) $scaleX = $maxWidth / $width;
    if ($height > $maxHeight) $scaleY = $maxHeight / $height;
    if ($scaleY <= $scaleX) $scale = $scaleY;
    else $scale = $scaleX;
    $newH = $height * $scale;
    $newW = $width * $scale;
    return [$newW, $newH];
}

function createThumbnail($newW, $newH, $fileName)
{
    $image = imagecreatefromjpeg($fileName);
    $thumbnail = imagescale($image, $newW, $newH);
    $name = pathinfo($fileName)["filename"];
    imagejpeg($thumbnail, $name . "_thumbnail.jpg", 100);
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
        redirectToPhotoLinksPage();
    ?>
</div>
</body>
</html>
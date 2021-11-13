<?php
const imgDir = "./images/";
const thumbnailDir = "./thumbnails/";

function showGallery()
{
    $files = glob(imgDir . "*.jpg");
    foreach ($files as $file) {
        $path_parts = pathinfo($file);
        $thumbnailPath = thumbnailDir . $path_parts['filename'] . "_thumbnail.jpg";
        $photoPath = imgDir . $path_parts['filename'] . ".jpg";
        echo "<a href='$photoPath'><img src='$thumbnailPath' alt='" . $path_parts['basename'] . "'></a>";
    }

    $photosCount = count($files);
    echo "<h3>W galerii jest aktualnie $photosCount zdjęć</h3>";
    echo '<a href="zdjecia.html">Powrót do formularza dodawania zdjęć</a>';
}

function manageUploadedPhoto()
{
    if (!is_uploaded_file($_FILES["photo"]["tmp_name"])) {
        header('location:zdjecia.html');
        return;
    }
    if (!isset($_POST["width"]) || !isset($_POST["height"]) || $_POST["width"] == "" || $_POST["height"] == "") {
        header('location:zdjecia.html');
        return;
    }
    if ($_FILES["photo"]["type"] != "image/jpeg") {
        header('location:zdjecia.html');
        return;
    }
    if (!file_exists(imgDir))
        mkdir(imgDir);
    if (!file_exists(thumbnailDir))
        mkdir(thumbnailDir);

    $fileName = strtolower($_FILES['photo']['name']);
    $filePath = imgDir . $fileName;
    move_uploaded_file($_FILES['photo']['tmp_name'], $filePath);
    $maxWidth = $_POST['width']; // szerokość preferowana przez użytkownika
    $maxHeight = $_POST['height']; // wysokość preferowana przez użytkownika
    list($newW, $newH) = getNewDimensions($maxWidth, $maxHeight, $filePath);
    createThumbnail($newW, $newH, $filePath);
}

function getNewDimensions($maxWidth, $maxHeight, $filePath): array
{
    $scaleX = $scaleY = 1;
    list($width, $height) = getimagesize($filePath); // pobranie rozmiarów obrazu
    if ($width > $maxWidth) $scaleX = $maxWidth / $width;
    if ($height > $maxHeight) $scaleY = $maxHeight / $height;
    if ($scaleY <= $scaleX) $scale = $scaleY;
    else $scale = $scaleX;
    $newH = $height * $scale;
    $newW = $width * $scale;
    return [$newW, $newH];
}

function createThumbnail($newW, $newH, $filePath)
{
    $fileName = substr($filePath, strrpos($filePath, '/'));
    $image = imagecreatefromjpeg($filePath);
    $thumbnail = imagescale($image, $newW, $newH);
    $name = pathinfo($fileName)["filename"];
    $thumbnailPath = thumbnailDir . $name . "_thumbnail.jpg";
    imagejpeg($thumbnail, $thumbnailPath, 100);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Odbiór zdjęć</title>
    <style>
        img {
            margin: 3px;
        }
    </style>
</head>
<body>
<div>
    <h1>Galeria zdjęć</h1>
    <?php
    if (isset($_POST["save"]))
        manageUploadedPhoto();
    showGallery();
    ?>
</div>
</body>
</html>
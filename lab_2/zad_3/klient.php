<?php
# Debug
//$_POST["surname"] = "Kowalski";
//$_POST["age"] = "20";
//$_POST["country"] = "Poland";
//$_POST["email"] = "email@gmail.com";
//$_POST["payment"] = "visa";
//$_REQUEST["courses"] = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"></script>
    <title>Dane klienta</title>
    <style>
    </style>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Dane klienta</h1>
    <div class="mx-auto" style="width: fit-content">
        <?php
        if (isset($_GET["surname"]) && $_GET["surname"] != "")
            echo "<div>Nazwisko: " . htmlspecialchars(trim($_GET["surname"])) . "</div>";
        if (isset($_GET["age"]) && $_GET["age"] != "")
            echo "<div>Wiek: " . htmlspecialchars(trim($_GET["age"])) . "</div>";
        if (isset($_GET["country"]) && $_GET["country"] != "")
            echo "<div>Kraj: " . htmlspecialchars(trim($_GET["country"])) . "</div>";
        if (isset($_GET["email"]) && $_GET["email"] != "")
            echo "<div>Email: " . htmlspecialchars(trim($_GET["email"])) . "</div>";
        ?>
    </div>
</div>
</body>
</html>
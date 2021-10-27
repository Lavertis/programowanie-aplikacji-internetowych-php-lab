<?php
# Debug
//$_POST["php"] = "on";
//$_POST["java"] = "on";
//$_POST["surname"] = "Kowalski";
//$_POST["age"] = "20";
//$_POST["country"] = "Poland";
//$_POST["email"] = "email@gmail.com";
//$_POST["payment"] = "visa";
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
    <title>Odebrane</title>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Dane odebrane z formularza</h1>
    <div class="mx-auto" style="width: fit-content">
        <?php
        $courses = [];
        if (isset($_POST["php"]) && $_POST["php"] != "")
            $courses[] = "php";
        if (isset($_POST["c/cpp"]) && $_POST["c/cpp"] != "")
            $courses[] = "c/cpp";
        if (isset($_POST["java"]) && $_POST["java"] != "")
            $courses[] = "java";

        if (isset($_POST["surname"]) && $_POST["surname"] != "")
            echo "<div>Nazwisko: " . htmlspecialchars(trim($_POST["surname"])) . "</div>";
        if (isset($_POST["age"]) && $_POST["age"] != "")
            echo "<div>Wiek: " . htmlspecialchars(trim($_POST["age"])) . "</div>";
        if (isset($_POST["country"]) && $_POST["country"] != "")
            echo "<div>Kraj: " . htmlspecialchars(trim($_POST["country"])) . "</div>";
        if (isset($_POST["email"]) && $_POST["email"] != "")
            echo "<div>Email: " . htmlspecialchars(trim($_POST["email"])) . "</div>";
        echo "<div>Tutoriale: " . implode(", ", $courses) . "</div>";
        if (isset($_POST["payment"]) && $_POST["payment"] != "")
            echo "<div>Sposób płatności: " . htmlspecialchars(trim($_POST["payment"])) . "</div>";

        ?>
        <p class="mt-2"><a href='formularz1.html'>Powrót do formularza</a></p>
    </div>
</div>
</body>
</html>
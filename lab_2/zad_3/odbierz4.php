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
    <title>Odebrane</title>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Dane odebrane z formularza</h1>
    <div class="mx-auto" style="width: fit-content">
        <?php
        if (isset($_REQUEST["courses"]) && count($_REQUEST["courses"]) > 0)
            echo "<div>Tutoriale: " . implode(", ", $_REQUEST["courses"]) . "</div>";
        if (isset($_POST["payment"]) && $_POST["payment"] != "")
            echo "<div>Sposób płatności: " . htmlspecialchars(trim($_POST["payment"])) . "</div>";

        $customer_data = true;
        $surname = $age = $country = $email = null;
        if (isset($_POST["surname"]) && $_POST["surname"] != "") {
            $surname = htmlspecialchars(trim($_POST["surname"]));
        } else $customer_data = false;

        if (isset($_POST["age"]) && $_POST["age"] != "") {
            $age = htmlspecialchars(trim($_POST["age"]));
        } else $customer_data = false;

        if (isset($_POST["country"]) && $_POST["country"] != "") {
            $country = htmlspecialchars(trim($_POST["country"]));
        } else $customer_data = false;

        if (isset($_POST["email"]) && $_POST["email"] != "") {
            $email = htmlspecialchars(trim($_POST["email"]));
        } else $customer_data = false;

        if ($customer_data) {
            $data = ["surname" => $surname, "age" => $age, "country" => $country, "email" => $email];
            $url = "klient.php?".http_build_query($data);
            echo "<p class='h5 my-3'><a href='$url'>Dane klienta</a></p>";
        } else {
            echo "<p class='h5 my-3'>Brak danych klienta</p>";
        }
        echo "<p><a href='formularz4.php'>Powrót do formularza</a></p>";
        ?>
    </div>
</div>
</body>
</html>
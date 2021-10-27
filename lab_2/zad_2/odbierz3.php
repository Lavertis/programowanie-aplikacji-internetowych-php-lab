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
    <div class="col-10 col-sm-8 col-md-6 mx-auto">
        <?php

        if (isset($_POST["surname"]) && $_POST["surname"] != "")
            echo "<div>Nazwisko: " . htmlspecialchars(trim($_POST["surname"])) . "</div>";
        if (isset($_POST["age"]) && $_POST["age"] != "")
            echo "<div>Wiek: " . htmlspecialchars(trim($_POST["age"])) . "</div>";
        if (isset($_POST["country"]) && $_POST["country"] != "")
            echo "<div>Kraj: " . htmlspecialchars(trim($_POST["country"])) . "</div>";
        if (isset($_POST["email"]) && $_POST["email"] != "")
            echo "<div>Email: " . htmlspecialchars(trim($_POST["email"])) . "</div>";

        if (isset($_REQUEST["courses"]) && count($_REQUEST["courses"]) > 0) {
            $str = "";
            foreach ($_REQUEST["courses"] as $course) {
                $str .= htmlspecialchars(trim($course)) . ", ";
            }
            $str = rtrim($str, ", ");
            echo "<div>Tutoriale: $str (foreach)</div>";
            echo "<div>Tutoriale: " . join(", ", $_REQUEST["courses"]) . " (join)</div>";
            echo "<div>Tutoriale: " . implode(", ", $_REQUEST["courses"]) . " (implode)</div>";
        }

        if (isset($_POST["payment"]) && $_POST["payment"] != "")
            echo "<div>Sposób płatności: " . htmlspecialchars(trim($_POST["payment"])) . "</div>";

        echo "<br>";
        var_dump($_REQUEST);
        echo "<br>";
        ?>

        <h3 class="text-center mt-5">$_REQUEST</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_REQUEST as $key => $value)
                if (is_array($value)) {
                    $arr = htmlspecialchars(implode(", ", $value));
                    echo "<tr><td>" . htmlspecialchars(trim($key)) . "</td><td>$arr</td></tr>";
                } else {
                    echo "<tr><td>" . htmlspecialchars(trim($key)) . "</td><td>" . htmlspecialchars(trim($value)) . "</td></tr>";
                }
            ?>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
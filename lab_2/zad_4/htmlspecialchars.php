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
    <title>Test htmlspecialchars()</title>
    <style>
    </style>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">htmlspecialchars()</h1>
    <div class="mx-auto" style="width: fit-content">
        <?php
        if (isset($_POST['text']) && $_POST['text'] != "") {
            $text = $_POST['text'];
            print "Original: $text <br/>";
            print "htmlspecialcharred: " . htmlspecialchars($text) . "<br/>";
            print "<a href='htmlspecialchars.php'> Powrót do formularza</a>";
        } else {
            print "Podaj tekst :<form method='post' action='htmlspecialchars.php'>";
            print "<div class='input-group'><input type='text' name='text' size='30' class='form-control' />";
            print "<input type='submit' value='Wyślij' class='btn btn-primary'/></div>";
            print "</form>";
        }
        ?>
    </div>
</div>
</body>
</html>
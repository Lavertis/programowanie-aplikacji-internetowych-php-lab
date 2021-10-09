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
    <title>Pierwszy skrypt PHP</title>
</head>
<body>
<div class="container my-4">
    <?php
    echo "<h2 class='text-center mb-4'>Pierwszy skrypt PHP</h2>";
    $n = 4567;
    $x = 10.123456789;

    echo "<h6>a) z wykorzystaniem operatora łączenia łańcuchów (znak kropki)</h6>";
    echo "<p>n = " . $n . ", x = " . $x . "</p>";

    echo "<h6>b) bez stosowania operatora kropki przy użyciu \" \"</h6>";
    echo "<p>n = $n, x = $x</p>";

    echo "<h6>c) bez stosowania operatora kropki przy użyciu ' '</h6>";
    echo '<p>n = $n, x = $x</p>';

    echo "<h6>d) skorzystaj z funkcji printf() i zastosuj odpowiednie specyfikacje formatu dla wyświetlanych wartości</h6>";
    printf("<p>Zaokrąglenie do liczby całkowitej x = %d<br>", $x);
    printf("Z trzema cyframi po kropce x = %.3lf</p>", $x);
    ?>
</div>
</body>
</html>
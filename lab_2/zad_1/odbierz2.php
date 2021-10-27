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
    <title>Tablice asocjacyjne</title>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center">Tablice asocjacyjne</h1>

    <h3 class="text-center mt-4">$_REQUEST</h3>
    <div class="col-8 mx-auto">
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
                echo "<tr><td>" . htmlspecialchars(trim($key)) . "</td><td>" . htmlspecialchars(trim($value)) . "</td></tr>";
            ?>
            </tbody>
        </table>

        <h3 class="text-center mt-4">$_POST</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_POST as $key => $value)
                echo "<tr><td>" . htmlspecialchars(trim($key)) . "</td><td>" . htmlspecialchars(trim($value)) . "</td></tr>";
            ?>
            </tbody>
        </table>

        <h3 class="text-center mt-4">$_GET</h3>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Key</th>
                <th>Value</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($_GET as $key => $value)
                echo "<tr><td>" . htmlspecialchars(trim($key)) . "</td><td>" . htmlspecialchars(trim($value)) . "</td></tr>";
            ?>
            </tbody>
        </table>

        <?php
        echo "<div class='mb-1 mt-4 fw-bold'>REQUEST</div>";
        var_dump($_REQUEST);
        echo "<div class='mb-1 mt-3 fw-bold'>POST</div>";
        var_dump($_POST);
        echo "<div class='mb-1 mt-3 fw-bold'>GET</div>";
        var_dump($_GET);
        ?>

        <p class="mt-3 text-center"><a href='formularz1.html'>Powrót do formularza</a></p>
    </div>
</div>
</body>
</html>
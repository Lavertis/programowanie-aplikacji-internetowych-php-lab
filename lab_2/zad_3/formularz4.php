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
    <title>Zamówienie</title>
    <style>
    </style>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Formularz zamówienia</h1>
    <form class="col-10 col-sm-8 col-md-6 col-xl-4 mx-auto" action="odbierz4.php" method="post">
        <div class="mb-3">
            <label for="surname" class="form-label">Nazwisko:</label>
            <input type="text" class="form-control" name="surname" id="surname">
        </div>
        <div class="mb-3">
            <label for="age" class="form-label">Wiek</label>
            <input type="number" class="form-control" name="age" id="age">
        </div>
        <div class="mb-3">
            <label for="country" class="form-label">Kraj</label>
            <select class="form-select" name="country" id="country" aria-label="Country select">
                <option selected disabled hidden></option>
                <option value="Poland">Polska</option>
                <option value="Germany">Niemcy</option>
                <option value="Great Britain">Wielka Brytania</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Adres e-mail</label>
            <input type="email" name="email" class="form-control" id="email">
        </div>

        <h5 class="text-center m-4">Zamawiam tutorial z języka:</h5>
        <div>
            <?php
            $courses = ["C", "CPP", "Java", "C#", "HTML", "CSS", "XML", "PHP", "JavaScript"];
            foreach ($courses as $course) {
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' name='courses[]' value='$course' id='$course'>";
                echo "<label class='form-check-label' for='courses[]'>$course</label>";
                echo "</div>";
            }
            ?>
        </div>

        <h5 class="text-center m-4">Sposób płatności:</h5>
        <div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="eurocard" value="eurocard">
                <label class="form-check-label" for="eurocard">Eurocard</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="visa" value="visa">
                <label class="form-check-label" for="visa">Visa</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment" id="transfer" value="transfer">
                <label class="form-check-label" for="transfer">Przelew bankowy</label>
            </div>
        </div>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
            <button class="btn btn-primary me-md-1 btn-success" type="submit">Wyślij</button>
            <button class="btn btn-primary btn-danger" type="reset">Anuluj</button>
        </div>
    </form>

</div>
</body>
</html>
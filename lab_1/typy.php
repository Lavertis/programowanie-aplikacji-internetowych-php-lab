<?php
$var1 = 1234;
$var2 = 567.789;
$var3 = 1;
$var4 = 0;
$var5 = true;
$var6 = "0";
$var7 = "Typy w PHP";
$var8 = [1, 2, 3, 4];
$var9 = [];
$var10 = ["zielony", "czerwony", "niebieski"];
$var11 = ["Agata", "Agatowska", 4.67, true];
$var12 = new DateTime('NOW');
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
    <title>Typy zmiennych w PHP</title>
</head>
<body>
<div class="container my-4">
    <h1 class="text-center mb-4">Typy zmiennych w PHP</h1>
    <table class="table text-center table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Content</th>
            <th>Content displayed</th>
            <th>is_bool()</th>
            <th>is_int()</th>
            <th>is_numeric()</th>
            <th>is_string()</th>
            <th>is_array()</th>
            <th>is_object()</th>
        </tr>
        </thead>
        <tbody>
        <?php
        echo "<tr><td>var1</td>" .
            "<td>1234</td>" .
            "<td>$var1</td>" .
            "</td><td>" . (is_bool($var1) ? "true" : "false") .
            "</td><td>" . (is_int($var1) ? "true" : "false") .
            "</td><td>" . (is_numeric($var1) ? "true" : "false") .
            "</td><td>" . (is_string($var1) ? "true" : "false") .
            "</td><td>" . (is_array($var1) ? "true" : "false") .
            "</td><td>" . (is_object($var1) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var2</td>" .
            "<td>567.789</td>" .
            "<td>$var2</td>" .
            "</td><td>" . (is_bool($var2) ? "true" : "false") .
            "</td><td>" . (is_int($var2) ? "true" : "false") .
            "</td><td>" . (is_numeric($var2) ? "true" : "false") .
            "</td><td>" . (is_string($var2) ? "true" : "false") .
            "</td><td>" . (is_array($var2) ? "true" : "false") .
            "</td><td>" . (is_object($var2) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var3</td>" .
            "<td>1</td>" .
            "<td>$var3</td>" .
            "</td><td>" . (is_bool($var3) ? "true" : "false") .
            "</td><td>" . (is_int($var3) ? "true" : "false") .
            "</td><td>" . (is_numeric($var3) ? "true" : "false") .
            "</td><td>" . (is_string($var3) ? "true" : "false") .
            "</td><td>" . (is_array($var3) ? "true" : "false") .
            "</td><td>" . (is_object($var3) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var4</td>" .
            "<td>0</td>" .
            "<td>$var4</td>" .
            "</td><td>" . (is_bool($var4) ? "true" : "false") .
            "</td><td>" . (is_int($var4) ? "true" : "false") .
            "</td><td>" . (is_numeric($var4) ? "true" : "false") .
            "</td><td>" . (is_string($var4) ? "true" : "false") .
            "</td><td>" . (is_array($var4) ? "true" : "false") .
            "</td><td>" . (is_object($var4) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var5</td>" .
            "<td>true</td>" .
            "<td>$var5</td>" .
            "</td><td>" . (is_bool($var5) ? "true" : "false") .
            "</td><td>" . (is_int($var5) ? "true" : "false") .
            "</td><td>" . (is_numeric($var5) ? "true" : "false") .
            "</td><td>" . (is_string($var5) ? "true" : "false") .
            "</td><td>" . (is_array($var5) ? "true" : "false") .
            "</td><td>" . (is_object($var5) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var6</td>" .
            "<td>\"0\"</td>" .
            "<td>$var6</td>" .
            "</td><td>" . (is_bool($var6) ? "true" : "false") .
            "</td><td>" . (is_int($var6) ? "true" : "false") .
            "</td><td>" . (is_numeric($var6) ? "true" : "false") .
            "</td><td>" . (is_string($var6) ? "true" : "false") .
            "</td><td>" . (is_array($var6) ? "true" : "false") .
            "</td><td>" . (is_object($var6) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var7</td>" .
            "<td>\"Typy w PHP\"</td>" .
            "<td>$var7</td>" .
            "</td><td>" . (is_bool($var7) ? "true" : "false") .
            "</td><td>" . (is_int($var7) ? "true" : "false") .
            "</td><td>" . (is_numeric($var7) ? "true" : "false") .
            "</td><td>" . (is_string($var7) ? "true" : "false") .
            "</td><td>" . (is_array($var7) ? "true" : "false") .
            "</td><td>" . (is_object($var7) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var8</td>" .
            "<td>[1, 2, 3, 4]</td>" .
            "<td>" . implode(", ", $var8) . "</td>" .
            "</td><td>" . (is_bool($var8) ? "true" : "false") .
            "</td><td>" . (is_int($var8) ? "true" : "false") .
            "</td><td>" . (is_numeric($var8) ? "true" : "false") .
            "</td><td>" . (is_string($var8) ? "true" : "false") .
            "</td><td>" . (is_array($var8) ? "true" : "false") .
            "</td><td>" . (is_object($var8) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var9</td>" .
            "<td>[]</td>" .
            "<td>" . implode(", ", $var9) . "</td>" .
            "</td><td>" . (is_bool($var9) ? "true" : "false") .
            "</td><td>" . (is_int($var9) ? "true" : "false") .
            "</td><td>" . (is_numeric($var9) ? "true" : "false") .
            "</td><td>" . (is_string($var9) ? "true" : "false") .
            "</td><td>" . (is_array($var9) ? "true" : "false") .
            "</td><td>" . (is_object($var9) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var10</td>" .
            "<td>[\"zielony\", \"czerwony\", \"niebieski\"]</td>" .
            "<td>" . implode(", ", $var10) . "</td>" .
            "</td><td>" . (is_bool($var10) ? "true" : "false") .
            "</td><td>" . (is_int($var10) ? "true" : "false") .
            "</td><td>" . (is_numeric($var10) ? "true" : "false") .
            "</td><td>" . (is_string($var10) ? "true" : "false") .
            "</td><td>" . (is_array($var10) ? "true" : "false") .
            "</td><td>" . (is_object($var10) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var11</td>" .
            "<td>[\"Agata\", \"Agatowska\", 4.67, true]</td>" .
            "<td>" . implode(", ", $var11) . "</td>" .
            "</td><td>" . (is_bool($var11) ? "true" : "false") .
            "</td><td>" . (is_int($var11) ? "true" : "false") .
            "</td><td>" . (is_numeric($var11) ? "true" : "false") .
            "</td><td>" . (is_string($var11) ? "true" : "false") .
            "</td><td>" . (is_array($var11) ? "true" : "false") .
            "</td><td>" . (is_object($var11) ? "true" : "false") . "</td></tr>";

        echo "<tr><td>var12</td>" .
            "<td>new DateTime('NOW')</td>" .
            "<td>" . $var12->format('d-m-Y H:i:s') . "</td>" .
            "</td><td>" . (is_bool($var12) ? "true" : "false") .
            "</td><td>" . (is_int($var12) ? "true" : "false") .
            "</td><td>" . (is_numeric($var12) ? "true" : "false") .
            "</td><td>" . (is_string($var12) ? "true" : "false") .
            "</td><td>" . (is_array($var12) ? "true" : "false") .
            "</td><td>" . (is_object($var12) ? "true" : "false") . "</td></tr>";
        ?>
        </tbody>
    </table>

    <table class="table w-auto mx-auto text-center table-striped">
        <thead>
        <tr>
            <th>Expression</th>
            <th>Result</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $res = (1 == true);
        echo "<tr><td>1 == true</td><td>" . ($res ? "true" : "false") . "</td></tr>";

        $res = (1 === true);
        echo "<tr><td>1 === true</td><td>" . ($res ? "true" : "false") . "</td></tr>";

        $res = (0 == "0");
        echo "<tr><td>0 == \"0\"</td><td>" . ($res ? "true" : "false") . "</td></tr>";

        $res = (0 === "0");
        echo "<tr><td>0 === \"0\"</td><td>" . ($res ? "true" : "false") . "</td></tr>";
        ?>
        </tbody>
    </table>

    <div>
        <?php
        echo "<p class='fw-bold'>[1, 2, 3, 4]</p>";
        echo "<p><span class='fw-bold'>var_dump(): </span>";
        var_dump($var8);
        echo "</p><p><span class='fw-bold'>print_r(): </span>";
        print_r($var8);
        echo "</p><br>";

        echo "<p class='fw-bold'>[]</p>";
        echo "<p><span class='fw-bold'>var_dump(): </span>";
        var_dump($var9);
        echo "</p><p><span class='fw-bold'>print_r(): </span>";
        print_r($var9);
        echo "</p><br>";

        echo "<p class='fw-bold'>[\"zielony\", \"czerwony\", \"niebieski\"]</p>";
        echo "<p><span class='fw-bold'>var_dump(): </span>";
        var_dump($var10);
        echo "</p><p><span class='fw-bold'>print_r(): </span>";
        print_r($var10);
        echo "</p><br>";

        echo "<p class='fw-bold'>[\"Agata\", \"Agatowska\", 4.67, true]</p>";
        echo "<p><span class='fw-bold'>var_dump(): </span>";
        var_dump($var11);
        echo "</p><p><span class='fw-bold'>print_r(): </span>";
        print_r($var11);
        echo "</p><br>";
        ?>
    </div>
</body>
</html>
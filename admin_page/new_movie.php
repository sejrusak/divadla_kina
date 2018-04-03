<?php
include 'header.php';
$nazev = filter_input(INPUT_POST, "nazev");
$vek_limit = filter_input(INPUT_POST, "vek_limit");
$submit = filter_input(INPUT_POST, "submit");

if ($submit !== NULL) {
  $query = "INSERT INTO `filmy` (`nazev`, `vek_limit`)
  VALUES ('$nazev', '$vek_limit');";
  $result = MySqlDb::queryString($query);
      //  Model::newMovie($nazev, $vek_limit);
//header("location:index.php");
    }
?>
<form method="post">
    <p>
        Nazev: <input name="nazev" type="text"> <br />
        Vek Limit: <input name="vek_limit" type="number" > <br />
        <input type="submit" name="submit">
    </p>

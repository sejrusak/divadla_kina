<?php
include 'header.php';
$id_salu = filter_input(INPUT_GET, "id_salu");
$nazev = filter_input(INPUT_POST, "nazev");
$pocet_mist = filter_input(INPUT_POST, "pocet_mist");

if ($submit !== NULL) {
  $query = "INSERT INTO `saly` (`nazev`, `pocet_mist`)
  VALUES ('$nazev', '$pocet_mist');";
  $result = MySqlDb::queryString($query);
      //  Model::newMovie($nazev, $vek_limit);
//header("location:index.php");
    }
?>
<form method="post">
    <p>
        Nazev: <input name="nazev" type="text"> <br />
        Pocet Míst: <input name="pocet_mist" type="number" > <br />
        <input type="submit" name="submit">
    </p>

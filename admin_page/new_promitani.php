<?php
include 'header.php';
if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {
$id_programu = filter_input(INPUT_GET, "id_promitani");
$id_filmu = filter_input(INPUT_POST, "id_filmu");
$jazyk = filter_input(INPUT_POST, "jazyk");
$cena = filter_input(INPUT_POST, "cena");
$cas = filter_input(INPUT_POST, "cas_promitani");
$id_salu = filter_input(INPUT_POST, "id_salu");
$typ_promitani = filter_input(INPUT_POST, "id_typ_promitani");
$konec_predprodeje = filter_input(INPUT_POST, "konec_predprodeje");
$submit = filter_input(INPUT_POST, "submit");


if (isset($submit)) {
    $queryInsert = "INSERT INTO `promitani` (`id_filmu`, `id_salu`, `id_typ_promitani`, `jazyk`, `cena`, `cas_promitani`, `konec_predprodeje`)
    VALUES ('$id_filmu', '$id_salu', '$typ_promitani', '$jazyk', '$cena', '$cas', '$konec_predprodeje');";
    $resultInsert = MySqlDb::queryString($queryInsert);
//var_dump($queryInsert);
  //$rowInsert = mysqli_fetch_assoc($resultInsert);

    $query69 = "SELECT * FROM `promitani` ORDER BY id_programu";
    $result69 = MySqlDb::queryString($query69);
    while ($row69 = mysqli_fetch_assoc($result69)) {
      $id_promitani = $row69['id_programu'];
    }

Model::addSeats($id_salu);
}




$query2 = "SELECT *
FROM `typy_promitani`";
$result2 = MySqlDb::queryString($query2);
//$row2 = mysqli_fetch_assoc($result2);
//var_dump($query2);
//echo "<br />";

$query3 = "SELECT *
FROM `filmy`";
$result3 = MySqlDb::queryString($query3);
//$row3 = mysqli_fetch_assoc($result3);

//var_dump($query3);
//echo "<br />";

$query4 = "SELECT *
FROM `saly`";
$result4 = MySqlDb::queryString($query4);
//$row4 = mysqli_fetch_assoc($result4);
//var_dump($query4);


?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> </title>
        <style> table, td {border: 1px solid black} </style>
    </head>

    <form method="post">

        <p>
            Film: <select name="id_filmu">
<?php
while ($row3 = mysqli_fetch_assoc($result3)) {

?>

<option value="<?php echo $row3['id_filmu'] ?>"><?php echo $row3['nazev']; ?></option><?php } ?>
</select><br />

  Jazyk: <input type="text" name="jazyk"><br />
            cena: <input type="text" name="cena"><br />

            Sál: <select name="id_salu">
<?php
while ($row4 = mysqli_fetch_assoc($result4)) {
?>
<option value="<?php echo $row4['id_salu'] ?>"><?php echo $row4['nazev']; ?></option><?php } ?>
</select><br />
            Druh promítaní: <select name="id_typ_promitani">
              <?php
while ($row2 = mysqli_fetch_assoc($result2)) {
?>
<option value="<?php echo $row2['id_typ_promitani'] ?>"><?php echo $row2['nazev']; ?></option><?php } ?>
</select><br />
            Začátek filmu: <input type="datetime" name="cas_promitani" placeholder="YYYY-MM-DD HH:MM:SS" ><br />
            Konec předprodeje: <input type="datetime" name="konec_predprodeje" placeholder="YYYY-MM-DD HH:MM:SS" ><br />
            <input type="submit" name="submit">
            <?php
          /*  if ($submit !== NULL) {
               header("location:http://localhost/oop_db/admin_page/list_movie.php");
            }*/

            ?>
        </p>

    </form>
</html>
<?php
} else {echo "nejste přihlášení jako admin";};
 include "footer.php";

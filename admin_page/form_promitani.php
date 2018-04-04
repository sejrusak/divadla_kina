<?php
include 'header.php';
$id_programu = filter_input(INPUT_GET, "id_promitani");
$id_filmu = filter_input(INPUT_GET, "id_filmu");
$cena = filter_input(INPUT_POST, "cena");
$cas = filter_input(INPUT_POST, "cas_promitani");
$id_salu = filter_input(INPUT_GET, "id_salu");
$typ_promitani = filter_input(INPUT_POST, "id_typ_promitani");
$konec_predprodeje = filter_input(INPUT_POST, "konec_predprodeje");
$submit = filter_input(INPUT_POST, "submit");



$query1 = "SELECT p.id_programu, f.nazev AS 'nazev',f.id_filmu AS id_filmu , p.cena,
          p.cas_promitani AS 'cas_promitani', sa.nazev AS 'sal',
          tp.id_typ_promitani AS 'id_typu_promitani' ,tp.nazev AS 'druh_promitani',
          sa.pocet_mist AS 'pocet_mist', p.konec_predprodeje AS 'konec_predprodeje',
          sa.id_salu AS 'id_salu'
          FROM promitani p
          JOIN filmy f ON p.id_filmu = f.id_filmu
          JOIN typy_promitani tp ON p.id_typ_promitani = tp.id_typ_promitani
          JOIN saly sa ON p.id_salu = sa.id_salu
          WHERE id_programu = $id_programu";

$result1 = MySqlDb::queryString($query1);
$row = mysqli_fetch_assoc($result1);

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
<br /><?php
while ($row3 = mysqli_fetch_assoc($result3)) {

?>

<option <?php
if ($row3['id_filmu'] == $row['id_filmu']) { echo "selected ";} ?> type="text" name="id_filmu" value="<?php echo $row3['id_filmu'] ?>"><?php echo $row3['nazev']; ?></option><?php } ?>
</select><br />


            cena: <input type="text" name="cena" value="<?php echo $row['cena']; ?> "><br />
            Začátek filmu: <input type="datetime" name="cas_promitani" value="<?php echo $row['cas_promitani']; ?> "><br />
            Sál: <select name="id_salu">
<?php
while ($row4 = mysqli_fetch_assoc($result4)) {
?>
<option <?php
if ($row4['id_salu'] == $row['id_salu']) { echo "selected ";} ?> type="text" name="id_salu" value="<?php echo $row4['id_salu'] ?>"><?php echo $row4['nazev']; ?></option><?php } ?>
</select><br />
            Počet míst: <input type="text" name="pocet_mist" value="<?php echo $row['pocet_mist']; ?> "><br />
            Druh promítaní: <select name="druh_promitani">
              <?php
while ($row2 = mysqli_fetch_assoc($result2)) {
?>
<option <?php
if ($row2['id_typ_promitani'] == $row['id_typu_promitani']) { echo "selected ";} ?> type="text" name="id_typ_promitani" value="<?php echo $row2['id_typ_promitani'] ?>"><?php echo $row2['nazev']; ?></option><?php } ?>
</select><br />
            Konec předprodeje: <input type="datetime" name="konec_predprodeje" value="<?php echo $row['konec_predprodeje']; ?> "><br />
            <input type="submit" name="submit">
            <?php
          /*  if ($submit !== NULL) {
               header("location:http://localhost/oop_db/admin_page/list_movie.php");
            }*/
            if (isset($submit)) {
           $query5 = "UPDATE `promitani` SET
                                          `id_filmu` = '$id_filmu',
                                          `id_salu` = '$id_salu',
                                          `id_typ_promitani` = '$typ_promitani',
                                          `cena` = '$cena',
                                          `cas_promitani` = '$cas',
                                          `konec_predprodeje` = '$konec_predprodeje'
                                          WHERE `id_programu` = '$id_programu';";

               $resultUpdate = MySqlDb::queryString($query5);
           var_dump($query5);
           }
            ?>
        </p>

    </form>
</html>

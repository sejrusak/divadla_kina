<?php
include 'header.php';
$id_programu = filter_input(INPUT_GET, "id_promitani");
$nazev = filter_input(INPUT_GET, "nazev");
$cena = filter_input(INPUT_POST, "cena");
$cas = filter_input(INPUT_POST, "cas_promitani");
$id_salu = filter_input(INPUT_GET, "id_salu");
$typ_promitani = filter_input(INPUT_POST, "id_typ_promitani");
$konec_predprodeje = filter_input(INPUT_POST, "konec_predprodeje");
$submit = filter_input(INPUT_POST, "submit");


$query3 = "SELECT p.id_programu, f.nazev AS 'nazev', p. cena, p.cas_promitani AS 'cas_promitani', sa.nazev AS 'sal', tp.nazev AS 'druh_promitani', sa.pocet_mist AS 'pocet_mist', p.konec_predprodeje AS 'konec_predprodeje'
          FROM promitani p
          JOIN filmy f ON p.id_filmu = f.id_filmu
          JOIN typy_promitani tp ON p.id_typ_promitani = tp.id_typ_promitani
          JOIN saly sa ON p.id_salu = sa.id_salu
          WHERE id_programu = $id_programu";
$result3 = MySqlDb::queryString($query3);
$row = mysqli_fetch_assoc($result3);

/*if (isset($submit)) {
$query2 = "UPDATE `promitani` SET
                               `nazev` = '$nazev',
                               `vek_limit` = '$vek_limit'
                               WHERE `id_promitani` = '$id_promitani';";
    $resultUpdate = MySqlDb::queryString($query2);
//var_dump($query2);
}*/

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
            nazev: <input type="text" name="nazev" value="<?php echo $row['nazev']; ?> "><br />
            cena: <input type="text" name="cena" value="<?php echo $row['cena']; ?> "><br />
            Začátek filmu: <input type="datetime" name="cas_promitani" value="<?php echo $row['cas_promitani']; ?> "><br />
            Sál: <input type="text" name="id_salu" value="<?php echo $row['sal']; ?> "><br />
            Počet míst: <input type="text" name="vek_limit" value="<?php echo $row['pocet_mist']; ?> "><br />
            Druh promítání: <input type="text" name="druh_promitani" value="<?php echo $row['druh_promitani']; ?> "><br />
            Konec předprodeje: <input type="datetime" name="konec_predprodeje" value="<?php echo $row['konec_predprodeje']; ?> "><br />
            <input type="submit" name="submit">
            <?php
          /*  if ($submit !== NULL) {
               header("location:http://localhost/oop_db/admin_page/list_movie.php");
            }*/
            ?>
        </p>

    </form>
</html>

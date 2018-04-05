<?php
include 'header.php';
$id_salu = filter_input(INPUT_GET, "id_salu");
$nazev = filter_input(INPUT_POST, "nazev");
$pocet_mist = filter_input(INPUT_POST, "pocet_mist");


$query3 = "SELECT * FROM `saly` WHERE `id_salu` = '$id_salu'";
$result3 = MySqlDb::queryString($query3);
$sal = mysqli_fetch_assoc($result3);

if (isset($submit) && isset($id_salu)) {

    $query2 = "UPDATE `saly` SET
                               `nazev` = '$nazev',
                               `pocet_mist` = '$pocet_mist'
                               WHERE `id_salu` = '$id_salu';";
    $resultUpdate = MySqlDb::queryString($query2);
//var_dump($query2);
  }
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
            Nazev: <input name="nazev" value="<?php echo $sal['nazev']; ?> "> <br />
            Pocet Mist: <input name="pocet_mist" value="<?php echo $sal['pocet_mist']; ?> "><br />
            <input type="submit" name="submit">
            <?php
            if ($submit !== NULL) {
               header("location:movie_list.php");
            }
            ?>
        </p>

    </form>
</html>

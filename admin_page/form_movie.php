<?php
include 'header.php';
$id_filmu = filter_input(INPUT_GET, "id_movie");
$nazev = filter_input(INPUT_POST, "nazev");
$vek_limit = filter_input(INPUT_POST, "vek_limit");


$query3 = "SELECT * FROM `filmy` WHERE `id_filmu` = '$id_filmu'";
$result3 = MySqlDb::queryString($query3);
$user = mysqli_fetch_assoc($result3);

if (isset($submit) && isset($id_filmu)) {

    $query2 = "UPDATE `filmy` SET
                               `nazev` = '$nazev',
                               `vek_limit` = '$vek_limit'
                               WHERE `id_filmu` = '$id_filmu';";
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
            Nazev: <input type="nazev" name="nazev" value="<?php echo $user['nazev']; ?> "> Email <br />
            Vek Limit: <input type="vek_limit" name="vek_limit" value="<?php echo $user['vek_limit']; ?> "> Jmeno <br />
            <input type="submit" name="submit">
            <?php
            if ($submit !== NULL) {
               header("location:movie_list.php");
            }
            ?>
        </p>

    </form>
</html>

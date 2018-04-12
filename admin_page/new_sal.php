<?php
include 'header.php';
if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {
$nazev = filter_input(INPUT_POST, "nazev");
$pocet_rad = filter_input(INPUT_POST, "pocet_rad");
$pocet_mist_rada = filter_input(INPUT_POST, "pocet_mist_rada");



if ($submit !== NULL) {
  $pocet_mist = $pocet_rad * $pocet_mist_rada;
  $query = "INSERT INTO `saly` (`nazev`, `pocet_mist`)
  VALUES ('$nazev', '$pocet_mist');";
  $result = MySqlDb::queryString($query);
  $query35 = "SELECT MAX(id_salu) AS 'sal'
            FROM `saly`";
  $result35 = MySqlDb::queryString($query35);
  $row35 = mysqli_fetch_assoc($result35);
  $id_salu = $row35['sal'];
  //echo "<br />" . "id salu je: " . $id_salu . "<br />";
  for ($rows = 1; $rows <= $pocet_rad; $rows++) {
  for ($columns = 1; $columns <= $pocet_mist_rada; $columns++) {
  $query145 = "INSERT INTO `sedacky` (`id_salu`, `multiplayer`, `X_sedacky`, `Y_sedacky`) VALUES($id_salu, 1, $rows, $columns);";
   $result145 = MySqlDb::queryString($query145);
   //echo "<br />" . $query145;
 }
}
      //  Model::newMovie($nazev, $vek_limit);
//header("location:index.php");
    }
?>
<form method="post">
    <p>
        Nazev: <input name="nazev" type="text"> <br />
        Pocet Řad: <input name="pocet_rad" type="number" > <br />
        Počet Míst v Řadě: <input name="pocet_mist_rada" type="number" > <br />
        <input type="submit" name="submit">
    </p>
<?php
} else {echo "nejste přihlášení jako admin";};
include "footer.php";

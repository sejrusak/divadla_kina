<?php require_once "header.php";
if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {

//$myConnection = new MySQLDb();
//var_dump($myConnection);
$query = "SELECT * FROM saly;";
$result = MySqlDb::queryString($query);
//var_dump($result);

if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {
    while ($row1 = mysqli_fetch_assoc($result)) {

        echo $row1['id_salu'] . " ";
        echo $row1['nazev'] . " ";
        echo $row1['pocet_mist'] . " ";
        ?> <a href="saly/<?php echo $row1['id_salu']; ?>"> edit </a><?php
        echo "<br />";
    }
}
?>
<a href="new_sal.php">Nový Sál</a><?php
} else {echo "nejste přihlášení jako admin";};
 include "footer.php";

<?php require_once "header.php";


//$myConnection = new MySQLDb();
//var_dump($myConnection);
$query = "SELECT * FROM filmy;";
$result = MySqlDb::queryString($query);
//var_dump($result);

if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {
    while ($row1 = mysqli_fetch_assoc($result)) {

        echo $row1['id_filmu'] . " ";
        echo $row1['nazev'] . " ";
        echo $row1['vek_limit'] . " ";
        ?> <a href="movie/<?php echo $row1['id_filmu']; ?>"> edit </a><?php
        echo "<br />";

    }
}
  ?><a href="new_movie.php">Nový film</a><?php
require_once "../footer.php";
?>

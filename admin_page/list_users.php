<?php require_once "header.php";

//$myConnection = new MySQLDb();
//var_dump($myConnection);
$query = "SELECT * FROM users;";
$result = MySqlDb::queryString($query);
//var_dump($result);

if (isset($_SESSION['email']) && ($_SESSION['id_role'] == 1)) {
    while ($row1 = mysqli_fetch_assoc($result)) {

        echo $row1['id_user'] . " ";
        echo $row1['email'] . " ";
        echo $row1['password'] . " ";
        echo $row1['id_role'] . " ";
        ?> <a href="user/<?php echo $row1['id_user']; ?>"> edit </a><?php
        echo "<br />";
    }
}
?>
<a href="regUser.php">Nový správce</a>
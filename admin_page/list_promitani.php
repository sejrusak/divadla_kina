<?php
include 'header.php';
//$myConnection = new MySQLDb();
//var_dump($myConnection);
//var_dump($result);
echo "Jste přihlášený jako " . $_SESSION['email'] . "<br/>";
?> <a href="logOut.php" > <?php echo "Odhlásit uživatele " . $_SESSION['email']; ?></a><?php
echo "<br>" . "<br />" . "<table border='1px' cellpadding='7' ><tr><th>Nazev Filmu</th><th>Cena</th><th>Konec předobjednávek</th><th>Konec promítání</th><th>Sál</th><th>Druh Promítání</th> <!-- <th>Počet míst</th> --><th>Objednat</th>";
$promitani = Model::getPromitani();
foreach ($promitani as $row1) {
    echo "<tr><td>" . $row1['Nazev filmu'] . " </td>";
    echo "<td>" . $row1['cena'] . " </td>";
    echo "<td>" . $row1['Čas promítání'] . " </td>";
    echo "<td>" . $row1['Konec předprodeje'] . " </td>";
    echo "<td>" . $row1['Sál'] . " </td>";
    echo "<td>" . $row1['Druh promítání'] . " </td>";
  // echo "<td>" . $row1['Počet míst'] . " </td>";  
    echo "<td>";
        ?> <a href="promitani/<?php echo $row1['id_programu']; ?>"> Upravit </a> <?php
        echo "</td>";

    echo "</tr>";
}
echo "</table>";

?>
<a href="new_promitani.php">Vytvořit promítání</a>

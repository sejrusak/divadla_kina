<?php
include 'header.php';
$id_programu = filter_input(INPUT_GET, "id_programu");
//$myConnection = new MySQLDb();
//var_dump($myConnection);
//echo $id_programu;
//var_dump($result); 

echo "Jste přihlášený jako " . $_SESSION['email'] . "<br/>";
?> <a href="logOut.php" > <?php echo "Odhlásit uživatele " . $_SESSION['email']; ?></a><?php
echo "<br>" . "<br />" . "<table border='1px' cellpadding='7' ><tr><th>Nazev Filmu</th><th>Cena</th><th>Konec předobjednávek</th><th>Konec promítání</th><th>Sál</th><th>Druh Promítání</th><th>Počet míst</th>";
$promitani = Model::getPromitani($id_programu);
foreach ($promitani as $row1) {
    echo "<tr><td>" . $row1['Nazev filmu'] . " </td>";
    echo "<td>" . $row1['cena'] . " </td>";
    echo "<td>" . $row1['Čas promítání'] . " </td>";
    echo "<td>" . $row1['Konec předprodeje'] . " </td>";
    echo "<td>" . $row1['Sál'] . " </td>";
    echo "<td>" . $row1['Druh promítání'] . " </td>";
    echo "<td>" . $row1['Počet míst'] . " </td>";
    echo "</tr>";
}
echo "</table>";
$querySeats = "
    SELECT * 
    FROM `sedacky_promitani` sp
JOIN `status_sedacky` s ON sp.id_status = s.id_status
JOIN `sedacky` sed ON sp.id_sedacky = sed.id_sedacky
WHERE id_promitani = $id_programu 
ORDER BY X_sedacky, Y_sedacky";
$resultSeats = MYSqlDb::queryString($querySeats);
$rada = 0;
?> <table border="3px"> <?php
    while ($rowSeats = mysqli_fetch_assoc($resultSeats)) {
        switch ($rowSeats['id_status']) {
            case 1:
                $color = "green";

                break;
            case 2:
                $color = "red";
                break;
            case 3:
                $color = "orange";
                break;
        }
        
        if ($rada != $rowSeats['X_sedacky']) {
            ?><tr>
                <td> <?php echo "Řada " . $rowSeats['X_sedacky'] . ": "; ?> </td><?php
            }
            $rada = $rowSeats['X_sedacky'];

            if ($rowSeats['id_status'] == 1) {
                ?> <td style="background-color: <?php echo $color; ?>"><a href="zakoupeni.php?id_sedacky=<?php echo $rowSeats['id_sedacky'] ?>&id_promitani=<?php echo $rowSeats['id_promitani'] ?>"> <?php echo $rowSeats['Y_sedacky']; ?>  <?php
                ?> <?php echo " (" . $rowSeats['nazev'] . ")"; ?> </a></td> <?php
                if ($rada != $rowSeats['X_sedacky']) {
                    ?></tr><?php
                    }
                } else {
                    ?> <td style="background-color: <?php echo $color; ?>"> <?php echo $rowSeats['Y_sedacky'];
                    ?> <?php echo " (" . $rowSeats['nazev'] . ")"; ?> </td> <?php
                if ($rada != $rowSeats['X_sedacky']) {
                    ?></tr><?php
            }
        }
    }
    ?></table> <?php 


//var_dump($resultSeats);
include 'footer.php';
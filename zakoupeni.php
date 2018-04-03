<?php
include 'header.php';
$id_sedacky = filter_input(INPUT_GET, "id_sedacky");
$id_promitani = filter_input(INPUT_GET, "id_promitani");

//echo "<br />" . $id_sedacky;
//echo $id_promitani;
if (isset($_SESSION['email'])) {
$query = "SELECT s.nazev AS nazev_salu, f.nazev AS film, p.jazyk AS Jazyk, p.cena AS cena, p.cas_promitani AS cas_promitani,  p.konec_predprodeje AS predprodej, 
sp.id_status AS status, f.nazev AS nazev_filmu, f.vek_limit AS limit_veku, s.nazev AS druh_salu, s.pocet_mist AS pocet_mist, s.druh AS  druh_promitani, 
se.multiplayer AS zdrazeni, se.X_sedacky AS rada, se.Y_sedacky AS cislo_rady
FROM `promitani` p
JOIN sedacky_promitani sp ON p.id_programu = sp.id_promitani
JOIN filmy f ON f.id_filmu = p.id_filmu
JOIN saly s ON s.id_salu = p.id_salu
JOIN sedacky se ON se.id_sedacky = sp.id_sedacky
WHERE `id_promitani` = '$id_promitani' AND se.id_sedacky = '$id_sedacky'";

$result = MySqlDb::queryString($query);
//var_dump($query);
while ($row1 = mysqli_fetch_assoc($result)) {
    echo "Promítací sál: " . $row1['nazev_salu'] . "<br />";
    echo "film: " . $row1['film'] . "<br />";
    echo "Jazyk: " . $row1['Jazyk'] . "<br />";
    echo "cena: " . $row1['cena'] . "<br />";
    echo "Čas promítání: " . $row1['cas_promitani'] . "<br />";
    echo "Konec předprodeje: " . $row1['predprodej'] . "<br />";
    echo "status: " . $row1['status'] . "<br />";
    echo "Nazev Filmu: " . $row1['nazev_filmu'] . "<br />";
    echo "Limit veku: " . $row1['limit_veku'] . "<br />";
    echo "Počet míst: " . $row1['pocet_mist'] . "<br />";
    echo "Druh promítání: " . $row1['druh_promitani'] . "<br />";
    echo "Zdražení: " . $row1['zdrazeni'] . "<br />";
    echo "Řada: " . $row1['rada'] . "<br />";
    echo "Číslo v řadě: " . $row1['cislo_rady'] . "<br />";
}
?>
<a href="rezervace.php?status=3&<?php echo "id_sedacky=" . $id_sedacky . "&id_promitani=" . $id_promitani; ?>">Rezervovat</a> <a href="rezervace.php?status=2&<?php echo "id_sedacky=" . $id_sedacky . "&id_promitani=" . $id_promitani; ?>">Koupit</a>
<?php
} else {
echo "Musíte se přihlásit!";    
}
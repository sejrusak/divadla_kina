
?>
<ul><?php echo "<li><a href='Index.php'>Home</a></li>"; ?>
    <?php

    if (isset($_SESSION['email'])) {

        if (($_SESSION['id_role'] == 0) || ($_SESSION['id_role'] == 1)) {
            echo "<li><a href='sal1.php'>SÁL1</a></li>";
        }
        ?>
        <?php if (($_SESSION['id_role'] == 0) || ($_SESSION['id_role'] == 1)) {
            echo "<li><a href='sal2.php'>SÁL2</a></li>";
        } ?>
    <?php if (($_SESSION['id_role'] == 1)) {
        echo "<li><a href='balkonky.php'>Královské balkónky</a></li>";
    } ?>
    <?php if (($_SESSION['id_role'] == 0) || ($_SESSION['id_role']) == 1) {
        echo "<li><a href='kontakty.php'>Kontakt</a></li>";
    }
} ?>
</ul>

<?php
include 'header.php';
if (isset($_SESSION['email'])) {

    echo "Jste přihlášený jako " . $_SESSION['email'] . "<br/>";
    ?> <a href="logOut.php" > <?php echo "Odhlásit uživatele " . $_SESSION['email']; ?></a><?php
    echo "<br>" . "<a href = 'index.php'> odkaz na index</a>";
} else {
    ?><form class="" action="login.php" method="post">
        <label for="">Email</label>
        <input type="email" name="email" value="">
        <label for="">Heslo</label>
        <input type="password" name="password" value="">
        <input type="submit" name="submit" value="Přihlásit">
    </form>
    <?php
    if (isset($submit)) {
        echo "<p style='color: red;' >zadali jste špatné uživatelské údaje</p>";
    }
}


include 'footer.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <style>
      tr td  a { color: black;}
      tr td  a:hover{ color: black;}
            a {text-decoration: none;} ul {list-style-type: none;}
        </style>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
<?php
session_start();

require_once '../autoloader.php';
$submit = filter_input(INPUT_POST, "submit");
//var_dump($submit);
?>
<div style="float: right;" id="prihlasovani"><?php

if (isset($submit)) {

    $email = filter_input(INPUT_POST, "email");
    $password = filter_input(INPUT_POST, "password");


model::login($email,$password);
//var_dump($result);
}

if (isset($_SESSION['email'])) {
    echo "Jste přihlášený jako " . $_SESSION['email'];
    ?> <a href="http://localhost/divadla_kina/logOut.php" > <?php echo "Odhlásit"; ?></a><?php
    echo "<br>" . "<br />";
} else {
    echo "Nejste přihlášený >" . "<a href='login.php'> Přihlásit </a> nebo " . "<a href='registration.php'> Registrovat uživatele</a>";
}
?></div>
<ul><?php echo "<li><a href='http://localhost/divadla_kina/Index.php'>Home</a></li>";
          echo "<li><a href='http://localhost/divadla_kina/admin_page/list_users.php'> Seznam Uživatelů </a></li> ";
          echo "<li><a href='http://localhost/divadla_kina/admin_page/list_movie.php'> Seznam filmů </a></li>";
          echo "<li><a href='http://localhost/divadla_kina/admin_page/list_promitani.php'> Seznam Promítání </a></li>";

echo "</ul>";
/*?>
<ul><?php echo "<li><a href='../Index.php'>Home</a></li>";
          echo "<a href='user_edit.php'> User edit </a> ";

    if (isset($_SESSION['email'])) {

        if (($_SESSION['id_role'] == 2) || ($_SESSION['id_role'] == 1)) {
            echo "<li><a href='../vypis_promitani.php'>Promítané filmy</a></li>";
        }

         if (($_SESSION['id_role'] == 2) || ($_SESSION['id_role'] == 1)) {
            echo "<li><a href='sal1.php'>SÁL1</a></li>";
        }
        if (($_SESSION['id_role'] == 2) || ($_SESSION['id_role'] == 1)) {
            echo "<li><a href='sal2.php'>SÁL2</a></li>";
        }
        if (($_SESSION['id_role'] == 1)) {
        echo "<li><a href='balkonky.php'>Královské balkónky</a></li>";
    }
    if (($_SESSION['id_role'] == 2) || ($_SESSION['id_role']) == 1) {
        echo "<li><a href='../kontakty.php'>Kontakt</a></li>";
    }
    if (($_SESSION['id_role'] == 1)) {
        echo "<li><a href='index.php'>Admin Page</a></li>";
    }
} ?>
</ul>



<?php*/

<?php
include 'header.php';
$heslo = filter_input(INPUT_POST, "password");
$heslo2 = filter_input(INPUT_POST, "password2");
$email = filter_input(INPUT_POST, "email");
$jmeno = filter_input(INPUT_POST, "jmeno");
$prijmeni = filter_input(INPUT_POST, "prijmeni");
$submit = filter_input(INPUT_POST, "submit");


if (Model::isRegistered($email) == FALSE) {
    if (($submit !== NULL) && ($email !== "") && ($prijmeni !== "") && ($heslo !== "") && ($heslo2 == $heslo)) {

        Model::registerUser($email, $jmeno, $prijmeni, $heslo);
//header("location:index.php");
    } else {
        echo "Vyplňte prosím všechna políčka";
    }
} else {
    echo "Někdo už se pod tímto emailem zaregistrovaný";
}


//var_dump($query1);
//$row = $result->fetch_assoc(); 
?>                



<form method="post">

    <p>  
        Email: <input type="email" name="email"> <br />
        Jméno: <input name="jmeno" type="text" > <br />
        Příjmení: <input type="text" name="prijmeni"> <br />
        Heslo: <input type="password" name="password"> <br />
        Heslo znovu: <input type="password" name="password2"> <br />
        <input type="submit" name="submit">
    </p>

    <?php include 'footer.php'; ?>
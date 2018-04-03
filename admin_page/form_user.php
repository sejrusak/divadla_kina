<?php
include 'header.php';
$id = filter_input(INPUT_GET, "id_user");
$email = filter_input(INPUT_POST, "email");
$jmeno = filter_input(INPUT_POST, "jmeno");
$prijmeni = filter_input(INPUT_POST, "prijmeni");
$heslo = filter_input(INPUT_POST, "heslo");
$id_role = filter_input(INPUT_POST, "id_role");
$submit = filter_input(INPUT_POST, "submit");
$query3 = "SELECT * FROM `users` WHERE `id_user` = '$id'";
$result3 = MySqlDb::queryString($query3);
$user = mysqli_fetch_assoc($result3);
//echo $email;

if ((isset($submit)) && isset($id)) {
Model::editUser($id, $email, $jmeno, $prijmeni, $heslo, $id_role, $submit);
} elseif (isset($submit)) {

  if (Model::isRegistered($email) == FALSE) {
      if (($submit !== NULL) && ($email !== "") && ($prijmeni !== "") && ($heslo !== "")) {
          Model::registerAdmin($email, $jmeno, $prijmeni, $heslo);
  //header("location:index.php");
      } else {
          echo "Vyplňte prosím všechna políčka";
      }
  } else {
      echo "Někdo už se pod tímto emailem zaregistrovaný";
  }


  //var_dump($query1);
  //$row = $result->fetch_assoc();

}
?>
<form method="post">
        <p>
            Email: <input type="email" name="email" value="<?php echo $user['email']; ?> "> Email <br />
            Jmeno: <input type="jmeno" name="jmeno" value="<?php echo $user['jmeno']; ?> "> Jmeno <br />
            Prijmeni: <input type="prijmeni" name="prijmeni" value="<?php echo $user['prijmeni']; ?> "> Prijmeni <br />
            Heslo: <input type="heslo" name="heslo" placeholder="Heslo"> Heslo <br />
            Id Role: <select name="id_role">
              <!--<option value="0">Select Role</option>-->
              <option value="1">Admin</option>
              <option value="2" selected="selected" >User</option>
                <?php /*
                    $queryRoles = "SELECT *
                                   FROM `users` u
                                   JOIN `role` r ON u.id_role = r.id_role
                                   WHERE `id_user` = '$id';";
                    $resultRoles = MYSqlDb::queryString($queryRoles);
                    while ($row4 = mysqli_fetch_assoc($resultRoles)) {
                        echo $row4['name'];
                    }
                */
                ?>

            </select>
            <br />
            <input type="submit" name="submit">
            <?php
            /*if ($submit !== NULL) {
                header("location:index.php");
            }*/
            ?>

        </p>

    </form>
</html>

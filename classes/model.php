<?php

class Model {

    const SALT = 'Tm+TPk;ro 6bfExPA3`[~Rn erC|7JjnQwkkQ`M{h+agsy*MN-1|@6+ja en1H8';

    public static function getPromitani($id_programu = NULL) {

        $where = "";
        if (isset($id_programu)) {
            $where = " AND id_programu = $id_programu";
        }


        $query25 = "SELECT p.id_programu, f.nazev AS 'Nazev filmu', p. cena, p.cas_promitani AS 'Čas promítání', sa.nazev AS 'Sál', tp.nazev AS 'Druh promítání', sa.pocet_mist AS 'Počet míst', p.konec_predprodeje AS 'Konec předprodeje', p.hidden AS hidden
                  FROM promitani p
                  JOIN filmy f ON p.id_filmu = f.id_filmu
                  JOIN typy_promitani tp ON p.id_typ_promitani = tp.id_typ_promitani
                  JOIN saly sa ON p.id_salu = sa.id_salu
                  WHERE hidden = '0'
                  $where";

        $result25 = MySqlDb::queryString($query25);
        $promitani = array();
        while ($row1 = mysqli_fetch_assoc($result25)) {
            $promitani[] = $row1;
        }
        return $promitani;
    }

    public static function updatePromitani($id_sedacky, $id_promitani, $status, $id_user) {

        $query = "
         UPDATE `sedacky_promitani` SET
        `id_sedacky` = '$id_sedacky',
        `id_promitani` = '$id_promitani',
        `id_status` = '$status',
        `id_user` = '$id_user'
         WHERE `id_sedacky` = '$id_sedacky' AND `id_promitani` = '$id_promitani';";
        $result = MySqlDb::queryString($query);
    }

    public static function registerUser($email, $jmeno, $prijmeni, $heslo) {

        $posolene = $heslo . self::SALT . $email;
        $query1 = "INSERT INTO `users` (`email`, `jmeno`, `prijmeni`, `password`,`id_role`)
               VALUES ('$email', '$jmeno', '$prijmeni', md5('$posolene'), '2')";
        $result = MySqlDb::queryString($query1);
    }

    public static function registerAdmin($email, $jmeno, $prijmeni, $heslo) {

        $posolene = $heslo . self::SALT . $email;
        $query1 = "INSERT INTO `users` (`email`, `jmeno`, `prijmeni`, `password`,`id_role`)
               VALUES ('$email', '$jmeno', '$prijmeni', md5('$posolene'), '1')";
        $result = MySqlDb::queryString($query1);
    }

    public static function isRegistered($email) {
        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1;";
        $result = MySQLDb::queryString($query);
        $row = mysqli_fetch_assoc($result);
        if ($result->num_rows == 0) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public static function login($email, $heslo) {
    $salted = md5($heslo . self::SALT . $email);
    $query = "SELECT * FROM `users` WHERE `email` = '$email' AND `password` = '$salted' AND `banned` = '0' LIMIT 1;";
    $result = MYSqlDb::queryString($query);
    $row = mysqli_fetch_assoc($result);

    if ($result->num_rows == 1) {
        $_SESSION['id_user']= $row['id_user'];
        $_SESSION['email'] = $email;
        $_SESSION['id_role'] = $row['id_role'];

         }
    /*var_dump($query);
    echo "<br />";
    var_dump($result);*/
    }

    /*public static function newMovie($result) {
    $queryMovie = "INSERT INTO `filmy` (`nazev`, `vek_limit`)
    VALUES ('$nazev', '$vek_limit');"
    $result = MySqlDb::queryString($queryMovie);
    }*/
    public static function editUser($id, $email, $jmeno, $prijmeni, $heslo, $id_role, $banned, $submit) {

      $query2 = "UPDATE `users` SET
                                 `email` = '$email',
                                 `jmeno` = '$jmeno',
                                 `prijmeni` = '$prijmeni',
                                 `id_role` = '$id_role',
                                 `banned` = '$banned'
                                 WHERE `id_user` = '$id';";
      $resultUpdate = MySqlDb::queryString($query2);
      echo $query2;
      //var_dump($query2);
      if ($heslo != "") {
          $salted = md5($heslo . SELF::SALT . $email);
          $query3 = "UPDATE `users` SET
                                 `password` = '$salted'
                                 WHERE `id_user` = '$id';";
          $resultUpdate = MySqlDb::queryString($query3);
      }
    }
    //zjištění horní a dolní hranice id sedačky pro nové promítání
    private static function prepareSeats($id_salu){
    $query = "SELECT MIN(id_sedacky) AS dolni_hranice, MAX(id_sedacky) AS horni_hranice FROM `sedacky` WHERE `id_salu` = '$id_salu';";
    $result = MySQLDB::queryString($query);
    $row = mysqli_fetch_assoc($result);
    return $row;
    }

    private static function addSeats($id_salu){
          $row_hranice = Model::prepareSeats($id_salu);
          $query2 = "SELECT MAX(id_promitani) AS id_max_promitani FROM `program`;";
          $result2 = MySQLDB::queryString($query2);
          $row2 = mysqli_fetch_assoc($result2);


          for ($id_sedacky = $row_hranice["dolni_hranice"]; $id_sedacky <= $row_hranice["horni_hranice"]; $id_sedacky++){
            echo "smrt!";
            $query = "
                INSERT INTO `sedacky_promitani` (`id_sedacky`, `id_promitani`, `id_status`)
                VALUES('". $id_sedacky ."', '".$row2["id_max_promitani"]."', '1');
                ";
            echo $query;
            MySQLDB::queryString($query);
          }
        }

}

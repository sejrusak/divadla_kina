<?php
include_once 'header.php';

  //vygenerování sedaček
  for ($rows = 1; $rows <= 10; $rows++) {
  for ($columns = 1; $columns <= 20; $columns++) {
  $sql = "INSERT INTO `sedacky` (`id_salu`, `multiplayer`, `X_sedacky`, `Y_sedacky`) VALUES(2, 1, $rows, $columns);";

  echo $sql . "<br />";
  }

  }


//Vygenerování sedaček
 /*for ($seat = 1; $seat <= 200; $seat++) {
  $sql2 = "INSERT INTO `sedacky_promitani` (`id_sedacky`, `id_promitani`, `id_status`)
  VALUES ('$seat', '1', '1');";
  echo "<br />" . $sql2;
} */




//vypis obsazenosti sedaček

/* $idPromitani = 2;
  $querySeats = "SELECT * FROM `sedacky_promitani` sp
  JOIN `status_sedacky` s ON sp.id_status = s.id_status
  WHERE id_promitani = 2 ORDER BY sp.id_sedacky";
  $resultSeats = MYSqlDb::queryString($querySeats);
  if (true) {

  }

  while ($rowSeats = mysqli_fetch_assoc($resultSeats)) {
  echo "Id_" . $rowSeats['id_sedacky'];
  echo " (" . $rowSeats['nazev']. ")<br />";

  } */


//Vypis obsazenosti salu

/*$querySeats = "
    SELECT *
    FROM `sedacky_promitani` sp
JOIN `status_sedacky` s ON sp.id_status = s.id_status
JOIN `sedacky` sed ON sp.id_sedacky = sed.id_sedacky
WHERE id_promitani = 2
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
*/

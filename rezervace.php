<?php
include 'header.php';
$id_sedacky = filter_input(INPUT_GET, "id_sedacky");
$id_promitani = filter_input(INPUT_GET, "id_promitani");
$status = filter_input(INPUT_GET, "status");
$id_user = $_SESSION['id_user'];
Model::updatePromitani($id_sedacky, $id_promitani, $status, $id_user);
if ($status == 2) {
    ?><h1>Zakoupili jste si serezení</h1><?php
} elseif ($status == 3) {
    ?><h1>Zarezervovali jste si serezení</h1><?php
}

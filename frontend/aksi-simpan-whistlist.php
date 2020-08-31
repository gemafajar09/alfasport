<?php
include "../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$simpan = $con->insert(
  "whistlist",
  array(
    "id" => $_POST["id"],
    "id_user" => $_POST["id_user"],
  )
);

if ($simpan == TRUE) {
  echo json_encode('SUCCESS');
} else {
  echo json_encode('ERROR');
}

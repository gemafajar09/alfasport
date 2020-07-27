<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->query("SELECT tb_diskon.id_diskon, tb_bank.bank, tb_diskon.diskon 
                    FROM tb_diskon
                    JOIN tb_bank ON tb_bank.id_bank = tb_diskon.id_bank 
                    WHERE tb_diskon.id_diskon = '$_POST[id_diskon]' ")->fetch();
echo json_encode($edit);

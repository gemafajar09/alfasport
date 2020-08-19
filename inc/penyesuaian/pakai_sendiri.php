<option value="">-Pilih-</option>
<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->select('tb_karyawan', '*', ['id_toko' => $_POST['id_toko']]);
foreach ($datag as $karyawan) {
?>
    <option value="<?= $karyawan['id_karyawan'] ?>"><?= $karyawan['nama'] ?></option>
<?php } ?>
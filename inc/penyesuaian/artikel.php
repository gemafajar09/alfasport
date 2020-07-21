<option value="">-Pilih-</option>
<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->query("SELECT * FROM tb_stok_toko a JOIN tb_gudang b ON a.id_gudang=b.id_gudang WHERE a.id_toko= '$_POST[id_toko]'")->fetchAll();
foreach ($datag as $gudang) {
?>
    <option value="<?= $gudang['id_stok_toko'] ?>"><?= $gudang['artikel'] ?></option>
<?php } ?>
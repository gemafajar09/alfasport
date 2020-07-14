<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$data = $con->query("SELECT * FROM tb_all_ukuran WHERE id_merek='$_POST[id_merek]' AND id_kategori='$_POST[id_kategori]'")->fetchAll();
?>
<option value="">-PILIH-</option>
<?php foreach($data as $a){ ?>
<option value="<?= $a['id_ukuran'] ?>"><?= $a['ue'] ?></option>
<?php } ?>}
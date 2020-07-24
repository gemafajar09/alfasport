<option selected disabled>Pilih Ukuran</option>
<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$cek = $con->query("SELECT id FROM tb_gudang WHERE id_gudang='$_POST[id]'")->fetch();
$data = $con->query("SELECT a.*, b.ue, b.uk, b.us, b.cm FROM tb_gudang_detail a JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran WHERE id='$cek[id]'")->fetchAll();
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_detail'] . ">" . $a['ue'] . "-" . $a['uk'] . "-" . $a['us'] . "-" . $a['cm'] . "</option>";
}
?>
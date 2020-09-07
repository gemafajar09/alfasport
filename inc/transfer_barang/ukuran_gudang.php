<option selected disabled>Pilih Ukuran</option>
<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$data = $con->query("
SELECT 
b.id_detail,
c.id_ukuran,
c.ue, 
c.uk, 
c.us, 
c.cm
FROM tb_gudang a
LEFT JOIN tb_gudang_detail b
ON a.artikel=b.id
LEFT JOIN tb_all_ukuran c
ON c.id_ukuran=b.id_ukuran")->fetchAll();
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_detail'] . ">" . $a['ue'] . "-" . $a['uk'] . "-" . $a['us'] . "-" . $a['cm'] . "</option>";
}
?>
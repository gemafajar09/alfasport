<option selected disabled>Pilih Ukuran</option>
<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$data = $con->query("
SELECT 
c.id_detail,
d.id_ukuran,
d.ue, 
d.uk, 
d.us, 
d.cm
FROM tb_stok_toko a 
LEFT JOIN tb_gudang b 
ON a.id_gudang=b.id_gudang 
LEFT JOIN tb_gudang_detail c
ON b.artikel=c.id
LEFT JOIN tb_all_ukuran d
ON d.id_ukuran=c.id_ukuran
WHERE a.id_toko='$_POST[id]'")->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $i => $a) {
    echo "<option value=" . $a['id_detail'] . ">" . $a['ue'] . "-" . $a['uk'] . "-" . $a['us'] . "-" . $a['cm'] . "</option>";
}
?>
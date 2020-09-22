<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$id = $_POST['id'];
$tanggal = $_POST['tanggal'];
$id_toko = $_POST['id_toko'];

$con->query("INSERT INTO tb_return VALUES ('$id','$tanggal','$id_toko','$_COOKIE[id_karyawan]')");

$data = $con->query("
SELECT 
b.barcode,
c.artikel,
c.nama,
d.ue,
d.uk,
d.us,
d.cm,
a.id_stok_toko
FROM `tb_stok_toko` a
LEFT JOIN tb_gudang_detail b
ON a.id_gudang = b.id_detail
LEFT JOIN tb_gudang c
ON c.id=b.id
LEFT JOIN tb_all_ukuran d
ON d.id_ukuran=b.id_ukuran
WHERE a.id_toko= '$id_toko'
")->fetchAll(PDO::FETCH_ASSOC);
?>
    <option value="">-PILIH-</option>
<?php
foreach($data as $a):
?>
    <option value="<?= $a['id_stok_toko'] ?>"><?= $a['barcode'] ?>&nbsp;-&nbsp;<?= $a['artikel'] ?>&nbsp;-&nbsp;<?= $a['nama']?>&nbsp;(<?= $a['ue'] ?>/<?= $a['uk'] ?>/<?= $a['us'] ?>/<?= $a['cm'] ?>)</option>
<?php endforeach ?>
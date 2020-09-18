<option value="">-Pilih-</option>
<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$datag = $con->query("SELECT
                        tb_stok_toko.id_stok_toko,
                        tb_stok_toko.id_toko,
                        tb_stok_toko.id_gudang,
                        tb_stok_toko.jumlah,
                        tb_stok_toko.id_ukuran,
                        tb_stok_toko.tanggal,
                        tb_gudang_detail.barcode,
                        tb_gudang.artikel,
                        tb_gudang.nama
                    From
                        tb_stok_toko Inner Join
                        tb_gudang_detail On tb_gudang_detail.id_detail = tb_stok_toko.id_gudang Inner Join
                        tb_gudang On tb_gudang.id = tb_gudang_detail.id
                    WHERE tb_stok_toko.id_toko = '$_POST[id_toko]'
                    ")->fetchAll();

foreach ($datag as $gudang) {
?>
    <option value="<?= $gudang['id_stok_toko'] ?>"><?= $gudang['nama'] ?> - <?= $gudang['artikel'] ?> - <?= $gudang['barcode'] ?></option>
<?php
}
?>
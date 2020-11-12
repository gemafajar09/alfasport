<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// backup lama
// $cek = $con->query("SELECT b.id_gudang FROM tb_penyesuaian_stok_detail a JOIN tb_stok_toko b ON a.id_toko=b.id_toko WHERE a.penyesuaian_stok_id = '$_POST[id]' ")->fetch();
// $data = $con->query("SELECT a.*, b.*, (SELECT artikel FROM tb_gudang WHERE id_gudang = '$cek[id_gudang]' ) as artikel FROM tb_penyesuaian_stok_detail a JOIN tb_penyesuaian_stok b ON a.penyesuaian_stok_id=b.penyesuaian_stok_id WHERE a.penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

$data = $con->query("SELECT     tb_barang.barang_artikel,
tb_barang_detail.barang_detail_barcode,
tb_barang.barang_nama,
tb_barang_toko.barang_detail_id,
tb_penyesuaian_stok_detail.stok_awal,
tb_penyesuaian_stok_detail.stok_penyesuaian,
tb_penyesuaian_stok_detail.stok_akhir,
tb_penyesuaian_stok_detail.penyesuaian_stok_id,
tb_ukuran.sepatu_ue,
tb_ukuran.sepatu_uk,
tb_ukuran.sepatu_us,
tb_ukuran.sepatu_cm
FROM       tb_barang_toko
INNER JOIN tb_barang_detail
ON         tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
INNER JOIN tb_barang
ON         tb_barang.barang_id = tb_barang_detail.barang_id
INNER JOIN tb_ukuran
ON         tb_barang_toko.ukuran_id = tb_ukuran.ukuran_id
INNER JOIN tb_penyesuaian_stok_detail
ON         tb_barang_toko.barang_toko_id = tb_penyesuaian_stok_detail.id_toko
INNER JOIN tb_penyesuaian_stok
ON         tb_penyesuaian_stok_detail.penyesuaian_stok_id = tb_penyesuaian_stok.penyesuaian_stok_id
WHERE      tb_penyesuaian_stok_detail.penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

// Select
//     alfa_sport.tb_gudang.artikel,
//     alfa_sport.tb_gudang_detail.barcode,
//     alfa_sport.tb_gudang.nama,
//     alfa_sport.tb_stok_toko.id_gudang,
//     alfa_sport.tb_penyesuaian_stok_detail.stok_awal,
//     alfa_sport.tb_penyesuaian_stok_detail.stok_penyesuaian,
//     alfa_sport.tb_penyesuaian_stok_detail.stok_akhir,
//     alfa_sport.tb_penyesuaian_stok_detail.penyesuaian_stok_id
// From
//     alfa_sport.tb_stok_toko Inner Join
//     alfa_sport.tb_gudang_detail On alfa_sport.tb_gudang_detail.id_detail = alfa_sport.tb_stok_toko.id_gudang Inner Join
//     alfa_sport.tb_gudang On alfa_sport.tb_gudang.id = alfa_sport.tb_gudang_detail.id Inner Join
//     alfa_sport.tb_penyesuaian_stok_detail On alfa_sport.tb_stok_toko.id_stok_toko =
//             alfa_sport.tb_penyesuaian_stok_detail.id_toko Inner Join
//     alfa_sport.tb_penyesuaian_stok On alfa_sport.tb_penyesuaian_stok_detail.penyesuaian_stok_id =
//             alfa_sport.tb_penyesuaian_stok.penyesuaian_stok_id

foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_detail_barcode'] ?></td>
        <td><?= $a['stok_awal'] ?></td>
        <td><?= $a['stok_penyesuaian'] ?></td>
        <td><?= $a['stok_akhir'] ?></td>
        <td><?= $a['sepatu_ue'] ?></td>
        <td><?= $a['sepatu_uk'] ?></td>
        <td><?= $a['sepatu_us'] ?></td>
        <td><?= $a['sepatu_cm'] ?></td>
    </tr>
<?php
}
?>
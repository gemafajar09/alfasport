<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// backup lama
// $cek = $con->query("SELECT b.id_gudang FROM tb_penyesuaian_stok_detail a JOIN tb_stok_toko b ON a.id_toko=b.id_toko WHERE a.penyesuaian_stok_id = '$_POST[id]' ")->fetch();
// $data = $con->query("SELECT a.*, b.*, (SELECT artikel FROM tb_gudang WHERE id_gudang = '$cek[id_gudang]' ) as artikel FROM tb_penyesuaian_stok_detail a JOIN tb_penyesuaian_stok b ON a.penyesuaian_stok_id=b.penyesuaian_stok_id WHERE a.penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

$data = $con->query("SELECT 
                        tb_gudang.artikel, 
                        tb_gudang_detail.barcode, 
                        tb_gudang.nama, 
                        tb_stok_toko.id_gudang, 
                        tb_penyesuaian_stok_detail.stok_awal, 
                        tb_penyesuaian_stok_detail.stok_penyesuaian, 
                        tb_penyesuaian_stok_detail.stok_akhir, 
                        tb_penyesuaian_stok_detail.penyesuaian_stok_id,
                        tb_all_ukuran.ue,
                        tb_all_ukuran.uk,
                        tb_all_ukuran.us,
                        tb_all_ukuran.cm
                        From 
                        tb_stok_toko 
                        Inner Join 
                        tb_gudang_detail On tb_gudang_detail.id_detail = tb_stok_toko.id_gudang 
                        Inner Join 
                        tb_gudang On tb_gudang.id = tb_gudang_detail.id 
                        Inner Join 
                        tb_all_ukuran On tb_stok_toko.id_ukuran = tb_all_ukuran.id_ukuran
                        Inner Join 
                        tb_penyesuaian_stok_detail On tb_stok_toko.id_stok_toko = tb_penyesuaian_stok_detail.id_toko 
                        Inner Join tb_penyesuaian_stok On tb_penyesuaian_stok_detail.penyesuaian_stok_id = tb_penyesuaian_stok.penyesuaian_stok_id WHERE tb_penyesuaian_stok_detail.penyesuaian_stok_id = '$_POST[id]'")->fetchAll();

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
        <td><?= $a['nama'] ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['barcode'] ?></td>
        <td><?= $a['stok_awal'] ?></td>
        <td><?= $a['stok_penyesuaian'] ?></td>
        <td><?= $a['stok_akhir'] ?></td>
        <td><?= $a['ue'] ?></td>
        <td><?= $a['uk'] ?></td>
        <td><?= $a['us'] ?></td>
        <td><?= $a['cm'] ?></td>
    </tr>
<?php
}
?>
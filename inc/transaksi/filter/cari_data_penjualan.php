<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("table" => null);

if ($_POST['id_toko'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_detail.detail_tgl,
                                    SUM(tb_transaksi_detail.detail_jumlah_beli) AS detail_jumlah_beli,
                                    tb_transaksi.transaksi_id,
                                    tb_transaksi.id_toko,
                                    tb_barang.barang_id,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    toko.nama_toko,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm
                                From
                                    tb_transaksi_detail Inner Join
                                    tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                    Inner Join
                                    tb_barang_detail On tb_barang_detail.id_detail = tb_transaksi_detail.id_gudang
                                    Inner Join
                                    tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id Inner Join
                                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                                    toko On toko.id_toko = tb_transaksi.id_toko
                                WHERE tb_barang.id_gudang = '$_POST[artikel]'
                                GROUP BY tb_ukuran.sepatu_ue")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_detail.detail_tgl,
                                    SUM(tb_transaksi_detail.detail_jumlah_beli) AS detail_jumlah_beli,
                                    tb_transaksi.transaksi_id,
                                    tb_transaksi.id_toko,
                                    tb_barang.barang_id,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    toko.nama_toko,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm
                                From
                                    tb_transaksi_detail Inner Join
                                    tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                    Inner Join
                                    tb_barang_detail On tb_barang_detail.id_detail = tb_transaksi_detail.id_gudang
                                    Inner Join
                                    tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id Inner Join
                                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                                    toko On toko.id_toko = tb_transaksi.id_toko
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                AND tb_transaksi_detail.id_toko = '$_POST[id_toko]'
                                GROUP BY tb_ukuran.sepatu_ue")->fetchAll();
}
// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['sepatu_ue'] ?></td>
        <td style="display: none;" class="ukuran_us" id="ukuran_us" name="ukuran_us"><?= $a['sepatu_us'] ?></td>
        <td style="display: none;" class="ukuran_uk" id="ukuran_uk" name="ukuran_uk"><?= $a['sepatu_uk'] ?></td>
        <td style="display: none;" class="ukuran_cm" id="ukuran_cm" name="ukuran_cm"><?= $a['sepatu_cm'] ?></td>
        <td><?= $a['detail_jumlah_beli'] ?></td>
        <td><?= tgl_indo($a['detail_tgl']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
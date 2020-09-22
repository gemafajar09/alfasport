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
                                    tb_gudang.id,
                                    tb_gudang.artikel,
                                    tb_gudang.nama,
                                    toko.nama_toko,
                                    tb_all_ukuran.ue,
                                    tb_all_ukuran.uk,
                                    tb_all_ukuran.us,
                                    tb_all_ukuran.cm
                                From
                                    tb_transaksi_detail Inner Join
                                    tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                    Inner Join
                                    tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_detail.id_gudang
                                    Inner Join
                                    tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_gudang_detail.id_ukuran Inner Join
                                    tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
                                    toko On toko.id_toko = tb_transaksi.id_toko
                                WHERE tb_gudang.id_gudang = '$_POST[artikel]'
                                GROUP BY tb_all_ukuran.ue, tb_transaksi.id_toko")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_detail.detail_tgl,
                                    SUM(tb_transaksi_detail.detail_jumlah_beli) AS detail_jumlah_beli,
                                    tb_transaksi.transaksi_id,
                                    tb_transaksi.id_toko,
                                    tb_gudang.id,
                                    tb_gudang.artikel,
                                    tb_gudang.nama,
                                    toko.nama_toko,
                                    tb_all_ukuran.ue,
                                    tb_all_ukuran.uk,
                                    tb_all_ukuran.us,
                                    tb_all_ukuran.cm
                                From
                                    tb_transaksi_detail Inner Join
                                    tb_transaksi On tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                    Inner Join
                                    tb_gudang_detail On tb_gudang_detail.id_detail = tb_transaksi_detail.id_gudang
                                    Inner Join
                                    tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_gudang_detail.id_ukuran Inner Join
                                    tb_gudang On tb_gudang.id = tb_gudang_detail.id Inner Join
                                    toko On toko.id_toko = tb_transaksi.id_toko
                                WHERE tb_gudang.id_gudang = '$_POST[artikel]'
                                AND tb_transaksi_detail.id_toko = '$_POST[id_toko]'
                                GROUP BY tb_all_ukuran.ue, tb_transaksi.id_toko")->fetchAll();
}
// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['ue'] ?></td>
        <td style="display: none;" class="ukuran_us" id="ukuran_us" name="ukuran_us"><?= $a['us'] ?></td>
        <td style="display: none;" class="ukuran_uk" id="ukuran_uk" name="ukuran_uk"><?= $a['uk'] ?></td>
        <td style="display: none;" class="ukuran_cm" id="ukuran_cm" name="ukuran_cm"><?= $a['cm'] ?></td>
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
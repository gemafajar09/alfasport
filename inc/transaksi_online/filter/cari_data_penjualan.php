<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("table" => null);

if ($_POST['id_toko'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_online_detail.transol_detail_tgl,
                                    SUM(tb_transaksi_online_detail.transol_detail_jumlah_beli) AS transol_detail_jumlah_beli,
                                    tb_transaksi_online.transol_id,
                                    tb_transaksi_online.id_toko,
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    toko.nama_toko,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_ukuran.barang_lainnya_nama_ukuran
                                From
                                    tb_transaksi_online_detail 
                                Inner Join
                                    tb_transaksi_online On tb_transaksi_online.transol_id = tb_transaksi_online_detail.transol_id
                                Inner Join
                                    tb_barang_detail On tb_barang_detail.barang_detail_id = tb_transaksi_online_detail.id_gudang
                                Inner Join
                                    tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                Inner Join
                                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id 
                                Inner Join
                                    toko On toko.id_toko = tb_transaksi_online.id_toko
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                GROUP BY tb_barang.barang_nama")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_online_detail.transol_detail_tgl,
                                    SUM(tb_transaksi_online_detail.transol_detail_jumlah_beli) AS transol_detail_jumlah_beli,
                                    tb_transaksi_online.transol_id,
                                    tb_transaksi_online.id_toko,
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    toko.nama_toko,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_ukuran.barang_lainnya_nama_ukuran
                                From
                                    tb_transaksi_online_detail 
                                Inner Join
                                    tb_transaksi_online On tb_transaksi_online.transol_id = tb_transaksi_online_detail.transol_id
                                Inner Join
                                    tb_barang_detail On tb_barang_detail.barang_detail_id = tb_transaksi_online_detail.id_gudang
                                Inner Join
                                    tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                Inner Join
                                    tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id 
                                Inner Join
                                    toko On toko.id_toko = tb_transaksi_online.id_toko
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                AND tb_transaksi_online_detail.id_toko = '$_POST[id_toko]'
                                GROUP BY tb_barang.barang_nama")->fetchAll();

    // grup berdasarkan id_toko=> , tb_transaksi_online.id_toko
}
// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td>
            <?php
            if ($a['barang_kategori'] == 'Sepatu') {
                echo "EU : " . $a['sepatu_ue'] . " | UK : " . $a['sepatu_ue'] . " | US : " . $a['sepatu_us'] . " | CM : " . $a['sepatu_cm'];
            } else if ($a['barang_kategori'] == 'Kaos Kaki') {
                echo "EU : " . $a['kaos_kaki_eu'] . " | Size : " . $a['kaos_kaki_size'];
            } else if ($a['barang_kategori'] == 'Barang Lainnya') {
                echo "Ukuran : " . $a['barang_lainnya_nama_ukuran'];
            }
            ?>
        </td>
        <td><?= $a['transol_detail_jumlah_beli'] ?></td>
        <td><?= tgl_indo($a['transol_detail_tgl']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending dihapus
ob_end_clean();
echo json_encode($json);
?>
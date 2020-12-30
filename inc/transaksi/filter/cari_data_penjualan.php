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
                                FROM
                                    tb_transaksi_detail
                                INNER JOIN tb_transaksi ON
                                    tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_detail_id = tb_transaksi_detail.id_gudang
                                INNER JOIN tb_barang ON
                                    tb_barang.barang_id = tb_barang_detail.barang_id
                                INNER JOIN toko ON
                                    toko.id_toko = tb_transaksi_detail.id_toko
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                WHERE tb_barang.barang_id = '$_POST[artikel]'    
                                GROUP BY tb_transaksi_detail.detail_tgl")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_transaksi_detail.detail_tgl,
                                    SUM(tb_transaksi_detail.detail_jumlah_beli) AS detail_jumlah_beli,
                                    tb_transaksi.transaksi_id,
                                    tb_transaksi.id_toko,
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
                                FROM
                                    tb_transaksi_detail
                                INNER JOIN tb_transaksi ON
                                    tb_transaksi.transaksi_id = tb_transaksi_detail.transaksi_id
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_detail_id = tb_transaksi_detail.id_gudang
                                INNER JOIN tb_barang ON
                                    tb_barang.barang_id = tb_barang_detail.barang_id
                                INNER JOIN toko ON
                                    toko.id_toko = tb_transaksi_detail.id_toko
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                AND tb_transaksi_detail.id_toko = '$_POST[id_toko]'
                                GROUP BY tb_transaksi_detail.detail_tgl")->fetchAll();
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
<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("table" => null);
if ($_POST['supplier_id'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    tb_barang_detail.barang_detail_barcode,
                                    tb_supplier.supplier_nama,
                                    tb_ukuran.barang_lainnya_nama_ukuran,
                                    tb_beli_detail.beli_detail_jml,
                                    tb_beli_detail.barang_detail_id,
                                    tb_beli.beli_tgl_beli
                                FROM
                                    tb_barang
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_id = tb_barang.barang_id
                                INNER JOIN tb_beli_detail ON
                                    tb_beli_detail.barang_detail_id = tb_barang_detail.barang_detail_id
                                INNER JOIN tb_beli ON
                                    tb_beli.beli_id = tb_beli_detail.beli_id
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                INNER JOIN tb_supplier ON
                                    tb_supplier.supplier_id = tb_beli.supplier_id
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                AND tb_barang.barang_kategori = 'Barang Lainnya'
                                ")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    tb_barang_detail.barang_detail_barcode,
                                    tb_supplier.supplier_nama,
                                    tb_ukuran.barang_lainnya_nama_ukuran,
                                    tb_beli_detail.beli_detail_jml,
                                    tb_beli_detail.barang_detail_id,
                                    tb_beli.beli_tgl_beli
                                FROM
                                    tb_barang
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_id = tb_barang.barang_id
                                INNER JOIN tb_beli_detail ON
                                    tb_beli_detail.barang_detail_id = tb_barang_detail.barang_detail_id
                                INNER JOIN tb_beli ON
                                    tb_beli.beli_id = tb_beli_detail.beli_id
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                INNER JOIN tb_supplier ON
                                    tb_supplier.supplier_id = tb_beli.supplier_id
                                WHERE tb_barang.barang_id = '$_POST[artikel]'
                                AND tb_supplier.supplier_id = '$_POST[supplier_id]'
                                AND tb_barang.barang_kategori = 'Barang Lainnya'")->fetchAll();
}
// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['barang_detail_barcode'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['barang_lainnya_nama_ukuran'] ?></td>
        <td><?= $a['beli_detail_jml'] ?></td>
        <td><?= tgl_indo($a['beli_tgl_beli']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("table" => null);

if ($_POST['supplier_id'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    tb_gudang.id,
                                    tb_gudang.artikel,
                                    tb_gudang.nama,
                                    tb_pembelian_detail.detail_jumlah,
                                    tb_pembelian_detail.id_gudang_detail,
                                    tb_pembelian.pembelian_tgl_beli,
                                    tb_supplier.supplier_nama,
                                    tb_pembelian.pembelian_id,
                                    tb_all_ukuran.ue,
                                    tb_all_ukuran.uk,
                                    tb_all_ukuran.us,
                                    tb_all_ukuran.cm
                                From
                                    tb_gudang Inner Join
                                    tb_gudang_detail On tb_gudang.id = tb_gudang_detail.id Inner Join
                                    tb_pembelian_detail On
                                            tb_gudang_detail.id_detail = tb_pembelian_detail.id_gudang_detail Inner Join
                                    tb_pembelian On tb_pembelian_detail.pembelian_id = tb_pembelian.pembelian_id
                                    Inner Join
                                    tb_supplier On tb_supplier.supplier_id = tb_pembelian.supplier_id Inner Join
                                    tb_all_ukuran On tb_gudang_detail.id_ukuran = tb_all_ukuran.id_ukuran
                                WHERE tb_pembelian_detail.id_gudang_detail = '$_POST[artikel]'
            ")->fetchAll();
} else {
    $json['table'] = $con->query("SELECT
                                tb_gudang.id,
                                tb_gudang.artikel,
                                tb_gudang.nama,
                                    tb_pembelian_detail.id_gudang_detail,
                                tb_pembelian_detail.detail_jumlah,
                                tb_pembelian.pembelian_tgl_beli,
                                tb_supplier.supplier_nama,
                                tb_supplier.supplier_id,
                                tb_pembelian.pembelian_id,
                                tb_all_ukuran.ue,
                                tb_all_ukuran.uk,
                                tb_all_ukuran.us,
                                tb_all_ukuran.cm
                            From
                                tb_gudang Inner Join
                                tb_gudang_detail On tb_gudang.id = tb_gudang_detail.id Inner Join
                                tb_pembelian_detail On
                                        tb_gudang_detail.id_detail = tb_pembelian_detail.id_gudang_detail Inner Join
                                tb_pembelian On tb_pembelian_detail.pembelian_id = tb_pembelian.pembelian_id
                                Inner Join
                                tb_supplier On tb_supplier.supplier_id = tb_pembelian.supplier_id Inner Join
                                tb_all_ukuran On tb_gudang_detail.id_ukuran = tb_all_ukuran.id_ukuran
                    WHERE tb_pembelian_detail.id_gudang_detail = '$_POST[artikel]'
                    AND tb_supplier.supplier_id = '$_POST[supplier_id]'
            ")->fetchAll();
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
        <td><?= $a['detail_jumlah'] ?></td>
        <td><?= tgl_indo($a['pembelian_tgl_beli']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
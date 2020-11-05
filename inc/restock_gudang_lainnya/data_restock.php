<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_id,
                        tb_gudang_lainnya_detail.gudang_lainnya_kode,
                        tb_gudang_lainnya_detail.ukuran_barang_detail_id,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_tgl,
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_ukuran_barang_detail.ukuran_barang_detail_nama
                    FROM
                    tb_gudang_lainnya
                    INNER JOIN tb_gudang_lainnya_detail ON
                    tb_gudang_lainnya_detail.gudang_lainnya_kode = tb_gudang_lainnya.gudang_lainnya_kode
                    INNER JOIN tb_ukuran_barang_detail ON
                    tb_ukuran_barang_detail.ukuran_barang_detail_id = tb_gudang_lainnya_detail.ukuran_barang_detail_id
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="gudang_lainnya_detail_id[]" value="<?= $a['gudang_lainnya_detail_id'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $i + 1 ?></td>
        <td><?= $a['gudang_lainnya_nama'] ?></td>
        <td><?= $a['gudang_lainnya_artikel'] ?></td>
        <td><?= $a['gudang_lainnya_detail_barcode'] ?></td>
        <td><?= $a['ukuran_barang_detail_nama'] ?></td>
        <td><?= $a['gudang_lainnya_detail_jumlah'] ?></td>
        <td><?= tgl_indo($a['gudang_lainnya_detail_tgl']) ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['gudang_lainnya_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></button>
            <button type="button" onclick="detail('<?= $a['gudang_lainnya_detail_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
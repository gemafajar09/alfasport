<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id,
                        tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_tgl,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode
                    From
                    tb_gudang_kaos_kaki Inner Join
                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode =
                            tb_gudang_kaos_kaki.gudang_kaos_kaki_kode Inner Join
                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                            tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="gudang_kaos_kaki_detail_id[]" value="<?= $a['gudang_kaos_kaki_detail_id'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $i + 1 ?></td>
        <td><?= $a['gudang_kaos_kaki_nama'] ?></td>
        <td><?= $a['gudang_kaos_kaki_artikel'] ?></td>
        <td><?= $a['gudang_kaos_kaki_detail_barcode'] ?></td>
        <td><?= $a['ukuran_kaos_kaki_ue'] ?></td>
        <td><?= $a['ukuran_kaos_kaki_size'] ?></td>
        <td><?= $a['gudang_kaos_kaki_detail_jumlah'] ?></td>
        <td><?= $a['gudang_kaos_kaki_detail_tgl'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['gudang_kaos_kaki_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></button>
            <button type="button" onclick="detail('<?= $a['gudang_kaos_kaki_detail_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
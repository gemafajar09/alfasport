<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
    tb_gudang_detail.id_detail,
    tb_gudang_detail.id_ukuran,
    tb_gudang_detail.jumlah,
    tb_gudang_detail.barcode,
    tb_gudang_detail.tanggal,
    tb_gudang.artikel,
    tb_gudang.nama,
    tb_all_ukuran.ue,
    tb_all_ukuran.uk,
    tb_all_ukuran.us,
    tb_all_ukuran.cm,
    tb_gudang_detail.id
From
    tb_gudang Inner Join
    tb_gudang_detail On tb_gudang.id = tb_gudang_detail.id Inner Join
    tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_gudang_detail.id_ukuran
")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="id_detail[]" value="<?= $a['id_detail'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['barcode'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['ue'] ?></td>
        <td><?= $a['uk'] ?></td>
        <td><?= $a['us'] ?></td>
        <td><?= $a['cm'] ?></td>
        <td><?= $a['jumlah'] ?></td>
        <td><?= $a['tanggal'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['id_detail'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></button>
            <button type="button" onclick="detail('<?= $a['id_detail'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
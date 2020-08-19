<?php
include "../../config/koneksi.php";
$data = $con->query("
Select
    alfa_sport.tb_gudang_detail.id_detail,
    alfa_sport.tb_gudang_detail.id_ukuran,
    alfa_sport.tb_gudang_detail.jumlah,
    alfa_sport.tb_gudang_detail.barcode,
    alfa_sport.tb_gudang_detail.tanggal,
    alfa_sport.tb_gudang.artikel,
    alfa_sport.tb_gudang.nama,
    alfa_sport.tb_all_ukuran.ue,
    alfa_sport.tb_all_ukuran.uk,
    alfa_sport.tb_all_ukuran.us,
    alfa_sport.tb_all_ukuran.cm,
    alfa_sport.tb_gudang_detail.id
From
    alfa_sport.tb_gudang Inner Join
    alfa_sport.tb_gudang_detail On alfa_sport.tb_gudang.id = alfa_sport.tb_gudang_detail.id Inner Join
    alfa_sport.tb_all_ukuran On alfa_sport.tb_all_ukuran.id_ukuran = alfa_sport.tb_gudang_detail.id_ukuran
")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="id_detail[]" value="<?= $a['id_detail'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['tanggal'] ?></td>
        <td><?= $a['jumlah'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['id_detail'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-plus"> Restock Barang</i></button>
        </td>
    </tr>
<?php } ?>
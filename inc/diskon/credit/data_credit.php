<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_metode")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['kategori'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['id_metode'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="" class="btn btn-success btn-sm"><i class="fa fa-search"></i></button>
        </td>
    </tr>
<?php } ?>
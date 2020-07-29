<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_metode")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['kategori'] ?></td>
        <td class="text-center">
            <a href="detail-data-diskon-<?= $a['id_metode'] ?>.html" class="btn btn-success btn-sm"><i class="fa fa-search"></i></a>
        </td>
    </tr>
<?php } ?>
<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_jabatan")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['jabatan_nama'] ?></td>
        <td><?= $a['jabatan_jobdesk'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['jabatan_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['jabatan_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
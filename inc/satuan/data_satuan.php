<?php
include "../../config/koneksi.php";
$data = $con->select("tb_satuan", "*");
foreach ($data as $i => $a) {
?>
    <tr>
        <td class="text-center"><?= $i + 1 ?></td>
        <td><?= $a['satuan_nama'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['satuan_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['satuan_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
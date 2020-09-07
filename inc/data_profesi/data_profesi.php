<?php
include "../../config/koneksi.php";
$data = $con->select("tb_data_profesi", "*");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['data_profesi_nama'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['data_profesi_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['data_profesi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
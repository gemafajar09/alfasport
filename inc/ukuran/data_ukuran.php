<?php
include "../../config/koneksi.php";
$data = $con->select("tb_ukuran", "*");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['ukuran_nama'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['ukuran_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['ukuran_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
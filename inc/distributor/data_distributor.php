<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_distributor");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['distributor_nama'] ?></td>
        <td><?= $a['distributor_perusahaan'] ?></td>
        <td><?= $a['distributor_notelp'] ?></td>
        <td><?= $a['distributor_email'] ?></td>
        <td><?= $a['distributor_alamat'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['distributor_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['distributor_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
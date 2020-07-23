<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->select('tb_member', '*');
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['member_kode'] ?></td>
        <td><?= $a['member_nama'] ?></td>
        <td><?= $a['member_email'] ?></td>
        <td><?= $a['member_alamat'] ?></td>
        <td><?= $a['member_notelp'] ?></td>
        <td><?= tgl_indo($a['member_tgl_lahir']) ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['member_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['member_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
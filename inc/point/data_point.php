<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_point JOIN tb_member ON tb_member.member_id = tb_point.member_id")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['member_nama'] ?></td>
        <td><?= $a['point_jumlah'] ?></td>
        <!-- <td class="text-center">
            <button type="button" onclick="edit('<?= $a['point_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['point_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td> -->
    </tr>
<?php } ?>
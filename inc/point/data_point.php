<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_member_point JOIN tb_member ON tb_member.member_id = tb_member_point.member_id")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['member_nama'] ?></td>
        <td><?= $a['member_notelp'] ?></td>
        <td><?= $a['member_email'] ?></td>
        <td><?= number_format($a['point']) ?></td>
        <td><?= number_format($a['royalti']) ?></td>
        <td>
            <?php
            if ($a['royalti'] <= 3499999) {
                echo "
                <div style='border: 1px solid #ccc; background: #22dec4' class='text-center'>
                    <b>Silver</b>
                </div>
                ";
            } elseif ($a['royalti'] <= 3500000 and $a['royalti'] <= 10000000) {
                echo "
                <div style='border: 1px solid #ccc; background: #22dec4' class='text-center'>
                    <b>Gold</b>
                </div>
                ";
            } else {
                echo "
                <div style='border: 1px solid #ccc; background: #22dec4' class='text-center'>
                    <b>Platinum</b>
                </div>
            ";
            }
            ?>
        </td>
        <!-- <td class="text-center">
            <button type="button" onclick="edit('<?= $a['point_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['point_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td> -->
    </tr>
<?php } ?>
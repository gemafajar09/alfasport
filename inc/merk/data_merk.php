<?php
include "../../config/koneksi.php";
$data = $con->select("tb_merk", "*");
foreach ($data as $i => $a) {
?>
    <tr>
        <td style="width:40px"><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td style="width:180px">
        <center>
            <button type="button" onclick="size('<?= $a['merk_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-search"></i></button>
            <button type="button" onclick="edit('<?= $a['merk_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['merk_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </center>
        </td>
    </tr>
<?php } ?>
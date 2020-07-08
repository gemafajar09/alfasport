<?php
include "../../config/koneksi.php";
$data = $con->select('tb_member','*');
foreach($data as $i => $a)
{
?>
<tr>
    <td><?= $i+1 ?></td>
    <td><?= $a['nama_member'] ?></td>
    <td><?= $a['alamat'] ?></td>
    <td><?= $a['no_telpon'] ?></td>
    <td><?= $a['no_hp'] ?></td>
    <td>
        <button type="button" onclick="edit('<?= $a['id_member'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
        <button type="button" id="hapus" onclick="hapus('<?= $a['id_member'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
    </td>
</tr>
<?php } ?>
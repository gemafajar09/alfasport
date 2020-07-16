<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT * FROM toko");
foreach($data as $i => $a){
?>
    <tr>
        <td><?= $i+1 ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['alamat_toko'] ?></td>
        <td><?= $a['telpon_toko'] ?></td>
        <td><?= $a['hp_toko'] ?></td>
        <td><?= $a['email'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['id_toko'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_toko'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
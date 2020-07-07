<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_supplier");
foreach($data as $i => $a){
?>
    <tr>
        <td><?= $i+1 ?></td>
        <td><?= $a['supplier_nama'] ?></td>
        <td><?= $a['supplier_perusahaan'] ?></td>
        <td><?= $a['supplier_notelp'] ?></td>
        <td><?= $a['supplier_email'] ?></td>
        <td><?= $a['supplier_alamat'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['supplier_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['supplier_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
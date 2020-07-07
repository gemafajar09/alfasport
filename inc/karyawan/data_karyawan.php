<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_karyawan");
foreach($data as $i => $a){
?>
    <tr>
        <td><?= $i+1 ?></td>
        <td><?= $a['id'] ?></td>
        <td><?= $a['nik'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['alamat'] ?></td>
        <td><?= $a['no_telpon'] ?></td>
        <td><?= $a['jabatan'] ?></td>
        <td><?= $a['toko'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['id_karyawan'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_karyawan'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
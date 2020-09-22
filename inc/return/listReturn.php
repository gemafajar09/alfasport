<?php
include "../../config/koneksi.php";

$data = $con->query("
SELECT 
a.id_return,
b.nama_toko,
c.nama,
a.tanggal
FROM tb_return a 
LEFT JOIN toko b 
ON b.id_toko=a.id_toko 
LEFT JOIN tb_karyawan c 
ON c.id_karyawan=a.id_karyawan
")->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $i => $a):
?>
    <tr>
        <td><?= $i+1 ?></td>
        <td><?= $a['id_return'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['tanggal'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td class="text-center">
            <button type="button" onclick="views('<?= $a['id_return'] ?>')" class="btn btn-outline-primary btn-round"><i class="fa fa-eye"></i></button>
            <!-- <button type="button" onclick="edit('<?= $a['id_return'] ?>')" class="btn btn-outline-primary btn-round"><i class="fa fa-pencil"></i></button> -->
            <button type="button" onclick="hapus('<?= $a['id_return'] ?>')" class="btn btn-outline-primary btn-round"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach ?>
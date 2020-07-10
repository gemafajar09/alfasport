<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_detail_ukuran 
                        JOIN tb_ukuran ON tb_ukuran.ukuran_id = tb_detail_ukuran.ukuran_id
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['ukuran_nama'] ?></td>
        <td><?= $a['detail_ukuran_ukuran'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['detail_ukuran_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['detail_ukuran_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
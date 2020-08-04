<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_all_ukuran JOIN tb_merk ON tb_merk.merk_id = tb_all_ukuran.id_merek");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['ue'] ?></td>
        <td><?= $a['uk'] ?></td>
        <td><?= $a['us'] ?></td>
        <td><?= $a['cm'] ?></td>
    </tr>
<?php } ?>
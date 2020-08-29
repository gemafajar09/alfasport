<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

?>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ukuran</th>
            <th>Jumlah Stok</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data_table = $con->query("SELECT * FROM tb_ukuran_baju_detail WHERE ukuran_baju_id = '$_POST[ukuran_baju_id]'")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $data['ukuran_baju_detail_nama'] ?></td>
                <td><?= $data['ukuran_baju_detail_stok'] ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
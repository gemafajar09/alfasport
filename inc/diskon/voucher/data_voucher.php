<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_voucher")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['voucher_nama'] ?></td>
        <td><?= $a['voucher_kode'] ?></td>
        <td>
            <?php
            if ($a['voucher_status'] == 0) {
                echo "<p style='color: blue'>Belum Dipakai</p>";
            } else {
                echo "<p style='color: red'>Sudah Dipakai</p>";
            }
            ?>
        </td>
    </tr>
<?php } ?>
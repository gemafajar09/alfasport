<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$tgl_sekarang = date("Y-m-d");

$data = $con->query("SELECT a.*, b.* 
                    FROM tb_voucher a 
                    LEFT JOIN toko b ON a.id_toko = b.id_toko
                    WHERE a.voucher_tgl_akhir < '$tgl_sekarang'
                    AND a.voucher_tgl_mulai < '$tgl_sekarang'
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['voucher_nama'] ?></td>
        <td><?= $a['voucher_harga'] ?></td>
        <td><?= $a['voucher_generate'] ?></td>
        <td><?= tgl_indo($a['voucher_tgl_mulai']) ?></td>
        <td><?= tgl_indo($a['voucher_tgl_akhir']) ?></td>
        <td>
            <?php
            if ($a['voucher_status'] == 0) {
                echo "<p style='color: blue'>Belum Dipakai</p>";
            } else {
                echo "<p style='color: red'>Sudah Dipakai</p>";
            }
            ?>
        </td>
        <td>
            <?php
            if ($a['id_toko'] == 0) {
                echo "Semua Toko";
            } else {
                echo $a['nama_toko'];
            }
            ?>
        </td>
    </tr>
<?php } ?>
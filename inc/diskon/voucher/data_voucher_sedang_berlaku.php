<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$tgl_sekarang = date("Y-m-d");

$data = $con->query("SELECT a.*, b.* 
                    FROM tb_voucher a 
                    LEFT JOIN toko b ON a.id_toko = b.id_toko
                    WHERE a.voucher_tgl_akhir >= '$tgl_sekarang'
                    AND a.voucher_tgl_mulai <= '$tgl_sekarang'
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['voucher_nama'] ?></td>
        <td><?= $a['voucher_jenis'] ?></td>
        <td>
            <?php
            if ($a['voucher_jenis'] == 'harga') {
                echo "Rp." . number_format($a['voucher_harga']);
            } else {
                echo  $a['voucher_harga'] . "%";
            }
            ?>
        </td>
        <td><?= tgl_indo($a['voucher_tgl_mulai']) ?></td>
        <td><?= tgl_indo($a['voucher_tgl_akhir']) ?></td>
        <td>
            <?php
            if ($a['id_toko'] == 0) {
                echo "Semua Toko";
            } else {
                echo $a['nama_toko'];
            }
            ?>
        </td>
        <td>
            <a href="detail-voucher-<?= $a['voucher_id'] ?>.html" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
        </td>
    </tr>
<?php } ?>
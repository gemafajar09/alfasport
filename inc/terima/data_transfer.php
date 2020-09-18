<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT 
                        tb_transfer.id_transfer, 
                        toko.nama_toko AS asal, 
                        toko1.nama_toko As tujuan, 
                        tb_transfer.tanggal, 
                        tb_transfer.acc_owner 
                        FROM tb_transfer 
                        JOIN toko ON toko.id_toko = tb_transfer.id_toko 
                        JOIN toko toko1 ON toko1.id_toko = tb_transfer.id_toko_tujuan 
                        GROUP BY tb_transfer.kode_transfer 
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['asal'] ?></td>
        <td><?= $a['tujuan'] ?></td>
        <td><?= tgl_indo($a['tanggal'])  ?></td>
        <td>
            <?php if ($a['acc_owner'] == 0) {
                echo "<span style='color:red;'>Belum Di Acc</span>";
            } else if ($a['acc_owner'] == 1) {
            ?>
                <button type="button" onclick="cekBarang('<?= $a['id_transfer'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"> Cek Kelengkapan Barang</i></button>
            <?php
            } else if ($a['acc_owner'] == 3) {
            ?>
                <button class="btn btn-success btn-sm"><i class="fa fa-"> Success</i></button>
            <?php
            }else if ($a['acc_owner'] == 4) { ?>
                <button class="btn btn-info btn-sm"><i class="fa fa-"> Tidak lengkap</i></button>
            <?php } ?>
        </td>
    </tr>
<?php } ?>
<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT
                    tb_transfer_barang.transfer_barang_id,
                    tb_transfer_barang.transfer_barang_kode,
                    tb_transfer_barang.transfer_barang_tgl,
                    tb_transfer_barang.transfer_barang_acc_owner,
                    toko.nama_toko as nama_toko_asal,
                    toko1.nama_toko As nama_toko_tujuan
                    From
                    tb_transfer_barang Inner Join
                    toko On toko.id_toko = tb_transfer_barang.id_toko Inner Join
                    toko toko1 On toko1.id_toko = tb_transfer_barang.id_toko_tujuan
                    GROUP BY tb_transfer_barang.transfer_barang_kode
                    ORDER BY tb_transfer_barang.transfer_barang_id DESC
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['transfer_barang_kode'] ?></td>
        <td><?= $a['nama_toko_asal'] ?></td>
        <td><?= $a['nama_toko_tujuan'] ?></td>
        <td><?= tgl_indo($a['transfer_barang_tgl'])  ?></td>
        <td>
            <?php
            if ($a['transfer_barang_acc_owner'] == 0) {
                echo "<span style='color:red;'>Belum Di Acc</span>";
            } else if ($a['transfer_barang_acc_owner'] == 1) {
            ?>
                <button type="button" onclick="cekBarang('<?= $a['transfer_barang_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"> Cek Kelengkapan Barang</i></button>
            <?php
            } else if ($a['transfer_barang_acc_owner'] == 2) {
            ?>
                <button class="btn btn-danger btn-sm"> Ditolak</button>
            <?php
            } else if ($a['transfer_barang_acc_owner'] == 3) {
            ?>
                <button class="btn btn-success btn-sm"><i class="fa fa-"> Success</i></button>
            <?php
            } else if ($a['transfer_barang_acc_owner'] == 4) { ?>
                <button class="btn btn-info btn-sm"><i class="fa fa-"> Tidak lengkap</i></button>
            <?php } ?>
        </td>
    </tr>
<?php } ?>
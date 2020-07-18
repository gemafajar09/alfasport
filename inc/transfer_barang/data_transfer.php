<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT 
                        tb_transfer.id_transfer,
                        toko.nama_toko AS asal,
                        toko1.nama_toko As tujuan,
                        tb_gudang.nama,
                        tb_transfer.jumlah,
                        tb_transfer.tanggal,
                        tb_transfer.acc_owner
                    FROM tb_transfer
                    JOIN tb_gudang ON tb_gudang.id_gudang = tb_transfer.id_gudang
                    JOIN toko ON toko.id_toko = tb_transfer.id_toko
                    JOIN toko toko1 ON toko1.id_toko = tb_transfer.id_toko_tujuan
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['asal'] ?></td>
        <td><?= $a['tujuan'] ?></td>
        <td><?= $a['nama']  ?></td>
        <td><?= $a['jumlah']  ?></td>
        <td><?= tgl_indo($a['tanggal'])  ?></td>
        <td>
            <?php if ($a['acc_owner'] == 0) {
                echo "<span style='color:red;'>Belum Di Acc</span>";
            } else {
                echo "Sudah Di Acc";
            } ?>
        </td>

        <!-- <td>
            <button type="button" onclick="edit('<?= $a['id_transfer'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_transfer'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td> -->
    </tr>
<?php } ?>
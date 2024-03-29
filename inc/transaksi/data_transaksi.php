<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT a.transaksi_id,
                        a.transaksi_kode,
                        b.nama_toko,
                        e.kategori,
                        a.transaksi_cash,
                        a.transaksi_debit,
                        a.transaksi_point,
                        a.transaksi_total_belanja,
                        d.bank,
                        a.transaksi_create_at,
                        c.nama,
                        a.keterangan
                    FROM tb_transaksi a
                    LEFT JOIN toko b ON a.id_toko=b.id_toko
                    LEFT JOIN tb_karyawan c ON a.transaksi_create_by = c.id_karyawan 
                    LEFT JOIN tb_bank d ON a.transaksi_bank=d.id_bank
                    LEFT JOIN tb_metode e ON a.transaksi_tipe_bayar=e.id_metode
                    ORDER BY a.transaksi_id DESC
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['transaksi_kode'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['kategori'] ?></td>
        <td><?= 'Rp.' . number_format($a['transaksi_cash']) ?></td>
        <td><?= 'Rp.' . number_format($a['transaksi_debit']) ?></td>
        <td><?= 'Rp.' . number_format($a['transaksi_point']) ?></td>
        <td><?= 'Rp.' . number_format($a['transaksi_total_belanja']) ?></td>
        <td>
            <?php
            if ($a['bank'] == NULL) {
                echo "-";
            } else {
                echo $a['bank'];
            }
            ?>
        </td>
        <td><?= tgl_indo_waktu($a['transaksi_create_at']) ?></td>
        <!-- <td><?= $a['nama'] ?></td> -->
        <td><?= $a['keterangan'] ?></td>
        <td class="text-center" >
            <button type="button" id="hapus" onclick="hapus('<?= $a['transaksi_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['transaksi_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <a href="inc/struk/invo1.php?invoice=<?= $a['transaksi_kode'] ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
        </td>
    </tr>
<?php } ?>
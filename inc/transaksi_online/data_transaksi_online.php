<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT a.transol_id,
                        a.transol_kode,
                        f.data_toko_online_nama,
                        e.kategori,
                        a.transol_cash,
                        a.transol_debit,
                        a.transol_total_belanja,
                        d.bank,
                        a.transol_create_at,
                        c.nama,
                        a.transol_keterangan,
                        g.nama_toko
                    FROM tb_transaksi_online a
                    LEFT JOIN toko b ON a.id_toko=b.id_toko
                    LEFT JOIN tb_karyawan c ON a.transol_create_by = c.id_karyawan 
                    LEFT JOIN tb_bank d ON a.transol_bank=d.id_bank
                    LEFT JOIN tb_metode e ON a.transol_tipe_bayar=e.id_metode
                    LEFT JOIN tb_data_toko_online f ON a.data_toko_online_id = f.data_toko_online_id
                    LEFT JOIN toko g ON g.id_toko=a.id_toko
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['transol_kode'] ?></td>
        <td><?= $a['data_toko_online_nama'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <!-- <td><?= 'Rp.' . number_format($a['transol_cash']) ?></td> -->
        <td><?= 'Rp.' . number_format($a['transol_total_belanja']) ?></td>
        <td><?= tgl_indo_waktu($a['transol_create_at']) ?></td>
        <!-- <td><?= $a['nama'] ?></td> -->
        <td><?= $a['transol_keterangan'] ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['transol_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['transol_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <a href="inc/struk/invoonline.php?invoice=<?= $a['transol_kode'] ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
        </td>
    </tr>
<?php } ?>
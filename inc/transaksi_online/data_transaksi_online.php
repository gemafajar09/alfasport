<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("SELECT
                        tb_transaksi_online.transol_id,
                        tb_transaksi_online.transol_kode,
                        tb_transaksi_online.transol_tgl,
                        tb_transaksi_online.transol_cash,
                        tb_transaksi_online.transol_debit,
                        tb_transaksi_online.transol_create_at,
                        tb_transaksi_online.transol_keterangan,
                        toko.nama_toko,
                        tb_transaksi_online.transol_jumlah_beli,
                        tb_metode.kategori,
                        tb_bank.bank,
                        tb_transaksi_online.transol_diskon,
                        tb_karyawan.nama,
                        tb_data_toko_online.data_toko_online_nama
                    From
                        tb_transaksi_online
                    LEFT JOIN
                        tb_transaksi_online_detail ON tb_transaksi_online_detail.transol_id = tb_transaksi_online.transol_id
                    LEFT JOIN
                        tb_data_toko_online ON tb_data_toko_online.data_toko_online_id = tb_transaksi_online_detail.data_toko_online_id        
                    LEFT Join
                        toko On toko.id_toko = tb_transaksi_online.id_toko     
                    LEFT Join
                        tb_metode On tb_transaksi_online.transol_tipe_bayar = tb_metode.id_metode
                    LEFT Join
                        tb_bank On tb_bank.id_bank = tb_transaksi_online.transol_bank 
                    LEFT Join
                        tb_karyawan On tb_karyawan.id_karyawan = tb_transaksi_online.transol_create_by")->fetchAll();

foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['transol_kode'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['data_toko_online_nama'] ?></td>
        <td><?= $a['kategori'] ?></td>
        <td><?= number_format($a['transol_cash']) ?></td>
        <td><?= number_format($a['transol_debit']) ?></td>
        <td><?= $a['bank'] ?></td>
        <td><?= tgl_indo_waktu($a['transol_create_at']) ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['transol_keterangan'] ?></td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['transol_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['transol_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
?>
<table class="table">
    <thead>
        <tr>
            <th>Artikel</th>
            <th>Nama Barang</th>
            <th>UE</th>
            <th>UK</th>
            <th>US</th>
            <th>CM</th>
            <th>Tanggal Restock</th>
            <th>Stok Awal</th>
            <th>Penambahan Stok</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data_table = $con->query("SELECT
                                    tb_gudang_detail.id_detail,
                                    tb_gudang_detail.id_ukuran,
                                    tb_gudang_detail.jumlah,
                                    tb_gudang_detail.barcode,
                                    tb_gudang_detail.tanggal,
                                    tb_gudang.artikel,
                                    tb_gudang.nama,
                                    tb_all_ukuran.ue,
                                    tb_all_ukuran.uk,
                                    tb_all_ukuran.us,
                                    tb_all_ukuran.cm,
                                    tb_gudang_detail.id,
                                    tb_restock.restock_tgl,
                                    tb_restock.restock_jumlah_awal,
                                    tb_restock.restock_jumlah_tambah
                                From
                                    tb_gudang Inner Join
                                    tb_gudang_detail On tb_gudang.id = tb_gudang_detail.id Inner Join
                                    tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_gudang_detail.id_ukuran Inner Join
                                    tb_restock ON tb_restock.id_detail = tb_gudang_detail.id_detail 
                                WHERE tb_restock.id_detail='$_POST[id_detail]'
                                ORDER BY tb_restock.restock_tgl DESC ")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['artikel'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['ue'] ?></td>
                <td><?= $data['us'] ?></td>
                <td><?= $data['uk'] ?></td>
                <td><?= $data['cm'] ?></td>
                <td><?= tgl_indo_waktu($data['restock_tgl']) ?></td>
                <td><?= $data['restock_jumlah_awal'] ?></td>
                <td><?= $data['restock_jumlah_tambah'] ?></td>
                <td><?= $data['restock_jumlah_awal'] + $data['restock_jumlah_tambah']  ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
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
            <th>Nama Ukuran</th>
            <th>Tanggal Restock</th>
            <th>Stok Awal</th>
            <th>Penambahan Stok</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data_table = $con->query("SELECT
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_id,
                                    tb_gudang_lainnya_detail.gudang_lainnya_kode,
                                    tb_gudang_lainnya_detail.ukuran_barang_detail_id,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_tgl,
                                    tb_gudang_lainnya.gudang_lainnya_artikel,
                                    tb_gudang_lainnya.gudang_lainnya_nama,
                                    tb_ukuran_barang_detail.ukuran_barang_detail_nama,
                                    tb_restock_lainnya.restock_lainnya_tgl,
                                    tb_restock_lainnya.restock_lainnya_jml_awal,
                                    tb_restock_lainnya.restock_lainnya_jml_tambah
                                From
                                    tb_gudang_lainnya Inner Join
                                    tb_gudang_lainnya_detail On tb_gudang_lainnya_detail.gudang_lainnya_kode =
                                            tb_gudang_lainnya.gudang_lainnya_kode Inner Join
                                    tb_ukuran_barang_detail On tb_ukuran_barang_detail.ukuran_barang_detail_id =
                                            tb_gudang_lainnya_detail.ukuran_barang_detail_id Inner Join
                                    tb_restock_lainnya On tb_restock_lainnya.gudang_lainnya_detail_id =
                                            tb_gudang_lainnya_detail.gudang_lainnya_detail_id
                                WHERE tb_restock_lainnya.gudang_lainnya_detail_id ='$_POST[gudang_lainnya_detail_id]'
                                ORDER BY tb_restock_lainnya.restock_lainnya_tgl DESC ")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['gudang_lainnya_artikel'] ?></td>
                <td><?= $data['gudang_lainnya_nama'] ?></td>
                <td><?= $data['ukuran_barang_detail_nama'] ?></td>
                <td><?= tgl_indo_waktu($data['restock_lainnya_tgl']) ?></td>
                <td><?= $data['restock_lainnya_jml_awal'] ?></td>
                <td><?= $data['restock_lainnya_jml_tambah'] ?></td>
                <td><?= $data['restock_lainnya_jml_awal'] + $data['restock_lainnya_jml_tambah']  ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
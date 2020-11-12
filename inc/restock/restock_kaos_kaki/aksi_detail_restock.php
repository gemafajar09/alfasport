<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
?>
<table class="table">
    <thead>
        <tr>
            <th>Artikel</th>
            <th>Nama Barang</th>
            <th>EU</th>
            <th>Size</th>
            <th>Tanggal Restock</th>
            <th>Stok Awal</th>
            <th>Penambahan Stok</th>
            <th>Stok Akhir</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data_table = $con->query("SELECT
                                    tb_barang_detail.barang_detail_id,
                                    tb_barang_detail.barang_detail_barcode,
                                    tb_barang_detail.barang_detail_jml,
                                    tb_barang_detail.barang_detail_tgl,
                                    tb_barang_detail.ukuran_id,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    tb_barang.barang_kode,
                                    tb_barang.barang_id,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_barang_restock.barang_restock_tgl,
                                    tb_barang_restock.barang_restock_jml_awal,
                                    tb_barang_restock.barang_restock_jml_tambah
                                FROM
                                    tb_barang
                                INNER JOIN tb_barang_detail ON
                                    tb_barang.barang_id = tb_barang_detail.barang_id
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                INNER JOIN tb_barang_restock ON
                                    tb_barang_restock.barang_detail_id = tb_barang_detail.barang_detail_id 
                                WHERE tb_barang_restock.barang_detail_id ='$_POST[barang_detail_id]'
                                ORDER BY tb_barang_restock.barang_restock_tgl DESC ")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['barang_artikel'] ?></td>
                <td><?= $data['barang_nama'] ?></td>
                <td><?= $data['kaos_kaki_eu'] ?></td>
                <td><?= $data['kaos_kaki_size'] ?></td>
                <td><?= tgl_indo_waktu($data['barang_restock_tgl']) ?></td>
                <td><?= $data['barang_restock_jml_awal'] ?></td>
                <td><?= $data['barang_restock_jml_tambah'] ?></td>
                <td><?= $data['barang_restock_jml_awal'] + $data['barang_restock_jml_tambah']  ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
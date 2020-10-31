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
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode,
                                    tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_tgl,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size,
                                    tb_restock_kaos_kaki.restock_kaos_kaki_tgl,
                                    tb_restock_kaos_kaki.restock_kaos_kaki_jml_awal,
                                    tb_restock_kaos_kaki.restock_kaos_kaki_jml_tambah
                                From
                                    tb_gudang_kaos_kaki Inner Join
                                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode =
                                            tb_gudang_kaos_kaki.gudang_kaos_kaki_kode Inner Join
                                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                                            tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id Inner Join
                                    tb_restock_kaos_kaki On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id =
                                            tb_restock_kaos_kaki.gudang_kaos_kaki_detail_id 
                                WHERE tb_restock_kaos_kaki.gudang_kaos_kaki_detail_id ='$_POST[gudang_kaos_kaki_detail_id]'
                                ORDER BY tb_restock_kaos_kaki.restock_kaos_kaki_tgl DESC ")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['gudang_kaos_kaki_artikel'] ?></td>
                <td><?= $data['gudang_kaos_kaki_nama'] ?></td>
                <td><?= $data['ukuran_kaos_kaki_ue'] ?></td>
                <td><?= $data['ukuran_kaos_kaki_size'] ?></td>
                <td><?= tgl_indo_waktu($data['restock_kaos_kaki_tgl']) ?></td>
                <td><?= $data['restock_kaos_kaki_jml_awal'] ?></td>
                <td><?= $data['restock_kaos_kaki_jml_tambah'] ?></td>
                <td><?= $data['restock_kaos_kaki_jml_awal'] + $data['restock_kaos_kaki_jml_tambah']  ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
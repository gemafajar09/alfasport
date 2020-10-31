<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$where = array('gudang_lainnya_id' => $_POST['gudang_lainnya_id']);

$edit = $con->query(
    "SELECT
                        tb_gudang_lainnya.gudang_lainnya_id,
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_kode,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_gudang_lainnya.gudang_lainnya_modal,
                        tb_gudang_lainnya.gudang_lainnya_jual,
                        tb_merk.merk_nama,
                        tb_gender.gender_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama
                    From
                        tb_gudang_lainnya Inner Join
                        tb_merk On tb_merk.merk_id = tb_gudang_lainnya.id_merek Inner Join
                        tb_gender On tb_gender.gender_id = tb_gudang_lainnya.id_gender Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_gudang_lainnya.id_kategori Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_gudang_lainnya.id_divisi
                    WHERE
                        tb_gudang_lainnya.gudang_lainnya_id = :gudang_lainnya_id",
    array("gudang_lainnya_id" => $_POST['gudang_lainnya_id'])
)->fetch();
?>

<div class="row">
    <div class="col-md-6">
        <table>
            <tr>
                <th>Artikel</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;<?= $edit['gudang_lainnya_artikel'] ?></i></th>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($edit['gudang_lainnya_modal']) ?></i></th>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($edit['gudang_lainnya_jual']) ?></i></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table>
            <tr>
                <th>Merek</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $edit['merk_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Divisi</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $edit['divisi_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Kategori</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $edit['kategori_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Gender</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $edit['gender_nama'] ?></i></th>
            </tr>
        </table>
    </div>
    <div class="col-md-8 mx-auto py-4">
        <table class="table">
            <thead style="background-color:grey">
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Nama Barang</th>
                    <th>Barcode</th>
                    <th>Ukuran</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>

                <?php
                $isi = $con->query(
                    "SELECT
                        tb_gudang_lainnya.gudang_lainnya_id,
                        tb_gudang_lainnya.gudang_lainnya_kode,
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah,
                        tb_gudang_lainnya_detail.gudang_lainnya_detail_tgl,
                        tb_ukuran_barang_detail.ukuran_barang_detail_nama
                    From
                        tb_gudang_lainnya Inner Join
                        tb_gudang_lainnya_detail On tb_gudang_lainnya_detail.gudang_lainnya_kode =
                                tb_gudang_lainnya.gudang_lainnya_kode Inner Join
                        tb_ukuran_barang_detail On tb_ukuran_barang_detail.ukuran_barang_detail_id =
                                tb_gudang_lainnya_detail.ukuran_barang_detail_id
                    WHERE
                        tb_gudang_lainnya.gudang_lainnya_id = :gudang_lainnya_id",
                    array("gudang_lainnya_id" => $_POST['gudang_lainnya_id'])
                )->fetchAll();
                foreach ($isi as $i => $a) {
                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $a['gudang_lainnya_kode'] ?></td>
                        <td><?= $a['gudang_lainnya_nama'] ?></td>
                        <td><?= $a['gudang_lainnya_detail_barcode'] ?></td>
                        <td><?= $a['ukuran_barang_detail_nama'] ?></td>
                        <td><?= $a['gudang_lainnya_detail_jumlah'] ?></td>
                        <td><?= tgl_indo($a['gudang_lainnya_detail_tgl']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
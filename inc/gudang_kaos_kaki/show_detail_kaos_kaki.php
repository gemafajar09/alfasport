<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$where = array('gudang_kaos_kaki_id' => $_POST['gudang_kaos_kaki_id']);

$edit = $con->query(
    "SELECT
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_id,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                        tb_merk.merk_nama,
                        tb_gender.gender_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama
                    From
                        tb_gudang_kaos_kaki Inner Join
                        tb_merk On tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek Inner Join
                        tb_gender On tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                    WHERE
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_id = :gudang_kaos_kaki_id",
    array("gudang_kaos_kaki_id" => $_POST['gudang_kaos_kaki_id'])
)->fetch();
?>

<div class="row">
    <div class="col-md-6">
        <table>
            <tr>
                <th>Artikel</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;<?= $edit['gudang_kaos_kaki_artikel'] ?></i></th>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($edit['gudang_kaos_kaki_modal']) ?></i></th>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($edit['gudang_kaos_kaki_jual']) ?></i></th>
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
                    <th class="text-center" colspan="2">Ukuran</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
                <tr>
                    <th colspan="4"></th>
                    <th>EU</th>
                    <th>SIZE</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>

                <?php
                $isi = $con->query(
                    "SELECT
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah,
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_tgl,
                                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama
                                    From
                                        tb_gudang_kaos_kaki_detail Inner Join
                                        tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                                                tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id Inner Join
                                        tb_gudang_kaos_kaki On tb_gudang_kaos_kaki.gudang_kaos_kaki_kode =
                                                tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode
                                    WHERE
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_id = :gudang_kaos_kaki_id",
                    array("gudang_kaos_kaki_id" => $_POST['gudang_kaos_kaki_id'])
                )->fetchAll();
                foreach ($isi as $i => $a) {
                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $a['gudang_kaos_kaki_kode'] ?></td>
                        <td><?= $a['gudang_kaos_kaki_nama'] ?></td>
                        <td><?= $a['gudang_kaos_kaki_detail_barcode'] ?></td>
                        <td><?= $a['ukuran_kaos_kaki_ue'] ?></td>
                        <td><?= $a['ukuran_kaos_kaki_size'] ?></td>
                        <td><?= $a['gudang_kaos_kaki_detail_jumlah'] ?></td>
                        <td><?= tgl_indo($a['gudang_kaos_kaki_detail_tgl']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
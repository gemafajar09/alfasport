<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$where = array('id_gudang' => $_POST['id']);
$edit = $con->query("SELECT a.id, a.artikel, a.nama, a.id_gudang, a.modal, a.jual, b.merk_nama, c.gender_nama, d.kategori_nama, e.divisi_nama FROM tb_gudang a JOIN tb_merk b ON a.id_merek=b.merk_id JOIN tb_gender c ON a.id_gender=c.gender_id JOIN tb_kategori d ON a.id_kategori=d.kategori_id JOIN tb_divisi e ON a.id_divisi=e.divisi_id WHERE a.id_gudang='$_POST[id]'")->fetch();
?>

<div class="row">
    <div class="col-md-6">
        <table>
            <tr>
                <th>Artikel</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $edit['artikel'] ?></i></th>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;Rp.<?= number_format($edit['modal']) ?></i></th>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;Rp.<?= number_format($edit['jual']) ?></i></th>
            </tr>
            <!-- <tr>
                <th>Satuan</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;</i></th>
            </tr> -->
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
                    <th class="text-center" colspan="4">Ukuran</th>
                    <th>Jumlah</th>
                    <th>Tanggal</th>
                </tr>
                <tr>
                    <th colspan="2"></th>
                    <th>Ue</th>
                    <th>Uk</th>
                    <th>Us</th>
                    <th>Cm</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            
            <?php
                $isi = $con->query("SELECT a.id, a.jumlah, a.tanggal , b.ue, b.uk, b.us, b.cm FROM tb_gudang_detail a JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran WHERE a.id='$edit[id]'")->fetchAll();
                foreach($isi as $i => $a){
            ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a['id'] ?></td>
                    <td><?= $a['ue'] ?></td>
                    <td><?= $a['uk'] ?></td>
                    <td><?= $a['us'] ?></td>
                    <td><?= $a['cm'] ?></td>
                    <td><?= $a['jumlah'] ?></td>
                    <td><?= $a['tanggal'] ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
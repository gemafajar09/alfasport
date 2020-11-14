<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data_toko = $con->query("SELECT
                            tb_transfer_barang.transfer_barang_id,
                            tb_transfer_barang.transfer_barang_kode,
                            tb_transfer_barang.transfer_barang_tgl,
                            tb_transfer_barang.transfer_barang_acc_owner,
                            toko.nama_toko as nama_toko,
                            toko1.nama_toko As nama_toko_tujuan
                        From
                            tb_transfer_barang Inner Join
                            toko On toko.id_toko = tb_transfer_barang.id_toko Inner Join
                            toko toko1 On toko1.id_toko = tb_transfer_barang.id_toko_tujuan 
                        WHERE tb_transfer_barang.transfer_barang_id = '$_POST[transfer_barang_id]'")->fetch();
?>
<table class="table">
    <thead class="text-center">
        <tr>
            <th>Pengirim</th>
            <th>Penerima</th>
        </tr>
        <tr>
            <th><?= $data_toko['nama_toko'] ?></th>
            <th><?= $data_toko['nama_toko_tujuan'] ?></th>
        </tr>
    </thead>
</table>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Artikel</th>
            <th>Nama Barang</th>
            <th>Barcode</th>
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $data_table = $con->query("SELECT
                                    tb_transfer_barang.transfer_barang_tgl,
                                    tb_transfer_barang_detail.transfer_barang_detail_jml,
                                    tb_barang_detail.barang_detail_barcode,
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_ukuran.barang_lainnya_nama_ukuran
                                FROM
                                    tb_transfer_barang
                                INNER JOIN tb_transfer_barang_detail ON
                                    tb_transfer_barang_detail.transfer_barang_id = tb_transfer_barang.transfer_barang_id
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_detail_id = tb_transfer_barang_detail.barang_detail_id
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                INNER JOIN tb_barang ON
                                    tb_barang.barang_id = tb_barang_detail.barang_id
                                WHERE tb_transfer_barang.transfer_barang_id = '$_POST[transfer_barang_id]'")->fetchAll();
        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['barang_kode'] ?></td>
                <td><?= $data['barang_artikel'] ?></td>
                <td><?= $data['barang_nama'] ?></td>
                <td><?= $data['barang_detail_barcode'] ?></td>
                <td><?= $data['transfer_barang_detail_jml'] ?></td>
                <?php
                if ($data['barang_kategori'] == 'Sepatu') {
                ?>
                    <td><?= "EU : " . $data['sepatu_ue'] . " / UK : " . $data['sepatu_uk'] . " / US : " . $data['sepatu_us'] . " / CM : " . $data['sepatu_cm']; ?></td>
                <?php
                } elseif ($data['barang_kategori'] == 'Kaos Kaki') {
                ?>
                    <td><?= "EU : " . $data['kaos_kaki_eu'] . " / Size : " . $data['kaos_kaki_size'] ?></td>
                <?php
                } elseif ($data['barang_kategori'] == 'Barang Lainnya') {
                ?>
                    <td><?= "Ukuran : " . $data['barang_lainnya_nama_ukuran']  ?></td>
                <?php
                }
                ?>
                <td><?= tgl_indo($data['transfer_barang_tgl']) ?></td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<br>
<div class="row">
    <div class="col-md-8"></div>
    <div class="col-md-4">
        <input type="radio" name="cek" value="1"><Label>Acc</Label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <input type="radio" name="cek" value="2"><Label>Tolak</Label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <button type="button" id="klik" class="btn btn-warning btn-sm">Simpan</button>
    </div>
</div>

<script>
    $('#klik').on('click', function() {
        var cek = $('[name="cek"]').val()
        var transfer_barang_id = $('#idTrans').val()
        axios.post('inc/permohonan/acc_transfer.php', {
            'transfer_barang_id': transfer_barang_id,
            'cek': cek
        }).then(function(res) {
            $('#Acc').modal('hide');
            window.location = "permohonan.html"
        }).catch(function(err) {
            console.log(err)
        })
    })
</script>
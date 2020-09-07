<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data_toko = $con->query("
SELECT 
(SELECT nama_toko FROM toko WHERE id_toko= a.id_toko) as nama_toko, 
(SELECT nama_toko FROM toko WHERE id_toko= a.id_toko_tujuan) as nama_toko_tujuan 
FROM tb_transfer a 
WHERE a.id_transfer='$_POST[id]'")->fetch();
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
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $data_table = $con->query("
        SELECT
        a.tanggal,
        e.nama,
        e.id,
        e.artikel,
        b.jumlah,
        d.ue,
        d.uk,
        d.us,
        d.cm
        FROM tb_transfer a 
        JOIN tb_transfer_detail b ON a.id_transfer = b.id_transfer 
        JOIN tb_gudang_detail c ON c.id_detail = b.id_gudang 
        JOIN tb_all_ukuran d ON d.id_ukuran = c.id_ukuran
        JOIN tb_gudang e ON e.artikel=c.id
        WHERE a.id_transfer='$_POST[id]'")->fetchAll();
        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['artikel'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <td><?= $data['ue'] . "-" . $data['uk'] . "-" . $data['us'] . "-" . $data['cm']; ?></td>
                <td><?= $data['tanggal'] ?></td>
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
        var id_transfer = $('#idTrans').val()
        axios.post('inc/permohonan/acc_transfer.php', {
            'id_transfer': id_transfer,
            'cek': cek
        }).then(function(res) {
            $('#Acc').modal('hide');
            window.location = "permohonan.html"
        }).catch(function(err) {
            console.log(err)
        })
    })
</script>
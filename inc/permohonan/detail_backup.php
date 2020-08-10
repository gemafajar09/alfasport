<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
    $data = $con->query("SELECT 
    a.id_transfer,
    a.jumlah,
    c.artikel,
    c.id,
    c.nama,
    a.tanggal,
    (SELECT nama_toko FROM toko WHERE id_toko= a.id_toko) as nama_toko, 
    (SELECT nama_toko FROM toko WHERE id_toko= a.id_toko_tujuan) as nama_toko_tujuan,
    (SELECT merk_nama FROM tb_merk WHERE merk_id=c.id_merek) as nama_merek,
    (SELECT kategori_nama FROM tb_kategori WHERE kategori_id=c.id_kategori) as kategori,  
    (SELECT divisi_nama FROM tb_divisi WHERE divisi_id=c.id_divisi) as divisi,
    (SELECT subdivisi_nama FROM tb_subdivisi WHERE subdivisi_id=c.id_sub_divisi) as subdivisi,
    (SELECT gender_nama FROM tb_gender WHERE gender_id=c.id_gender) as gender,
    (SELECT ue FROM tb_all_ukuran WHERE id_ukuran=a.id_detail) as ue,
    (SELECT us FROM tb_all_ukuran WHERE id_ukuran=a.id_detail) as us,
    (SELECT uk FROM tb_all_ukuran WHERE id_ukuran=a.id_detail) as uk,
    (SELECT cm FROM tb_all_ukuran WHERE id_ukuran=a.id_detail) as cm
    FROM tb_transfer a 
    JOIN toko b 
    ON a.id_toko=b.id_toko
    JOIN tb_gudang c 
    ON a.id_gudang=c.id_gudang WHERE a.id_transfer='$_POST[id]'")->fetch();
?>
<table class="table">
    <thead class="text-center">
        <tr>
            <th>Pengirim</th>
            <th>Penerima</th>
        </tr>
        <tr>
            <th><?= $data['nama_toko'] ?></th>
            <th><?= $data['nama_toko_tujuan'] ?></th>
        </tr>
    </thead>
</table>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Artikel</th>
            <th>Merek</th>
            <th>Kategori</th>
            <th>Divisi</th>
            <th>Sub Divisi</th>
            <th>Gender</th>
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?= $data['id'] ?></td>
            <td><?= $data['artikel'] ?></td>
            <td><?= $data['nama_merek'] ?></td>
            <td><?= $data['kategori'] ?></td>
            <td><?= $data['divisi'] ?></td>
            <td><?= $data['subdivisi'] ?></td>
            <td><?= $data['gender'] ?></td>
            <td><?= $data['jumlah'] ?></td>
            <td><?= $data['ue']."-".$data['uk']."-".$data['us']."-".$data['cm']; ?></td>
            <td><?= $data['tanggal'] ?></td>
        </tr>
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
     $('#klik').on('click',function(){
        var cek = $('[name="cek"]').val()
        var id_transfer = $('#idTrans').val()
        axios.post('inc/permohonan/acc_transfer.php',{
            'id_transfer': id_transfer,
            'cek': cek
        }).then(function(res){
            $('#Acc').modal('hide')
        }).catch(function(err){
            console.log(err)
        })
    })
</script>
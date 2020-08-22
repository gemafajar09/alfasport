<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
alfa_sport.tb_all_ukuran.id_ukuran,
alfa_sport.tb_merk.merk_nama,
alfa_sport.tb_kategori.kategori_nama,
alfa_sport.tb_divisi.divisi_nama,
alfa_sport.tb_subdivisi.subdivisi_nama,
alfa_sport.tb_all_ukuran.id_gender,
alfa_sport.tb_all_ukuran.ue,
alfa_sport.tb_all_ukuran.uk,
alfa_sport.tb_all_ukuran.us,
alfa_sport.tb_all_ukuran.cm
From
alfa_sport.tb_all_ukuran 
LEFT Join 
alfa_sport.tb_merk On alfa_sport.tb_all_ukuran.id_merek = alfa_sport.tb_merk.merk_id 
LEFT Join
alfa_sport.tb_kategori On alfa_sport.tb_all_ukuran.id_kategori = alfa_sport.tb_kategori.kategori_id 
LEFT Join
alfa_sport.tb_divisi On alfa_sport.tb_all_ukuran.id_divisi = alfa_sport.tb_divisi.divisi_id 
LEFT Join
alfa_sport.tb_subdivisi On alfa_sport.tb_all_ukuran.id_subdivisi = alfa_sport.tb_subdivisi.subdivisi_id 
LEFT Join
alfa_sport.tb_gender On alfa_sport.tb_all_ukuran.id_gender = alfa_sport.tb_gender.gender_id");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td>
            <?php
            $gender = explode(",", $a['id_gender']);
            $data_gender = $con->select("tb_gender", array("gender_nama"), array("gender_id" => $gender));
            foreach ($data_gender as $data) {
            ?>
                <?= $data['gender_nama'] ?> <br>
            <?php
            }
            ?>
        </td>
        <td><?= $a['ue'] ?></td>
        <td><?= $a['us'] ?></td>
        <td><?= $a['uk'] ?></td>
        <td><?= $a['cm'] ?></td>
        <td>
            <button type="button" onclick="edit(<?= $a['id_ukuran'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_ukuran'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
tb_all_ukuran.id_ukuran,
tb_merk.merk_nama,
tb_kategori.kategori_nama,
tb_divisi.divisi_nama,
tb_subdivisi.subdivisi_nama,
tb_all_ukuran.id_gender,
tb_all_ukuran.ue,
tb_all_ukuran.uk,
tb_all_ukuran.us,
tb_all_ukuran.cm
From
tb_all_ukuran 
LEFT Join 
tb_merk On tb_all_ukuran.id_merek = tb_merk.merk_id 
LEFT Join
tb_kategori On tb_all_ukuran.id_kategori = tb_kategori.kategori_id 
LEFT Join
tb_divisi On tb_all_ukuran.id_divisi = tb_divisi.divisi_id 
LEFT Join
tb_subdivisi On tb_all_ukuran.id_subdivisi = tb_subdivisi.subdivisi_id 
LEFT Join
tb_gender On tb_all_ukuran.id_gender = tb_gender.gender_id");
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
<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_ukuran.ukuran_id,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_ukuran.gender_id,
                        tb_ukuran.barang_lainnya_nama_ukuran
                    From
                    tb_ukuran 
                    LEFT Join 
                    tb_merk On tb_ukuran.merk_id = tb_merk.merk_id 
                    LEFT Join
                    tb_kategori On tb_ukuran.kategori_id = tb_kategori.kategori_id 
                    LEFT Join
                    tb_divisi On tb_ukuran.divisi_id = tb_divisi.divisi_id 
                    LEFT Join
                    tb_subdivisi On tb_ukuran.subdivisi_id = tb_subdivisi.subdivisi_id 
                    LEFT Join
                    tb_gender On tb_ukuran.gender_id = tb_gender.gender_id
                    WHERE 
                    tb_ukuran.ukuran_kategori = 'Barang Lainnya'");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td>
            <?php
            $gender = explode(",", $a['gender_id']);
            $data_gender = $con->select("tb_gender", array("gender_nama"), array("gender_id" => $gender));
            foreach ($data_gender as $data) {
            ?>
                <?= $data['gender_nama'] ?> <br>
            <?php
            }
            ?>
        </td>
        <td>
            <?php
            echo $a['kategori_nama'] . "<br>" . "<i><b>" . $a['divisi_nama'] . "</b></i>" . "<br>" . $a['subdivisi_nama'];
            ?>
        </td>
        <td><?= $a['barang_lainnya_nama_ukuran'] ?></td>
        <td>
            <button type="button" onclick="edit(<?= $a['ukuran_id'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['ukuran_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
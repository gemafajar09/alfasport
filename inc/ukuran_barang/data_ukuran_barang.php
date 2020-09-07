<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_ukuran_barang.ukuran_barang_nama,
                        tb_kategori.kategori_nama,
                        tb_merk.merk_nama,
                        tb_ukuran_barang.ukuran_barang_id,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_ukuran_barang.id_gender
                    From tb_ukuran_barang 
                    LEFT Join tb_merk On tb_merk.merk_id = tb_ukuran_barang.id_merek 
                    LEFT Join tb_kategori On tb_kategori.kategori_id = tb_ukuran_barang.id_kategori 
                    LEFT Join tb_divisi On tb_divisi.divisi_id = tb_ukuran_barang.id_divisi 
                    LEFT Join tb_subdivisi On tb_subdivisi.subdivisi_id = tb_ukuran_barang.id_subdivisi 
                    LEFT Join tb_gender On tb_gender.gender_id = tb_ukuran_barang.id_gender");


foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['ukuran_barang_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
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
        <td>
            <button type="button" onclick="edit(<?= $a['ukuran_barang_id'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="detail(<?= $a['ukuran_barang_id'] ?>)" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['ukuran_barang_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
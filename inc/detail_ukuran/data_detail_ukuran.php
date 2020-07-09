<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_detail_ukuran 
                        JOIN tb_kategori ON tb_kategori.kategori_id = tb_detail_ukuran.kategori_id
                        JOIN tb_ukuran ON tb_ukuran.ukuran_id = tb_detail_ukuran.ukuran_id
                        JOIN tb_divisi ON tb_divisi.divisi_id = tb_detail_ukuran.divisi_id
                        JOIN tb_subdivisi ON tb_subdivisi.subdivisi_id = tb_detail_ukuran.subdivisi_id
                        JOIN tb_gender ON tb_gender.gender_id = tb_detail_ukuran.gender_id
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['ukuran_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $a['detail_ukuran_ukuran'] ?></td>
        <td><?= $a['detail_ukuran_stok'] ?></td>
        <td><?= $a['detail_ukuran_harga_modal'] ?></td>
        <td><?= $a['detail_ukuran_harga_jual'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['detail_ukuran_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['detail_ukuran_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
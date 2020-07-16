<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT * FROM tb_karyawan
                        JOIN tb_jabatan ON tb_jabatan.jabatan_id = tb_karyawan.jabatan_id
                        JOIN toko ON toko.id_toko = tb_karyawan.id_toko
                    ");
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['id'] ?></td>
        <td><?= $a['nik'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['alamat'] ?></td>
        <td><?= $a['no_telpon'] ?></td>
        <td><?= $a['email_karyawan'] ?></td>
        <td><?= $a['username'] ?></td>
        <td>
            <?php
            if ($a['foto'] == 0) {
            ?>
                <center>
                    <img src="<?php echo $base_url ?>img/img-not-found.png" width="100px" height="100px">
                </center>
            <?php
            } else {
            ?>
                <center>
                    <img src="<?php echo $base_url ?>img/karyawan/<?php echo $a['foto'] ?>" width="100px" height="100px">
                </center>
            <?php
            }
            ?>
        </td>
        <td>
            <?php
            if ($a['foto_ktp'] == 0) {
            ?>
                <center>
                    <img src="<?php echo $base_url ?>img/img-not-found.png" width="100px" height="100px">
                </center>
            <?php
            } else {
            ?>
                <center>
                    <img src="<?php echo $base_url ?>img/karyawan/<?php echo $a['foto_ktp'] ?>" width="100px" height="100px">
                </center>
            <?php
            }
            ?>
        </td>
        <td><?= $a['jabatan_nama'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['id_karyawan'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_karyawan'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
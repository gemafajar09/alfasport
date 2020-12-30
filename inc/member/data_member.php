<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->select('tb_member', '*');
$data = $con->query("SELECT 
                    tb_member.member_id,
                    tb_member.member_kode,
                    tb_member.member_nama,
                    tb_member.member_email,
                    tb_member.member_notelp,
                    tb_member.member_tgl_lahir,
                    tb_member.member_gender,
                    tb_provinsi.nama_prov,
                    tb_kota.nama_kota,
                    tb_daftar_alamat.alamat,
                    tb_data_profesi.data_profesi_nama
                    FROM tb_member 
                    LEFT JOIN tb_daftar_alamat ON tb_member.alamat_id = tb_daftar_alamat.alamat_id
                    LEFT JOIN tb_provinsi ON tb_daftar_alamat.id_prov = tb_provinsi.id_prov
                    LEFT JOIN tb_kota ON tb_daftar_alamat.id_kota = tb_kota.id_kota
                    LEFT JOIN tb_data_profesi ON tb_data_profesi.data_profesi_id = tb_member.member_profesi
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['member_kode'] ?></td>
        <td><?= $a['member_nama'] ?></td>
        <td><?= $a['member_email'] ?></td>
        <td><?= $a['member_notelp'] ?></td>
        <td><?= tgl_indo($a['member_tgl_lahir']) ?></td>
        <td>
            <?php
            echo $a['alamat'] . ",<br><b><i>" . $a['nama_kota'] . "</i></b>,<br>" . $a['nama_prov']
            ?>
        </td>
        <td><?= $a['member_gender'] ?></td>
        <td><?= $a['data_profesi_nama'] ?></td>
        <td>
            <button type="button" id="hapus" onclick="hapus('<?= $a['member_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <a href="inc/member/cetak.php?id=<?= $a['member_id'] ?>" target="_blank" class="btn btn-warning btn-sm"><i class="fa fa-print"></i></a>
        </td>
    </tr>
<?php } ?>
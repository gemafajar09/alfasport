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
                    tb_member.member_alamat,
                    tb_member.member_gender,
                    tb_member.member_profesi,
                    tb_provinsi.nama_prov,
                    tb_kota.nama_kota
                    FROM tb_member 
                    JOIN tb_provinsi ON tb_member.id_prov = tb_provinsi.id_prov
                    JOIN tb_kota ON tb_kota.id_kota = tb_member.id_kota")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['member_kode'] ?></td>
        <td><?= $a['member_nama'] ?></td>
        <td><?= $a['member_email'] ?></td>
        <td><?= $a['member_notelp'] ?></td>
        <td><?= tgl_indo($a['member_tgl_lahir']) ?></td>
        <td><?= $a['nama_prov'] ?></td>
        <td><?= $a['nama_kota'] ?></td>
        <td><?= $a['member_alamat'] ?></td>
        <td><?= $a['member_gender'] ?></td>
        <td><?= $a['member_profesi'] ?></td>
        <td>
            <button type="button" id="hapus" onclick="hapus('<?= $a['member_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
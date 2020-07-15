<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
// aksi di bawah
// $data = $con->query("SELECT * FROM tb_penyesuaian_stok 
//                         JOIN toko ON toko.id_toko = tb_penyesuaian_stok.id_toko
//                         JOIN tb_admin ON tb_admin.id_admin = tb_penyesuaian_stok.penyesuaian_stok_create_by
//                     ");
$data = $con->query("SELECT * FROM tb_penyesuaian_stok 
                        JOIN toko ON toko.id_toko = tb_penyesuaian_stok.id_toko
                        JOIN tb_admin ON tb_admin.id_admin = tb_penyesuaian_stok.penyesuaian_stok_create_by
                    ");


foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= tgl_indo($a['penyesuaian_stok_tgl']) ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['penyesuaian_stok_tipe'] ?></td>
        <td><?= tgl_indo_waktu($a['penyesuaian_stok_create_at']) ?></td>
        <td><?= $a['nama'] ?></td>
        <td>
            <button type="button" onclick="edit('<?= $a['penyesuaian_stok_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['penyesuaian_stok_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" id="detail" onclick="detail('<?= $a['penyesuaian_stok_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
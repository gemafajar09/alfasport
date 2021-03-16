<?php
include "../../config/koneksi.php";

$data = $con->query("SELECT
                        tb_return_barang.return_barang_id,
                        tb_return_barang.return_barang_kode,
                        tb_return_barang.return_barang_tgl,
                        toko.nama_toko,
                        tb_karyawan.nama
                    From
                        tb_return_barang Inner Join
                        toko On toko.id_toko = tb_return_barang.id_toko Inner Join
                        tb_karyawan On tb_karyawan.id_karyawan = tb_return_barang.id_karyawan
                    ORDER BY tb_return_barang.return_barang_id DESC
                    ")->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $i => $a) :
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['return_barang_kode'] ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['return_barang_tgl'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td class="text-center">
            <button type="button" onclick="views('<?= $a['return_barang_id'] ?>')" class="btn btn-outline-primary btn-round"><i class="fa fa-eye"></i></button>
            <!-- <button type="button" onclick="hapus('<?= $a['return_barang_id'] ?>')" class="btn btn-outline-primary btn-round"><i class="fa fa-trash"></i></button> -->
        </td>
    </tr>
<?php endforeach ?>
<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query("
SELECT a.barang_id,
a.barang_artikel,
a.barang_tgl,
a.barang_kode,
a.barang_nama,
a.barang_jual,
a.barang_modal,
b.merk_nama,
c.gender_nama,
d.kategori_nama,
e.divisi_nama,
f.subdivisi_nama,
g.barang_detail_jml
FROM   tb_barang a
JOIN tb_merk b
  ON a.merk_id = b.merk_id
JOIN tb_gender c
  ON a.gender_id = c.gender_id
JOIN tb_kategori d
  ON a.kategori_id = d.kategori_id
JOIN tb_divisi e
  ON a.divisi_id = e.divisi_id
JOIN tb_subdivisi f
  ON a.subdivisi_id = f.subdivisi_id
JOIN tb_barang_detail g
  ON a.barang_id = g.barang_id  
        ")->fetchAll();
foreach ($data as $i => $a) {
    $awal  = date_create($a['barang_tgl']);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_kode'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= tgl_indo($a['barang_tgl']) ?></td>
        <td>
            <?php
            if ($diff->y == 0 && $diff->m == 0) {
                echo $diff->d . ' hari';
            } elseif ($diff->y == 0 && $diff->m != 0) {
                echo $diff->m . ' bulan, ' . $diff->d . ' hari';
            } else if ($diff->y != 0) {
                echo $diff->y . ' tahun, ' . $diff->m . ' bulan, ' . $diff->d . ' hari';
            }
            ?>
        </td>
        <!-- <td>
        <a href="" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></a>
        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
        </td> -->
    </tr>
<?php } ?>
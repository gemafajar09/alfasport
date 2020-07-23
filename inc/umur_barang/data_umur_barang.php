<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$data = $con->query('SELECT a.id, a.artikel, a.tanggal, a.nama, a.id_gudang, g.jumlah, a.modal, a.jual, b.merk_nama, c.gender_nama, d.kategori_nama, e.divisi_nama, f.subdivisi_nama FROM tb_gudang a JOIN tb_merk b ON a.id_merek=b.merk_id JOIN tb_gender c ON a.id_gender=c.gender_id JOIN tb_kategori d ON a.id_kategori=d.kategori_id JOIN tb_divisi e ON a.id_divisi=e.divisi_id JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id JOIN tb_gudang_detail g ON a.id = g.id')->fetchAll();
foreach ($data as $i => $a) {
    $awal  = date_create($a['tanggal']);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['id'] ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= tgl_indo($a['tanggal']) ?></td>
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
<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_barang_toko.barang_toko_id,
                        tb_barang_toko.barang_toko_jml,
                        toko.nama_toko,
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_modal,
                        tb_barang.barang_jual,
                        tb_barang_detail.barang_detail_barcode,
                        tb_ukuran.ukuran_id,
                        tb_ukuran.ukuran_default,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_gender.gender_nama
                    FROM
                    tb_barang_toko
                    INNER JOIN toko ON toko.id_toko = tb_barang_toko.id_toko
                    INNER JOIN tb_barang_detail ON tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
                    INNER JOIN tb_barang ON tb_barang.barang_id = tb_barang_detail.barang_id
                    INNER JOIN tb_merk ON tb_barang.merk_id = tb_merk.merk_id
                    INNER JOIN tb_kategori ON tb_barang.kategori_id = tb_kategori.kategori_id
                    INNER JOIN tb_divisi ON tb_barang.divisi_id = tb_divisi.divisi_id
                    INNER JOIN tb_subdivisi ON tb_barang.subdivisi_id = tb_subdivisi.subdivisi_id
                    INNER JOIN tb_gender ON tb_barang.gender_id = tb_gender.gender_id
                    INNER JOIN tb_ukuran ON tb_ukuran.ukuran_id = tb_barang_toko.ukuran_id
                    ")->fetchAll();


foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <!-- <td><?= $a['barang_kategori'] ?></td> -->
        <td><?= $a['barang_detail_barcode'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $a['barang_toko_jml'] ?></td>
        <td><?= 'Rp.' . number_format($a['barang_modal']) ?></td>
        <td><?= 'Rp.' . number_format($a['barang_jual']) ?></td>
        <td>
            <?php
            if ($a['barang_kategori'] == 'Sepatu') {
                if ($a['ukuran_default'] == 'EU') {
                    echo "EU : " .  $a['sepatu_ue'];
                } elseif ($a['ukuran_default'] == 'UK') {
                    echo "UK : " .  $a['sepatu_uk'];
                } elseif ($a['ukuran_default'] == 'US') {
                    echo "US : " .  $a['sepatu_us'];
                } elseif ($a['ukuran_default'] == 'CM') {
                    echo "CM : " . $a['sepatu_cm'];
                }
            } elseif ($a['barang_kategori'] == 'Kaos Kaki') {
                if ($a['ukuran_default'] == 'EU') {
                    echo "EU : " .  $a['kaos_kaki_eu'];
                } elseif($a['ukuran_default'] == 'Size') {
                    echo "Size : " .  $a['kaos_kaki_size'];
                }
            } elseif ($a['barang_kategori'] == 'Barang Lainnya') {
                echo "EU : " . $a['barang_lainnya_nama_ukuran'];
            }
            ?>
        </td>
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['barang_toko_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="detail('<?= $a['barang_toko_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
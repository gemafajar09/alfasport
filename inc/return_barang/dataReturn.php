<?php
include "../../config/koneksi.php";
$tanggal = date('Y-m-d');
$data = $con->query("SELECT
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran,
                        tb_return_barang_detail.return_barang_detail_id,
                        tb_return_barang_detail.return_barang_detail_stok_awal,
                        tb_return_barang_detail.return_barang_detail_stok_awal,
                        tb_return_barang_detail.return_barang_detail_stok_tambah,
                        tb_return_barang_detail.return_barang_detail_stok_akhir
                    From
                        tb_return_barang Inner Join
                        tb_return_barang_detail On tb_return_barang_detail.return_barang_id =
                                tb_return_barang.return_barang_id Inner Join
                        tb_barang_toko On
                                tb_barang_toko.barang_toko_id = tb_return_barang_detail.barang_toko_id Inner Join
                        tb_barang_detail On tb_barang_toko.barang_detail_id =
                                tb_barang_detail.barang_detail_id Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id
                    WHERE tb_return_barang.return_barang_tgl LIKE '%$tanggal%'
                    ")->fetchAll(PDO::FETCH_ASSOC);
foreach ($data as $i => $a) :
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_kategori'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <?php
        if ($a['barang_kategori'] == 'Sepatu') {
        ?>
            <td>EU : <?= $a['sepatu_ue'] ?> / UK : <?= $a['sepatu_uk'] ?> / US : <?= $a['sepatu_us'] ?> / CM : <?= $a['sepatu_cm'] ?></td>
        <?php
        } elseif ($a['barang_kategori'] == 'Kaos Kaki') {
        ?>
            <td>EU : <?= $a['kaos_kaki_eu'] ?> / Size : <?= $a['kaos_kaki_size'] ?></td>
        <?php
        } elseif ($a['barang_kategori'] == 'Barang Lainnya') {
        ?>
            <td>Nama Ukuran : <?= $a['barang_lainnya_nama_ukuran'] ?></td>
        <?php
        }
        ?>
        <td><?= $a['return_barang_detail_stok_awal'] ?></td>
        <td><?= $a['return_barang_detail_stok_tambah'] ?></td>
        <td><?= $a['return_barang_detail_stok_akhir'] ?></td>
        <td class="text-center">
            <button type="button" onclick="hapusData('<?= $a['return_barang_detail_id'] ?>')" class="btn btn-outline-danger btn-round"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php endforeach; ?>
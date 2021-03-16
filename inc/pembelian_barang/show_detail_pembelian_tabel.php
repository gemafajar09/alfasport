<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                        tb_beli_detail.beli_detail_id,
                        tb_beli_detail.beli_invoice,
                        tb_beli_detail.beli_detail_jml,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_satuan.satuan_nama,
                        tb_barang_detail.barang_detail_barcode,
                        tb_ukuran.ukuran_default,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran
                        From
                        tb_beli_detail 
                        Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id = tb_beli_detail.barang_detail_id
                        Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id 
                        Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id 
                        Inner Join
                        tb_satuan On tb_satuan.satuan_id = tb_beli_detail.satuan_id
                        WHERE tb_beli_detail.beli_id = :beli_id
                        ", array("beli_id" => $_POST['beli_id']))->fetchAll();
$jumlah = 0;

foreach ($data as $i => $a) {
        $jumlah += $a['beli_detail_jml'];
?>
<tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_detail_barcode'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
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
        <td><?= $a['beli_detail_jml'] ?></td>
        <td><?= $a['satuan_nama'] ?></td>
</tr>
<?php } ?>
<tr>
        <th colspan="4"></th>
        <th>Jumlah</th>
        <th><?= $jumlah ?></th>
        <th>&nbsp;</th>
</tr>
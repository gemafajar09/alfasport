<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("detail" => null, "table" => null);

if ($_POST['toko'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    SUM(tb_stok_toko_lainnya.stok_toko_lainnya_jumlah) as stok_toko_lainnya_jumlah,
                                    tb_stok_toko_lainnya.stok_toko_lainnya_tgl,
                                    tb_stok_toko_lainnya.gudang_lainnya_detail_id,
                                    toko.nama_toko,
                                    tb_gudang_lainnya.gudang_lainnya_kode,
                                    tb_gudang_lainnya.gudang_lainnya_nama,
                                    tb_gudang_lainnya.gudang_lainnya_artikel,
                                    tb_gudang_lainnya.gudang_lainnya_modal,
                                    tb_gudang_lainnya.gudang_lainnya_jual,
                                    tb_gudang_lainnya.gudang_lainnya_tgl,
                                    tb_kategori.kategori_nama,
                                    tb_merk.merk_nama,
                                    tb_divisi.divisi_nama,
                                    tb_gender.gender_nama,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                                    tb_ukuran_barang_detail.ukuran_barang_detail_nama
                                FROM
                                    tb_stok_toko_lainnya
                                INNER JOIN toko ON toko.id_toko = tb_stok_toko_lainnya.id_toko
                                INNER JOIN tb_ukuran_barang_detail ON tb_ukuran_barang_detail.ukuran_barang_detail_id = tb_stok_toko_lainnya.ukuran_barang_detail_id
                                INNER JOIN tb_gudang_lainnya_detail ON tb_gudang_lainnya_detail.gudang_lainnya_detail_id = tb_stok_toko_lainnya.gudang_lainnya_detail_id
                                INNER JOIN tb_gudang_lainnya ON tb_gudang_lainnya.gudang_lainnya_kode = tb_gudang_lainnya_detail.gudang_lainnya_kode
                                INNER JOIN tb_merk ON tb_merk.merk_id = tb_gudang_lainnya.id_merek
                                INNER JOIN tb_kategori ON tb_kategori.kategori_id = tb_gudang_lainnya.id_kategori
                                INNER JOIN tb_divisi ON tb_divisi.divisi_id = tb_gudang_lainnya.id_divisi
                                INNER JOIN tb_gender ON tb_gender.gender_id = tb_gudang_lainnya.id_gender
                                    WHERE tb_gudang_lainnya.gudang_lainnya_id = '$_POST[artikel]'
                                    GROUP BY tb_ukuran_barang_detail.ukuran_barang_detail_nama
                                ")->fetchAll();



    $json['detail'] = $con->query("SELECT
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_artikel,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_nama,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_modal,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_jual,
                                        alfa_sport.tb_merk.merk_nama,
                                        alfa_sport.tb_gender.gender_nama,
                                        alfa_sport.tb_kategori.kategori_nama,
                                        alfa_sport.tb_divisi.divisi_nama
                                    FROM
                                        alfa_sport.tb_gudang_lainnya
                                    INNER JOIN alfa_sport.tb_gudang_lainnya_detail ON
                                        alfa_sport.tb_gudang_lainnya_detail.gudang_lainnya_kode = alfa_sport.tb_gudang_lainnya.gudang_lainnya_kode
                                    INNER JOIN alfa_sport.tb_stok_toko_lainnya ON
                                        alfa_sport.tb_stok_toko_lainnya.gudang_lainnya_detail_id = alfa_sport.tb_gudang_lainnya_detail.gudang_lainnya_detail_id
                                    INNER JOIN alfa_sport.tb_merk ON
                                        alfa_sport.tb_merk.merk_id = alfa_sport.tb_gudang_lainnya.id_merek
                                    INNER JOIN alfa_sport.tb_gender ON
                                        alfa_sport.tb_gender.gender_id = alfa_sport.tb_gudang_lainnya.id_gender
                                    INNER JOIN alfa_sport.tb_kategori ON
                                        alfa_sport.tb_kategori.kategori_id = alfa_sport.tb_gudang_lainnya.id_kategori
                                    INNER JOIN alfa_sport.tb_divisi ON
                                        alfa_sport.tb_divisi.divisi_id = alfa_sport.tb_gudang_lainnya.id_divisi
                                    WHERE tb_gudang_lainnya.gudang_lainnya_id = '$_POST[artikel]' LIMIT 1")->fetch();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_stok_toko_lainnya.stok_toko_lainnya_jumlah,
                                    tb_stok_toko_lainnya.stok_toko_lainnya_tgl,
                                    tb_stok_toko_lainnya.gudang_lainnya_detail_id,
                                    toko.nama_toko,
                                    tb_gudang_lainnya.gudang_lainnya_kode,
                                    tb_gudang_lainnya.gudang_lainnya_nama,
                                    tb_gudang_lainnya.gudang_lainnya_artikel,
                                    tb_gudang_lainnya.gudang_lainnya_modal,
                                    tb_gudang_lainnya.gudang_lainnya_jual,
                                    tb_gudang_lainnya.gudang_lainnya_tgl,
                                    tb_kategori.kategori_nama,
                                    tb_merk.merk_nama,
                                    tb_divisi.divisi_nama,
                                    tb_gender.gender_nama,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode,
                                    tb_ukuran_barang_detail.ukuran_barang_detail_nama
                                FROM
                                    tb_stok_toko_lainnya
                                INNER JOIN toko ON toko.id_toko = tb_stok_toko_lainnya.id_toko
                                INNER JOIN tb_ukuran_barang_detail ON tb_ukuran_barang_detail.ukuran_barang_detail_id = tb_stok_toko_lainnya.ukuran_barang_detail_id
                                INNER JOIN tb_gudang_lainnya_detail ON tb_gudang_lainnya_detail.gudang_lainnya_detail_id = tb_stok_toko_lainnya.gudang_lainnya_detail_id
                                INNER JOIN tb_gudang_lainnya ON tb_gudang_lainnya.gudang_lainnya_kode = tb_gudang_lainnya_detail.gudang_lainnya_kode
                                INNER JOIN tb_merk ON tb_merk.merk_id = tb_gudang_lainnya.id_merek
                                INNER JOIN tb_kategori ON tb_kategori.kategori_id = tb_gudang_lainnya.id_kategori
                                INNER JOIN tb_divisi ON tb_divisi.divisi_id = tb_gudang_lainnya.id_divisi
                                INNER JOIN tb_gender ON tb_gender.gender_id = tb_gudang_lainnya.id_gender
                                    WHERE tb_gudang_lainnya.gudang_lainnya_id = '$_POST[artikel]'
                                AND toko.id_toko = '$_POST[toko]'
                                ")->fetchAll();



    $json['detail'] = $con->query("SELECT
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_artikel,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_nama,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_modal,
                                        alfa_sport.tb_gudang_lainnya.gudang_lainnya_jual,
                                        alfa_sport.tb_merk.merk_nama,
                                        alfa_sport.tb_gender.gender_nama,
                                        alfa_sport.tb_kategori.kategori_nama,
                                        alfa_sport.tb_divisi.divisi_nama
                                    FROM
                                        alfa_sport.tb_gudang_lainnya
                                    INNER JOIN alfa_sport.tb_gudang_lainnya_detail ON
                                        alfa_sport.tb_gudang_lainnya_detail.gudang_lainnya_kode = alfa_sport.tb_gudang_lainnya.gudang_lainnya_kode
                                    INNER JOIN alfa_sport.tb_stok_toko_lainnya ON
                                        alfa_sport.tb_stok_toko_lainnya.gudang_lainnya_detail_id = alfa_sport.tb_gudang_lainnya_detail.gudang_lainnya_detail_id
                                    INNER JOIN alfa_sport.tb_merk ON
                                        alfa_sport.tb_merk.merk_id = alfa_sport.tb_gudang_lainnya.id_merek
                                    INNER JOIN alfa_sport.tb_gender ON
                                        alfa_sport.tb_gender.gender_id = alfa_sport.tb_gudang_lainnya.id_gender
                                    INNER JOIN alfa_sport.tb_kategori ON
                                        alfa_sport.tb_kategori.kategori_id = alfa_sport.tb_gudang_lainnya.id_kategori
                                    INNER JOIN alfa_sport.tb_divisi ON
                                        alfa_sport.tb_divisi.divisi_id = alfa_sport.tb_gudang_lainnya.id_divisi
                                    INNER JOIN toko ON 
                                        toko.id_toko = tb_stok_toko_lainnya.id_toko    
                                    WHERE tb_gudang_lainnya.gudang_lainnya_id = '$_POST[artikel]'
                                    AND toko.id_toko = '$_POST[toko]' LIMIT 1")->fetch();
}

// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
    $awal  = date_create($a['gudang_lainnya_tgl']);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <!-- <td><?= $a['barcode'] ?></td> -->
        <td>
            <?php
            if ($_POST['toko'] == NULL) {
                echo "Semua Toko";
            } else {
                echo $a['nama_toko'];
            }
            ?>
        </td>
        <td><?= $a['stok_toko_lainnya_jumlah'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['ukuran_barang_detail_nama'] ?></td>
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
        <td><?= tgl_indo($a['gudang_lainnya_tgl']) ?></td>
        <td><?= tgl_indo($a['stok_toko_lainnya_tgl']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
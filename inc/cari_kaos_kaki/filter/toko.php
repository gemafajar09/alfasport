<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("detail" => null, "table" => null);

if ($_POST['toko'] == NULL) {
    $json['table'] = $con->query("SELECT
                                    SUM(tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_jumlah) as stok_toko_kaos_kaki_jumlah,
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_tgl,
                                    tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id,
                                    toko.nama_toko,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_tgl,
                                    tb_merk.merk_nama,
                                    tb_gender.gender_nama,
                                    tb_kategori.kategori_nama,
                                    tb_divisi.divisi_nama,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size
                                From
                                    tb_stok_toko_kaos_kaki Inner Join
                                    toko On toko.id_toko = tb_stok_toko_kaos_kaki.id_toko Inner Join
                                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                                            tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id Inner Join
                                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id =
                                            tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id Inner Join
                                    tb_gudang_kaos_kaki On tb_gudang_kaos_kaki.gudang_kaos_kaki_kode =
                                            tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode Inner Join
                                    tb_merk On tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek Inner Join
                                    tb_kategori On tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori Inner Join
                                    tb_gender On tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender Inner Join
                                    tb_divisi On tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                                    WHERE tb_gudang_kaos_kaki.gudang_kaos_kaki_id = '$_POST[artikel]'
                                    GROUP BY tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue
                                ")->fetchAll();


    $json['detail'] = $con->query("SELECT
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                                        tb_merk.merk_nama,
                                        tb_gender.gender_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama
                                    FROM
                                        tb_gudang_kaos_kaki
                                    INNER JOIN tb_gudang_kaos_kaki_detail ON
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode = tb_gudang_kaos_kaki.gudang_kaos_kaki_kode
                                    INNER JOIN tb_stok_toko_kaos_kaki ON
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id = tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori
                                    WHERE tb_gudang_kaos_kaki.gudang_kaos_kaki_id = '$_POST[artikel]' LIMIT 1")->fetch();
} else {
    $json['table'] = $con->query("SELECT
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_jumlah,
                                    tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_tgl,
                                    tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id,
                                    toko.nama_toko,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_tgl,
                                    tb_merk.merk_nama,
                                    tb_gender.gender_nama,
                                    tb_kategori.kategori_nama,
                                    tb_divisi.divisi_nama,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size
                                From
                                    tb_stok_toko_kaos_kaki Inner Join
                                    toko On toko.id_toko = tb_stok_toko_kaos_kaki.id_toko Inner Join
                                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                                            tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id Inner Join
                                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id =
                                            tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id Inner Join
                                    tb_gudang_kaos_kaki On tb_gudang_kaos_kaki.gudang_kaos_kaki_kode =
                                            tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode Inner Join
                                    tb_merk On tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek Inner Join
                                    tb_kategori On tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori Inner Join
                                    tb_gender On tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender Inner Join
                                    tb_divisi On tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                                    WHERE tb_gudang_kaos_kaki.gudang_kaos_kaki_id = '$_POST[artikel]'
                                AND toko.id_toko = '$_POST[toko]'
                                ")->fetchAll();



    $json['detail'] = $con->query("SELECT
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                                        tb_merk.merk_nama,
                                        tb_gender.gender_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama
                                    FROM
                                        tb_gudang_kaos_kaki
                                    INNER JOIN tb_gudang_kaos_kaki_detail ON
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode = tb_gudang_kaos_kaki.gudang_kaos_kaki_kode
                                    INNER JOIN tb_stok_toko_kaos_kaki ON
                                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id = tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori
                                    INNER JOIN toko ON 
                                        toko.id_toko = tb_stok_toko_kaos_kaki.id_toko    
                                    WHERE tb_gudang_kaos_kaki.gudang_kaos_kaki_id = '$_POST[artikel]'
                                    AND toko.id_toko = '$_POST[toko]' LIMIT 1")->fetch();
}

// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
    $awal  = date_create($a['gudang_kaos_kaki_tgl']);
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
        <td><?= $a['stok_toko_kaos_kaki_jumlah'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['ukuran_kaos_kaki_ue'] ?></td>
        <td style="display: none;" class="ukuran_size" id="ukuran_size" name="ukuran_size"><?= $a['ukuran_kaos_kaki_size'] ?></td>
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
        <td><?= tgl_indo($a['gudang_kaos_kaki_tgl']) ?></td>
        <td><?= tgl_indo($a['stok_toko_kaos_kaki_tgl']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
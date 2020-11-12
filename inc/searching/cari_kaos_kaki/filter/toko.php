<?php
include "../../../../config/koneksi.php";
include "../../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("detail" => null, "table" => null);

if ($_POST['toko'] == NULL) {
    $json['table'] = $con->query("SELECT
                                        SUM(tb_barang_toko.barang_toko_jml) AS barang_toko_jml,
                                        tb_barang_toko.barang_toko_tgl,
                                        tb_barang_toko.barang_detail_id,
                                        toko.nama_toko,
                                        tb_barang.barang_kode,
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_artikel,
                                        tb_barang.barang_nama,
                                        tb_barang.barang_modal,
                                        tb_barang.barang_jual,
                                        tb_barang.barang_tgl,
                                        tb_merk.merk_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama,
                                        tb_gender.gender_nama,
                                        tb_barang_detail.barang_detail_barcode,
                                        tb_ukuran.sepatu_ue,
                                        tb_ukuran.sepatu_uk,
                                        tb_ukuran.sepatu_us,
                                        tb_ukuran.sepatu_cm,
                                        tb_ukuran.kaos_kaki_eu,
                                        tb_ukuran.kaos_kaki_size,
                                        tb_ukuran.barang_lainnya_nama_ukuran
                                    FROM
                                        tb_barang_toko
                                    INNER JOIN toko ON
                                        toko.id_toko = tb_barang_toko.id_toko
                                    INNER JOIN tb_ukuran ON
                                        tb_ukuran.ukuran_id = tb_barang_toko.ukuran_id
                                    INNER JOIN tb_barang_detail ON
                                        tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
                                    INNER JOIN tb_barang ON
                                        tb_barang.barang_id = tb_barang_detail.barang_id
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_barang.merk_id
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_barang.kategori_id
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_barang.divisi_id
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_barang.gender_id
                                    WHERE tb_barang.barang_id = '$_POST[artikel]'
                                ")->fetchAll();


    $json['detail'] = $con->query("SELECT
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_artikel,
                                        tb_barang.barang_nama,
                                        tb_barang.barang_modal,
                                        tb_barang.barang_jual,
                                        tb_merk.merk_nama,
                                        tb_gender.gender_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama
                                    FROM
                                        tb_barang
                                    INNER JOIN tb_barang_detail ON
                                        tb_barang_detail.barang_id = tb_barang.barang_id
                                    INNER JOIN tb_barang_toko ON
                                        tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_barang.merk_id
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_barang.gender_id
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_barang.divisi_id
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_barang.kategori_id
                                    WHERE tb_barang.barang_id = '$_POST[artikel]' LIMIT 1")->fetch();
} else {
    $json['table'] = $con->query("SELECT
                                        tb_barang_toko.barang_toko_jml,
                                        tb_barang_toko.barang_toko_tgl,
                                        tb_barang_toko.barang_detail_id,
                                        toko.nama_toko,
                                        tb_barang.barang_kode,
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_artikel,
                                        tb_barang.barang_nama,
                                        tb_barang.barang_modal,
                                        tb_barang.barang_jual,
                                        tb_barang.barang_tgl,
                                        tb_merk.merk_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama,
                                        tb_gender.gender_nama,
                                        tb_barang_detail.barang_detail_barcode,
                                        tb_ukuran.sepatu_ue,
                                        tb_ukuran.sepatu_uk,
                                        tb_ukuran.sepatu_us,
                                        tb_ukuran.sepatu_cm,
                                        tb_ukuran.kaos_kaki_eu,
                                        tb_ukuran.kaos_kaki_size,
                                        tb_ukuran.barang_lainnya_nama_ukuran
                                    FROM
                                        tb_barang_toko
                                    INNER JOIN toko ON
                                        toko.id_toko = tb_barang_toko.id_toko
                                    INNER JOIN tb_ukuran ON
                                        tb_ukuran.ukuran_id = tb_barang_toko.ukuran_id
                                    INNER JOIN tb_barang_detail ON
                                        tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
                                    INNER JOIN tb_barang ON
                                        tb_barang.barang_id = tb_barang_detail.barang_id
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_barang.merk_id
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_barang.kategori_id
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_barang.divisi_id
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_barang.gender_id
                                    WHERE tb_barang.barang_id = '$_POST[artikel]'
                                    AND toko.id_toko = '$_POST[toko]'
                                    ")->fetchAll();



    $json['detail'] = $con->query("SELECT
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_artikel,
                                        tb_barang.barang_nama,
                                        tb_barang.barang_modal,
                                        tb_barang.barang_jual,
                                        tb_merk.merk_nama,
                                        tb_gender.gender_nama,
                                        tb_kategori.kategori_nama,
                                        tb_divisi.divisi_nama
                                    FROM
                                        tb_barang
                                    INNER JOIN tb_barang_detail ON
                                        tb_barang_detail.barang_id = tb_barang.barang_id
                                    INNER JOIN tb_barang_toko ON
                                        tb_barang_detail.barang_detail_id = tb_barang_toko.barang_detail_id
                                    INNER JOIN toko ON
                                        toko.id_toko = tb_barang_toko.id_toko
                                    INNER JOIN tb_merk ON
                                        tb_merk.merk_id = tb_barang.merk_id
                                    INNER JOIN tb_gender ON
                                        tb_gender.gender_id = tb_barang.gender_id
                                    INNER JOIN tb_divisi ON
                                        tb_divisi.divisi_id = tb_barang.divisi_id
                                    INNER JOIN tb_kategori ON
                                        tb_kategori.kategori_id = tb_barang.kategori_id
                                    WHERE tb_barang.barang_id = '$_POST[artikel]'
                                    AND toko.id_toko = '$_POST[toko]' LIMIT 1")->fetch();
}

// pending hasil sebelum kirim ke window/browser
ob_start();

?>
<table class="table table-striped" style="width: 100%;">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Toko</th>
            <th>Jumlah</th>
            <th>
                <select name="ukuran_nama" id="ukuran_nama" class="form-control select2" width="100%">
                    <option value="ue">EU</option>
                    <option value="size">Size</option>
                </select>
            </th>
            <th>Umur Barang</th>
            <th>Tanggal Masuk Gudang</th>
            <th>Tanggal Masuk Toko</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($json['table'] as $i => $a) {
            $awal  = date_create($a['barang_tgl']);
            $akhir = date_create();
            $diff  = date_diff($awal, $akhir);
        ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td>
                    <?php
                    if ($_POST['toko'] == NULL) {
                        echo "Semua Toko";
                    } else {
                        echo $a['nama_toko'];
                    }
                    ?>
                </td>
                <td><?= $a['barang_toko_jml'] ?></td>
                <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['kaos_kaki_eu'] ?></td>
                <td style="display: none;" class="ukuran_size" id="ukuran_size" name="ukuran_size"><?= $a['kaos_kaki_size'] ?></td>
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
                <td><?= tgl_indo($a['barang_tgl']) ?></td>
                <td><?= tgl_indo($a['barang_toko_tgl']) ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $("#ukuran_nama").change(function() {
            var ukuran_nama = $(this).children("option:selected").val();
            if (ukuran_nama == "size") {
                var uusize = document.querySelectorAll('#ukuran_size');
                for (var us of uusize) {
                    us.style.display = "block";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
            } else {
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "block";
                }
                var uusize = document.querySelectorAll('#ukuran_size');
                for (var us of uusize) {
                    us.style.display = "none";
                }
            }
        });
    });
</script>
<?php
// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
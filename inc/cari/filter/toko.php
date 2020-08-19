<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

// jadikan kedua data yang akan dikirm format JSON
$json = array("detail" => null, "table" => null);

if ($_POST['toko'] == NULL) {
    $json['table'] = $con->query("SELECT 
                        a.id_gudang, 
                        a.id, 
                        a.artikel, 
                        a.nama, 
                        c.merk_nama, 
                        a.modal, 
                        a.jual, 
                        d.gender_nama, 
                        e.kategori_nama, 
                        f.divisi_nama, 
                        a.tanggal, 
                        b.nama_toko, 
                        i.jumlah, 
                        j.ue,
                        j.uk,
                        j.us,
                        j.cm,
                        i.tanggal as tgl_masuk
                    FROM tb_gudang a
                    JOIN tb_stok_toko i ON a.id_gudang = i.id_gudang 
                    JOIN toko b ON i.id_toko=b.id_toko 
                    JOIN tb_merk c ON a.id_merek = c.merk_id 
                    JOIN tb_gender d ON a.id_gender = d.gender_id 
                    JOIN tb_kategori e ON a.id_kategori = e.kategori_id 
                    JOIN tb_divisi f ON a.id_divisi = f.divisi_id 
                    JOIN tb_gudang_detail h ON a.id = h.id
                    JOIN tb_all_ukuran j ON i.id_ukuran = j.id_ukuran
                    WHERE a.id_gudang = '$_POST[artikel]'
            ")->fetchAll();

    $json['detail'] = $con->query("SELECT  
            a.artikel, 
            a.modal, 
            a.jual, 
            c.merk_nama, 
            d.gender_nama, 
            e.kategori_nama, 
            f.divisi_nama
        FROM tb_gudang a
        JOIN tb_stok_toko i ON a.id_gudang = i.id_gudang 
        JOIN toko b ON i.id_toko=b.id_toko 
        JOIN tb_merk c ON a.id_merek = c.merk_id 
        JOIN tb_gender d ON a.id_gender = d.gender_id 
        JOIN tb_kategori e ON a.id_kategori = e.kategori_id 
        JOIN tb_divisi f ON a.id_divisi = f.divisi_id 
        JOIN tb_gudang_detail g ON a.id = g.id
        WHERE a.id_gudang = '$_POST[artikel]' LIMIT 1")->fetch();
} else {
    $json['table'] = $con->query("SELECT 
                        a.id_gudang, 
                        a.id, 
                        a.artikel, 
                        a.nama, 
                        c.merk_nama, 
                        a.modal, 
                        a.jual, 
                        d.gender_nama, 
                        e.kategori_nama, 
                        f.divisi_nama, 
                        a.tanggal, 
                        b.nama_toko, 
                        i.jumlah, 
                        j.ue,
                        j.uk,
                        j.us,
                        j.cm,
                        i.tanggal as tgl_masuk
                    FROM tb_gudang a
                    JOIN tb_stok_toko i ON a.id_gudang = i.id_gudang 
                    JOIN toko b ON i.id_toko=b.id_toko 
                    JOIN tb_merk c ON a.id_merek = c.merk_id 
                    JOIN tb_gender d ON a.id_gender = d.gender_id 
                    JOIN tb_kategori e ON a.id_kategori = e.kategori_id 
                    JOIN tb_divisi f ON a.id_divisi = f.divisi_id 
                    JOIN tb_gudang_detail h ON a.id = h.id
                    JOIN tb_all_ukuran j ON i.id_ukuran = j.id_ukuran
                    WHERE a.id_gudang = '$_POST[artikel]'
                    AND b.id_toko = '$_POST[toko]'
            ")->fetchAll();

    $json['detail'] = $con->query("SELECT  
            a.artikel, 
            a.modal, 
            a.jual, 
            c.merk_nama, 
            d.gender_nama, 
            e.kategori_nama, 
            f.divisi_nama
        FROM tb_gudang a
        JOIN tb_stok_toko i ON a.id_gudang = i.id_gudang 
        JOIN toko b ON i.id_toko=b.id_toko 
        JOIN tb_merk c ON a.id_merek = c.merk_id 
        JOIN tb_gender d ON a.id_gender = d.gender_id 
        JOIN tb_kategori e ON a.id_kategori = e.kategori_id 
        JOIN tb_divisi f ON a.id_divisi = f.divisi_id 
        JOIN tb_gudang_detail g ON a.id = g.id
        WHERE a.id_gudang = '$_POST[artikel]'
        AND b.id_toko = '$_POST[toko]' LIMIT 1")->fetch();
}



// pending hasil sebelum kirim ke window/browser
ob_start();
foreach ($json['table'] as $i => $a) {
    $awal  = date_create($a['tanggal']);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['jumlah'] ?></td>
        <td style="display: block;" class="ukuran_ue" id="ukuran_ue" name="ukuran_ue"><?= $a['ue'] ?></td>
        <td style="display: none;" class="ukuran_us" id="ukuran_us" name="ukuran_us"><?= $a['us'] ?></td>
        <td style="display: none;" class="ukuran_uk" id="ukuran_uk" name="ukuran_uk"><?= $a['uk'] ?></td>
        <td style="display: none;" class="ukuran_cm" id="ukuran_cm" name="ukuran_cm"><?= $a['cm'] ?></td>
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
        <td><?= tgl_indo($a['tanggal']) ?></td>
        <td><?= tgl_indo($a['tgl_masuk']) ?></td>
    </tr>
<?php }

// pembatas pending tadi
$json['table'] = ob_get_contents();

// hasil pending ddihapus
ob_end_clean();
echo json_encode($json);
?>
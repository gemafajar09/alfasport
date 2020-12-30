<?php
include "../../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$sql_tambahan = '';

// var_dump($_POST);

//
if (empty($_POST)) {
    $sql_tambahan = '';
}
// // per satu filter
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "M";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "K";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "D";
    $sql_tambahan .= " AND tb_barang.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "S";
    $sql_tambahan .= " AND tb_barang.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "G";
    $sql_tambahan .= " AND tb_barang.gender_id = '$_POST[gender]'";
}



// // per dua filter
// merk dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MK";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MD";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MS";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.gender_id = '$_POST[gender]'";
}
// kategori dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "KD";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "KS";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "KG";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.gender_id = '$_POST[gender]'";
}
// divisi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "DS";
    $sql_tambahan .= " AND tb_barang.divisi_id = '$_POST[divisi]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "DG";
    $sql_tambahan .= " AND tb_barang.divisi_id = '$_POST[divisi]' 
                        AND tb_barang.gender_id = '$_POST[gender]'";
}
// subdivivi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "SG";
    $sql_tambahan .= " AND tb_barang.subdivisi_id = '$_POST[subdivisi]' 
                        AND tb_barang.gender_id = '$_POST[gender]'";
}



// // tiga filter
// merek, kategori dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MKD";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MKS";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MKG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}
// merek divisi dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MDS";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MDG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}
// merek subdivisi dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MSG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}

// kategori divisi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "KDS";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "KDG";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "KSG";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'";
}

// divisi subdivisi gender
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "DSG";
    $sql_tambahan .= " AND tb_barang.divisi_id = '$_POST[divisi]' 
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'";
}


// empat filter
// merek kategori divisi subvisi
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MKDS";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        ";
}
// merek kategori divisi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MKDG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}
// merek kategori subdivi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MKSG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}
// merek divisi subdivisi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MDSG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}
// kategori divisi subdivisi gender
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "KDSG";
    $sql_tambahan .= " AND tb_barang.kategori_id = '$_POST[kategori]' 
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}

//kelima filter
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MKDSG";
    $sql_tambahan .= " AND tb_barang.merk_id = '$_POST[merek]' 
                        AND tb_barang.kategori_id = '$_POST[kategori]'
                        AND tb_barang.divisi_id = '$_POST[divisi]'
                        AND tb_barang.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_barang.gender_id = '$_POST[gender]'
                        ";
}

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
                    WHERE 1 $sql_tambahan
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
        <td class="text-center">
            <button type="button" id="hapus" onclick="hapus('<?= $a['barang_toko_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="detail('<?= $a['barang_toko_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
<?php
include "../../../config/koneksi.php";

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

$data = $con->query(
    "SELECT
                        tb_barang.barang_id,
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_modal,
                        tb_barang.barang_jual,
                        tb_gender.gender_nama,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama
                        From
                        tb_barang Inner Join
                        tb_gender On tb_gender.gender_id = tb_barang.gender_id Inner Join
                        tb_merk On tb_merk.merk_id = tb_barang.merk_id Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_barang.kategori_id Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_barang.divisi_id Inner Join
                        tb_subdivisi On tb_subdivisi.subdivisi_id = tb_barang.subdivisi_id
                        WHERE 1 $sql_tambahan
                        "
)->fetchAll();



foreach ($data as $i => $a) {
    $modal = 'Rp.' . number_format($a['barang_modal']);
    $jual = 'Rp.' . number_format($a['barang_jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <!-- <td><?= $a['barang_kategori'] ?></td> -->
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $modal ?></td>
        <td><?= $jual ?></td>
        <td class="text-center">
            <button type="button" id="edit" onclick="edit('<?= $a['barang_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="detail('<?= $a['barang_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['barang_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>

</script>
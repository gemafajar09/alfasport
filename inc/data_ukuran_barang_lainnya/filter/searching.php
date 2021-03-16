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
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "K";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "D";
    $sql_tambahan .= " AND tb_ukuran.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "S";
    $sql_tambahan .= " AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "G";
    $sql_tambahan .= " AND tb_ukuran.gender_id = '$_POST[gender]'";
}



// // per dua filter
// merk dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MK";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MD";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MS";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}
// kategori dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "KD";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "KS";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "KG";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}
// divisi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "DS";
    $sql_tambahan .= " AND tb_ukuran.divisi_id = '$_POST[divisi]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "DG";
    $sql_tambahan .= " AND tb_ukuran.divisi_id = '$_POST[divisi]' 
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}
// subdivivi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "SG";
    $sql_tambahan .= " AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]' 
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}



// // tiga filter
// merek, kategori dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] == null) {
    // echo "MKD";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MKS";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MKG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}
// merek divisi dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MDS";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        ";
} elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MDG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}
// merek subdivisi dan lainnya
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MSG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}

// kategori divisi dan lainnya
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "KDS";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "KDG";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
} elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "KSG";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}

// divisi subdivisi gender
elseif ($_POST['merek'] == null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "DSG";
    $sql_tambahan .= " AND tb_ukuran.divisi_id = '$_POST[divisi]' 
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'";
}


// empat filter
// merek kategori divisi subvisi
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] == null) {
    // echo "MKDS";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        ";
}
// merek kategori divisi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] == null and $_POST['gender'] != null) {
    // echo "MKDG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}
// merek kategori subdivi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] == null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MKSG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}
// merek divisi subdivisi gender
elseif ($_POST['merek'] != null and $_POST['kategori'] == null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MDSG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}
// kategori divisi subdivisi gender
elseif ($_POST['merek'] == null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "KDSG";
    $sql_tambahan .= " AND tb_ukuran.kategori_id = '$_POST[kategori]' 
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}

//kelima filter
elseif ($_POST['merek'] != null and $_POST['kategori'] != null and $_POST['divisi'] != null and $_POST['subdivisi'] != null and $_POST['gender'] != null) {
    // echo "MKDSG";
    $sql_tambahan .= " AND tb_ukuran.merk_id = '$_POST[merek]' 
                        AND tb_ukuran.kategori_id = '$_POST[kategori]'
                        AND tb_ukuran.divisi_id = '$_POST[divisi]'
                        AND tb_ukuran.subdivisi_id = '$_POST[subdivisi]'
                        AND tb_ukuran.gender_id = '$_POST[gender]'
                        ";
}

$data = $con->query(
    "SELECT
                        tb_ukuran.ukuran_id,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_ukuran.gender_id,
                        tb_ukuran.barang_lainnya_nama_ukuran
                    From
                    tb_ukuran 
                    LEFT Join 
                    tb_merk On tb_ukuran.merk_id = tb_merk.merk_id 
                    LEFT Join
                    tb_kategori On tb_ukuran.kategori_id = tb_kategori.kategori_id 
                    LEFT Join
                    tb_divisi On tb_ukuran.divisi_id = tb_divisi.divisi_id 
                    LEFT Join
                    tb_subdivisi On tb_ukuran.subdivisi_id = tb_subdivisi.subdivisi_id 
                    LEFT Join
                    tb_gender On tb_ukuran.gender_id = tb_gender.gender_id
                    WHERE 
                    tb_ukuran.ukuran_kategori = 'Barang Lainnya'
                    $sql_tambahan
                        "
)->fetchAll();



foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td>
            <?php
            $gender = explode(",", $a['gender_id']);
            $data_gender = $con->select("tb_gender", array("gender_nama"), array("gender_id" => $gender));
            foreach ($data_gender as $data) {
            ?>
                <?= $data['gender_nama'] ?> <br>
            <?php
            }
            ?>
        </td>
        <td>
            <?php
            echo $a['kategori_nama'] . "<br>" . "<i><b>" . $a['divisi_nama'] . "</b></i>" . "<br>" . $a['subdivisi_nama'];
            ?>
        </td>
        <td><?= $a['barang_lainnya_nama_ukuran'] ?></td>
        <td>
            <button type="button" onclick="edit(<?= $a['ukuran_id'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['ukuran_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>

</script>
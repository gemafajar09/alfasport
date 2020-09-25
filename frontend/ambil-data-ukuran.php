<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$ukuran = $con->query("SELECT b.$_POST[kodeukuran] AS ukuran, a.id_stok_toko FROM tb_stok_toko a LEFT JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran WHERE a.id_toko = '$_POST[toko]'
")->fetchAll();
?>

<option value="">Pilih Ukuran</option>
<?php
foreach ($ukuran as $key => $data) { ?>
  <option value="<?= $data['id_stok_toko'] ?>"><?= $data['ukuran'] ?></option>

<?php
}
?>
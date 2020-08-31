<?php
include "../config/koneksi.php";
$whistlists = $con->query("
              SELECT
              w.id,
              g.nama,
              g.jual,
              g.id_gudang,
              g.thumbnail,
              m.merk_nama
              FROM whistlist w LEFT JOIN tb_gudang g ON w.id=g.id
              LEFT JOIN tb_merk m ON g.id_merek=m.merk_id WHERE w.id_user='$_COOKIE[member_id]'")->fetchAll();

$cek = count($whistlists);
if ($cek < 1) {
  echo "<tr><td colspan='5'>Whistlist Masih Kosong</td></tr>";
} else {
  foreach ($whistlists as $i => $whistlist) {
    $id = $whistlist['id'];
?>

    <tr>
      <td class="text-center"><a href="index.php?page=product&id=<?= $whistlist['id_gudang'] ?>"><img src="<?= $whistlist['thumbnail'] ?>" alt="Product" title="Product " width="100"></a></td>
      <td class="text-left"><a href="index.php?page=product&id=<?= $whistlist['id_gudang'] ?>"><?= $whistlist['nama'] ?></a></td>
      <td class="text-left"><?= $whistlist['merk_nama'] ?></td>
      <td class="text-right">
        <div class="price">Rp. <?= number_format($whistlist['jual'], 0, ",", ".") ?></div>
      </td>
      <td class="text-right">
        <a onclick='hapusWishlistItem("<?= $id ?>")' data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a>
      </td>
    </tr>

<?php
  }
}
?>
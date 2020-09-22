<?php
include "../config/koneksi.php";
$carts = $con->query("
Select
cart.harga,
cart.id_cart,
cart.id,
cart.qty,
tb_gudang.thumbnail,
tb_gudang.nama,
tb_gudang.id_gudang,
tb_gudang.berat,
tb_merk.merk_nama,
toko.nama_toko,
tb_all_ukuran.ue,
tb_all_ukuran.uk,
tb_all_ukuran.us,
tb_all_ukuran.cm,
cart.id_user
From
cart Inner Join
tb_gudang On tb_gudang.id = cart.id Inner Join
tb_merk On tb_merk.merk_id = tb_gudang.id_merek Inner Join
tb_stok_toko On tb_stok_toko.id_stok_toko = cart.id_stok_toko Inner Join
tb_all_ukuran On tb_all_ukuran.id_ukuran = tb_stok_toko.id_ukuran Inner Join
toko On toko.id_toko = cart.id_toko WHERE cart.id_user='$_COOKIE[member_id]'")->fetchAll();

$cek = count($carts);
if ($cek < 1) {
  echo "<tr><td colspan='6'>Keranjang Masih Kosong</td></tr>";
} else {
  foreach ($carts as $i => $cart) {
    $id = $cart['id'];
    $total = $cart['harga'] * $cart['qty'];
?>
    <tr>
      <td class="text-center">
        <a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><img src="<?= $cart['thumbnail'] ?>" alt="Product" title="Product" class="img-thumbnail" width="100" /></a>
        <div class="visible-xs"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><?= $cart['nama'] ?></a></div>
      </td>
      <td class="text-center hidden-xs">
        <a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><?= $cart['nama'] ?></a><br />
      </td>
      <td class="text-center hidden-xs"><?= $cart['merk_nama'] ?></td>
      <td class="hidden-xs" style="text-align: left;">
        <b>EU</b> : <?= $cart['ue'] ?><br>
        <b>UK</b> : <?= $cart['uk'] ?><br>
        <b>US</b> : <?= $cart['us'] ?><br>
        <b>CM</b> : <?= $cart['cm'] ?>
      </td>
      <td class="text-center hidden-xs"><?= $cart['berat'] ?> gram</td>
      <td class="text-center hidden-xs"><?= $cart['nama_toko'] ?></td>
      <td class="text-center">
        <input type="text" name="" value="<?= $cart['qty'] ?>" size="1" id="qty_cart" />
        &nbsp;<input type="image" src="img/update.png" alt="Update" title="Update" onclick="updateCartItem(<?= $cart['id_cart'] ?>)" />
        &nbsp;<a onclick='hapusCartItem("<?= $id ?>")'><img src="img/remove.png" alt="Remove" title="Remove" /></a>
      </td>
      <td class="text-right hidden-xs">Rp. <?= number_format($cart['harga'], 0, ",", ".") ?></td>
      <td class="text-right">Rp. <?= number_format($total, 0, ",", ".") ?></td>
    </tr>

<?php
  }
}
?>
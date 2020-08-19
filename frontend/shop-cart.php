<?php
include "../config/koneksi.php";
$carts = $con->query("
              SELECT SUM(c.qty) AS jumlah, SUM(c.harga*c.qty) AS total,
              c.harga,
              c.id_cart,
              c.id,
              c.qty,
              g.thumbnail,
              g.nama,
              g.id_gudang,
              m.merk_nama
        FROM cart c
        LEFT JOIN tb_gudang g ON c.id=g.id
        LEFT JOIN tb_merk m ON g.id_merek=m.merk_id WHERE id_user='1' GROUP BY g.id")->fetchAll();

$cek = count($carts);
if ($cek < 1) {
  echo "<tr><td colspan='6'>Keranjang Masih Kosong</td></tr>";
} else {
  foreach ($carts as $i => $cart) {
    $id = $cart['id'];
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
      <td class="text-center">
        <input type="text" name="" value="<?= $cart['jumlah'] ?>" size="1" id="qty_cart" />
        &nbsp;<input type="image" src="img/update.png" alt="Update" title="Update" onclick="updateCartItem(<?= $cart['id_cart'] ?>)" />
        &nbsp;<a onclick='hapusCartItem("<?= $id ?>")'><img src="img/remove.png" alt="Remove" title="Remove" /></a>
      </td>
      <td class="text-right hidden-xs">Rp. <?= number_format($cart['harga'], 0, ",", ".") ?></td>
      <td class="text-right">Rp. <?= number_format($cart['total'], 0, ",", ".") ?></td>
    </tr>

<?php
  }
}
?>
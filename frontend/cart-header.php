<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}
?>
<div class="mini-cart-info">
  <table id="isiHeaderCart">
    <?php
    include "../config/koneksi.php";
    $carts = $con->query("
              SELECT SUM(c.qty) AS jumlah, SUM(c.harga*c.qty) AS total,
              c.harga,
              c.id,
              g.id_gudang,
              c.qty,
              g.thumbnail,
              g.nama,
              m.merk_nama
        FROM cart c
        LEFT JOIN tb_gudang g ON c.id=g.id
        LEFT JOIN tb_merk m ON g.id_merek=m.merk_id WHERE id_user='$_COOKIE[member_id]' GROUP BY g.id")->fetchAll();
    $subtotal = 0;

    $cek = count($carts);
    if ($cek < 1) {
      echo "Keranjang Masih Kosong";
      echo "<br><br>";
    } else {
      foreach ($carts as $i => $cart) {
        $id = $cart['id'];
        $subtotal += $cart['total'];
    ?>

        <tr>
          <td class="image"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><img src="<?= $cart['thumbnail'] ?>" alt="Product" title="Product" width="50" /></a></td>
          <td class="name"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><?= $cart['nama'] ?></a></td>
          <td class="quantity">x&nbsp;<?= $cart['jumlah'] ?></td>
          <td class="total">Rp. <?= number_format($cart['total'], 0, ",", ".") ?></td>
          <td class="text-right remove"><a onclick='hapusCartItem("<?= $id ?>")' title="Remove" style="cursor: pointer">x</a></td>
        </tr>
    <?php }
    } ?>
  </table>
</div>

<?php
if ($cek > 0) {
?>
  <div class="mini-cart-total">
    <table>
      <tr>
        <td class="right"><b>Sub-Total:</b></td>
        <td class="text-right right"><?= number_format($subtotal, 0, ",", ".") ?></td>
      </tr>

      <tr>
        <td class="right"><b>Total:</b></td>
        <td class="text-right right"><?= number_format($subtotal, 0, ",", ".") ?></td>
      </tr>
    </table>
  </div>
<?php }
?>

<div class="checkout"><a href="index.php?page=cart" class="button button-secondary btn-view-cart">View Cart</a> <a href="checkout.html" class="button btn-checkout">Checkout</a></div>
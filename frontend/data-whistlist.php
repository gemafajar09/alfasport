<?php
include "../config/koneksi.php";
$whistlists = $con->query("
              SELECT
              g.nama,
              g.jual,
              g.thumbnail
              FROM whistlist w LEFT JOIN tb_gudang g ON w.id=g.id WHERE w.id_user='1'")->fetchAll();

$cek = count($whistlists);
if ($cek < 1) {
  echo "<tr><td colspan='6'>Whistlist Masih Kosong</td></tr>";
} else {
  foreach ($whistlists as $i => $whistlist) {
?>

    <tr>
      <td class="text-center"><a href="product.html"><img src="<?= $whistlist['thumbnail'] ?>" alt="Product" title="Product " width="100"></a></td>
      <td class="text-left"><a href="product.html">Name of product</a></td>
      <td class="text-left">Product 1</td>
      <td class="text-right">In Stock</td>
      <td class="text-right">
        <div class="price">$122.00</div>
      </td>
      <td class="text-right">
        <button type="button" onclick="" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add to Cart"><i class="fa fa-shopping-cart"></i></button>
        <a href="wish_list.html" data-toggle="tooltip" title="" class="btn btn-danger" data-original-title="Remove"><i class="fa fa-times"></i></a>
      </td>
    </tr>

<?php
  }
}
?>
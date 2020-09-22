<?php
include "../config/koneksi.php";
include "../config/fungsi_id.php";

if (isset($_POST['oksimpan'])) {
  $kurir = $_POST['kurir'];
  $service = $_POST['service'];
  $nmpenerima = $_POST['namapenerima'];
  $idprov = $_POST['id_prov'];
  $idkota = $_POST['id_kota'];
  $kdpos = $_POST['kode_pos'];
  $alamat = $_POST['alamat'];
  $berat = $_POST['berat'];
  $ongkir = $_POST['ongkir'];
  $potongan = $_POST['potongan'];
  $total = $_POST['totalbayar'];
  $keterangan = $_POST['keterangan'];
  $idcust = $_COOKIE['member_id'];
  $idtoko = $_POST['id_toko'];

  $tanggal = date('Y-m-d');
  $jam_order = date('H:i:s');
  $tglskrg = date('Y-m-d H:i:s');
  // $duahari = date('Y-m-d H:i:s', time() + (60 * 60 * 24 * 2));
  $dt = str_replace('-', '', substr($tanggal, 5, 5));
  $dj = str_replace(':', '', $jam_order);
  $invoice = $idcust . generateRandomUser(2, 1) . $dt . $dj;

  $point = round($total / 100);

  // fungsi untuk mendapatkan isi keranjang belanja
  function isi_keranjang()
  {
    global $con;
    $isikeranjang = array();
    $id = $_COOKIE['member_id'];
    $keranjang = $con->query("SELECT * FROM cart WHERE id_user='$id'")->fetchAll();

    foreach ($keranjang as $cart) {
      $isikeranjang[] = $cart;
    }
    return $isikeranjang;
  }

  // simpan data pemesanan
  $transaksi = $con->query("INSERT INTO tb_orders(id_order,status_order,tgl_order,jam_order,member_id,kurir,service,ongkir,potongan,total,keterangan,id_prov,id_kota,alamat,kode_pos,nama_penerima,jmlberat, id_toko) VALUES ('$invoice','Menunggu Pembayaran','$tanggal','$jam_order','$_COOKIE[member_id]','$kurir','$service','$ongkir', '$potongan', '$total','$keterangan','$idprov','$idkota','$alamat', '$kdpos','$nmpenerima','$berat', '$idtoko')");

  // simpan data status
  $status = $con->query("INSERT INTO tb_status_orders(id_order,status_order,tgl_status) VALUES ('$invoice','Menunggu Pembayaran','$tglskrg')");

  // panggil fungsi isi_keranjang dan hitung jumlah produk yang dipesan
  $isikeranjang = isi_keranjang();
  $jml          = count($isikeranjang);

  // simpan data detail pemesanan
  for ($i = 0; $i < $jml; $i++) {
    $con->query("INSERT INTO tb_orders_detail(id_order, id, harga, id_stok_toko, qty)
	               VALUES('$invoice',{$isikeranjang[$i]['id']},{$isikeranjang[$i]['harga']}, {$isikeranjang[$i]['id_stok_toko']}, {$isikeranjang[$i]['qty']})");
  }

  // Merubah stok di tabel produk
  for ($i = 0; $i < $jml; $i++) {
    $sqlstok = $con->query("SELECT * FROM tb_stok_toko WHERE id_stok_toko={$isikeranjang[$i]['id_stok_toko']}")->fetch();
    $stok = $sqlstok["jumlah"];
    $jumlahbeli = "{$isikeranjang[$i]['qty']}";
    $stokakhir = $stok - $jumlahbeli;

    $update = $con->query("UPDATE tb_stok_toko SET jumlah='$stokakhir' WHERE id_stok_toko={$isikeranjang[$i]['id_stok_toko']}");
  }

  for ($i = 0; $i < $jml; $i++) {
    $updatevoucher = $con->query("UPDATE tb_voucher_detail SET voucher_detail_status='3' WHERE voucher_detail_id = {$isikeranjang[$i]['voucher_detail_id']}");
  }

  // setelah data pemesanan tersimpan, hapus data pemesanan di tabel pemesanan sementara (keranjang)
  for ($i = 0; $i < $jml; $i++) {
    $delete = $con->query("DELETE FROM cart WHERE id_cart = {$isikeranjang[$i]['id_cart']}");
  }

  $point = $con->query("UPDATE tb_member_point SET point=point+'$point', royalti=royalti+'$point' WHERE member_id='$_COOKIE[member_id]'");

?>

  <script>
    window.location.href = "index.php?page=tampil_transaksi&id=<?= $invoice ?>";
  </script>

<?php
} else {
?>
  <script>
    window.location = "<?= $base_url ?>index.php";
  </script>

<?php
}
?>
<?php
if ($_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

$r = $con->query("SELECT o.*, p.*, k.*, t.* FROM tb_orders o LEFT JOIN tb_provinsi p ON o.id_prov=p.id_prov LEFT JOIN tb_kota k ON o.id_kota=k.id_kota LEFT JOIN toko t ON o.id_toko=t.id_toko WHERE id_order='$_GET[id]'")->fetch();

$jam = substr($r['expired'], 11, 8);
?>

<section>
  <div class="container">
    <div class="col-lg-8 col-md-offset-2">
      <h2 class="mx-auto text-center">Pesanan Anda Telah Kami Terima <br>Dengan Nomor Order: <?= $_GET['id'] ?></h2>
      <br>
      <table class="table table-bordered">
        <tr style="background-color:#ececec;">
          <td colspan="2">Detail Order</td>
        </tr>
        <tr>
          <td>Tanggal Order : <?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
        </tr>
      </table>
      <br>
      <table class="table table-bordered">
        <tr style="background-color:#ececec;">
          <td colspan="2">Alamat Pengiriman</td>
        </tr>
        <tr>
          <td>Nama Penerima <span class="ml-3 mr-3">:</span> <?= $r['nama_penerima'] ?><br>
            Provinsi <span class="ml-3 mr-3">:</span> <?= $r['nama_prov'] ?><br>
            Kota <span class="ml-3 mr-3">:</span> <?= $r['nama_kota'] ?><br>
            Alamat <span class="ml-3 mr-3">:</span> <?= $r['alamat'] ?><br>
            Kode Pos <span class="ml-3 mr-3">:</span> <?= $r['kode_pos'] ?><br></td>
        </tr>
      </table>
      <br>
      <table class="table table-bordered">
        <tr style="background-color:#ececec;">
          <td colspan="2">Jenis Pengiriman</td>
        </tr>
        <tr>
          <td>Kurir <span class="ml-2 mr-2">:</span> <?= strtoupper($r['kurir']) ?><br>
            Service <span class="ml-2 mr-2">:</span> <?= $r['service'] ?><br>
        </tr>
      </table>

      <table class="table table-bordered">
        <tr style="background-color:#ececec;">
          <td colspan="2">Toko</td>
        </tr>
        <tr>
          <td><?= strtoupper($r['nama_toko']) ?><br>
        </tr>
      </table>

      <br>
      <div class="table-responsive">
        <table class="table table-striped table-bordered">
          <thead>
            <tr>
              <td>No</td>
              <td>Gambar</td>
              <td>Nama Produk</td>
              <td>Model</td>
              <td>Ukuran</td>
              <td>Berat</td>
              <td>Jumlah</td>
              <td>Harga</td>
              <td>Total</td>
            </tr>
          </thead>

          <tbody>
            <?php
            $query = $con->query("SELECT o.*, d.*, g.*, m.*, s.*, u.* FROM tb_orders o LEFT JOIN tb_orders_detail d ON o.id_order=d.id_order LEFT JOIN tb_gudang g ON d.id=g.id LEFT JOIN tb_merk m ON m.merk_id = g.id_merek LEFT JOIN tb_stok_toko s ON s.id_stok_toko = d.id_stok_toko LEFT JOIN tb_all_ukuran u ON u.id_ukuran = s.id_ukuran WHERE o.id_order='$_GET[id]'")->fetchAll();
            $no = 0;
            foreach ($query as $data) {
              $no++;
              $total = $data['harga'] * $data['qty'];
              $subtotal += $total;

            ?>
              <tr>
                <td><?= $no; ?></td>
                <td><img src="<?= $data['thumbnail'] ?>" style="width: 90px; height: 90px;"></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['merk_nama'] ?></td>
                <td>
                  <b>EU</b> : <?= $data['ue'] ?><br>
                  <b>UK</b> : <?= $data['uk'] ?><br>
                  <b>US</b> : <?= $data['us'] ?><br>
                  <b>CM</b> : <?= $data['cm'] ?>
                </td>
                <td><?= $data['berat'] ?> gram</td>
                <td><?= $data['qty'] ?></td>
                <td>Rp. <?= number_format($data['harga'], 0, ",", ".") ?></td>
                <td>Rp. <?= number_format($total, 0, ",", ".") ?></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
      </div>
      <hr>
    </div>
    <div class="col-lg-8 col-md-offset-2">
      <div style="float: right; text-align: right;">
        <h5><strong>Sub Total</strong> : <?php echo "Rp. " . number_format($subtotal) ?></h5>
        <h5><strong>Berat</strong> : <?php echo $data['jmlberat'] ?> gram</h5>
        <h5><strong>Potongan</strong> : <?php echo "Rp. " . number_format($data['potongan']) ?></h5>
        <h5><strong>Ongkos Kirim</strong> : <?php echo "Rp. " . number_format($data['ongkir']) ?></h5>
        <h4><strong>Total Bayar</strong> : <?php echo "Rp. " . number_format($data['total']) ?></h4><br>
      </div>
    </div>
    <br>
    <div class="col-lg-8 col-md-offset-2" style="margin-top: 20px;">
      <div style="background-color: #f2f2f2; padding: 10px;">
        <p>Untuk Melihat Detail Pesanan Anda Bisa di Cek <a href="index.php?page=detail_order&id=<?php echo $_GET['id'] ?>" style="color: blue;">Disini</a>
          <b>Pesanan Anda akan dikirim segera setelah kami menerima pembayaran Anda.</b><br>
          Pastikan Anda Melakukan <a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>" style="color: blue;">Konfirmasi Pembayaran</a> Jika Sudah Melakukan Pembayaran
        </p>
      </div>
      <br>
      <p style="font-size: 20px; text-align: center;">:: Daftar Bank Pembayaran Alfa Sport :: </p>

      <div class="row text-center">
        <?php
        $bank = $con->select("tb_bank", "*");
        foreach ($bank as $data) { ?>
          <div class="col-lg-6" style="border: 1px solid #ccc; padding: 10px; border-radius: 5px;">
            <br>
            Nama Bank : <?= $data['bank'] ?> <br><br>
            No Rekening : <?= $data['no_rek'] ?> <br><br>
            Atas Nama : <?= $data['atas_nama'] ?> <br><br>
          </div>
        <?php
        }
        ?>
      </div>
      <br><br><br><br>
    </div>
    <div class="panel"></div>
  </div>
</section>
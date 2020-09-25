<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <title>Cetak Faktur Penjualan</title>
  <style>
    @font-face {
      font-family: 'quick';
      src: url(Quicksand-Regular_afda0c4733e67d13c4b46e7985d6a9ce.ttf);
    }

    * {
      font-family: 'quick';
    }
  </style>
</head>
<?php
include "../config/koneksi.php";
include "../App/MY_url_helper.php";

$id = $_GET['id'];
$r = $con->query("SELECT o.*, p.*, k.*, t.* FROM tb_orders o LEFT JOIN tb_provinsi p ON o.id_prov=p.id_prov LEFT JOIN tb_kota k ON o.id_kota=k.id_kota LEFT JOIN toko t ON o.id_toko=t.id_toko WHERE id_order='$_GET[id]'")->fetch();

// $toko = $con->query("SELECT nama_toko, alamat_toko, telpon_toko FROM toko WHERE id_toko = '$data[id_toko]'")->fetch();
?>

<body onload="window.print()">
  <div class="container">
    <div class="row" style="background-color:;">
      <div class="col-sm-1">
      </div>
      <div class="col-sm-10 py-4" style="background-color:white; height: 100%; border-radius: 5px; box-shadow:0 0 100px rgba(0,0,0,.1); min-height:297mm;">
        <div class="row">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-2 mx-auto d-block">
                <img src="../img/a4.png" alt="" style="width: 100%; align: center;">
              </div>
              <div class="col-md-10">
                <h5><?= $r['nama_toko'] ?></h5>
                <h6>
                  <?= $r['alamat_toko'] ?>
                </h6>
                <h6><?= $r['telpon_toko'] ?></h6>
                <span><i class="fa fa-instagram"> Alfasport</i></span> | <span><i class="fa  fa-envelope-o"> Alfasport</i></span>
              </div>
            </div>
            <hr style="color:black; border: 1px solid;">
          </div>
          <div class="col-md-12">
            <h5 class="text-center"><u>INVOICE</u></h5>

            <div class="row">
              <div class="col-md-4">
                <table style="font-size: 13px;">
                  <tr>
                    <th>No Faktur</th>
                    <td>:</td>
                    <td><?= $_GET['id'] ?></td>
                  </tr>
                  <tr>
                    <th>Tgl Transaksi</th>
                    <td>:</td>
                    <td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
                  </tr>
                  <tr>
                    <th>Status Transaksi</th>
                    <td>:</td>
                    <td><b><?= $r['status_order'] ?></b></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-4">
                <table style="font-size: 13px;">
                  <tr>
                    <th>Nama Penerima</th>
                    <td>:</td>
                    <td><?= $r['nama_penerima'] ?></td>
                  </tr>
                  <tr>
                    <th>Provinsi</th>
                    <td>:</td>
                    <td><?= $r['nama_prov'] ?></td>
                  </tr>
                  <tr>
                    <th>Kota</th>
                    <td>:</td>
                    <td><?= $r['nama_kota'] ?></td>
                  </tr>
                  <tr>
                    <th>Alamat</th>
                    <td>:</td>
                    <td><?= $r['alamat'] ?></td>
                  </tr>
                  <tr>
                    <th>Kode Pos</th>
                    <td>:</td>
                    <td><?= $r['kode_pos'] ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-md-4">
                <table style="font-size: 13px;">
                  <tr>
                    <th>Kurir</th>
                    <td>:</td>
                    <td><?= strtoupper($r['kurir']) ?></td>
                  </tr>
                  <tr>
                    <th>Service</th>
                    <td>:</td>
                    <td><?= $r['service'] ?></td>
                  </tr>
                </table>
              </div>
            </div>
            <hr style="color:black; border: 1px solid;">
          </div>
          <div class="col-md-12">
            <table style="font-size: 12px;" width="100%">
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
              <?php
              $query = $con->query("SELECT o.*, d.*, g.*, m.*, s.*, u.* FROM tb_orders o LEFT JOIN tb_orders_detail d ON o.id_order=d.id_order LEFT JOIN tb_gudang g ON d.id=g.id LEFT JOIN tb_merk m ON m.merk_id = g.id_merek LEFT JOIN tb_stok_toko s ON s.id_stok_toko = d.id_stok_toko LEFT JOIN tb_all_ukuran u ON u.id_ukuran = s.id_ukuran WHERE o.id_order='$_GET[id]'")->fetchAll();
              $no = 0;
              foreach ($query as $data) {
                $no++;
                $total = $data['harga'] * $data['qty'];
                @$subtotal += $total;

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

              <tr>
                <td colspan="9">
                  <hr>
                </td>
              </tr>
              <tr>
                <td colspan="7">&nbsp;</td>
                <td>Sub Total</td>
                <td style="float: right;"><?php echo "Rp. " . number_format($subtotal) ?></td>
              </tr>
              <tr>
                <td colspan="7">&nbsp;</td>
                <td>Berat</td>
                <td style="float: right;"><?php echo $data['jmlberat'] ?></td>
              </tr>
              <tr>
                <td colspan="7">&nbsp;</td>
                <td>Potongan</td>
                <td style="float: right;"><?php echo "Rp. " . number_format($data['potongan']) ?></td>
              </tr>
              <tr>
                <td colspan="7">&nbsp;</td>
                <td>Ongkos Kirim</td>
                <td style="float: right;"><?php echo "Rp. " . number_format($data['ongkir']) ?></td>
              </tr>
              <tr>
                <td colspan="7">&nbsp;</td>
                <td>Total Bayar</td>
                <td style="float: right;"><?php echo "Rp. " . number_format($data['total']) ?></td>
              </tr>

            </table>
            <hr style="color:black; border: 1px solid;">
          </div>
          <div class="col-md-12" style="font-size: 12px;">
            <div class="row">
              <div class="col-md-12" style="text-align:center">
                Terima Kasih
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-sm-1">
      </div>
    </div>
  </div>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
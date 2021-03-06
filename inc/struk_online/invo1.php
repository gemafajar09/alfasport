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
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";

$id = $_GET['invoice'];
$data = $con->query("SELECT * FROM tb_transaksi_online WHERE transol_kode = '$id'")->fetch();
$toko = $con->query("SELECT nama_toko, alamat_toko, telpon_toko FROM toko WHERE id_toko = '$data[id_toko]'")->fetch();
?>

<body onload="window.print()">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
            </div>
            <div class="col-sm-4 py-4" style="background-color:white; height: 100%; border-radius: 5px; box-shadow:0 0 100px rgba(0,0,0,.1); min-height:297mm;">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h5><?= $toko['nama_toko'] ?></h5>
                        <h6>
                            <p><?= $toko['alamat_toko'] ?></p>
                        </h6>
                        <h6><?= $toko['telpon_toko'] ?> </h6>
                        <span><i class="fa fa-instagram"> Alfasport</i></span> | <span><i class="fa  fa-envelope-o"> Alfasport</i></span>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12">
                        <table style="font-size: 12px;">
                            <tr>
                                <th>No Faktur</th>
                                <td>:</td>
                                <td><?= $_GET['invoice'] ?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td>:</td>
                                <td><?= tgl_indo(date('Y-m-d')) ?></td>
                            </tr>
                        </table>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12">
                        <table style="font-size: 12px;" width="100%">
                            <tr>
                                <th>Qty</th>
                                <th>Nama Barang</th>
                                <th style="float: right;">Subtotal</th>
                            </tr>
                            <?php
                            $total = 0;
                            $list = $con->query("SELECT
                                                    tb_transaksi_online_detail.transol_detail_total_harga,
                                                    tb_transaksi_online_detail.transol_detail_jumlah_beli,
                                                    tb_merk.merk_nama,
                                                    tb_transaksi_online.transol_diskon
                                                From
                                                    tb_transaksi_online_detail 
                                                Inner Join
                                                    tb_transaksi_online On tb_transaksi_online.transol_id =
                                                            tb_transaksi_online_detail.transol_id 
                                                Inner Join
                                                    tb_gudang On tb_gudang.id_gudang = tb_transaksi_online_detail.id_gudang 
                                                Inner Join
                                                    tb_merk On tb_merk.merk_id = tb_gudang.id_merek 
                                                WHERE tb_transaksi_online_detail.transol_detail_kode = '$_GET[invoice]'")->fetchAll();

                            foreach ($list as $a) {
                                $total += $a['transol_detail_total_harga'];
                            ?>
                                <tr>
                                    <td><?= $a['transol_detail_jumlah_beli'] ?></td>
                                    <td><?= $a['merk_nama'] ?></td>
                                    <td style="float: right;">Rp.<?= number_format($a['transol_detail_total_harga']) ?></td>
                                </tr>

                            <?php } ?>
                            <tr>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                                <td>
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Total Diskon</td>
                                <td style="float: right;">Rp. <?= number_format($a['transol_diskon']) ?></td>
                            </tr>
                            <tr>
                                <td>&nbsp;</td>
                                <td>Total Bayar</td>
                                <td style="float: right;">Rp.<?= number_format($total) ?></td>
                            </tr>
                        </table>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12 text-center" style="font-size: 10px;">
                        <i>
                            <p>Terima Kasih</p>
                            <p>Barang yang sudah dibeli tidak dapat ditukar / dikembalikan</p>
                        </i>
                        <hr>
                        <table style="font-size: 12px;">
                            <tr>
                                <td>printed by :</td>
                                <?php
                                $nama = $con->query("SELECT nama FROM tb_karyawan WHERE id_karyawan = '$data[transol_create_by]'")->fetch();
                                ?>
                                <td><?= $nama['nama'] ?></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class=" col-sm-4">
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
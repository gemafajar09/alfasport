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
$data = $con->query("SELECT * FROM tb_transaksi WHERE transaksi_kode = '$id'")->fetch();
$toko = $con->query("SELECT nama_toko, alamat_toko, telpon_toko FROM toko WHERE id_toko = '$data[id_toko]'")->fetch();
?>

<!-- <body onload="window.print()"> -->

<body>
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
                        <span>www.alfasport.id</span>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12">
                        <table style="font-size: 12px;">
                            <tr>
                                <th width="100px">No Faktur</th>
                                <td width="15px">:</td>
                                <td><?= $_GET['invoice'] ?></td>
                            </tr>
                            <tr>
                                <th>Tgl Transaksi</th>
                                <td>:</td>
                                <td><?= tgl_indo_waktu($data['transaksi_create_at']) ?></td>
                            </tr>
                        </table>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12">
                        <table style="font-size: 12px;" width="100%">
                            <tr>
                                <th style="text-align: center">Qty</th>
                                <th style="text-align: center">Nama Barang</th>
                                <th style="text-align: center">Merk</th>
                                <th style="text-align: center">Ukuran</th>
                                <th style="float: right; ">Subtotal</th>
                            </tr>
                            <?php
                            $total = 0;
                            $list = $con->query("SELECT 
                                        tb_transaksi_detail.detail_jumlah_beli,
                                        tb_transaksi_detail.detail_total_harga,
                                        tb_transaksi_detail.detail_tipe_konsumen,
                                        tb_transaksi_detail.id_konsumen,
                                        tb_merk.merk_nama,
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_nama,
                                        tb_barang.barang_artikel,
                                        tb_ukuran.ukuran_default,
                                        tb_ukuran.sepatu_ue,
                                        tb_ukuran.sepatu_uk,
                                        tb_ukuran.sepatu_us,
                                        tb_ukuran.sepatu_cm,
                                        tb_ukuran.kaos_kaki_eu,
                                        tb_ukuran.kaos_kaki_size,
                                        tb_ukuran.barang_lainnya_nama_ukuran
                                    FROM tb_transaksi_detail 
                                    JOIN tb_barang_detail ON tb_transaksi_detail.id_gudang=tb_barang_detail.barang_detail_id
                                    JOIN tb_ukuran ON tb_barang_detail.ukuran_id = tb_ukuran.ukuran_id
                                    JOIN tb_barang On tb_barang_detail.barang_id = tb_barang.barang_id
                                    JOIN tb_merk On tb_barang.merk_id = tb_merk.merk_id WHERE tb_transaksi_detail.detail_kode = '$_GET[invoice]'")->fetchAll();
                            foreach ($list as $a) {
                                $total += $a['detail_total_harga'];
                                $detail_tipe_konsumen = $a['detail_tipe_konsumen'];
                                $id_konsumen = $a['id_konsumen'];
                            ?>
                                <tr>
                                    <td style="text-align: center"><?= $a['detail_jumlah_beli'] ?></td>
                                    <td style="text-align: center"><?= $a['barang_nama'] ?></td>
                                    <td style="text-align: center"><?= $a['merk_nama'] ?></td>
                                    <td style="text-align: center">
                                        <?php
                                        if ($a['barang_kategori'] == 'Sepatu') {
                                            if ($a['ukuran_default'] == 'EU') {
                                                echo $a['sepatu_ue'];
                                            } elseif ($a['ukuran_default'] == 'UK') {
                                                echo $a['sepatu_uk'];
                                            } elseif ($a['ukuran_default'] == 'US') {
                                                echo $a['sepatu_us'];
                                            } elseif ($a['ukuran_default'] == 'CM') {
                                                echo $a['sepatu_cm'];
                                            }
                                        } elseif ($a['barang_kategori'] == 'Kaos Kaki') {
                                            echo $a['kaos_kaki_eu'];
                                        } elseif ($a['barang_kategori'] == 'Barang Lainnya') {
                                            echo $a['barang_lainnya_nama_ukuran'];
                                        }
                                        ?>
                                    </td>
                                    <td style="float: right;">Rp.<?= number_format($a['detail_total_harga']) ?></td>
                                </tr>
                            <?php } ?>
                            <?php
                            $tipe_diskon_manual = $data['transaksi_tipe_diskon'];
                            $diskon_manual = $data['transaksi_diskon'];
                            $diskon_bank = $data['transaksi_diskon_bank'];
                            // cari diskon bank
                            $dB = ((int)$total * (int)$diskon_bank) / 100;
                            $dBank = $dB;

                            $hBank = $total - $dBank;
                            // cari diskon manual
                            if ($tipe_diskon_manual == 'dis_persen') {
                                $dM = ($hBank * $diskon_manual) / 100;
                                $dManual = round($dM);
                            } elseif ($tipe_diskon_manual == 'dis_harga') {
                                $dManual = $diskon_manual;
                            } else {
                                $dManual = 0;
                            }
                            ?>
                            <tr>
                                <td colspan="5">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Sub Total Harga</td>
                                <td style="float: right;">Rp.<?= number_format($total) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Total Diskon</td>
                                <td style="float: right;">Rp. <?= number_format($dB + $dManual) ?></td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <hr>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Total Harga</td>
                                <td style="float: right;">Rp.<?= number_format($total - ($dB + $dManual)) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Total Bayar</td>
                                <td style="float: right;">Rp.<?= number_format($data['transaksi_cash'] + $data['transaksi_debit'] + $data['transaksi_point']) ?></td>
                            </tr>
                            <tr>
                                <td colspan="3">&nbsp;</td>
                                <td>Kembalian</td>
                                <td style="float: right;">Rp.<?= number_format($data['transaksi_kembalian']) ?></td>
                            </tr>
                        </table>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12" style="font-size: 10px;">
                        <h6 class="text-center">Member Info</h6>
                        <?php
                        if ($detail_tipe_konsumen == "Member") {
                            $data_member = $con->query("SELECT * FROM tb_member 
                                                        JOIN tb_member_point ON tb_member.member_id = tb_member_point.member_id
                                                        WHERE tb_member.member_id = '$id_konsumen'")->fetch();
                        ?>
                            <table style="font-size: 12px;">
                                <tr>
                                    <th width="100px">ID Member</th>
                                    <th width="10px">:</th>
                                    <td><?= $data_member['member_kode']; ?></td>
                                </tr>
                                <tr>
                                    <th>Loyalty</th>
                                    <th>:</th>
                                    <td><?php
                                        if ($data_member['royalti'] <= 3499999) {
                                            echo "
                                                Silver
                                            ";
                                        } elseif ($data_member['royalti'] <= 3500000 and $data_member['royalti'] <= 10000000) {
                                            echo "
                                                Gold
                                            ";
                                        } else {
                                            echo "
                                                Platinum
                                        ";
                                        }
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Points</th>
                                    <th>:</th>
                                    <td><?= number_format($data_member['point']) . " Point"; ?></td>
                                </tr>
                            </table>
                        <?php
                        } else {
                        ?>
                            <table style="font-size: 12px;">
                                <tr>
                                    <th width="100px">ID Member</th>
                                    <th width="10px">:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Loyalty</th>
                                    <th>:</th>
                                    <td>-</td>
                                </tr>
                                <tr>
                                    <th>Points</th>
                                    <th>:</th>
                                    <td>-</td>
                                </tr>
                            </table>
                        <?php
                        }
                        ?>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12" style="font-size: 10px;">
                        <h6 class="text-center">Visit Us</h6>
                        <table style="font-size: 12px;">
                            <tr>
                                <th width="100px">Email</th>
                                <th width="15px">:</th>
                                <td>alfasport.id@gmail.com</td>
                            </tr>
                            <tr>
                                <th>Instagram</th>
                                <th>:</th>
                                <td>@alfasport.id</td>
                            </tr>
                            <tr>
                                <th>Twitter</th>
                                <th>:</th>
                                <td>@alfasport_id</td>
                            </tr>
                            <tr>
                                <th>Tiktok</th>
                                <th>:</th>
                                <td>@alfasport.id</td>
                            </tr>
                            <tr>
                                <th>Shopee</th>
                                <th>:</th>
                                <td>alfasport.id</td>
                            </tr>
                            <tr>
                                <th>Tokopedia</th>
                                <th>:</th>
                                <td>alfasport_id</td>
                            </tr>
                            <tr>
                                <th>Bukalapak</th>
                                <th>:</th>
                                <td>ALFA SPORT</td>
                            </tr>
                        </table>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12 text-center" style="font-size: 12px;">
                        <i>
                            <p>Terima Kasih</p>
                            <p>Barang yang sudah dibeli tidak dapat ditukar / dikembalikan</p>
                            <p><b>- Selamat berjumpa kembali -</b></p>
                        </i>
                        <hr>
                        <table style="font-size: 12px;">
                            <tr>
                                <td>printed by :</td>
                                <?php
                                $nama = $con->query("SELECT nama FROM tb_karyawan WHERE id_karyawan = '$data[transaksi_create_by]'")->fetch();
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
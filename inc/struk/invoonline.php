<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

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
$toko = $con->query("SELECT * FROM tb_data_toko_online WHERE data_toko_online_id = '$data[data_toko_online_id]'")->fetch();
?>

<!-- <body onload="window.print()"> -->

<body>
    <table style="width: 30%; margin: auto; text-align: center; font-size: 14px;" border="0">
        <tr>
            <th style="font-size: 18px;">Alfa Sport Indonesia</th>
        </tr>
        <tr>
            <td><p><?= $toko['data_toko_online_nama'] ?></p></td>
        </tr>
        <tr>
            <th><span>www.alfasport.id</span></th>
        </tr>
        <tr>
            <th><hr style="color:black; border: 1px solid;"></th>
        </tr>
    </table>
    <table style="width: 30%; margin: auto; text-align: center; font-size: 14px;" border="0">
        <tr>
            <th style="width: 100px;">No Faktur</th>
            <th style="width: 15px;">:</th>
            <td><?= $_GET['invoice'] ?></td>
        </tr>
        <tr>
            <th>Tgl Transaksi</th>
            <td>:</td>
            <td><?= tgl_indo_waktu($data['transol_create_at']) ?></td>
        </tr>
        <tr>
            <th colspan="3"><hr style="color:black; border: 1px solid;"></th>
        </tr>
    </table>
    <table style="width: 30%; margin: auto; text-align: center; font-size: 13px;" border="0">
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
                    tb_transaksi_online_detail.transol_detail_jumlah_beli,
                    tb_transaksi_online_detail.transol_detail_total_harga,
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
                FROM tb_transaksi_online_detail 
                JOIN tb_barang_detail ON tb_transaksi_online_detail.id_gudang=tb_barang_detail.barang_detail_id
                JOIN tb_ukuran ON tb_barang_detail.ukuran_id = tb_ukuran.ukuran_id
                JOIN tb_barang On tb_barang_detail.barang_id = tb_barang.barang_id
                JOIN tb_merk On tb_barang.merk_id = tb_merk.merk_id WHERE tb_transaksi_online_detail.transol_detail_kode = '$_GET[invoice]'")->fetchAll();
        
        foreach ($list as $a) {
            $total += $a['transol_detail_total_harga'];
        ?>
        <tr>
            <td style="text-align: center"><?= $a['transol_detail_jumlah_beli'] ?></td>
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
            <td style="float: right;">Rp.<?= number_format($a['transol_detail_total_harga']) ?></td>
        </tr>
        <?php } ?>
        <?php
        $tipe_diskon_manual = $data['transol_tipe_diskon'];
        $diskon_manual = $data['transol_diskon'];
        $diskon_bank = $data['transol_diskon_bank'];
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
            <td style="float: right;">Rp.<?= number_format($data['transol_cash'] + $data['transol_debit']) ?></td>
        </tr>
        <tr>
            <td colspan="3">&nbsp;</td>
            <td>Kembalian</td>
            <td style="float: right;">Rp.<?= number_format($data['transol_kembalian']) ?></td>
        </tr>
        <tr>
            <th colspan="5"><hr style="color:black; border: 1px solid;"></th>
        </tr>
    </table>
    <table style="width: 30%; margin: auto; font-size: 13px;" border="0">
        <tr>
            <th colspan="3"><h5 style="text-align: center; font-size: 14px; padding: 0px; margin: 0px;">Member Info</h5></th>
        </tr>
        

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
        <tr><th colspan="3"><hr style="color:black; border: 1px solid;"></th></tr>
    </table>
    <table style="width: 30%; margin: auto; font-size: 13px;" border="0">
        <tr>
            <th colspan="3"><h5 style="text-align: center; font-size: 14px; padding: 0px; margin: 0px;">Visit Us</h5></th>
        </tr>
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
        <tr>
            <th colspan="3"><hr style="color:black; border: 1px solid;"></th>
        </tr>
    </table>
    <table style="width: 30%; margin: auto; text-align: center; font-size: 14px;" border="0">
        <tr>
            <td>
                <i>
                    <p>Terima Kasih</p>
                    <p>Barang yang sudah dibeli tidak dapat ditukar / dikembalikan</p>
                    <p><b>- Selamat berjumpa kembali -</b></p>
                </i>
            </td>
        </tr>
        <tr>
            <td>
                <hr>
            </td>
        </tr>
        <tr style="text-align: right;">
            <td>printed by :
            <?php
            $nama = $con->query("SELECT nama FROM tb_karyawan WHERE id_karyawan = '$data[transol_create_by]'")->fetch();
            ?>
            <?= $nama['nama'] ?></td>
        </tr>
    </table>
</body>

</html>
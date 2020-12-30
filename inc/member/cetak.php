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

$id = $_GET['id'];
$data = $con->query("SELECT * FROM tb_member WHERE member_id = '$id'")->fetch();
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
                        <h5>Alfasport</h5>
                        <!-- <h6>
                            <p><?= $toko['alamat_toko'] ?></p>
                        </h6>
                        <h6><?= $toko['telpon_toko'] ?> </h6> -->
                        <span>www.alfasport.id</span>
                        <hr style="color:black; border: 1px solid;">
                    </div>
                    <div class="col-md-12" style="font-size: 10px;">
                        <h6 class="text-center">Member Info</h6>
                        <?php
                            $data_member = $con->query("SELECT * FROM tb_member 
                                                        JOIN tb_member_point ON tb_member.member_id = tb_member_point.member_id
                                                        WHERE tb_member.member_id = '$id'")->fetch();
                        ?>
                            <table style="font-size: 12px;">
                                <tr>
                                    <th width="100px">Kode Member</th>
                                    <td width="15px">:</td>
                                    <td><?= $data['member_kode'] ?></td>
                                </tr>
                                <tr>
                                        <th>Email</th>
                                        <td>:</td>
                                        <td><?= $data['member_email'] ?></td>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td>:</td>
                                        <td><?= $data['member_password_repeat'] ?></td>
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
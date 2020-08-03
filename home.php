<?php
if ($_COOKIE['jabatan_id'] == 3) {
?>
    <script>
        window.location = "entry_penjualan.html";
        exit;
    </script>
<?php } else { ?>

    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <h2></h2>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row" style="display: inline-block;">
                <div class="row top_tiles" style="margin: 10px 0;">
                    <div class="col-md-3 tile">
                        <span>Total Sessions</span>
                        <h2>231,809</h2>
                        <span class="sparkline_two" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>
                    <div class="col-md-3 tile">
                        <span>Total Revenue</span>
                        <h2>$ 1,231,809</h2>
                        <span class="sparkline_two" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>
                    <div class="col-md-3 tile">
                        <span>Total Sessions</span>
                        <h2>231,809</h2>
                        <span class="sparkline_three" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>
                    <div class="col-md-3 tile">
                        <span>Total Sessions</span>
                        <h2>231,809</h2>
                        <span class="sparkline_two" style="height: 160px;">
                            <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- penjualan toko -->
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <h2>Penjualan Toko</h2>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="container">
                    <div class="col-md-4 col-sm-4">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Toko</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row" style="font-size: 15px;">
                                    <div class="col-sm-6">
                                        <?php
                                        $tgl = date('Y-m-d');
                                        ?>
                                        <p><?php echo tgl_indo($tgl); ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p style="float: right;">Rp.50000</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- penjualan merk -->
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <h2>Penjualan Merk</h2>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="container">
                    <div class="col-md-4 col-sm-4 ">
                        <div class="x_panel tile fixed_height_320 overflow_hidden">
                            <div class="x_title">
                                <h2>Merk</h2>
                                <ul class="nav navbar-right panel_toolbox">
                                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <div class="row" style="font-size: 15px;">
                                    <div class="col-sm-6">
                                        <?php
                                        $tgl = date('Y-m-d');
                                        ?>
                                        <p><?php echo tgl_indo($tgl); ?></p>
                                    </div>
                                    <div class="col-sm-6">
                                        <p style="float: right;">Rp.50000</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- tabel stok menipis dari gudang -->
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <h2>Stok Barang Menipis Dari Gudang</h2>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content table-responsive">
            <table class="table table-striped" id="datatable-responsive">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Nama Barang</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // include "../../config/koneksi.php";
                    $data = $con->query("SELECT tb_gudang.nama, tb_gudang.artikel, SUM(tb_gudang_detail.jumlah) as jumlah, tb_cek_stok_menipis.menipis_status FROM tb_gudang JOIN tb_gudang_detail ON tb_gudang.id = tb_gudang_detail.id JOIN tb_cek_stok_menipis ON tb_gudang.id_gudang = tb_cek_stok_menipis.id_gudang WHERE tb_cek_stok_menipis.menipis_status != 1 GROUP BY tb_gudang.nama HAVING(SUM(tb_gudang_detail.jumlah)) <= 5 ")->fetchAll();
                    foreach ($data as $i => $a) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a['artikel'] ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td><?= $a['jumlah'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!-- tabel stok menipis dari toko -->
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <h2>Stok Barang Menipis Dari Toko</h2>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content table-responsive">
            <table class="table table-striped" id="datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Nama Barang</th>
                        <th>Artikel</th>
                        <th>Stok</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // include "../../config/koneksi.php";
                    $data = $con->query("SELECT toko.nama_toko, tb_gudang.nama, tb_gudang.artikel, SUM(tb_stok_toko.jumlah) as jumlah FROM tb_stok_toko JOIN tb_gudang ON tb_gudang.id_gudang = tb_stok_toko.id_gudang JOIN toko ON toko.id_toko = tb_stok_toko.id_toko JOIN tb_cek_stok_menipis ON tb_gudang.id_gudang = tb_cek_stok_menipis.id_gudang WHERE tb_cek_stok_menipis.menipis_status != 1 GROUP BY toko.nama_toko HAVING(SUM(tb_stok_toko.jumlah)) <= 5 ")->fetchAll();

                    foreach ($data as $i => $a) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a['nama_toko'] ?></td>
                            <td><?= $a['nama'] ?></td>
                            <td><?= $a['artikel'] ?></td>
                            <td><?= $a['jumlah'] ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
<?php
} ?>
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

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <h2>Stok Barang Menipis</h2>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive">
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
                $data = $con->query("SELECT tb_gudang.nama, tb_gudang.artikel, SUM(tb_gudang_detail.jumlah) as jumlah FROM tb_gudang JOIN tb_gudang_detail ON tb_gudang.id = tb_gudang_detail.id HAVING(SUM(tb_gudang_detail.jumlah)) <= 5 ")->fetchAll();
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
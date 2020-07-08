<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Toko</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button">Go!</button>
                </span>
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5">
                    <label>Dari Tanggal</label>
                    <input type="date" id="dari" class="form-control">
                </div>
                <div class="col-md-5">
                    <label>Sampai Tanggal</label>
                    <input type="date" id="sampai" class="form-control">
                </div>
                <div class="col-md-2" style="padding-top:26px">
                    <button type="button" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
                </div>
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
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kategiri</th>
                    <th>Divsi</th>
                    <th>Sub Divisi</th>
                    <th>Gender</th>
                    <th>Jumlah</th>
                    <th colspan=2>
                        <center>Harga</center>
                    </th>
                    <th>Total</th>
                    <th>Action</th>
                </tr>
                <th colspan="8"></th>
                <th>Harga Modal</th>
                <th>Harga Jual</th>
                <th colspan="2"></th>
                <tr>

                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<script>
    $('#isi').load('inc/toko/data_stok.php');
</script>
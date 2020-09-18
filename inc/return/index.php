<div class="page-title">
    <div class="title_left">
        <h3>Data Return</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Toko</label>
                        <select name="toko" id="toko" class="form-control select2">
                            <option value="">-Toko-</option>
                            <?php
                            $toko = $con->select('toko', '*');
                            foreach ($toko as $toko) {
                            ?>
                                <option value="<?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <a href="buatreturn.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
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
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Toko</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Pembelian</h2>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row my-1">
                        <table>
                            <tr>
                                <td><b>ID Beli</b></td>
                                <td>:</td>
                                <td><b><span id="id_beli"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>:</td>
                                <td><b><span id="tgl_beli"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Vendor</b></td>
                                <td>:</td>
                                <td><b><span id="nama_vendor"></span></b></td>
                            </tr>
                        </table>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Artikel</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
                            </tr>
                        </thead>
                        <tbody id="isi2"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
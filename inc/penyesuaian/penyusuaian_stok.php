<div class="page-title">
    <div class="title_left">
        <h3>Penyesuaian Stok</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            //
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-3">
                    <label>Dari Tanggal</label>
                    <input type="date" id="dari" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Sampai Tanggal</label>
                    <input type="date" id="sampai" class="form-control">
                </div>
                <div class="col-md-1" style="padding-top:26px">
                    <button type="button" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
                </div>
                <div class="col-md-5" style="padding-left:26px">
                    <label>Nama Toko</label>
                    <select name="" id="" class="form-control" style="font-size:12px">
                        <option value="">-SELECT TOKO-</option>
                    </select>
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
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Toko</th>
                    <th>Tipe Penyesuaian</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<script>
    $('#isi').load('inc/penyesuaian/data_stok.php');
</script>
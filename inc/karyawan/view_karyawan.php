<div class="page-title">
    <div class="title_left">
    <h3>Data Karyawan</h3>
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
            <div class="row">
                <div class="col-md-4">
                    <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
                </div>
                <div class="col-md-6">
                    <label>Nama Toko</label>
                    <select name="" class="form-control" id="" style="font-size:12px">
                        <option value="">-PILIH TOKO-</option>
                    </select>
                </div>
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
        <table class="table table-striped" style="font-size:11px">
            <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No Telpon</th>
                <th>Jabatan</th>
                <th>Toko</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataToko">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Toko</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
function tampil()
{
    $('#dataToko').modal()
}
    $('#isi').load('inc/karyawan/data_karyawan.php');
</script>
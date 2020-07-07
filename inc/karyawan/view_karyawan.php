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
<div class="modal" id="dataKaryawan">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Karyawan</h4>
      </div>

      <div class="modal-body">
            <div class="container">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" name="id" id="id" class="form-control" placeholder="ID..">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama..">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" style="height:118px" id="alamat" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK..">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="number" name="no_telpon" id="no_telpon" class="form-control" placeholder="No Telpon..">
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan" id="jabatan" class="form-control" placeholder="Jabatan..">
                            </div>
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="nama_toko" id="nama_toko" class="form-control" placeholder="Nama Toko..">
                                <input type="hidden" id="id_karyawan">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
      </div>

      <div class="modal-footer">
        <button type="button" onclick="simpan()" class="btn btn-primary" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<script>
function tampil()
{
    $('#dataKaryawan').modal()
}

function simpan()
{
    var id = $('#id').val()
    var alamat = $('#alamat').val()
    var nama = $('#nama').val()
    var nik = $('#nik').val()
    var no_telpon = $('#no_telpon').val()
    var jabatan = $('#jabatan').val()
    var nama_toko = $('#nama_toko').val()
    var id_karyawan = $('#id_karyawan').val()

    axios.post('inc/karyawan/aksi_simpan_karyawan.php',{
        'nama': nama,
        'id': id,
        'alamat': alamat,
        'nik': nik,
        'no_telpon': no_telpon,
        'jabatan': jabatan,
        'nama_toko': nama_toko
    }).then(function(res){
        kosong()
        $('#dataKaryawan').modal('hide')
        $('#isi').load('inc/karyawan/data_karyawan.php');
    }).catch(function(err){
        console.log(err)
        kosong()
        $('#dataKaryawan').modal('hide')
        $('#isi').load('inc/karyawan/data_karyawan.php');
    })
}

function edit(id)
{
    axios.post('inc/karyawan/aksi_edit_karyawan.php',{
        'id_karyawan':id
    }).then(function(res){
        var data = res.data
        $('#id').val(data.id)
        $('#alamat').val(data.alamat)
        $('#nama').val(data.nama)
        $('#nik').val(data.nik)
        $('#no_telpon').val(data.no_telpon)
        $('#jabatan').val(data.jabatan)
        $('#nama_toko').val(data.nama_toko)
        $('#id_karyawan').val(data.id_karyawan)
        $('#dataKaryawan').modal()
    }).catch(function(err){
        console.log(err)
    })
}

function hapus(id)
{
    axios.post('inc/karyawan/aksi_hapus_karyawan.php',{
        'id_karyawan':id
    }).then(function(res){
        var data = res.data
        $('#isi').load('inc/karyawan/data_karyawan.php');
    })
}

function kosong()
{
    $('#id').val('')
    $('#alamat').val('')
    $('#nama').val('')
    $('#nik').val('')
    $('#no_telpon').val('')
    $('#jabatan').val('')
    $('#nama_toko').val('')
    $('#id_karyawan').val('')
}
    $('#isi').load('inc/karyawan/data_karyawan.php');
</script>
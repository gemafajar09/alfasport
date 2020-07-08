<div class="page-title">
    <div class="title_left">
    <h3>Data Member</h3>
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
            <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
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
                <th>Nama</th>
                <th style="width:280px">Alamat</th>
                <th>No Telpon</th>
                <th>Hp</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataMember">
  <div class="modal-dialog modal-md">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Data Member</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <div class="modal-body">
        <div class="container">
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama..">
            </div>
            <div class="form-group">
                <label>No Telpon</label>
                <input type="number" name="no_telpon" id="no_telpon" class="form-control" placeholder="No TElpon..">
            </div>
            <div class="form-group">
                <label>No Hp</label>
                <input type="number" name="no_hp" id="no_hp" class="form-control" placeholder="No Hp..">
                <input type="hidden" id="id_member">
            </div>
            <div class="form-group">
                <label>Alamat</label>
                <textarea name="alamat" style="height:118px" id="alamat" class="form-control"></textarea>
            </div>
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
    $('#dataMember').modal()
}

function simpan()
{
    var nama = $('#nama').val()
    var alamat = $('#alamat').val()
    var no_telpon = $('#no_telpon').val()
    var no_hp = $('#no_hp').val()
    var id_member = $('#id_member').val()

    axios.post('inc/member/aksi_simpan_member.php',{
        'nama': nama,
        'id_member': id_member,
        'alamat': alamat,
        'no_hp': no_hp,
        'no_telpon': no_telpon,
    }).then(function(res){
        kosong()
        $('#dataMember').modal('hide')
        $('#isi').load('inc/member/data_member.php');
    }).catch(function(err){
        console.log(err)
        kosong()
        $('#dataMember').modal('hide')
        $('#isi').load('inc/member/data_member.php');
    })
}

function edit(id)
{
    axios.post('inc/member/aksi_edit_member.php',{
        'id_member':id
    }).then(function(res){
        var data = res.data
        $('#alamat').val(data.alamat)
        $('#nama').val(data.nama_member)
        $('#no_telpon').val(data.no_telpon)
        $('#no_hp').val(data.no_hp)
        $('#id_member').val(data.id_member)
        $('#dataMember').modal()
    }).catch(function(err){
        console.log(err)
    })
}

function hapus(id)
{
    axios.post('inc/member/aksi_hapus_member.php',{
        'id_member':id
    }).then(function(res){
        var data = res.data
        $('#isi').load('inc/member/data_member.php');
    })
}

function kosong()
{
    $('#id_member').val('')
    $('#alamat').val('')
    $('#nama').val('')
    $('#no_telpon').val('')
    $('#no_hp').val('')
}
    $('#isi').load('inc/member/data_member.php');
</script>
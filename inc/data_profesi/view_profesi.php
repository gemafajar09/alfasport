<div class="page-title">
    <div class="title_left">
        <h3>Data Profesi</h3>
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
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th style="width:40px">No</th>
                    <th>Nama Profesi</th>
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataProfesi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Profesi</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Profesi</label>
                                <input type="text" name="data_profesi_nama" id="data_profesi_nama" required="required" placeholder="Nama Profesi" class="form-control">
                                <input type="hidden" id="data_profesi_id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary btn-sm">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    function tampil() {
        $('#dataProfesi').modal()
    }

    function simpan() {
        var data_profesi_nama = $('#data_profesi_nama').val()
        var data_profesi_id = $('#data_profesi_id').val()
        axios.post('inc/data_profesi/aksi_simpan_profesi.php', {
            'data_profesi_nama': data_profesi_nama,
            'data_profesi_id': data_profesi_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataProfesi').modal('hide')
            $('#isi').load('inc/data_profesi/data_profesi.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataProfesi').modal('hide')
            $('#isi').load('inc/data_profesi/data_profesi.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/data_profesi/aksi_edit_profesi.php', {
            'data_profesi_id': id
        }).then(function(res) {
            var edit = res.data
            $('#data_profesi_nama').val(edit.data_profesi_nama)
            $('#data_profesi_id').val(edit.data_profesi_id)
            $('#dataProfesi').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/data_profesi/aksi_hapus_profesi.php', {
            'data_profesi_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/data_profesi/data_profesi.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#data_profesi_nama').val('')
        $('#data_profesi_id').val('')
    }

    $('#isi').load('inc/data_profesi/data_profesi.php');
</script>
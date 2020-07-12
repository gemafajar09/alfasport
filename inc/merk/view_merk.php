<div class="page-title">
    <div class="title_left">
        <h3>Data Merk</h3>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Merk</th>
                    <th><center>Action</center></th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataMerk">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Merk</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Merk</label>
                                <input type="text" name="merk_nama" id="merk_nama" required="required" placeholder="Nama Merk" class="form-control">
                                <input type="hidden" id="merk_id">
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
        $('#dataMerk').modal()
    }

    function simpan() {
        var merk_nama = $('#merk_nama').val()
        var merk_id = $('#merk_id').val()
        axios.post('inc/merk/aksi_simpan_merk.php', {
            'merk_nama': merk_nama,
            'merk_id': merk_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataMerk').modal('hide')
            $('#isi').load('inc/merk/data_merk.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataMerk').modal('hide')
            $('#isi').load('inc/merk/data_merk.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/merk/aksi_edit_merk.php', {
            'merk_id': id
        }).then(function(res) {
            var edit = res.data
            $('#merk_nama').val(edit.merk_nama)
            $('#merk_id').val(edit.merk_id)
            $('#dataMerk').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/merk/aksi_hapus_merk.php', {
            'merk_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/merk/data_merk.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#merk_nama').val('')
        $('#merk_id').val('')
    }

    $('#isi').load('inc/merk/data_merk.php');
</script>
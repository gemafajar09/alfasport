<div class="page-title">
    <div class="title_left">
        <h3>Data Satuan</h3>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="width:180px">Satuan Barang</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataSatuan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Satuan</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Satuan</label>
                                <input type="text" name="satuan_nama" id="satuan_nama" required="required" placeholder="Nama Satuan" class="form-control">
                                <input type="hidden" id="satuan_id">
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
        $('#dataSatuan').modal()
    }

    function simpan() {
        var satuan_nama = $('#satuan_nama').val()
        var satuan_id = $('#satuan_id').val()
        axios.post('inc/satuan/aksi_simpan_satuan.php', {
            'satuan_nama': satuan_nama,
            'satuan_id': satuan_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataSatuan').modal('hide')
            $('#isi').load('inc/satuan/data_satuan.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataSatuan').modal('hide')
            $('#isi').load('inc/satuan/data_satuan.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/satuan/aksi_edit_satuan.php', {
            'satuan_id': id
        }).then(function(res) {
            var edit = res.data
            $('#satuan_nama').val(edit.satuan_nama)
            $('#satuan_id').val(edit.satuan_id)
            $('#dataSatuan').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/satuan/aksi_hapus_satuan.php', {
            'satuan_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/satuan/data_satuan.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#satuan_nama').val('')
        $('#sataun_id').val('')
    }

    $('#isi').load('inc/satuan/data_satuan.php');
</script>
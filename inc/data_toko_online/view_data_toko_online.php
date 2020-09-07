<div class="page-title">
    <div class="title_left">
        <h3>Data Toko Online</h3>
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
                    <th>Nama Toko</th>
                    <th>Link Toko</th>
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataTokoOnline">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Toko Online</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="data_toko_online_nama" id="data_toko_online_nama" required="required" placeholder="Nama Toko" class="form-control">
                                <input type="hidden" id="data_toko_online_id">
                            </div>
                            <div class="form-group">
                                <label>Link Toko</label>
                                <textarea class="form-control ckeditor" name="data_toko_online_link" id="data_toko_online_link" cols="30" rows="10"></textarea>
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
        $('#dataTokoOnline').modal()
    }

    function simpan() {
        var data_toko_online_nama = $('#data_toko_online_nama').val()
        var data_toko_online_link = CKEDITOR.instances.data_toko_online_link.getData()
        var data_toko_online_id = $('#data_toko_online_id').val()
        axios.post('inc/data_toko_online/aksi_simpan_data_toko_online.php', {
            'data_toko_online_nama': data_toko_online_nama,
            'data_toko_online_link': data_toko_online_link,
            'data_toko_online_id': data_toko_online_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataTokoOnline').modal('hide')
            $('#isi').load('inc/data_toko_online/data_toko_online.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataTokoOnline').modal('hide')
            $('#isi').load('inc/data_toko_online/data_toko_online.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/data_toko_online/aksi_edit_data_toko_online.php', {
            'data_toko_online_id': id
        }).then(function(res) {
            var edit = res.data
            $('#data_toko_online_nama').val(edit.data_toko_online_nama)
            CKEDITOR.instances.data_toko_online_link.setData(edit.data_toko_online_link)
            $('#data_toko_online_id').val(edit.data_toko_online_id)
            $('#dataTokoOnline').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/data_toko_online/aksi_hapus_data_toko_online.php', {
            'data_toko_online_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/data_toko_online/data_toko_online.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#data_toko_online_nama').val('')
        CKEDITOR.instances.data_toko_online_link.setData('')
        $('#data_toko_online_id').val('')
    }

    $('#isi').load('inc/data_toko_online/data_toko_online.php');
</script>
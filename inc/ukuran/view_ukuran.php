<div class="page-title">
    <div class="title_left">
        <h3>Data Ukuran</h3>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Ukuran</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataUkuran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Ukuran</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Ukuran</label>
                                <input type="text" name="ukuran_nama" id="ukuran_nama" required="required" placeholder="Nama Ukuran" class="form-control">
                                <input type="hidden" id="ukuran_id">
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
        $('#dataUkuran').modal()
    }

    function simpan() {
        var ukuran_nama = $('#ukuran_nama').val()
        var ukuran_id = $('#ukuran_id').val()
        axios.post('inc/ukuran/aksi_simpan_ukuran.php', {
            'ukuran_nama': ukuran_nama,
            'ukuran_id': ukuran_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/ukuran/data_ukuran.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/ukuran/data_ukuran.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/ukuran/aksi_edit_ukuran.php', {
            'ukuran_id': id
        }).then(function(res) {
            var edit = res.data
            $('#ukuran_nama').val(edit.ukuran_nama)
            $('#ukuran_id').val(edit.ukuran_id)
            $('#dataUkuran').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/ukuran/aksi_hapus_ukuran.php', {
            'ukuran_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/ukuran/data_ukuran.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#ukuran_nama').val('')
        $('#ukuran_id').val('')
    }

    $('#isi').load('inc/ukuran/data_ukuran.php');
</script>
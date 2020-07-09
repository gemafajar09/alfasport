<div class="page-title">
    <div class="title_left">
        <h3>Data Gender</h3>
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
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataGender">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Gender</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Gender</label>
                                <input type="text" name="gender_nama" id="gender_nama" required="required" placeholder="Nama Gender" class="form-control">
                                <input type="hidden" id="gender_id">
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
        $('#dataGender').modal()
    }

    function simpan() {
        var gender_nama = $('#gender_nama').val()
        var gender_id = $('#gender_id').val()
        axios.post('inc/gender/aksi_simpan_gender.php', {
            'gender_nama': gender_nama,
            'gender_id': gender_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataGender').modal('hide')
            $('#isi').load('inc/gender/data_gender.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataGender').modal('hide')
            $('#isi').load('inc/gender/data_gender.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/gender/aksi_edit_gender.php', {
            'gender_id': id
        }).then(function(res) {
            var edit = res.data
            $('#gender_nama').val(edit.gender_nama)
            $('#gender_id').val(edit.gender_id)
            $('#dataGender').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/gender/aksi_hapus_gender.php', {
            'gender_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/gender/data_gender.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#gender_nama').val('')
        $('#gender_id').val('')
    }

    $('#isi').load('inc/gender/data_gender.php');
</script>
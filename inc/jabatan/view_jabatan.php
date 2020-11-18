<div class="page-title">
    <div class="title_left">
        <h3>Data Jabatan</h3>
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
                    <th style="width:60px">No</th>
                    <th>Jabatan</th>
                    <th>Jobdesk</th>
                    <th class="text-center" style="width:140px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataJabatan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Jabatan</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jabatan</label>
                                <input type="text" name="jabatan_nama" id="jabatan_nama" required="required" placeholder="Nama Jabatan" class="form-control">
                                <input type="hidden" id="jabatan_id">
                            </div>
                            <div class="form-group">
                                <label>Jobdesk</label>
                                <textarea class="form-control ckeditor" id="jabatan_jobdesk" name="jabatan_jobdesk" cols="30" rows="10"></textarea>
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
        $('#dataJabatan').modal()
    }

    function simpan() {
        var jabatan_nama = $('#jabatan_nama').val()
        var jabatan_jobdesk = CKEDITOR.instances.jabatan_jobdesk.getData()
        var jabatan_id = $('#jabatan_id').val()
        axios.post('inc/jabatan/aksi_simpan_jabatan.php', {
            'jabatan_nama': jabatan_nama,
            'jabatan_jobdesk': jabatan_jobdesk,
            'jabatan_id': jabatan_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataJabatan').modal('hide')
            $('#isi').load('inc/jabatan/data_jabatan.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataJabatan').modal('hide')
            $('#isi').load('inc/jabatan/data_jabatan.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/jabatan/aksi_edit_jabatan.php', {
            'jabatan_id': id
        }).then(function(res) {
            var edit = res.data
            CKEDITOR.instances.jabatan_jobdesk.setData(edit.jabatan_jobdesk)
            $('#jabatan_nama').val(edit.jabatan_nama)
            $('#jabatan_id').val(edit.jabatan_id)
            $('#dataJabatan').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/jabatan/aksi_hapus_jabatan.php', {
                'jabatan_id': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/jabatan/data_jabatan.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }

    function kosong() {
        $('#jabatan_nama').val('')
        CKEDITOR.instances.jabatan_jobdesk.setData('')
        $('#jabatan_id').val('')
    }

    $('#isi').load('inc/jabatan/data_jabatan.php');
</script>
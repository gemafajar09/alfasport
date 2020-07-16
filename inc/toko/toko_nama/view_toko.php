<div class="page-title">
    <div class="title_left">
        <h3>Data Toko</h3>
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
                    <th>No</th>
                    <th style="width:180px">Toko</th>
                    <th style="width:260px">Alamat</th>
                    <th style="width:140px">Telpon</th>
                    <th style="width:140px">Hp</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataToko">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Toko</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="nama_toko" id="nama_toko" required="required" placeholder="Nama Toko" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Alamat Toko</label>
                                <textarea name="alamat_toko" style="height:118px" id="alamat_toko" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" class="form-control" name="no_telpon" id="no_telpon" required="required" placeholder="Nomor Telpon">
                            </div>
                            <div class="form-group">
                                <label>No. Hp</label>
                                <input type="text" class="form-control" name="no_hp" id="no_hp" required="required" placeholder="Nomor Hp">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" required="required" placeholder="Email">
                                <input type="hidden" id="id_toko">
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
        $('#dataToko').modal()
    }

    function simpan() {
        var nama_toko = $('#nama_toko').val()
        var alamat_toko = $('#alamat_toko').val()
        var no_telpon = $('#no_telpon').val()
        var no_hp = $('#no_hp').val()
        var email = $('#email').val()
        var id_toko = $('#id_toko').val()
        axios.post('inc/toko/toko_nama/aksi_simpan_toko.php', {
            'nama_toko': nama_toko,
            'alamat_toko': alamat_toko,
            'no_telpon': no_telpon,
            'no_hp': no_hp,
            'email': email,
            'id_toko': id_toko,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataToko').modal('hide')
            $('#isi').load('inc/toko/toko_nama/data_toko.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataToko').modal('hide')
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/toko/toko_nama/aksi_edit_toko.php', {
            'id_toko': id
        }).then(function(res) {
            var edit = res.data
            $('#nama_toko').val(edit.nama_toko)
            $('#alamat_toko').val(edit.alamat_toko)
            $('#no_telpon').val(edit.telpon_toko)
            $('#no_hp').val(edit.hp_toko)
            $('#email').val(edit.email)
            $('#id_toko').val(edit.id_toko)
            $('#dataToko').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/toko/toko_nama/aksi_hapus_toko.php', {
            'id_toko': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/toko/toko_nama/data_toko.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#nama_toko').val('')
        $('#alamat_toko').val('')
        $('#no_telpon').val('')
        $('#no_hp').val('')
        $('#email').val('')
        $('#id_toko').val('')
    }

    $('#isi').load('inc/toko/toko_nama/data_toko.php');
</script>
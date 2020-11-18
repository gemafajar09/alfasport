<div class="page-title">
    <div class="title_left">
        <h3>Data Vendor</h3>
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
                    <th style="width:180px">Nama</th>
                    <th style="width:260px">Perusahaan</th>
                    <th style="width:140px">Telpon</th>
                    <th style="width:140px">Email</th>
                    <th>Alamat</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataDistributor">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Vendor</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="distributor_nama" id="distributor_nama" required="required" placeholder="Nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="distributor_perusahaan" id="distributor_perusahaan" required="required" placeholder="Nama Perusahaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" name="distributor_notelp" id="distributor_notelp" required="required" placeholder="No Telpon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="distributor_email" id="distributor_email" required="required" placeholder="Email">
                                <input type="hidden" id="distributor_id">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="distributor_alamat" style="height:118px" id="distributor_alamat" class="form-control"></textarea>
                            </div>
                        </div>
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
    function tampil() {
        $('#dataDistributor').modal()
    }

    function simpan() {
        var distributor_nama = $('#distributor_nama').val()
        var distributor_perusahaan = $('#distributor_perusahaan').val()
        var distributor_notelp = $('#distributor_notelp').val()
        var distributor_email = $('#distributor_email').val()
        var distributor_alamat = $('#distributor_alamat').val()
        var distributor_id = $('#distributor_id').val()
        axios.post('inc/distributor/aksi_simpan_distributor.php', {
            'distributor_nama': distributor_nama,
            'distributor_perusahaan': distributor_perusahaan,
            'distributor_notelp': distributor_notelp,
            'distributor_email': distributor_email,
            'distributor_alamat': distributor_alamat,
            'distributor_id': distributor_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#datadistributor').modal('hide')
            $('#isi').load('inc/distributor/data_distributor.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#datadistributor').modal('hide')
            $('#isi').load('inc/distributor/data_distributor.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/distributor/aksi_edit_distributor.php', {
            'distributor_id': id
        }).then(function(res) {
            var edit = res.data
            $('#distributor_nama').val(edit.distributor_nama)
            $('#distributor_perusahaan').val(edit.distributor_perusahaan)
            $('#distributor_notelp').val(edit.distributor_notelp)
            $('#distributor_email').val(edit.distributor_email)
            $('#distributor_alamat').val(edit.distributor_alamat)
            $('#distributor_id').val(edit.distributor_id)
            $('#dataDistributor').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/distributor/aksi_hapus_distributor.php', {
                'distributor_id': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/distributor/data_distributor.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }

    function kosong() {
        $('#distributor_nama').val('')
        $('#distributor_perusahaan').val('')
        $('#distributor_notelp').val('')
        $('#distributor_email').val('')
        $('#distributor_alamat').val('')
        $('#distributor_id').val('')
    }

    $('#isi').load('inc/distributor/data_distributor.php');
</script>
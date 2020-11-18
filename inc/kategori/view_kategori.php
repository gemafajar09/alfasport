<div class="page-title">
    <div class="title_left">
        <h3>Data Kategori</h3>
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
                    <th>Kategori</th>
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataKategori">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Kategori</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <input type="text" name="kategori_nama" id="kategori_nama" required="required" placeholder="Nama Kategori" class="form-control">
                                <input type="hidden" id="kategori_id">
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
        $('#dataKategori').modal()
    }

    function simpan() {
        var kategori_nama = $('#kategori_nama').val()
        var kategori_id = $('#kategori_id').val()
        axios.post('inc/kategori/aksi_simpan_kategori.php', {
            'kategori_nama': kategori_nama,
            'kategori_id': kategori_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataKategori').modal('hide')
            $('#isi').load('inc/kategori/data_kategori.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataKategori').modal('hide')
            $('#isi').load('inc/kategori/data_kategori.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/kategori/aksi_edit_kategori.php', {
            'kategori_id': id
        }).then(function(res) {
            var edit = res.data
            $('#kategori_nama').val(edit.kategori_nama)
            $('#kategori_id').val(edit.kategori_id)
            $('#dataKategori').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/kategori/aksi_hapus_kategori.php', {
                'kategori_id': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/kategori/data_kategori.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }

    function kosong() {
        $('#kategori_nama').val('')
        $('#kategori_id').val('')
    }

    $('#isi').load('inc/kategori/data_kategori.php');
</script>
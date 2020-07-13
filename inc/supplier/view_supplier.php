<div class="page-title">
    <div class="title_left">
        <h3>Data Supplier</h3>
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
<div class="modal" id="dataSupplier">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Supplier</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="supplier_nama" id="supplier_nama" required="required" placeholder="Nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Nama Perusahaan</label>
                                <input type="text" name="supplier_perusahaan" id="supplier_perusahaan" required="required" placeholder="Nama Perusahaan" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>No Telpon</label>
                                <input type="text" name="supplier_notelp" id="supplier_notelp" required="required" placeholder="No Telpon" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="supplier_email" id="supplier_email" required="required" placeholder="Email">
                                <input type="hidden" id="supplier_id">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="supplier_alamat" style="height:118px" id="supplier_alamat" class="form-control"></textarea>
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
        $('#dataSupplier').modal()
    }

    function simpan() {
        var supplier_nama = $('#supplier_nama').val()
        var supplier_perusahaan = $('#supplier_perusahaan').val()
        var supplier_notelp = $('#supplier_notelp').val()
        var supplier_email = $('#supplier_email').val()
        var supplier_alamat = $('#supplier_alamat').val()
        var supplier_id = $('#supplier_id').val()
        axios.post('inc/supplier/aksi_simpan_supplier.php', {
            'supplier_nama': supplier_nama,
            'supplier_perusahaan': supplier_perusahaan,
            'supplier_notelp': supplier_notelp,
            'supplier_email': supplier_email,
            'supplier_alamat': supplier_alamat,
            'supplier_id': supplier_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataSupplier').modal('hide')
            $('#isi').load('inc/supplier/data_supplier.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataSupplier').modal('hide')
            $('#isi').load('inc/supplier/data_supplier.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/supplier/aksi_edit_supplier.php', {
            'supplier_id': id
        }).then(function(res) {
            var edit = res.data
            $('#supplier_nama').val(edit.supplier_nama)
            $('#supplier_perusahaan').val(edit.supplier_perusahaan)
            $('#supplier_notelp').val(edit.supplier_notelp)
            $('#supplier_email').val(edit.supplier_email)
            $('#supplier_alamat').val(edit.supplier_alamat)
            $('#supplier_id').val(edit.supplier_id)
            $('#dataSupplier').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/supplier/aksi_hapus_supplier.php', {
            'supplier_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/supplier/data_supplier.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#supplier_nama').val('')
        $('#supplier_perusahaan').val('')
        $('#supplier_notelp').val('')
        $('#supplier_email').val('')
        $('#supplier_alamat').val('')
        $('#supplier_id').val('')
    }

    $('#isi').load('inc/supplier/data_supplier.php');
</script>
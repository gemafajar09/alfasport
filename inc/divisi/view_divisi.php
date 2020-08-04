<div class="page-title">
    <div class="title_left">
        <h3>Data Divisi</h3>
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
                    <th>Nama Kategori</th>
                    <th>Nama Divisi</th>
                    <th class="text-center" style="width:140px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataDivisi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Divisi</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Kategori</label>
                                <select class="form-control" name="kategori_id" id="kategori_id" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    <?php
                                    $data = $con->select("tb_kategori", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['kategori_id'] . ">" . $a['kategori_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Divisi</label>
                                <input type="text" name="divisi_nama" id="divisi_nama" required="required" placeholder="Nama Divisi" class="form-control">
                                <input type="hidden" id="divisi_id">
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
        $('#dataDivisi').modal()
    }

    function simpan() {
        var divisi_nama = $('#divisi_nama').val()
        var kategori_id = $('#kategori_id').val()
        var divisi_id = $('#divisi_id').val()
        axios.post('inc/divisi/aksi_simpan_divisi.php', {
            'divisi_nama': divisi_nama,
            'kategori_id': kategori_id,
            'divisi_id': divisi_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataDivisi').modal('hide')
            $('#isi').load('inc/divisi/data_divisi.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataDivisi').modal('hide')
            $('#isi').load('inc/divisi/data_divisi.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/divisi/aksi_edit_divisi.php', {
            'divisi_id': id
        }).then(function(res) {
            var edit = res.data
            $('#divisi_nama').val(edit.divisi_nama)
            $('#kategori_id').val(edit.kategori_id)
            $('#divisi_id').val(edit.divisi_id)
            $('#dataDivisi').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/divisi/aksi_hapus_divisi.php', {
            'divisi_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/divisi/data_divisi.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#divisi_nama').val('')
        $('#kategori_id').val('')
        $('#divisi_id').val('')
    }

    $('#isi').load('inc/divisi/data_divisi.php');
</script>
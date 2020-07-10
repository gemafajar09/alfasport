<div class="page-title">
    <div class="title_left">
        <h3>Data Subdivisi</h3>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Divisi</th>
                    <th>Nama Subdivisi</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataSubdivisi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Subdivisi</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Divisi</label>
                                <select class="form-control" name="divisi_id" id="divisi_id" required>
                                    <option selected disabled>Pilih Kategori</option>
                                    <?php
                                    $data = $con->select("tb_divisi", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['divisi_id'] . ">" . $a['divisi_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Subdivisi</label>
                                <input type="text" name="subdivisi_nama" id="subdivisi_nama" required="required" placeholder="Nama Divisi" class="form-control">
                                <input type="hidden" id="subdivisi_id">
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
        $('#dataSubdivisi').modal()
    }

    function simpan() {
        var subdivisi_nama = $('#subdivisi_nama').val()
        var divisi_id = $('#divisi_id').val()
        var subdivisi_id = $('#subdivisi_id').val()
        axios.post('inc/subdivisi/aksi_simpan_subdivisi.php', {
            'subdivisi_nama': subdivisi_nama,
            'divisi_id': divisi_id,
            'subdivisi_id': subdivisi_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataSubdivisi').modal('hide')
            $('#isi').load('inc/subdivisi/data_subdivisi.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataSubdivisi').modal('hide')
            $('#isi').load('inc/subdivisi/data_subdivisi.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/subdivisi/aksi_edit_subdivisi.php', {
            'subdivisi_id': id
        }).then(function(res) {
            var edit = res.data
            $('#subdivisi_nama').val(edit.subdivisi_nama)
            $('#subdivisi_id').val(edit.subdivisi_id)
            $('#divisi_id').val(edit.divisi_id)
            $('#dataSubdivisi').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/subdivisi/aksi_hapus_subdivisi.php', {
            'subdivisi_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/subdivisi/data_subdivisi.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#subdivisi_nama').val('')
        $('#divisi_id').val('')
        $('#subdivisi_id').val('')
    }

    $('#isi').load('inc/subdivisi/data_subdivisi.php');
</script>
<div class="page-title">
    <div class="title_left">
        <h3>Data Detail Ukuran</h3>
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
                    <th>Nama Ukuran</th>
                    <th>Nama Kategori</th>
                    <th>Nama Divisi</th>
                    <th>Nama Subdivisi</th>
                    <th>Nama Gender</th>
                    <th>Detail Ukuran</th>
                    <th>Stok</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataDetailUkuran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Detail Ukuran</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Ukuran</label>
                                <select class="form-control" name="ukuran_id" id="ukuran_id" required>
                                    <option selected disabled>Pilih Ukuran</option>
                                    <?php
                                    $data = $con->select("tb_ukuran", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['ukuran_id'] . ">" . $a['ukuran_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
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
                                <select class="form-control" name="divisi_id" id="divisi_id" required>
                                    <option selected disabled>Pilih Divisi</option>
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
                                <select class="form-control" name="subdivisi_id" id="subdivisi_id" required>
                                    <option selected disabled>Pilih Subdivisi</option>
                                    <?php
                                    $data = $con->select("tb_subdivisi", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['subdivisi_id'] . ">" . $a['subdivisi_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Gender</label>
                                <select class="form-control" name="gender_id" id="gender_id" required>
                                    <option selected disabled>Pilih Gender</option>
                                    <?php
                                    $data = $con->select("tb_gender", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['gender_id'] . ">" . $a['gender_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Detail Ukuran</label>
                                <input type="text" name="detail_ukuran_ukuran" id="detail_ukuran_ukuran" required="required" placeholder="Detail Ukuran" class="form-control">
                                <input type="hidden" id="detail_ukuran_id">
                            </div>
                            <div class="form-group">
                                <label>Stok</label>
                                <input type="number" name="detail_ukuran_stok" id="detail_ukuran_stok" required="required" placeholder="Stok" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input type="number" name="detail_ukuran_harga_modal" id="detail_ukuran_harga_modal" required="required" placeholder="Harga Modal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" name="detail_ukuran_harga_jual" id="detail_ukuran_harga_jual" required="required" placeholder="Harga Jual" class="form-control">
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
        $('#dataDetailUkuran').modal()
    }

    function simpan() {
        var ukuran_id = $('#ukuran_id').val()
        var kategori_id = $('#kategori_id').val()
        var divisi_id = $('#divisi_id').val()
        var subdivisi_id = $('#subdivisi_id').val()
        var gender_id = $('#gender_id').val()
        var detail_ukuran_ukuran = $('#detail_ukuran_ukuran').val()
        var detail_ukuran_stok = $('#detail_ukuran_stok').val()
        var detail_ukuran_harga_modal = $('#detail_ukuran_harga_modal').val()
        var detail_ukuran_harga_jual = $('#detail_ukuran_harga_jual').val()
        var detail_ukuran_id = $('#detail_ukuran_id').val()
        axios.post('inc/detail_ukuran/aksi_simpan_detail_ukuran.php', {
            'ukuran_id': ukuran_id,
            'kategori_id': kategori_id,
            'divisi_id': divisi_id,
            'subdivisi_id': subdivisi_id,
            'gender_id': gender_id,
            'detail_ukuran_ukuran': detail_ukuran_ukuran,
            'detail_ukuran_stok': detail_ukuran_stok,
            'detail_ukuran_harga_modal': detail_ukuran_harga_modal,
            'detail_ukuran_harga_jual': detail_ukuran_harga_jual,
            'detail_ukuran_id': detail_ukuran_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataDetailUkuran').modal('hide')
            $('#isi').load('inc/detail_ukuran/data_detail_ukuran.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataDetailUkuran').modal('hide')
            $('#isi').load('inc/detail_ukuran/data_detail_ukuran.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/detail_ukuran/aksi_edit_detail_ukuran.php', {
            'detail_ukuran_id': id
        }).then(function(res) {
            var edit = res.data
            $('#ukuran_id').val(edit.ukuran_id)
            $('#kategori_id').val(edit.kategori_id)
            $('#divisi_id').val(edit.divisi_id)
            $('#subdivisi_id').val(edit.subdivisi_id)
            $('#gender_id').val(edit.gender_id)
            $('#detail_ukuran_ukuran').val(edit.detail_ukuran_ukuran)
            $('#detail_ukuran_stok').val(edit.detail_ukuran_stok)
            $('#detail_ukuran_harga_modal').val(edit.detail_ukuran_harga_modal)
            $('#detail_ukuran_harga_jual').val(edit.detail_ukuran_harga_jual)
            $('#detail_ukuran_id').val(edit.detail_ukuran_id)
            $('#dataDetailUkuran').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/detail_ukuran/aksi_hapus_detail_ukuran.php', {
            'detail_ukuran_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/detail_ukuran/data_detail_ukuran.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#ukuran_id').val('')
        $('#kategori_id').val('')
        $('#divisi_id').val('')
        $('#subdivisi_id').val('')
        $('#gender_id').val('')
        $('#detail_ukuran_ukuran').val('')
        $('#detail_ukuran_stok').val('')
        $('#detail_ukuran_harga_modal').val('')
        $('#detail_ukuran_harga_jual').val('')
        $('#detail_ukuran_id').val('')
    }

    $('#isi').load('inc/detail_ukuran/data_detail_ukuran.php');
</script>
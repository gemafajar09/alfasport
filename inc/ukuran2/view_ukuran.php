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
                    <th class="text-center" style="width:40px">No</th>
                    <th>Nama Merk</th>
                    <th>UE</th>
                    <th>UK</th>
                    <th>US</th>
                    <th>CM</th>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Merk</label>
                                <select class="form-control select2" style="width: 100%;" name="id_merek" id="id_merek" required>
                                    <option selected disabled>-Pilih Merk-</option>
                                    <?php
                                    $data = $con->select("tb_merk", '*');
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['merk_id'] . ">" . $a['merk_nama'] . "</option>";
                                    }
                                    ?>
                                </select>
                                <input type="hidden" id="id_ukuran">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" id="id_kategori" class="form-group select2" style="width: 100%;">
                                    <option selected disabled>-Pilih Kategori-</option>
                                    <?php
                                    $data = $con->select("tb_kategori", "*");
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <option value="<?php echo $a['kategori_id'] ?>"><?php echo $a['kategori_nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>UE</label>
                                <input type="text" name="ue" id="ue" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>UK</label>
                                <input type="text" name="uk" id="uk" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>US</label>
                                <input type="text" name="us" id="us" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CM</label>
                                <input type="text" name="cm" id="cm" class="form-control">
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
        var id_merek = $('#id_merek').val()
        var id_kategori = $('#id_kategori').val()
        var ue = $('#ue').val()
        var uk = $('#uk').val()
        var us = $('#us').val()
        var cm = $('#cm').val()
        var id_ukuran = $('#id_ukuran').val()
        axios.post('inc/ukuran2/aksi_simpan_ukuran.php', {
            'id_merek': id_merek,
            'id_kategori': id_kategori,
            'ue': ue,
            'us': us,
            'uk': uk,
            'cm': cm,
            'id_ukuran': id_ukuran,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/ukuran2/data_ukuran.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/ukuran2/data_ukuran.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/ukuran2/aksi_edit_ukuran.php', {
            'id_ukuran': id
        }).then(function(res) {
            var edit = res.data
            $('#id_ukuran').val(edit.id_ukuran)
            $('#id_merek').val(edit.id_merek)
            $('#id_kategori').val(edit.id_kategori)
            $('#ue').val(edit.ue)
            $('#uk').val(edit.uk)
            $('#us').val(edit.us)
            $('#cm').val(edit.cm)
            $('#dataUkuran').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/ukuran2/aksi_hapus_ukuran.php', {
            'id_ukuran': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/ukuran2/data_ukuran.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#id_ukuran').val('')
        $('#id_merek').val('')
        $('#id_kategori').val('')
        $('#ue').val('')
        $('#uk').val('')
        $('#us').val('')
        $('#cm').val('')
    }

    $('#isi').load('inc/ukuran2/data_ukuran.php');
</script>
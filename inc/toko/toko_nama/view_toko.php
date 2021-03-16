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
                <tr class="text-center">
                    <th style="width:60px">No</th>
                    <th style="width:180px">Toko</th>
                    <th style="width:260px">Alamat</th>
                    <th style="width:140px">Telpon</th>
                    <th style="width:140px">Kode Pos</th>
                    <th>Email</th>
                    <th style="width:120px">Action</th>
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
                                <label>Nama Provinsi</label>
                                <select name="id_prov" id="id_prov" class="form-control select2" style="width: 100%;">
                                    <option>-Pilih Provinsi-</option>
                                    <?php
                                    $data = $con->select("tb_provinsi", "*");
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <option value="<?php echo $a['id_prov'] ?>"><?php echo $a['nama_prov'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>

                            <script>
                                $("#id_prov").change(function() {
                                    var id_prov = $('#id_prov option:selected').val();
                                    console.log(id_prov);
                                    $.ajax({
                                        type: "GET",
                                        url: "inc/toko/toko_nama/filter/data_kota.php",
                                        data: {
                                            'id_prov': id_prov
                                        },
                                        success: function(response) {
                                            $('#id_kota').html(response);
                                        }
                                    });
                                })
                            </script>
                            <div class="form-group">
                                <label>Pilih Kota</label>
                                <select class="form-control select2" name="id_kota" id="id_kota" required style="width: 100%;">
                                    <option selected disabled>Pilih Kota</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>No. Telpon</label>
                                <input type="text" class="form-control" name="no_telpon" id="no_telpon" required="required" placeholder="Nomor Telpon">
                            </div>
                            <div class="form-group">
                                <label>Kode pos</label>
                                <input type="text" class="form-control" name="kode_pos" id="kode_pos" required="required" placeholder="Kode Pos">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" id="email" required="required" placeholder="Email">
                                <input type="hidden" id="id_toko">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat Toko</label>
                                <textarea class="form-control ckeditor" name="alamat_toko" id="alamat_toko" cols="30" rows="10"></textarea>
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
        var alamat_toko = CKEDITOR.instances.alamat_toko.getData()
        var no_telpon = $('#no_telpon').val()
        var kode_pos = $('#kode_pos').val()
        var email = $('#email').val()
        var id_prov = $('#id_prov').val()
        var id_kota = $('#id_kota').val()
        var id_toko = $('#id_toko').val()
        axios.post('inc/toko/toko_nama/aksi_simpan_toko.php', {
            'nama_toko': nama_toko,
            'alamat_toko': alamat_toko,
            'no_telpon': no_telpon,
            'kode_pos': kode_pos,
            'email': email,
            'id_prov': id_prov,
            'id_kota': id_kota,
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
        var edit = null;
        axios.post('inc/toko/toko_nama/aksi_edit_toko.php', {
            'id_toko': id
        }).then(function(res) {
            edit = res.data
            $('#nama_toko').val(edit.nama_toko)
            CKEDITOR.instances.alamat_toko.setData(edit.alamat_toko)
            $('#no_telpon').val(edit.telpon_toko)
            $('#kode_pos').val(edit.kode_pos_toko)
            $('#email').val(edit.email)
            $('#id_prov').val(edit.id_prov).change()
            $('#id_toko').val(edit.id_toko)

            return axios.get('inc/toko/toko_nama/filter/data_kota.php?id_prov=' + edit.id_prov)
        }).then(function(response) {
            $('#id_kota').html(response.data);
            $('#id_kota').val(edit.id_kota).change()
            $('#dataToko').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/toko/toko_nama/aksi_hapus_toko.php', {
                'id_toko': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/toko/toko_nama/data_toko.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }

    function kosong() {
        $('#nama_toko').val('')
        CKEDITOR.instances.alamat_toko.setData('')
        $('#no_telpon').val('')
        $('#kode_pos').val('')
        $('#email').val('')
        $('#id_prov').val('')
        $('#id_kota').val('')
        $('#id_toko').val('')
    }

    $('#isi').load('inc/toko/toko_nama/data_toko.php');
</script>
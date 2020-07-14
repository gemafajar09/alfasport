<div class="page-title">
    <div class="title_left">
        <h3>Penyesuaian Stok</h3>
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
                <div class="col-md-3">
                    <label>Dari Tanggal</label>
                    <input type="date" id="dari" class="form-control">
                </div>
                <div class="col-md-3">
                    <label>Sampai Tanggal</label>
                    <input type="date" id="sampai" class="form-control">
                </div>
                <div class="col-md-1" style="padding-top:26px">
                    <button type="button" class="btn btn-primary btn-md"><i class="fa fa-search"></i></button>
                </div>
                <div class="col-md-5" style="padding-left:26px">
                    <label>Nama Toko</label>
                    <select name="" id="" class="form-control" style="font-size:12px">
                        <option value="">-SELECT TOKO-</option>
                    </select>
                </div>
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
        <hr>
        <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
        <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal</th>
                    <th>Toko</th>
                    <th>Tipe Penyesuaian</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataPenyesuaianStok">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Penyesuaian Stok</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="penyesuaian_stok_tgl" id="penyesuaian_stok_tgl" required="required" placeholder="Nama Merk" class="form-control">
                                <input type="hidden" id="penyesuaian_stok_id">
                                <?php
                                $tgl = date('Y-m-d H:i:s');
                                ?>
                                <input type="hidden" id="penyesuaian_stok_create_at" value="<?php echo $tgl; ?>">
                                <input type="hidden" id="penyesuaian_stok_create_by" value="<?php echo $_COOKIE['id_admin']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Toko</label>
                                <select class="form-control" name="id_toko" id="id_toko" required>
                                    <option selected disabled>Pilih Toko</option>
                                    <?php
                                    $data = $con->select("toko", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tipe Penyesuaian</label>
                                <select class="form-control" name="penyesuaian_stok_tipe" id="penyesuaian_stok_tipe" required>
                                    <option selected disabled>Pilih Tipe Penyesuaian</option>
                                    <option value="stock opname">Stock Opname</option>
                                    <option value="barang rusak">Barang Rusak</option>
                                    <option value="dipakai sendiri">Dipakai Sendiri</option>
                                </select>
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


<!-- modal 2 -->
<div class="modal" id="dataPenyesuaianStok1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Penyesuaian Stok</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="penyesuaian_stok_tgl1" id="penyesuaian_stok_tgl1" required="required" placeholder="" class="form-control" readonly>
                                <input type="hidden" id="penyesuaian_stok_id2">
                                <?php
                                $tgl = date('Y-m-d H:i:s');
                                ?>
                                <input type="hidden" id="penyesuaian_stok_create_at1" value="<?php echo $tgl; ?>">
                                <input type="hidden" id="penyesuaian_stok_create_by1" value="<?php echo $_COOKIE['id_admin']; ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Toko</label>
                                <select class="form-control" name="id_toko1" id="id_toko1" required readonly>
                                    <option selected disabled>Pilih Toko</option>
                                    <?php
                                    $data = $con->select("toko", "*");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tipe Penyesuaian</label>
                                <select class="form-control" name="penyesuaian_stok_tipe1" id="penyesuaian_stok_tipe1" required>
                                    <option selected disabled>Pilih Tipe Penyesuaian</option>
                                    <option value="stock opname">Stock Opname</option>
                                    <option value="barang rusak">Barang Rusak</option>
                                    <option value="dipakai sendiri">Dipakai Sendiri</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group mb-4">
                                <label for=""></label>
                                <button type="button" onclick="simpan3()" class="btn btn-primary btn-sm form-control">Simpan</button>
                                <button type="button" class="btn btn-danger btn-sm form-control" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <table class="table table-striped" id="datatable-responsive" style="font-size:11px">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Artikel</th>
                                        <!-- <th>Ukuran</th> -->
                                        <th>Stok Awal</th>
                                        <th>Penyesuaian</th>
                                        <th>Stok Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // include "../../config/koneksi.php";
                                    // aksi di bawah
                                    // $data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail 
                                    //     JOIN tb_gudang ON tb_penyesuaian_stok_detail.id_toko = tb_gudang.id_toko
                                    //     JOIN tb_admin ON tb_admin.id_admin = tb_penyesuaian_stok.penyesuaian_stok_create_by
                                    // ");
                                    // $data = $con->query("SELECT * FROM tb_penyesuaian_stok_detail WHERE ");
                                    $data = $con->get("tb_penyesuaian_stok", "*", array("penyesuaian_stok_id" => $_POST["penyesuaian_stok_id"]));
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <tr>
                                            <td><?= $i + 1 ?></td>
                                            <!-- <td><?= $a['id_barang'] ?></td> -->
                                            <td><?= $a['id_barang'] ?></td>
                                            <td><?= $a['id_stok_awal'] ?></td>
                                            <td><?= $a['id_stok_penyesuaian'] ?></td>
                                            <td><?= $a['penyesuaian_stok_detail_stok_akhir'] ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <div class="modal-footer">
            <button type="button" onclick="simpan3()" class="btn btn-primary btn-sm">Simpan</button>
            <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
        </div> -->

    </div>
</div>
</div>



<!-- modal detail penyesuaian stok -->
<div class="modal" id="dataPenyesuaianStokDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Penyesuaian Stok Detail</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Barang</label>
                                <input type="text" name="id_barang" id="id_barang" required="required" placeholder="Nama Merk" class="form-control">
                                <input type="text" id="penyesuaian_stok_id1">
                                <input type="text" id="penyesuaian_stok_detail_id">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="number" name="id_stok_awal" id="id_stok_awal" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Penyesuaian</label>
                                <input type="number" name="id_stok_penyesuaian" id="id_stok_penyesuaian" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Stok Akhir</label>
                                <input type="number" name="penyesuaian_stok_detail_stok_akhir" id="penyesuaian_stok_detail_stok_akhir" required="required" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan2()" class="btn btn-primary btn-sm">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>
</div>



<script>
    function tampil() {
        $('#dataPenyesuaianStok').modal()
    }

    function tampil2(id) {
        // alert(id);
        $('#penyesuaian_stok_id1').val(id)
        $('#dataPenyesuaianStokDetail').modal()
    }

    function simpan() {
        var penyesuaian_stok_tgl = $('#penyesuaian_stok_tgl').val()
        var penyesuaian_stok_tipe = $('#penyesuaian_stok_tipe').val()
        var penyesuaian_stok_create_at = moment().format('YYYY-MM-DD HH:mm:ss')
        var penyesuaian_stok_create_by = $('#penyesuaian_stok_create_by').val()
        var id_toko = $('#id_toko').val()
        var penyesuaian_stok_id = $('#penyesuaian_stok_id').val()
        axios.post('inc/penyesuaian/aksi_simpan_penyesuaian_stok.php', {
            'id_toko': id_toko,
            'penyesuaian_stok_tgl': penyesuaian_stok_tgl,
            'penyesuaian_stok_tipe': penyesuaian_stok_tipe,
            'penyesuaian_stok_create_at': penyesuaian_stok_create_at,
            'penyesuaian_stok_create_by': penyesuaian_stok_create_by,
            'penyesuaian_stok_id': penyesuaian_stok_id,
        }).then(function(res) {
            var id = res.data
            kosong()
            tampil2(id.penyesuaian_stok_id);
            $('#dataPenyesuaianStok').modal('hide')
            $('#isi').load('inc/penyesuaian/data_stok.php');
        }).catch(function(err) {
            alert(err)
            $('#dataPenyesuaianStok').modal('hide')
            $('#isi').load('inc/penyesuaian/data_stok.php');
            kosong()
        })
    }

    function simpan2() {
        var penyesuaian_stok_detail_id = $('#penyesuaian_stok_detail_id').val()
        var penyesuaian_stok_id = $('#penyesuaian_stok_id1').val()
        var id_barang = $('#id_barang').val()
        var id_stok_awal = $('#id_stok_awal').val()
        var id_stok_penyesuaian = $('#id_stok_penyesuaian').val()
        var penyesuaian_stok_detail_stok_akhir = $('#penyesuaian_stok_detail_stok_akhir').val()
        axios.post('inc/penyesuaian/aksi_simpan_penyesuaian_stok_detail.php', {
            'penyesuaian_stok_id': penyesuaian_stok_id,
            'id_barang': id_barang,
            'id_stok_awal': id_stok_awal,
            'id_stok_penyesuaian': id_stok_penyesuaian,
            'penyesuaian_stok_detail_stok_akhir': penyesuaian_stok_detail_stok_akhir,
            'penyesuaian_stok_detail_id': penyesuaian_stok_detail_id,
        }).then(function(res) {
            var id = res.data
            // alert(id)
            kosong2()
            // $('#dataPenyesuaianStokDetail').modal('hide')
            tampil2(id);
            $('#isi').load('inc/penyesuaian/data_stok.php');
        }).catch(function(err) {
            alert(err)
            // $('#dataPenyesuaianStok').modal('hide')
            $('#isi').load('inc/penyesuaian/data_stok.php');
            kosong()
        })
    }

    function simpan3() {
        // var penyesuaian_stok_tgl = $('#penyesuaian_stok_tgl1').val()
        var penyesuaian_stok_tipe = $('#penyesuaian_stok_tipe1').val()
        // var penyesuaian_stok_create_at = moment().format('YYYY-MM-DD HH:mm:ss')
        // var penyesuaian_stok_create_by = $('#penyesuaian_stok_create_by1').val()
        // var id_toko = $('#id_toko1').val()
        var penyesuaian_stok_id = $('#penyesuaian_stok_id2').val()
        axios.post('inc/penyesuaian/aksi_simpan_penyesuaian_stok.php', {
            // 'id_toko': id_toko,
            // 'penyesuaian_stok_tgl': penyesuaian_stok_tgl,
            'penyesuaian_stok_tipe': penyesuaian_stok_tipe,
            // 'penyesuaian_stok_create_at': penyesuaian_stok_create_at,
            // 'penyesuaian_stok_create_by': penyesuaian_stok_create_by,
            'penyesuaian_stok_id': penyesuaian_stok_id,
        }).then(function(res) {
            var id = res.data
            kosong()
            // tampil2(id.penyesuaian_stok_id);
            $('#dataPenyesuaianStok1').modal('')
            $('#isi').load('inc/penyesuaian/data_stok.php');
        }).catch(function(err) {
            alert(err)
            $('#dataPenyesuaianStok1').modal()
            $('#isi').load('inc/penyesuaian/data_stok.php');
            kosong()
        })
    }


    function edit(id) {
        axios.post('inc/penyesuaian/aksi_edit_penyesuaian_stok.php', {
            'penyesuaian_stok_id': id
        }).then(function(res) {
            var edit = res.data
            $('#id_toko1').val(edit.id_toko)
            $('#penyesuaian_stok_tgl1').val(edit.penyesuaian_stok_tgl)
            $('#penyesuaian_stok_tipe1').val(edit.penyesuaian_stok_tipe)
            $('#penyesuaian_stok_create_at1').val(edit.penyesuaian_stok_create_at)
            $('#penyesuaian_stok_create_by1').val(edit.penyesuaian_stok_create_by)
            $('#penyesuaian_stok_id2').val(edit.penyesuaian_stok_id)
            $('#dataPenyesuaianStok1').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/penyesuaian/aksi_hapus_penyesuaian_stok.php', {
            'penyesuaian_stok_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/penyesuaian/data_stok.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#penyesuaian_stok_id').val('')
        $('#penyesuaian_stok_tgl').val('')
        $('#penyesuaian_stok_tipe').val('')
        // $('#penyesuaian_stok_create_by').val('')
        // $('#penyesuaian_stok_create_at').val('')
        $('#id_toko').val('')
    }

    function kosong2() {
        $('#id_barang').val('')
        $('#id_stok_awal').val('')
        $('#id_stok_penyesuaian').val('')
        $('#penyesuaian_stok_detail_stok_akhir').val('')
        $('#penyesuaian_stok_detail_id').val('')
    }


    $('#isi').load('inc/penyesuaian/data_stok.php');
</script>
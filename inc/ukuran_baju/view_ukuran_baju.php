<div class="page-title">
    <div class="title_left">
        <h3>Data Ukuran Baju</h3>
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
                    <th>Nama Kategori</th>
                    <th>Nama Divisi</th>
                    <th>Nama Subdivisi</th>
                    <th>Gender</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal tambah -->
<div class="modal" id="dataUkuran">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Ukuran</h4>
            </div>

            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container">
                        <div class="row" style="font-size:12px">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Merk</label>
                                    <select class="form-control select2" style="width: 100%;" name="id_merek" required>
                                        <option selected disabled>-Pilih Merk-</option>
                                        <?php
                                        $data = $con->select("tb_merk", '*');
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['merk_id'] . ">" . $a['merk_nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
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
                                    <label>Divisi</label>
                                    <select name="id_divisi" id="id_divisi" class="form-group select2" style="width: 100%;">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subivisi</label>
                                    <select name="id_subdivisi" id="id_subdivisi" class="form-group select2" style="width: 100%;">
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <div style="display: block; font-size: 15px;">
                                        <?php
                                        $data = $con->select("tb_gender", "*");
                                        foreach ($data as $i => $a) {
                                        ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="checkbox" value="<?= $a['gender_id']; ?>" name="id_gender[]">
                                                <label class="form-check-label"><?= $a['gender_nama'] ?></label>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div id="formInput">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ukuran S</label>
                                                <input type="hidden" value="S" name="ukuran_baju_stok_nama[]">
                                                <input type="number" placeholder="Stok Baju" name="ukuran_baju_detail_stok[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ukuran M</label>
                                                <input type="hidden" value="M" name="ukuran_baju_stok_nama[]">
                                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ukuran L</label>
                                                <input type="hidden" value="L" name="ukuran_baju_stok_nama[]">
                                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Ukuran XL</label>
                                                <input type="hidden" value="XL" name="ukuran_baju_stok_nama[]">
                                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" onclick="simpan()" class="btn btn-primary btn-sm">Simpan</button> -->
                    <button type="submit" name="simpanT" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- the modal edit -->
<div class="modal" id="dataUkuranEdit">
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
                                <input type="hidden" id="ukuran_baju_id">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" id="id_kategori2" class="form-group select2" style="width: 100%;">
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
                                <label>Divisi</label>
                                <select name="id_divisi" id="id_divisi2" class="form-group select2" style="width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Subivisi</label>
                                <select name="id_subdivisi" id="id_subdivisi2" class="form-group select2" style="width: 100%;">
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gender</label>
                                <div style="display: block; font-size: 15px;">
                                    <?php
                                    $data = $con->select("tb_gender", "*");
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="checkbox" value="<?= $a['gender_id']; ?>" name="id_gender2" id="id_gender2">
                                            <label class="form-check-label"><?= $a['gender_nama'] ?></label>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ukuran S</label>
                                <input type="hidden" value="S" name="ukuran_baju_stok_nama[]" id='ukuran_s'>
                                <input type="number" placeholder="Stok Baju" name="ukuran_baju_detail_stok[]" class="form-control" id="ukuran_stok_s">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ukuran M</label>
                                <input type="hidden" value="M" name="ukuran_baju_stok_nama[]" id='ukuran_m'>
                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju" id="ukuran_stok_m">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ukuran L</label>
                                <input type="hidden" value="L" name="ukuran_baju_stok_nama[]" id='ukuran_l'>
                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju" id="ukuran_stok_l">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ukuran XL</label>
                                <input type="hidden" value="XL" name="ukuran_baju_stok_nama[]" id='ukuran_xl'>
                                <input type="number" name="ukuran_baju_detail_stok[]" class="form-control" placeholder="Stok Baju" id="ukuran_stok_xl">
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

<!-- the modal detail -->
<div class="modal" id="dataUkuranDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Detail Ukuran Baju</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container" id="tampilkan">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php
if (isset($_POST['simpanT'])) {
    // var_dump($_POST);
    $id_merek = $_POST['id_merek'];
    $id_kategori = $_POST['id_kategori'];
    $id_divisi = $_POST['id_divisi'];
    $id_subdivisi = $_POST['id_subdivisi'];
    $a = $_POST['id_gender'];
    $id_gender = implode(",", $a);
    $ukuran_baju_stok_nama = $_POST['ukuran_baju_stok_nama'];
    $ukuran_baju_detail_stok = $_POST['ukuran_baju_detail_stok'];

    $con->query("INSERT INTO tb_ukuran_baju(id_merek, id_kategori, id_divisi, id_subdivisi, id_gender) VALUES ('$id_merek','$id_kategori','$id_divisi','$id_subdivisi','$id_gender')");

    $last_id = $con->id();

    foreach ($ukuran_baju_stok_nama as $i => $a) {
        $con->query("INSERT INTO tb_ukuran_baju_detail(ukuran_baju_id, ukuran_baju_detail_nama, ukuran_baju_detail_stok) VALUES ('$last_id','$ukuran_baju_stok_nama[$i]','$ukuran_baju_detail_stok[$i]')");
    }
    echo "<script>
        window.location.href = 'ukuran_baju.html';
    </script>";
}
?>

<script>
    $("#id_kategori").change(function() {
        var id_kategori = $('#id_kategori option:selected').val();
        console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_baju/filter/data_divisi.php",
            data: {
                'kategori_id': id_kategori
            },
            success: function(response) {
                $('#id_divisi').html(response);
            }
        });
    })

    $("#id_divisi").change(function() {
        var id_divisi = $('#id_divisi option:selected').val();
        console.log(id_divisi);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_baju/filter/data_subdivisi.php",
            data: {
                'divisi_id': id_divisi
            },
            success: function(response) {
                $('#id_subdivisi').html(response);
            }
        });
    })

    $("#id_kategori2").change(function() {
        var id_kategori = $('#id_kategori2 option:selected').val();
        // console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_baju/filter/data_divisi.php",
            data: {
                'kategori_id': id_kategori
            },
            success: function(response) {
                $('#id_divisi2').html(response);
            }
        });
    })

    $("#id_divisi2").change(function() {
        var id_divisi = $('#id_divisi2 option:selected').val();
        // console.log(id_divisi);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_baju/filter/data_subdivisi.php",
            data: {
                'divisi_id': id_divisi
            },
            success: function(response) {
                $('#id_subdivisi2').html(response);
            }
        });
    })


    function tampil() {
        $('#dataUkuran').modal()
    }

    function simpan() {

        var id_merek = $('#id_merek').val()
        var id_kategori = $('#id_kategori2').val()
        var id_divisi = $('#id_divisi2').val()
        var id_subdivisi = $('#id_subdivisi2').val()
        var ukuran_stok_s = $('#ukuran_stok_s').val()
        var ukuran_stok_m = $('#ukuran_stok_m').val()
        var ukuran_stok_l = $('#ukuran_stok_l').val()
        var ukuran_stok_xl = $('#ukuran_stok_xl').val()
        var id_gender = new Array();
        $('input[name="id_gender2"]:checked').each(function() {
            id_gender.push(this.value);
        });

        var ukuran_baju_id = $('#ukuran_baju_id').val()
        axios.post('inc/ukuran_baju/aksi_simpan_ukuran_baju.php', {
            'id_merek': id_merek,
            'id_kategori': id_kategori,
            'id_divisi': id_divisi,
            'id_subdivisi': id_subdivisi,
            'id_gender': id_gender,
            'ukuran_stok_s': ukuran_stok_s,
            'ukuran_stok_m': ukuran_stok_m,
            'ukuran_stok_l': ukuran_stok_l,
            'ukuran_stok_xl': ukuran_stok_xl,
            'ukuran_baju_id': ukuran_baju_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataUkuranEdit').modal('hide')
            $('#isi').load('inc/ukuran_baju/data_ukuran_baju.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuranEdit').modal('hide')
            $('#isi').load('inc/ukuran_baju/data_ukuran_baju.php');
            kosong()
        })
    }

    function edit(id) {
        var edit = null;
        axios.post('inc/ukuran_baju/aksi_edit_ukuran_baju.php', {
            'ukuran_baju_id': id
        }).then(function(res) {
            edit = res.data

            $('#ukuran_baju_id').val(edit.ukuran_baju_id)
            $('#id_merek').val(edit.id_merek).change()
            $('#ukuran_stok_s').val(edit.stok_s)
            $('#ukuran_stok_m').val(edit.stok_m)
            $('#ukuran_stok_l').val(edit.stok_l)
            $('#ukuran_stok_xl').val(edit.stok_xl)
            var a = edit.id_gender;
            var cek = a.split(",");
            console.log(cek);
            var list_gender = document.getElementsByName("id_gender2");
            // reset centang gender
            for (var x = 0; x < list_gender.length; x++) {
                list_gender[x].checked = false;
            }
            for (var x = 0; x < list_gender.length; x++) {
                for (var i = 0; i < cek.length; i++) {
                    if (list_gender[x].value == cek[i]) {
                        list_gender[x].checked = true;
                    }
                }
            }
            console.log(edit.id_kategori);
            $('#id_kategori2').val(edit.id_kategori).change()
            return axios.get("inc/ukuran_baju/filter/data_divisi.php?kategori_id=" + edit.id_kategori)
        }).then(function(res) {
            $('#id_divisi2').html(res.data);
            $('#id_divisi2').val(edit.id_divisi).change()
            return axios.get("inc/ukuran_baju/filter/data_subdivisi.php?divisi_id=" + edit.id_divisi);
        }).then(function(res) {
            $('#id_subdivisi2').html(res.data);
            $('#id_subdivisi2').val(edit.id_subdivisi).change()
            $('#dataUkuranEdit').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function detail(id) {
        axios.post('inc/ukuran_baju/aksi_detail_ukuran_baju.php', {
            'ukuran_baju_id': id
        }).then(function(res) {
            var data = res.data
            $('#tampilkan').html(data)
            $('#dataUkuranDetail').modal();
        }).catch(function(err) {
            console.log(err)
        })
    }


    function hapus(id) {
        axios.post('inc/ukuran_baju/aksi_hapus_ukuran_baju.php', {
            'ukuran_baju_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/ukuran_baju/data_ukuran_baju.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#id_merek').val('')
        $('#id_kategori2').val('')
        $('#id_divisi2').val('')
        $('#id_subdivisi2').val('')
        $('#ukuran_stok_s').val('')
        $('#ukuran_stok_m').val('')
        $('#ukuran_stok_l').val('')
        $('#ukuran_stok_xl').val('')
    }

    $('#isi').load('inc/ukuran_baju/data_ukuran_baju.php');
</script>
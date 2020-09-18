<div class="page-title">
    <div class="title_left">
        <h3>Data Ukuran Kaos Kaki</h3>
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
                    <th>Gender</th>
                    <th>EU</th>
                    <th>Size</th>
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
                                        <option value="">-Pilih Divisi-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Subivisi</label>
                                    <select name="id_subdivisi" id="id_subdivisi" class="form-group select2" style="width: 100%;">
                                        <option value="">-Pilih Subdivisi-</option>
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
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>SIZE</label>
                                                <input type="text" name="ukuran_kaos_kaki_size[]" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <label>EU</label>
                                                <input type="text" name="ukuran_kaos_kaki_ue[]" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="button" id="addRow" class="btn btn-primary btn-block btn-sm">Add Row</button>
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
                                <input type="hidden" id="ukuran_kaos_kaki_id">
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

                        <div class="col-md-5">
                            <div class="form-group">
                                <label>SIZE</label>
                                <input type="text" id="ukuran_kaos_kaki_size" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>EU</label>
                                <input type="text" id="ukuran_kaos_kaki_ue" class="form-control">
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

<?php
if (isset($_POST['simpanT'])) {
    // var_dump($_POST);
    $id_merek = $_POST['id_merek'];
    $id_kategori = $_POST['id_kategori'];
    $id_divisi = $_POST['id_divisi'];
    $id_subdivisi = $_POST['id_subdivisi'];
    $a = $_POST['id_gender'];
    $id_gender = implode(",", $a);
    $ukuran_kaos_kaki_ue = $_POST['ukuran_kaos_kaki_ue'];
    $ukuran_kaos_kaki_size = $_POST['ukuran_kaos_kaki_size'];

    foreach ($ukuran_kaos_kaki_ue as $i => $a) {
        $con->query("INSERT INTO `tb_ukuran_kaos_kaki`(`id_merek`, `id_kategori`, `id_divisi`, `id_subdivisi`, `id_gender`, `ukuran_kaos_kaki_ue`, `ukuran_kaos_kaki_size`) VALUES ('$id_merek','$id_kategori','$id_divisi','$id_subdivisi','$id_gender','$ukuran_kaos_kaki_ue[$i]','$ukuran_kaos_kaki_size[$i]')");
    }
    echo "<script>
        window.location.href = 'ukuran_kaos_kaki.html';
    </script>";
}
?>

<script>
    $("#id_kategori").change(function() {
        var id_kategori = $('#id_kategori option:selected').val();
        console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_kaos_kaki/filter/data_divisi.php",
            data: {
                'kategori_id': id_kategori
            },
            success: function(response) {
                $('#id_divisi').html(response);
                $('#id_subdivisi').html("<option>-Pilih Subdivisi-</option>");
            }
        });
    })

    $("#id_divisi").change(function() {
        var id_divisi = $('#id_divisi option:selected').val();
        console.log(id_divisi);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_kaos_kaki/filter/data_subdivisi.php",
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
        console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_kaos_kaki/filter/data_divisi.php",
            data: {
                'kategori_id': id_kategori
            },
            success: function(response) {
                $('#id_divisi2').html(response);
                $('#id_subdivisi2').html("<option>-Pilih Subdivisi-</option>");
            }
        });
    })

    $("#id_divisi2").change(function() {
        var id_divisi = $('#id_divisi2 option:selected').val();
        console.log(id_divisi);
        $.ajax({
            type: "GET",
            url: "inc/ukuran_kaos_kaki/filter/data_subdivisi.php",
            data: {
                'divisi_id': id_divisi
            },
            success: function(response) {
                $('#id_subdivisi2').html(response);
            }
        });
    })

    var _banyakPilihanBarang = -1;
    $('#addRow').on('click', function() {
        _banyakPilihanBarang++;
        var html_row =
            `
            <div class="row" id='baris_${_banyakPilihanBarang}'>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>SIZE</label>
                        <input type="text" name="ukuran_kaos_kaki_size[]" id="uk" class="form-control">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>UE</label>
                        <input type="text" name="ukuran_kaos_kaki_ue[]" id="ue" class="form-control">
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>&nbsp;</label>
                        <button class='btn btn-danger form-control' type='button' onclick='hapusBaris(${_banyakPilihanBarang})'><i class='fa fa-trash'></i></button>
                    </div>
                </div>
            </div>
            `;
        $('#formInput').append(html_row)
    })

    function hapusBaris(no) {
        document.getElementById("baris_" + no).innerHTML = "";
    }

    function tampil() {
        $('#dataUkuran').modal()
    }

    function simpan() {

        var id_merek = $('#id_merek').val()
        var id_kategori = $('#id_kategori2').val()
        var id_divisi = $('#id_divisi2').val()
        var id_subdivisi = $('#id_subdivisi2').val()
        var ukuran_kaos_kaki_ue = $('#ukuran_kaos_kaki_ue').val()
        var ukuran_kaos_kaki_size = $('#ukuran_kaos_kaki_size').val()
        var id_gender = new Array();
        $('input[name="id_gender2"]:checked').each(function() {
            id_gender.push(this.value);
        });

        var ukuran_kaos_kaki_id = $('#ukuran_kaos_kaki_id').val()
        axios.post('inc/ukuran_kaos_kaki/aksi_simpan_ukuran_kaos_kaki.php', {
            'id_merek': id_merek,
            'id_kategori': id_kategori,
            'id_divisi': id_divisi,
            'id_subdivisi': id_subdivisi,
            'ukuran_kaos_kaki_ue': ukuran_kaos_kaki_ue,
            'ukuran_kaos_kaki_size': ukuran_kaos_kaki_size,
            'id_gender': id_gender,
            'ukuran_kaos_kaki_id': ukuran_kaos_kaki_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataUkuranEdit').modal('hide')
            $('#isi').load('inc/ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
            kosong()
        })
    }

    function edit(id) {
        var edit = null;
        axios.post('inc/ukuran_kaos_kaki/aksi_edit_ukuran_kaos_kaki.php', {
            'ukuran_kaos_kaki_id': id
        }).then(function(res) {
            edit = res.data
            $('#ukuran_kaos_kaki_id').val(edit.ukuran_kaos_kaki_id)
            $('#id_merek').val(edit.id_merek).change()
            $('#ukuran_kaos_kaki_ue').val(edit.ukuran_kaos_kaki_ue)
            $('#ukuran_kaos_kaki_size').val(edit.ukuran_kaos_kaki_size)
            var a = edit.id_gender;
            var cek = a.split(",");
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
            $('#id_kategori2').val(edit.id_kategori).change()
            return axios.get('inc/ukuran_kaos_kaki/filter/data_divisi.php?kategori_id=' + edit.id_kategori)
        }).then(function(res) {
            $('#id_divisi2').html(res.data);
            $('#id_divisi2').val(edit.id_divisi).change();
            return axios.get('inc/ukuran_kaos_kaki/filter/data_subdivisi.php?divisi_id=' + edit.id_divisi)
        }).then(function(res) {
            $('#id_subdivisi2').html(res.data);
            $('#id_subdivisi2').val(edit.id_subdivisi).change()
            $('#dataUkuranEdit').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/ukuran_kaos_kaki/aksi_hapus_ukuran_kaos_kaki.php', {
            'ukuran_kaos_kaki_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
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

    $('#isi').load('inc/ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
</script>
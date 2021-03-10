<div class="page-title">
    <div class="title_left">
        <h3>Data Ukuran Kaos Kaki</h3>
    </div>
    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2">
                            <option value="">-Merek-</option>
                            <?php
                            $merek = $con->select('tb_merk', '*');
                            foreach ($merek as $merk) {
                            ?>
                                <option value="<?= $merk['merk_id'] ?>"><?= $merk['merk_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2">
                            <option value="">-Kategori-</option>
                            <?php
                            $kategori = $con->select('tb_kategori', '*');
                            foreach ($kategori as $kategori) {
                            ?>
                                <option value="<?= $kategori['kategori_id'] ?>"><?= $kategori['kategori_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2">
                            <option value="">-Divisi-</option>
                            <?php
                            $divisi = $con->select('tb_divisi', '*');
                            foreach ($divisi as $divisi) {
                            ?>
                                <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Sub Divisi</label>
                        <select name="subdivisi" id="subdivisi" class="form-control select2">
                            <option value="">-Sub Divisi-</option>
                            <?php
                            $subdivisi = $con->select('tb_subdivisi', '*');
                            foreach ($subdivisi as $subdivisi) {
                            ?>
                                <option value="<?= $subdivisi['subdivisi_id'] ?>"><?= $subdivisi['subdivisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option value="">-Gender-</option>
                            <?php
                            $gender = $con->select('tb_gender', '*');
                            foreach ($gender as $gender) {
                            ?>
                                <option value="<?= $gender['gender_id'] ?>"><?= $gender['gender_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
                <a href="format/Ukuran_Kaos_Kaki.csv" data-toggle="tooltip" title="Format Stok Ukuran" class="btn btn-success btn-round"><i class="fa fa-download"></i></a>
                <button type="button" onclick="shows()" data-toggle="tooltip" title="Upload Data Ukuran Sepatu" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button>
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
                    <th>Kategori/Divisi/Subdivisi</th>
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
                                    <label>Subdivisi</label>
                                    <select name="id_subdivisi" id="id_subdivisi" class="form-group select2" style="width: 100%;">
                                        <option value="">-Pilih Subdivisi-</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Ukuran Default</label>
                                    <select name="ukuran_default" id="ukuran_default" class="form-control select2">
                                        <option value="">-Pilih-</option>
                                        <option value="EU">EU</option>
                                        <option value="Size">Size</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
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
                                <label>Subdivisi</label>
                                <select name="id_subdivisi" id="id_subdivisi2" class="form-group select2" style="width: 100%;">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label>Ukuran Default</label>
                                <select name="ukuran_default" id="ukuran_default2" class="form-control select2">
                                    <option value="">-Pilih-</option>
                                    <option value="EU">EU</option>
                                    <option value="Size">Size</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
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

<!-- modal export csv ukuran -->
<div class="modal" id="uploadCsv">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/data_ukuran_kaos_kaki/upload_csv.php" method="POST" enctype="multipart/form-data">
                    <label for="my-input">Upload Data Ukuran Kaos Kaki</label>
                    <div class="form-inline">
                        <input id="my-input" class="form-inline" type="file" name="upload_barang">
                        <button type="submit" name="upload" class="btn btn-primary btn-round">Upload</button>
                    </div>
                </form>
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
    $ukuran_default = $_POST['ukuran_default'];
    $a = $_POST['id_gender'];
    $id_gender = implode(",", $a);
    $kaos_kaki_eu = $_POST['ukuran_kaos_kaki_ue'];
    $kaos_kaki_size = $_POST['ukuran_kaos_kaki_size'];

    foreach ($kaos_kaki_eu as $i => $a) {
        $con->query("INSERT INTO `tb_ukuran` (`ukuran_kategori`, `gender_id`, `merk_id`, `kategori_id`, `divisi_id`, `subdivisi_id`,`ukuran_default`, `kaos_kaki_eu`, `kaos_kaki_size`) VALUES ('Kaos Kaki','$id_gender','$id_merek','$id_kategori','$id_divisi','$id_subdivisi','$ukuran_default','$kaos_kaki_eu[$i]','$kaos_kaki_size[$i]')");
    }

    echo "<script>
        window.location.href = 'data_ukuran_kaos_kaki.html';
    </script>";
}
?>

<script src="<?= $base_url ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>

<script>
    $("#id_kategori").change(function() {
        var id_kategori = $('#id_kategori option:selected').val();
        console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/data_ukuran_kaos_kaki/filter/data_divisi.php",
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
            url: "inc/data_ukuran_kaos_kaki/filter/data_subdivisi.php",
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
            url: "inc/data_ukuran_kaos_kaki/filter/data_divisi.php",
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
            url: "inc/data_ukuran_kaos_kaki/filter/data_subdivisi.php",
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

        var merk_id = $('#id_merek').val()
        var kategori_id = $('#id_kategori2').val()
        var divisi_id = $('#id_divisi2').val()
        var subdivisi_id = $('#id_subdivisi2').val()
        var kaos_kaki_eu = $('#ukuran_kaos_kaki_ue').val()
        var kaos_kaki_size = $('#ukuran_kaos_kaki_size').val()
        var ukuran_default = $('#ukuran_default2').val()
        var gender_id = new Array();
        $('input[name="id_gender2"]:checked').each(function() {
            gender_id.push(this.value);
        });
        var ukuran_id = $('#ukuran_kaos_kaki_id').val()
        axios.post('inc/data_ukuran_kaos_kaki/aksi_simpan_ukuran_kaos_kaki.php', {
            'merk_id': merk_id,
            'kategori_id': kategori_id,
            'divisi_id': divisi_id,
            'subdivisi_id': subdivisi_id,
            'kaos_kaki_eu': kaos_kaki_eu,
            'kaos_kaki_size': kaos_kaki_size,
            'gender_id': gender_id,
            'ukuran_default': ukuran_default,
            'ukuran_id': ukuran_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataUkuranEdit').modal('hide')
            $('#isi').load('inc/data_ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuran').modal('hide')
            $('#isi').load('inc/data_ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
            kosong()
        })
    }

    function edit(id) {
        var edit = null;
        axios.post('inc/data_ukuran_kaos_kaki/aksi_edit_ukuran_kaos_kaki.php', {
            'ukuran_id': id
        }).then(function(res) {
            edit = res.data
            console.log(edit)
            $('#ukuran_kaos_kaki_id').val(edit.ukuran_id)
            $('#id_merek').val(edit.merk_id).change()
            $('#ukuran_kaos_kaki_ue').val(edit.kaos_kaki_eu)
            $('#ukuran_kaos_kaki_size').val(edit.kaos_kaki_size)
            $('#ukuran_default2').val(edit.ukuran_default).change()
            var a = edit.gender_id;
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
            $('#id_kategori2').val(edit.kategori_id).change()
            return axios.get('inc/data_ukuran_kaos_kaki/filter/data_divisi.php?kategori_id=' + edit.kategori_id)
        }).then(function(res) {
            $('#id_divisi2').html(res.data);
            $('#id_divisi2').val(edit.divisi_id).change();
            return axios.get('inc/data_ukuran_kaos_kaki/filter/data_subdivisi.php?divisi_id=' + edit.divisi_id)
        }).then(function(res) {
            $('#id_subdivisi2').html(res.data);
            $('#id_subdivisi2').val(edit.subdivisi_id).change()
            $('#dataUkuranEdit').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/data_ukuran_kaos_kaki/aksi_hapus_ukuran_kaos_kaki.php', {
                'ukuran_id': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/data_ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
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

    function shows() {
        $('#uploadCsv').modal()
    }

    $('#merek').change(function(e) {
        e.preventDefault()
        var merek = $(this).val()
        var kategori = $("#kategori").val()
        var divisi = $("#divisi").val()
        var subdivisi = $("#subdivisi").val()
        var gender = $("#gender").val()
        axios.post('inc/data_ukuran_kaos_kaki/filter/searching.php', {
            'merek': merek,
            'kategori': kategori,
            'divisi': divisi,
            'subdivisi': subdivisi,
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#kategori').change(function(e) {
        e.preventDefault()
        var kategori = $(this).val()
        var merek = $("#merek").val()
        var divisi = $("#divisi").val()
        var subdivisi = $("#subdivisi").val()
        var gender = $("#gender").val()
        axios.post('inc/data_ukuran_kaos_kaki/filter/searching.php', {
            'merek': merek,
            'kategori': kategori,
            'divisi': divisi,
            'subdivisi': subdivisi,
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#divisi').change(function(e) {
        e.preventDefault()
        var divisi = $(this).val()
        var merek = $("#merek").val()
        var kategori = $("#kategori").val()
        var subdivisi = $("#subdivisi").val()
        var gender = $("#gender").val()
        axios.post('inc/data_ukuran_kaos_kaki/filter/searching.php', {
            'merek': merek,
            'kategori': kategori,
            'divisi': divisi,
            'subdivisi': subdivisi,
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#subdivisi').change(function(e) {
        e.preventDefault()
        var subdivisi = $(this).val()
        var merek = $("#merek").val()
        var kategori = $("#kategori").val()
        var divisi = $("#divisi").val()
        var gender = $("#gender").val()
        axios.post('inc/data_ukuran_kaos_kaki/filter/searching.php', {
            'merek': merek,
            'kategori': kategori,
            'divisi': divisi,
            'subdivisi': subdivisi,
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#gender').change(function(e) {
        e.preventDefault()
        var gender = $(this).val()
        var merek = $("#merek").val()
        var kategori = $("#kategori").val()
        var divisi = $("#divisi").val()
        var subdivisi = $("#subdivisi").val()
        axios.post('inc/data_ukuran_kaos_kaki/filter/searching.php', {
            'merek': merek,
            'kategori': kategori,
            'divisi': divisi,
            'subdivisi': subdivisi,
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#isi').load('inc/data_ukuran_kaos_kaki/data_ukuran_kaos_kaki.php');
</script>
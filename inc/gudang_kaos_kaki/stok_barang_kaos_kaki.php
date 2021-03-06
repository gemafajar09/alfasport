<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Gudang Kaos Kaki</h3>
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
                <a href="entry_gudang_kaos_kaki.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
                <a href="format/data_gudang_kaos_kaki.csv" data-toggle="tooltip" title="Format Stok Barang" class="btn btn-success btn-round"><i class="fa fa-download"></i></a>
                <a href="format/ukuran_kaos_kaki.csv" data-toggle="tooltip" title="Format Stok Ukuran" class="btn btn-success btn-round"><i class="fa fa-download"></i></a>
                <button type="button" onclick="shows()" data-toggle="tooltip" title="Upload Stok Barang" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button>
                <button type="button" onclick="showss()" data-toggle="tooltip" title="Upload Stok Ukuran" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button>
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-right panel_toolbox">
                    <li><button type="button" onclick="format_excel()" data-toggle="tooltip" title="Upload Format Excel" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Divsi</th>
                    <th>Sub Divisi</th>
                    <th>Gender</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th class="text-center" style="width:180px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<div class="modal" id="uploadCsv">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/gudang_kaos_kaki/upload_csv_kaos_kaki.php" method="POST" enctype="multipart/form-data">
                    <label for="my-input">Upload File Barang</label>
                    <div class="form-inline">
                        <input id="my-input" class="form-inline" type="file" name="upload_barang">
                        <button type="submit" name="upload" class="btn btn-primary btn-round">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="uploadCsvUkuran">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/gudang_kaos_kaki/upload_ukuran_barang_kaos_kaki.php" method="POST" enctype="multipart/form-data">
                    <label for="my-input">Upload File Barang</label>
                    <div class="form-inline">
                        <input id="my-input" class="form-inline" type="file" name="upload_ukuran">
                        <button type="submit" name="upload" class="btn btn-primary btn-round">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="upload_excel">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/gudang_kaos_kaki/upload_template.php" method="POST" enctype="multipart/form-data">
                    <label for="my-input">Upload File Excel</label>
                    <select name="kategoti" class="select2" style="width: 100%;" id="">
                        <option value="">SELECT</option>
                        <option value="1">Upload Nama Produk</option>
                        <option value="2">Upload Ukuran</option>
                    </select>
                    <div class="form-inline">
                        <input id="my-input" class="form-inline" type="file" name="template">
                        <button type="submit" name="upload" class="btn btn-primary btn-round">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Detail Barang Gudang</h4>
                <hr>
                <div id="detail"></div>
            </div>
        </div>
    </div>
</div>



<!-- modal edit -->
<div class="modal" id="dataGudangKaosKakiEdit">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Gudang</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>ID Barang</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_kode" class="form-control" readonly>
                                <input type="hidden" id="gudang_kaos_kaki_id">
                            </div>
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input type="number" required="required" id="gudang_kaos_kaki_modal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <select id="id_merek" class="form-control select2" style="width: 100%;">
                                    <option>-Pilih Merk-</option>
                                    <?php
                                    $data = $con->select("tb_merk", "*");
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <option value="<?php echo $a['merk_id'] ?>"><?php echo $a['merk_nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="id_kategori" required id="id_kategori" class="form-control select2" style="width: 100%;">
                                    <option value="">-Pilih Kategori-</option>
                                    <?php
                                    $kategori = $con->select('tb_kategori', '*');
                                    foreach ($kategori as $b) {
                                    ?>
                                        <option value="<?= $b['kategori_id'] ?>"><?= $b['kategori_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Thumbnail</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_thumbnail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 3</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_foto3" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Artikel Barang</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_artikel" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" required="required" id="gudang_kaos_kaki_jual" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select id="id_gender" class="form-control select2" style="width: 100%;">
                                    <option>-Pilih Gender-</option>
                                    <?php
                                    $data = $con->select("tb_gender", "*");
                                    foreach ($data as $i => $a) {
                                    ?>
                                        <option value="<?php echo $a['gender_id'] ?>"><?php echo $a['gender_nama'] ?></option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Divisi</label>
                                <select required name="id_divisi" id="id_divisi" class="form-control select2" style="width: 100%;">
                                    <option value="">-Pilih Divisi-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto 1</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_foto1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 4</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_foto4" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Berat</label>
                                <input type="number" required="required" id="gudang_kaos_kaki_berat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" required="required" id="gudang_kaos_kaki_tgl" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Subdivisi</label>
                                <select name="id_subdivisi" id="id_subdivisi" class="form-control select2" required style="width: 100%;">
                                    <option value="">-Pilih Subdivisi-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto 2</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_foto2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 5</label>
                                <input type="text" required="required" id="gudang_kaos_kaki_foto5" class="form-control">
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
    $("#id_kategori").change(function() {
        var id_kategori = $('#id_kategori option:selected').val();
        $.ajax({
            type: "GET",
            url: "inc/gudang_kaos_kaki/filter/data_divisi.php",
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
        $.ajax({
            type: "GET",
            url: "inc/gudang_kaos_kaki/filter/data_subdivisi.php",
            data: {
                'divisi_id': id_divisi
            },
            success: function(response) {
                $('#id_subdivisi').html(response);
            }
        });
    })

    function shows() {
        $('#uploadCsv').modal()
    }

    function showss() {
        $('#uploadCsvUkuran').modal()
    }

    function format_excel() {
        $('#upload_excel').modal()
    }

    // function size(id) {
    //     $('#idgudang').val(id)
    //     $('#dataUkuran').modal()
    // }

    function show(gudang_kaos_kaki_id) {
        axios.post('inc/gudang_kaos_kaki/show_detail_kaos_kaki.php', {
            'gudang_kaos_kaki_id': gudang_kaos_kaki_id
        }).then(function(res) {
            var data = res.data
            $('#detail').html(data)
        }).catch(function(err) {
            console.log(err)
        })
        $('#dataDetail').modal()
    }

    function tampil() {
        $('#dataGudang').modal()
    }

    // edit data
    function edit(gudang_kaos_kaki_id) {
        var edit = null;
        axios.post('inc/gudang_kaos_kaki/aksi_edit_data_gudang_kaos_kaki.php', {
            'gudang_kaos_kaki_id': gudang_kaos_kaki_id
        }).then(function(res) {
            edit = res.data;
            $('#gudang_kaos_kaki_id').val(edit.gudang_kaos_kaki_id);
            $('#gudang_kaos_kaki_kode').val(edit.gudang_kaos_kaki_kode);
            $('#gudang_kaos_kaki_artikel').val(edit.gudang_kaos_kaki_artikel);
            $('#gudang_kaos_kaki_nama').val(edit.gudang_kaos_kaki_nama);
            $('#id_merek').val(edit.id_merek).trigger('change');
            $('#gudang_kaos_kaki_modal').val(edit.gudang_kaos_kaki_modal);
            $('#gudang_kaos_kaki_jual').val(edit.gudang_kaos_kaki_jual);
            $('#id_gender').val(edit.id_gender).trigger('change');
            $('#gudang_kaos_kaki_tgl').val(edit.gudang_kaos_kaki_tgl);
            $('#gudang_kaos_kaki_thumbnail').val(edit.gudang_kaos_kaki_thumbnail);
            $('#gudang_kaos_kaki_foto1').val(edit.gudang_kaos_kaki_foto1);
            $('#gudang_kaos_kaki_foto2').val(edit.gudang_kaos_kaki_foto2);
            $('#gudang_kaos_kaki_foto3').val(edit.gudang_kaos_kaki_foto3);
            $('#gudang_kaos_kaki_foto4').val(edit.gudang_kaos_kaki_foto4);
            $('#gudang_kaos_kaki_foto5').val(edit.gudang_kaos_kaki_foto5);
            $('#gudang_kaos_kaki_berat').val(edit.gudang_kaos_kaki_berat);
            $('#id_kategori').val(edit.id_kategori).change();
            return axios.get('inc/gudang_kaos_kaki/filter/data_divisi.php?kategori_id=' + edit.id_kategori)
        }).then(function(res) {
            $('#id_divisi').html(res.data);
            $('#id_divisi').val(edit.id_divisi).change();
            return axios.get('inc/gudang_kaos_kaki/filter/data_subdivisi.php?divisi_id=' + edit.id_divisi)
        }).then(function(res) {
            $('#id_subdivisi').html(res.data);
            $('#id_subdivisi').val(edit.id_subdivisi).change();
            $('#dataGudangKaosKakiEdit').modal();
        })

    }

    function simpan() {
        var gudang_kaos_kaki_id = $('#gudang_kaos_kaki_id').val()
        var gudang_kaos_kaki_artikel = $('#gudang_kaos_kaki_artikel').val()
        var gudang_kaos_kaki_nama = $('#gudang_kaos_kaki_nama').val()
        var gudang_kaos_kaki_modal = $('#gudang_kaos_kaki_modal').val()
        var gudang_kaos_kaki_jual = $('#gudang_kaos_kaki_jual').val()
        var id_merek = $('#id_merek').val()
        var id_gender = $('#id_gender').val()
        var id_kategori = $('#id_kategori').val()
        var id_divisi = $('#id_divisi').val()
        var id_subdivisi = $('#id_subdivisi').val()
        var gudang_kaos_kaki_tgl = $('#gudang_kaos_kaki_tgl').val()
        var gudang_kaos_kaki_thumbnail = $('#gudang_kaos_kaki_thumbnail').val()
        var gudang_kaos_kaki_foto1 = $('#gudang_kaos_kaki_foto1').val()
        var gudang_kaos_kaki_foto2 = $('#gudang_kaos_kaki_foto2').val()
        var gudang_kaos_kaki_foto3 = $('#gudang_kaos_kaki_foto3').val()
        var gudang_kaos_kaki_foto4 = $('#gudang_kaos_kaki_foto4').val()
        var gudang_kaos_kaki_foto5 = $('#gudang_kaos_kaki_foto5').val()
        var gudang_kaos_kaki_berat = $('#gudang_kaos_kaki_berat').val()
        var gudang_kaos_kaki_kode = $('#gudang_kaos_kaki_kode').val()
        axios.post('inc/gudang_kaos_kaki/aksi_simpan_hasil_edit_data_gudang_kaos_kaki.php', {
            'gudang_kaos_kaki_id': gudang_kaos_kaki_id,
            'gudang_kaos_kaki_artikel': gudang_kaos_kaki_artikel,
            'gudang_kaos_kaki_nama': gudang_kaos_kaki_nama,
            'id_merek': id_merek,
            'gudang_kaos_kaki_modal': gudang_kaos_kaki_modal,
            'gudang_kaos_kaki_jual': gudang_kaos_kaki_jual,
            'id_gender': id_gender,
            'id_kategori': id_kategori,
            'id_divisi': id_divisi,
            'id_subdivisi': id_subdivisi,
            'gudang_kaos_kaki_kode': gudang_kaos_kaki_kode,
            'gudang_kaos_kaki_tgl': gudang_kaos_kaki_tgl,
            'gudang_kaos_kaki_thumbnail': gudang_kaos_kaki_thumbnail,
            'gudang_kaos_kaki_foto1': gudang_kaos_kaki_foto1,
            'gudang_kaos_kaki_foto2': gudang_kaos_kaki_foto2,
            'gudang_kaos_kaki_foto3': gudang_kaos_kaki_foto3,
            'gudang_kaos_kaki_foto4': gudang_kaos_kaki_foto4,
            'gudang_kaos_kaki_foto5': gudang_kaos_kaki_foto5,
            'gudang_kaos_kaki_berat': gudang_kaos_kaki_berat,
        }).then(function(res) {
            // var id = res.data
            // kosong()
            // size(id.id_gudang)
            // toastr.info('SUCCESS..')
            // $('#dataGudangEdit').modal('hide')
            // $('#isi').load('inc/gudang_kaos_kaki/data_stok.php');
            window.location = 'input-stok-kaos-kaki-' + gudang_kaos_kaki_kode + '-' + gudang_kaos_kaki_artikel + '-' + id_merek + '-' + id_kategori + '.html'
        }).catch(function(err) {
            console.log(err)
            kosong()
            toastr.warning('ERROR..')
            $('#dataGudangEdit').modal('hide')
            $('#isi').load('inc/gudang_kaos_kaki/data_stok.php');
        })
    }

    function hapus(gudang_kaos_kaki_kode) {
        axios.post('inc/gudang_kaos_kaki/aksi_hapus_gudang_kaos_kaki.php', {
            'gudang_kaos_kaki_kode': gudang_kaos_kaki_kode
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/gudang_kaos_kaki/data_stok_kaos_kaki.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }

    function kosong1() {
        $('#ue').val('')
        $('#us').val('')
        $('#uk').val('')
        $('#cm').val('')
        $('#idgudang').val('')
    }

    function kosong() {
        $('#gudang_id').val()
        $('#gudang_artikel').val()
        $('#gudang_nama').val()
        $('#gudang_modal').val()
        $('#gudang_jual').val()
        $('#gudang_id_merek').val()
        $('#id_gender').val()
        $('#id_kategori').val()
        $('#id_divisi').val()
        $('#id_subdivisi').val()
        $('#gudang_tanggal').val()
        $('#gudang_thumbnail').val()
        $('#gudang_foto1').val()
        $('#gudang_foto2').val()
        $('#gudang_foto3').val()
        $('#gudang_foto4').val()
        $('#gudang_foto5').val()
        $('#gudang_berat').val()
        $('#gudang_id_gudang').val()
    }

    function clearData() {
        kosong()
        kosong1()
    }

    $('#merek').change(function(e) {
        e.preventDefault()
        var merek = $(this).val()
        axios.post('inc/gudang_kaos_kaki/filter/merek.php', {
            'merek': merek
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#kategori').change(function(e) {
        e.preventDefault()
        var kategori = $(this).val()
        axios.post('inc/gudang_kaos_kaki/filter/kategori.php', {
            'kategori': kategori
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#divisi').change(function(e) {
        e.preventDefault()
        var divisi = $(this).val()
        axios.post('inc/gudang_kaos_kaki/filter/divisi.php', {
            'divisi': divisi
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#subdivisi').change(function(e) {
        e.preventDefault()
        var subdivisi = $(this).val()
        axios.post('inc/gudang_kaos_kaki/filter/subdivisi.php', {
            'subdivisi': subdivisi
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#gender').change(function(e) {
        e.preventDefault()
        var gender = $(this).val()
        axios.post('inc/gudang_kaos_kaki/filter/gender.php', {
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $(document).ready(function() {
        $('#isi').load('inc/gudang_kaos_kaki/data_stok_kaos_kaki.php');
    })
</script>
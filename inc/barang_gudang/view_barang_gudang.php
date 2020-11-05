<div class="page-title">
    <div class="title_left">
        <h3>Data All Barang Gudang</h3>
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
                <a href="entry_barang_gudang.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
                <a href="format/data_barang.csv" data-toggle="tooltip" title="Format Stok Barang" class="btn btn-success btn-round"><i class="fa fa-download"></i></a>
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
                    <th>Kategori</th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Divisi</th>
                    <th>Subdivisi</th>
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
                <form action="inc/barang_gudang/upload_csv_kaos_kaki.php" method="POST" enctype="multipart/form-data">
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
                <form action="inc/barang_gudang/upload_ukuran_barang_kaos_kaki.php" method="POST" enctype="multipart/form-data">
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
                <form action="inc/barang_gudang/upload_template.php" method="POST" enctype="multipart/form-data">
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
                <input type="hidden" id="id_dari_tb_barang">
                <h4>Detail Barang Gudang</h4>
                <hr>
                <div id="detail"></div>
            </div>
        </div>
    </div>
</div>



<!-- modal edit -->
<div class="modal" id="dataGudangEdit">
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
                                <input type="text" required="required" id="barang_kode" class="form-control" readonly>
                                <input type="hidden" id="barang_id">
                            </div>
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input type="number" required="required" id="barang_modal" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Merk</label>
                                <select id="id_merek" class="form-control select2" style="width: 100%;" disabled>
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
                                <select name="id_kategori" required id="id_kategori" class="form-control select2" style="width: 100%;" disabled>
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
                                <input type="text" required="required" id="barang_thumbnail" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 3</label>
                                <input type="text" required="required" id="barang_foto3" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Artikel Barang</label>
                                <input type="text" required="required" id="barang_artikel" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" required="required" id="barang_jual" class="form-control">
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
                                <select required name="id_divisi" id="id_divisi" class="form-control select2" style="width: 100%;" disabled>
                                    <option value="">-Pilih Divisi-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto 1</label>
                                <input type="text" required="required" id="barang_foto1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 4</label>
                                <input type="text" required="required" id="barang_foto4" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" required="required" id="barang_nama" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Berat</label>
                                <input type="number" required="required" id="barang_berat" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" required="required" id="barang_tgl" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Subdivisi</label>
                                <select name="id_subdivisi" id="id_subdivisi" class="form-control select2" required style="width: 100%;" disabled>
                                    <option value="">-Pilih Subdivisi-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Foto 2</label>
                                <input type="text" required="required" id="barang_foto2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto 5</label>
                                <input type="text" required="required" id="barang_foto5" class="form-control">
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
            url: "inc/barang_gudang/filter/data_divisi.php",
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
            url: "inc/barang_gudang/filter/data_subdivisi.php",
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

    function detail(barang_id) {
        axios.post('inc/barang_gudang/show_detail_barang_gudang.php', {
            'barang_id': barang_id
        }).then(function(res) {
            var data = res.data
            $('#id_dari_tb_barang').val(barang_id)
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
    function edit(barang_id) {
        var edit = null;
        axios.post('inc/barang_gudang/aksi_edit_data_barang_gudang.php', {
            'barang_id': barang_id
        }).then(function(res) {
            edit = res.data;
            console.log(edit);
            $('#barang_id').val(edit.barang_id);
            $('#barang_kode').val(edit.barang_kode);
            $('#barang_artikel').val(edit.barang_artikel);
            $('#barang_nama').val(edit.barang_nama);
            $('#id_merek').val(edit.merk_id).trigger('change');
            $('#barang_modal').val(edit.barang_modal);
            $('#barang_jual').val(edit.barang_jual);
            $('#id_gender').val(edit.gender_id).trigger('change');
            $('#barang_tgl').val(edit.barang_tgl);
            $('#barang_thumbnail').val(edit.barang_thumbnail);
            $('#barang_foto1').val(edit.barang_foto1);
            $('#barang_foto2').val(edit.barang_foto2);
            $('#barang_foto3').val(edit.barang_foto3);
            $('#barang_foto4').val(edit.barang_foto4);
            $('#barang_foto5').val(edit.barang_foto5);
            $('#barang_berat').val(edit.barang_berat);
            $('#id_kategori').val(edit.kategori_id).change();
            return axios.get('inc/barang_gudang/filter/data_divisi.php?kategori_id=' + edit.kategori_id)
        }).then(function(res) {
            $('#id_divisi').html(res.data);
            $('#id_divisi').val(edit.divisi_id).change();
            return axios.get('inc/barang_gudang/filter/data_subdivisi.php?divisi_id=' + edit.divisi_id)
        }).then(function(res) {
            $('#id_subdivisi').html(res.data);
            $('#id_subdivisi').val(edit.subdivisi_id).change();
            $('#dataGudangEdit').modal();
        })
    }

    function simpan() {
        var barang_id = $('#barang_id').val()
        var barang_artikel = $('#barang_artikel').val()
        var barang_nama = $('#barang_nama').val()
        var barang_modal = $('#barang_modal').val()
        var barang_jual = $('#barang_jual').val()
        var barang_berat = $('#barang_berat').val()
        var gender_id = $('#id_gender').val()
        var barang_thumbnail = $('#barang_thumbnail').val()
        var barang_foto1 = $('#barang_foto1').val()
        var barang_foto2 = $('#barang_foto2').val()
        var barang_foto3 = $('#barang_foto3').val()
        var barang_foto4 = $('#barang_foto4').val()
        var barang_foto5 = $('#barang_foto5').val()

        var merk_id = $('#id_merek').val()
        var kategori_id = $('#id_kategori').val()
        var divisi_id = $('#id_divisi').val()
        var subdivisi_id = $('#id_subdivisi').val()
        var barang_kode = $('#barang_kode').val()
        var barang_tgl = $('#barang_tgl').val()
        axios.post('inc/barang_gudang/aksi_simpan_hasil_edit_data_barang_gudang.php', {
            'barang_id': barang_id,
            'barang_artikel': barang_artikel,
            'barang_nama': barang_nama,
            'barang_modal': barang_modal,
            'barang_jual': barang_jual,
            'gender_id': gender_id,
            'barang_thumbnail': barang_thumbnail,
            'barang_foto1': barang_foto1,
            'barang_foto2': barang_foto2,
            'barang_foto3': barang_foto3,
            'barang_foto4': barang_foto4,
            'barang_foto5': barang_foto5,
            'barang_berat': barang_berat,
        }).then(function(res) {
            window.location = 'entry-stok-barang-gudang-' + barang_kode + '-' + merk_id + '-' + subdivisi_id + '.html';
        }).catch(function(err) {
            console.log(err)
            kosong()
            toastr.warning('ERROR..')
            $('#dataGudangEdit').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
        })
    }

    function hapus(barang_id) {
        axios.post('inc/barang_gudang/aksi_hapus_barang_gudang.php', {
            'barang_id': barang_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..');
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
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
        axios.post('inc/barang_gudang/filter/merek.php', {
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
        axios.post('inc/barang_gudang/filter/kategori.php', {
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
        axios.post('inc/barang_gudang/filter/divisi.php', {
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
        axios.post('inc/barang_gudang/filter/subdivisi.php', {
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
        axios.post('inc/barang_gudang/filter/gender.php', {
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $(document).ready(function() {
        $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
    })
</script>
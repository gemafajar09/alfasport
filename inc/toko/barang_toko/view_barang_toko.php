<div class="page-title">
    <div class="title_left">
        <h3>All Data Barang Toko</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <!-- <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Toko</label>
                        <select name="tokos" id="tokos" class="form-control select2">
                            <option value="">ALL</option>
                            <?php
                            $data = $con->select('toko', '*');
                            foreach ($data as $a) {
                            ?>
                                <option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div> -->
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
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Jenis</th>
                    <th>Barcode</th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Divisi</th>
                    <th>Sub Divisi</th>
                    <th>Gender</th>
                    <th>Jumlah</th>
                    <th>Modal</th>
                    <th>Jual</th>
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal tambah -->
<div class="modal" id="dataToko">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Transfer Ke Toko</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Nama Toko</label><br>
                                <select name="id_toko" id="id_toko" style="width:100%" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <?php
                                    $data = $con->query("SELECT * FROM toko WHERE nama_toko != 'Gudang'")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($data as $a) {
                                    ?>
                                        <option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Jenis Barang</label><br>
                                <select name="barang_kategori" id="barang_kategori" style="width:100%" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <option value="Sepatu">Sepatu</option>
                                    <option value="Kaos Kaki">Kaos Kaki</option>
                                    <option value="Barang Lainnya">Barang Lainnya</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Barang Gudang</label><br>
                                <select name="barang_detail_id" style="width:100%" id="barang_detail_id" class="form-control select2">
                                    <option value="">-Pilih Barang-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Stok</label><br>
                                    <input type="text" readonly name="barang_detail_jml" id="barang_detail_jml" class="form-control">
                                    <input type="hidden" id="ukuran_id">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jumlah</label><br>
                                    <input type="text" onkeyup="cekStok(this)" name="barang_toko_jml" id="barang_toko_jml" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary btn-sm" data-dismiss="modal">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<!-- modal detail -->
<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container" id="tampilkan">

                </div>
            </div>
        </div>
    </div>
</div>


<script>
    function tampil() {
        $('#id_toko').focus()
        $('#dataToko').modal()
    }

    // cari kategori barang
    $('#barang_kategori').change(function(e) {
        e.preventDefault();
        var barang_kategori = $(this).val();
        axios.post('inc/toko/barang_toko/cari_jenis_barang.php', {
            'barang_kategori': barang_kategori
        }).then(function(res) {
            var data = res.data
            $('#barang_detail_id').html(res.data);
            $('#barang_detail_jml').val('')
            $('#ukuran_id').val('')
        })
    })
    // cari stok tersedia
    $('#barang_detail_id').change(function(e) {
        e.preventDefault();
        var barang_detail_id = $(this).val()
        axios.post('inc/toko/barang_toko/cek_stok_barang.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            var data = res.data
            $('#barang_detail_jml').val(data.barang_detail_jml)
            $('#ukuran_id').val(data.ukuran_id)
        })
    })

    function cekStok(nilai) {
        var jumlah = parseInt(nilai.value)
        var sisa = $('#barang_detail_jml').val()
        if (sisa < jumlah) {
            alert('Stok Tidak Memadai')
            $('#barang_toko_jml').val('')
        } else {
            console.log('aman')
        }
    }


    function simpan() {
        var id_toko = $('#id_toko').val()
        var barang_detail_id = $('#barang_detail_id').val()
        var barang_detail_jml = $('#barang_detail_jml').val()
        var barang_toko_jml = $('#barang_toko_jml').val()
        var ukuran_id = $('#ukuran_id').val()
        axios.post('inc/toko/barang_toko/simpan_stok_barang_toko.php', {
            'id_toko': id_toko,
            'barang_detail_id': barang_detail_id,
            'barang_detail_jml': barang_detail_jml,
            'barang_toko_jml': barang_toko_jml,
            'ukuran_id': ukuran_id
        }).then(function(res) {
            kosong()
            $('#isi').load('inc/toko/barang_toko/data_stok_barang_toko.php');
            $('#dataToko').modal('hide')
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#isi').load('inc/toko/barang_toko/data_stok_barang_toko.php');
            $('#dataToko').modal('hide')
        })
    }

    function detail(barang_toko_id) {
        axios.post('inc/toko/barang_toko/show_detail_barang_toko.php', {
            'barang_toko_id': barang_toko_id
        }).then(function(res) {
            var data = res.data;
            $('#tampilkan').html(data)
            $('#dataDetail').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }


    function edit(id) {
        axios.post('inc/toko/toko_gudang/edit_Stok_toko.php', {
            'id': id
        }).then(function(res) {
            var data = res.data
            $('#toko').val(data.id_toko)
            $('#gudang').val(data.id_gudang)
            $('#jumlah').val(data.jumlah)
            $('#id_stok_toko').val(data.id_stok_toko)
            $('#dataToko').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(barang_toko_id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/toko/barang_toko/hapus_stok_barang_toko.php', {
                'barang_toko_id': barang_toko_id
            }).then(function(res) {
                var data = res.data
                $('#isi').load('inc/toko/barang_toko/data_stok_barang_toko.php');
            })
        }
    }

    function kosong() {
        $('#id_toko').val('').change();
        $('#barang_kategori').val('').change();
        $('#barang_detail_id').val('');
        $('#barang_detail_jml').val('');
        $('#barang_toko_jml').val('');
        $('#ukuran_id').val('');
    }

    $('#merek').change(function(e) {
        e.preventDefault()
        var merek = $(this).val()
        var kategori = $("#kategori").val()
        var divisi = $("#divisi").val()
        var subdivisi = $("#subdivisi").val()
        var gender = $("#gender").val()
        axios.post('inc/toko/barang_toko/filter/searching.php', {
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
        axios.post('inc/toko/barang_toko/filter/searching.php', {
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
        axios.post('inc/toko/barang_toko/filter/searching.php', {
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
        axios.post('inc/toko/barang_toko/filter/searching.php', {
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
        axios.post('inc/toko/barang_toko/filter/searching.php', {
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


    $('#isi').load('inc/toko/barang_toko/data_stok_barang_toko.php');
</script>
<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Toko Lainnya</h3>
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
                    <th>Barcode</th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Ukuran</th>
                    <th>Kategori</th>
                    <th>Divsi</th>
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

<!-- The Modal -->
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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Nama Toko</label><br>
                                <select name="id_toko" id="id_toko" style="width:100%" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <?php
                                    $data = $con->query("SELECT * FROM toko WHERE id_toko != 0")->fetchAll(PDO::FETCH_ASSOC);
                                    foreach ($data as $a) {
                                    ?>
                                        <option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Barang Gudang Kaos Kaki</label><br>
                                <select name="gudang_lainnya_detail_id" style="width:100%" id="gudang_lainnya_detail_id" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <?php
                                    $data = $con->query("SELECT
                                                            tb_ukuran_barang_detail.ukuran_barang_detail_nama,
                                                            tb_gudang_lainnya_detail.gudang_lainnya_detail_id,
                                                            tb_gudang_lainnya.gudang_lainnya_nama,
                                                            tb_gudang_lainnya.gudang_lainnya_artikel,
                                                            tb_gudang_lainnya_detail.gudang_lainnya_detail_barcode
                                                        From
                                                            tb_gudang_lainnya_detail Inner Join
                                                            tb_ukuran_barang_detail On tb_ukuran_barang_detail.ukuran_barang_detail_id =
                                                                    tb_gudang_lainnya_detail.ukuran_barang_detail_id Inner Join
                                                            tb_gudang_lainnya On tb_gudang_lainnya.gudang_lainnya_kode =
                                                                    tb_gudang_lainnya_detail.gudang_lainnya_kode")->fetchAll();
                                    foreach ($data as $a) {
                                    ?>
                                        <option value="<?= $a['gudang_lainnya_detail_id'] ?>"><?= $a['gudang_lainnya_nama']  ?> - <?= $a['gudang_lainnya_artikel']  ?> - <?= $a['gudang_lainnya_detail_barcode']  ?> - (Ukuran : <?= $a['ukuran_barang_detail_nama'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mx-auto">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Stok</label><br>
                                    <input type="text" readonly name="gudang_lainnya_detail_jumlah" id="gudang_lainnya_detail_jumlah" class="form-control">
                                    <input type="hidden" id="ukuran_barang_detail_id">
                                </div>
                                <div class="col-md-6">
                                    <label for="">Jumlah</label><br>
                                    <input type="text" onkeyup="cekStok(this)" name="stok_toko_lainnya_jumlah" id="stok_toko_lainnya_jumlah" class="form-control">
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

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <b>Tanggal Masuk : <i id="tanggal1"></i></b>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama Toko</th>
                                <th>Artikel</th>
                                <th>Nama</th>
                                <th>Merek</th>
                                <th>Kategori</th>
                                <th>Divisi</th>
                                <th>Sub Divisi</th>
                                <th>Gender</th>
                                <th>Jumlah</th>
                                <th colspan=2>
                                    <center>Harga</center>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="10"></th>
                                <th>Modal</th>
                                <th>Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b id="id1"></b></td>
                                <td><b id="nama_toko1"></b></td>
                                <td><b id="artikel1"></b></td>
                                <td><b id="nama1"></b></td>
                                <td><b id="merek1"></b></td>
                                <td><b id="kategori1"></b></td>
                                <td><b id="divisi1"></b></td>
                                <td><b id="subdivisi1"></b></td>
                                <td><b id="gender1"></b></td>
                                <td><b id="jumlah1"></b></td>
                                <td><b id="modal1"></b></td>
                                <td><b id="jual1"></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-2 mx-auto">
                            <center>Ukuran</center>
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>SIZE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b id="sizes"></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
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

    function cekStok(nilai) {
        var jumlah = parseInt(nilai.value)
        var sisa = $('#gudang_lainnya_detail_jumlah').val()
        if (sisa < jumlah) {
            alert('Stok Tidak Memadai')
            $('#stok_toko_lainnya_jumlah').val('')
        } else {
            console.log('aman')
        }
    }

    $('#gudang_lainnya_detail_id').change(function(e) {
        e.preventDefault();
        var gudang_lainnya_detail_id = $(this).val()
        axios.post('inc/toko/toko_gudang_lainnya/cek_stok_lainnya.php', {
            'gudang_lainnya_detail_id': gudang_lainnya_detail_id
        }).then(function(res) {
            var data = res.data
            $('#gudang_lainnya_detail_jumlah').val(data.gudang_lainnya_detail_jumlah)
            $('#ukuran_barang_detail_id').val(data.ukuran_barang_detail_id)
        })
    })

    function simpan() {
        var id_toko = $('#id_toko').val()
        var gudang_lainnya_detail_id = $('#gudang_lainnya_detail_id').val()
        var ukuran_barang_detail_id = $('#ukuran_barang_detail_id').val()
        var gudang_lainnya_detail_jumlah = $('#gudang_lainnya_detail_jumlah').val()
        var stok_toko_lainnya_jumlah = $('#stok_toko_lainnya_jumlah').val()
        axios.post('inc/toko/toko_gudang_lainnya/simpan_stok_toko_lainnya.php', {
            'id_toko': id_toko,
            'gudang_lainnya_detail_id': gudang_lainnya_detail_id,
            'ukuran_barang_detail_id': ukuran_barang_detail_id,
            'gudang_lainnya_detail_jumlah': gudang_lainnya_detail_jumlah,
            'stok_toko_lainnya_jumlah': stok_toko_lainnya_jumlah
        }).then(function(res) {
            kosong()
            $('#isi').load('inc/toko/toko_gudang_lainnya/data_stok_lainnya.php');
            $('#dataToko').modal('hide')
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#isi').load('inc/toko/toko_gudang_lainnya/data_stok_lainnya.php');
            $('#dataToko').modal('hide')
        })
    }

    function show(stok_toko_lainnya_id) {
        axios.post('inc/toko/toko_gudang_lainnya/show_detail_lainnya.php', {
            'stok_toko_lainnya_id': stok_toko_lainnya_id
        }).then(function(res) {
            var data = res.data
            $('#sizes').html(data.ukuran_barang_detail_nama)

            $('#tanggal1').html(data.stok_toko_lainnya_tgl)
            $('#nama1').html(data.gudang_lainnya_nama)
            $('#nama_toko1').html(data.nama_toko)
            $('#id1').html(data.gudang_lainnya_kode)
            $('#artikel1').html(data.gudang_lainnya_artikel)
            $('#merek1').html(data.merk_nama)
            $('#gender1').html(data.gender_nama)
            $('#divisi1').html(data.divisi_nama)
            $('#subdivisi1').html(data.subdivisi_nama)
            $('#jumlah1').html(data.stok_toko_lainnya_jumlah)
            $('#modal1').html(data.gudang_lainnya_modal)
            $('#jual1').html(data.gudang_lainnya_jual)
            $('#kategori1').html(data.kategori_nama)
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

    function hapus(stok_toko_lainnya_id) {
        axios.post('inc/toko/toko_gudang_lainnya/hapus_stok_toko_lainnya.php', {
            'stok_toko_lainnya_id': stok_toko_lainnya_id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/toko/toko_gudang_lainnya/data_stok_lainnya.php');
        })
    }

    function kosong() {
        $('#id_toko').val('').change()
        $('#gudang_lainnya_detail_id').val('').change()
        $('#ukuran_barang_detail_id').val('')
        $('#gudang_lainnya_detail_jumlah').val('')
        $('#stok_toko_lainnya_jumlah').val('')
    }

    $('#merek').change(function(e) {
        e.preventDefault()
        var merek = $(this).val()
        axios.post('inc/toko/toko_gudang/filter/merek.php', {
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
        axios.post('inc/toko/toko_gudang/filter/kategori.php', {
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
        axios.post('inc/toko/toko_gudang/filter/divisi.php', {
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
        axios.post('inc/toko/toko_gudang/filter/subdivisi.php', {
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
        axios.post('inc/toko/toko_gudang/filter/gender.php', {
            'gender': gender
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })


    $('#isi').load('inc/toko/toko_gudang_lainnya/data_stok_lainnya.php');
</script>
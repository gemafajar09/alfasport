<div class="page-title">
    <div class="title_left">
        <h3>Restock Barang Gudang</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <!-- <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
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
                        <select name="tokos" id="tokos" class="form-control select2">
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
                </div> -->
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">

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
    <div class="x_content">
        <form action="editMultipleRestock.html" method="POST">
            <table class="table table-striped" id="datatable-checkbox" style="font-size:11px;font: italic small-caps bold;">
                <button type="submit" name="submit" class="btn btn-warning btn-md" disabled><i class="fa fa-plus"> Restock Sekaligus</i></button>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="check_all" id="check_all" onchange="cekeditSekaligus()">
                        </th>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </form>
    </div>
</div>

<!-- uploadCsv -->
<div class="modal" id="uploadCsv">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/gudang/upload_csv.php" method="POST" enctype="multipart/form-data">
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

<!-- uploadCsvUkuran -->
<div class="modal" id="uploadCsvUkuran">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <form action="inc/gudang/upload_barang.php" method="POST" enctype="multipart/form-data">
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

<div class="modal" id="dataStokGudang">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Detail Barang Gudang</h4>
                <hr>
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Artikel</label>
                                <input type="text" id="artikel" class="form-control">
                                <input type="hidden" id="id_detail">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Restock Barang</label>
                                <input type="number" name="jumlah_restock" id="jumlah_restock" required="required" class="form-control">
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
</div>

<script>
    function shows() {
        $('#uploadCsv').modal()
    }

    function showss() {
        $('#uploadCsvUkuran').modal()
    }

    function show(id) {
        axios.post('inc/restock_gudang/show_restock_detail.php', {
            'id': id
        }).then(function(res) {
            var data = res.data
            $('#detail').html(data)
        }).catch(function(err) {
            console.log(err)
        })
        $('#dataDetail').modal()
    }

    // --------------------------------------------

    function simpan() {
        var id_detail = $('#id_detail').val()
        var artikel = $('#artikel').val()
        var jumlah_restock = $('#jumlah_restock').val()
        var jumlah = $('#jumlah').val()
        axios.post('inc/restock_gudang/aksi_simpan_restock.php', {
            'id_detail': id_detail,
            'artikel': artikel,
            'jumlah_restock': jumlah_restock,
            'jumlah': jumlah
        }).then(function(res) {
            toastr.info('SUCCESS..')
            kosong()
            $('#dataStokGudang').modal('hide')
            $('#isi').load('inc/restock_gudang/data_restock.php');
        }).catch(function(err) {
            console.log(err)
            toastr.warning('ERROR..')
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/restock_gudang/data_restock.php');
        })
    }

    function edit(id_detail) {
        axios.post('inc/restock_gudang/aksi_edit_restock.php', {
            'id_detail': id_detail
        }).then(function(res) {
            var edit = res.data
            console.log(edit);
            $('#artikel').val(edit.id)
            $('#id_detail').val(edit.id_detail)
            $('#jumlah').val(edit.jumlah)
            $('#dataStokGudang').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#id_detail').val('')
        $('#artikel').val('')
        $('#jumlah').val('')
        $('#jumlah_restock').val('')
    }

    function cekeditSekaligus() {
        var ceklist = document.getElementsByName("id_detail[]");
        var banyak_ceklist = ceklist.length;
        var banyak_dicek = 0;
        for (var x = 0; x < banyak_ceklist; x++) {
            if (ceklist[x].checked) {
                banyak_dicek++;
            }
        }
        if (banyak_dicek > 0) {
            document.getElementsByName("submit")[0].disabled = false;
        } else {
            document.getElementsByName("submit")[0].disabled = true;
        }
    }

    $(function() {
        $('.check_all').click(function() {
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });

    $(document).ready(function() {
        $('#isi').load('inc/restock_gudang/data_restock.php');
    })
</script>
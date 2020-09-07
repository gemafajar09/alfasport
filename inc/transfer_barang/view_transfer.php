<div class="page-title">
    <div class="title_left">
        <h3>Data Transfer</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Nama Toko Tujuan</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <!-- <th>Action</th> -->
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataTransfer">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Transfer</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container">
                        <div class="row" style="font-size:12px">
                            <div class="col-md-12">
                                <div class="form-group" style="display: none;">
                                    <?php
                                    //membaca kode barang terbesar
                                    $kode_faktur = $con->query("SELECT max(kode_transfer) FROM tb_transfer")->fetch();
                                    if ($kode_faktur) {
                                        $nilai = substr($kode_faktur[0], 1);
                                        $kode = (int) $nilai;
                                        //tambahkan sebanyak + 1
                                        $kode = $kode + 1;
                                        $auto_kode = "K" . str_pad($kode, 5, "0",  STR_PAD_LEFT);
                                    } else {
                                        $auto_kode = "K00001";
                                    }
                                    $_SESSION["auto_kode"] = $auto_kode;
                                    ?>
                                    <label>ID</label>
                                    <input type="text" required name="transfer_kode" id="transfer_kode" class="form-control" placeholder="ID" value="<?php echo $_SESSION["auto_kode"]; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Toko Asal</label>
                                    <select class="form-control select2" name="id_toko" id="id_toko" required style="width: 100%;">
                                        <option selected disabled>Pilih Toko</option>
                                        <option value="gudang">Gudang</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM toko WHERE nama_toko != 'Gudang'");
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <script>
                                    var _dataBarang = "";
                                    var _banyakPilihanBarang = -1;
                                    var _pilihanBarangDefault =
                                        "<div class='row'>" +
                                        "<div class='col-md-8'>" +
                                        "<div class='form-group'>" +
                                        "<label>Nama Barang & Ukuran</label>" +
                                        "<select class='form-control select2 id_gudang' name='id_gudang[]' required style='width: 100%;'>" +
                                        "<option selected disabled>Pilih Barang</option>" +
                                        "</select>" +
                                        "</div>" +
                                        "</div>" +
                                        "<div class='col-md-4'>" +
                                        "<div class='form-group'>" +
                                        "<label>Jumlah</label>" +
                                        "<input type='number' name='jumlah[]' id='jumlah' required='required' placeholder='Jumlah' class='form-control'>" +
                                        "</div>" +
                                        "</div>" +
                                        "</div>";

                                    function hapusBaris(no) {
                                        document.getElementById("baris_" + no).innerHTML = "";
                                    }

                                    $("#id_toko").change(function() {
                                        var id_toko = $('#id_toko option:selected').val();
                                        if(id_toko == 'gudang')
                                        {
                                            $.ajax({
                                                type: "GET",
                                                url: "inc/transfer_barang/data_toko.php",
                                                data: {
                                                    'id_toko': id_toko
                                                },
                                                success: function(response) {
                                                    $('#id_toko_tujuan').html(response);
                                                }
                                            });
                                        }else{
                                            $.ajax({
                                                type: "GET",
                                                url: "inc/transfer_barang/data_toko.php",
                                                data: {
                                                    'id_toko': id_toko
                                                },
                                                success: function(response) {
                                                    $('#id_toko_tujuan').html(response);
                                                }
                                            });
                                        }
                                    })
                                    
                                    $("#id_toko").change(function() {
                                        $('#formInput').html(_pilihanBarangDefault);
                                        $('.select2').select2({
                                            dropdownAutoWidth: true
                                        });

                                        var id_toko = $('#id_toko option:selected').val();
                                        if(id_toko == 'gudang')
                                        {
                                            $.ajax({
                                                type: "GET",
                                                url: "inc/transfer_barang/data_barang_gudang.php",
                                                data: {
                                                    'id_toko': id_toko
                                                },
                                                success: function(response) {
                                                    _dataBarang = response;
                                                    $('[name ="id_gudang[]"]').html(response);
                                                }
                                            });
                                        }else{
                                            $.ajax({
                                                type: "GET",
                                                url: "inc/transfer_barang/data_barang_toko.php",
                                                data: {
                                                    'id_toko': id_toko
                                                },
                                                success: function(response) {
                                                    _dataBarang = response;
                                                    $('[name ="id_gudang[]"]').html(response);
                                                }
                                            });
                                        }
                                    })
                                </script>
                                <div class="form-group">
                                    <label>Nama Toko Tujuan</label>
                                    <select class="form-control select2" name="id_toko_tujuan" id="id_toko_tujuan" required style="width: 100%;">
                                        <option selected disabled>Pilih Toko</option>
                                    </select>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label>Tanggal</label>
                                    <?php
                                    $tgl = date('Y-m-d');
                                    ?>
                                    <input type="date" name="tanggal" id="tanggal" value="<?php echo $tgl; ?>" required="required" placeholder="Tanggal" class="form-control">
                                    <input type="hidden" id="divisi_id">
                                </div>
                            </div>
                            <div class="card col-md-12">
                                <div class="card-body">
                                    <span>
                                        <p style="color: red;">
                                            <marquee>
                                                Tetapkan Jumlah Kolom Terlebih Dahulu
                                            </marquee>
                                        </p>
                                    </span>
                                    <div class="col-md-12">
                                        <div id="formInput">
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label>Nama Barang & Ukuran</label>
                                                        <select class="form-control select2 id_gudang" name="id_gudang[]" required style="width: 100%;">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="number" name="jumlah[]" id="jumlah" required="required" placeholder="Jumlah" class="form-control">
                                                        <input type="hidden" id="id_transfer">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="simpanT" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
<?php

if (isset($_POST['simpanT'])) {
    $id_toko = $_POST['id_toko'];
    $transfer_kode = $_POST['transfer_kode'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];
    $tanggal = $_POST['tanggal'];
    $id_gudang = $_POST['id_gudang'];
    $jumlah = $_POST['jumlah'];

    $con->query("INSERT INTO `tb_transfer`(`kode_transfer`, `id_toko`, `id_toko_tujuan`,`tanggal`, `acc_owner`) VALUES ('$_POST[transfer_kode]','$_POST[id_toko]','$_POST[id_toko_tujuan]','$_POST[tanggal]','0')");

    $id_transfer = $con->id();

    foreach ($id_gudang as $i => $a) {
        $data = $con->query("SELECT a.*, b.*, c.* FROM tb_gudang a LEFT JOIN tb_gudang_detail b ON a.id = b.id LEFT JOIN tb_all_ukuran c ON b.id_ukuran = c.id_ukuran WHERE a.id_gudang = '$id_gudang[$i]' ")->fetch();

        $id_ukuran = $data['id_ukuran'];

        $con->query("INSERT INTO `tb_transfer_detail`(`id_transfer`,`id_gudang`, `id_ukuran`, `jumlah`, `status`) VALUES ('$id_transfer','$id_gudang[$i]','$id_ukuran','$jumlah[$i]','0')");
    }

    unset($_SESSION['auto_kode']);

    echo "<script>
        window.location.href = 'transfer.html';
    </script>";
}
?>


<script>
    function tampil() {
        $('#dataTransfer').modal()
    }

    function simpan() {
        var id_toko = $('#id_toko').val()
        var id_toko_tujuan = $('#id_toko_tujuan').val()
        var id_gudang = $('#id_gudang').val()
        var ukuran = $('#ukuran').val()
        var jumlah = $('#jumlah').val()
        var tanggal = $('#tanggal').val()
        var id_transfer = $('#id_transfer').val()
        axios.post('inc/transfer_barang/aksi_simpan_transfer.php', {
            'id_toko': id_toko,
            'id_toko_tujuan': id_toko_tujuan,
            'id_gudang': id_gudang,
            'id_detail': ukuran,
            'jumlah': jumlah,
            'tanggal': tanggal,
            'id_transfer': id_transfer,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataTransfer').modal('hide')
            $('#isi').load('inc/transfer_barang/data_transfer.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataTransfer').modal('hide')
            $('#isi').load('inc/transfer_barang/data_transfer.php');
            kosong()
        })
    }

    function edit(id) {
        axios.post('inc/transfer_barang/aksi_edit_transfer.php', {
            'divisi_id': id
        }).then(function(res) {
            var edit = res.data
            $('#divisi_nama').val(edit.divisi_nama)
            $('#kategori_id').val(edit.kategori_id)
            $('#divisi_id').val(edit.divisi_id)
            $('#dataTransfer').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/transfer_barang/aksi_hapus_transfer.php', {
            'divisi_id': id
        }).then(function(res) {
            var hapus = res.data
            $('#isi').load('inc/transfer_barang/data_transfer.php');
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#id_toko').val('')
        $('#id_toko_tujuan').val('')
        $('#id_gudang').val('')
        $('#ukuran').val('')
        $('#jumlah').val('')
        $('#tanggal').val('')
        $('#id_transfer').val('')
    }


    $('#addRow').on('click', function() {
        _banyakPilihanBarang++;
        var html_row =
            "<div class='row' id='baris_" + _banyakPilihanBarang + "'>" +
            "<div class='col-md-8'>" +
            "<div class='form-group'>" +
            "<label>Nama Barang & Ukuran</label>" +
            "<select class='form-control select2 id_gudang' name='id_gudang[]' required style='width: 100%;'>" +
            "<option selected disabled>Pilih Barang</option>" +
            _dataBarang +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-3'>" +
            "<div class='form-group'>" +
            "<label>Jumlah</label>" +
            "<input type='number' name='jumlah[]' id='jumlah' required='required' placeholder='Jumlah' class='form-control'>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-1'>" +
            "<div class='form-group'>" +
            "<label>&nbsp;</label>" +
            "<button class='btn btn-danger' type='button' onclick='hapusBaris(" + _banyakPilihanBarang + ")'><i class='fa fa-trash'></i></button>" +
            "</div>" +
            "</div>"
        "</div>";

        $('#formInput').append(html_row)
        $('.select2').select2({
            dropdownAutoWidth: true
        });

        $('[name ="id_gudang[]"]').change(function() {
            var id_gudang = $(this).val()
            if(id_gudang == 'gudang')
            {
                axios.post('inc/transfer_barang/ukuran_gudang.php', {
                    'id': id_gudang
                }).then(function(res) {
                    var data = res.data
                    console.log(data)
                    $('[name ="ukuran[]"]').html(data)
                }).catch(function(err) {
                    console.log(err)
                })
            }else{
                axios.post('inc/transfer_barang/ukuran.php', {
                    'id': id_gudang
                }).then(function(res) {
                    var data = res.data
                    console.log(data)
                    $('[name ="ukuran[]"]').html(data)
                }).catch(function(err) {
                    console.log(err)
                })
            }
        })
    })

    $('[name ="id_gudang[]"]').change(function() {
        var id_gudang = $(this).val()
        if(id_gudang == 'gudang')
            {
                axios.post('inc/transfer_barang/ukuran_gudang.php', {
                    'id': id_gudang
                }).then(function(res) {
                    var data = res.data
                    console.log(data)
                    $('[name ="ukuran[]"]').html(data)
                }).catch(function(err) {
                    console.log(err)
                })
            }else{
                axios.post('inc/transfer_barang/ukuran.php', {
                    'id': id_gudang
                }).then(function(res) {
                    var data = res.data
                    console.log(data)
                    $('[name ="ukuran[]"]').html(data)
                }).catch(function(err) {
                    console.log(err)
                })
            }
    })

    $('#isi').load('inc/transfer_barang/data_transfer.php');
</script>
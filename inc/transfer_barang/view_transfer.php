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
                    <th>Kode Transfer</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataTransfer">
    <div class="modal-dialog modal-xl">
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
                                    $kode_faktur = $con->query("SELECT max(transfer_barang_kode) FROM tb_transfer_barang")->fetch();
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
                                    <input type="text" required name="transfer_barang_kode" id="transfer_barang_kode" class="form-control" placeholder="ID" value="<?php echo $_SESSION["auto_kode"]; ?>" readonly>
                                </div>

                                <div class="form-group">
                                    <label>Nama Toko Asal</label>
                                    <select class="form-control " name="id_toko" id="id_toko" required style="width: 100%;">
                                        <option selected disabled>Pilih Toko</option>
                                        <option value="gudang">Warehouse</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM toko WHERE id_toko != 0");
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Toko Tujuan</label>
                                    <select class="form-control " name="id_toko_tujuan" id="id_toko_tujuan" required style="width: 100%;">
                                        <option selected disabled>Pilih Toko</option>
                                    </select>
                                </div>
                                <div class="form-group" style="display: none;">
                                    <label>Tanggal</label>
                                    <?php
                                    $tgl = date('Y-m-d');
                                    ?>
                                    <input type="date" name="transfer_barang_tgl" id="transfer_barang_tgl" value="<?php echo $tgl; ?>" required="required" placeholder="Tanggal" class="form-control">
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
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label>Nama Barang & Ukuran</label>
                                                        <select class="form-control select2 barang_detail_id" name="barang_detail_id[]" required style="width: 100%;">
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Stok</label>
                                                        <input type="number" readonly name="stok[]" id="stoks" required="required" placeholder="Stok" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-md-2">
                                                    <div class="form-group">
                                                        <label>Jumlah</label>
                                                        <input type="number" name="transfer_barang_detail_jml[]" id="jumlah" required="required" placeholder="Jumlah" class="form-control">
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


<!-- modal detail -->
<div class="modal" id="cekBarang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Transfer Barang</h4>
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
    $transfer_barang_kode = $_POST['transfer_barang_kode'];
    $id_toko = $_POST['id_toko'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];
    $transfer_barang_tgl = $_POST['transfer_barang_tgl'];
    $barang_detail_id = $_POST['barang_detail_id'];
    $transfer_barang_detail_jml = $_POST['transfer_barang_detail_jml'];

    // insert ke table tb_transfer_barang
    $con->insert(
        "tb_transfer_barang",
        array(
            'transfer_barang_kode' => $transfer_barang_kode,
            'id_toko' => $id_toko,
            'id_toko_tujuan' => $id_toko_tujuan,
            'transfer_barang_tgl' => $transfer_barang_tgl,
            'transfer_barang_acc_owner' => 0
        )
    );
    // ambil transfer_barang_id
    $transfer_barang_id = $con->id();

    // insert ke tabel tb_transfer_barang_detail
    foreach ($barang_detail_id as $i => $a) {
        // cari ukuran_id terlebih dahulu
        $data = $con->query("SELECT ukuran_id FROM tb_barang_detail WHERE barang_detail_id = '$barang_detail_id[$i]'")->fetch();

        $ukuran_id = $data['ukuran_id'];

        // insert ke tb_transfer_barang_detail;
        $con->insert(
            "tb_transfer_barang_detail",
            array(
                'transfer_barang_id' => $transfer_barang_id,
                'barang_detail_id' => $barang_detail_id[$i],
                'ukuran_id' => $ukuran_id,
                'transfer_barang_detail_jml' => $transfer_barang_detail_jml[$i],
                'transfer_barang_detail_status' => 0,
            )
        );
    }

    unset($_SESSION['auto_kode']);

    echo "<script>
        window.location.href = 'transfer.html';
    </script>";
}
?>
<script>
    var _dataBarang = "";
    var _banyakPilihanBarang = 0;
    var _pilihanBarangDefault =
        "<div class='row'>" +
        "<div class='col-md-7'>" +
        "<div class='form-group'>" +
        "<label>Nama Barang & Ukuran</label>" +
        "<select class='form-control barang_detail_id select2' name='barang_detail_id[]' onchange='tampilkanStok(this,0)' required style='width: 100%;'>" +
        "<option selected disabled>Pilih Barang</option>" +
        "</select>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-2'>" +
        "<div class='form-group'>" +
        "<label>Stok</label>" +
        "<input type='number' name='stok[]' id='stoks0' required='required' placeholder='Stok' class='form-control' readonly>" +
        "</div>" +
        "</div>" +
        "<div class='col-md-2'>" +
        "<div class='form-group'>" +
        "<label>Jumlah</label>" +
        "<input type='number' name='transfer_barang_detail_jml[]' id='jumlah0' onkeyup='batasKirim(this,0)' required='required' placeholder='Jumlah' class='form-control'>" +
        "</div>" +
        "</div>" +
        "</div>";


    // untuk add row
    $('#addRow').on('click', function() {
        _banyakPilihanBarang++;
        var html_row =
            "<div class='row' id='baris_" + _banyakPilihanBarang + "'>" +
            "<div class='col-md-7'>" +
            "<div class='form-group'>" +
            "<label>Nama Barang & Ukuran</label>" +
            "<select class='form-control barang_detail_id select2' name='barang_detail_id[]' onchange='tampilkanStok(this," + _banyakPilihanBarang + ")' required style='width: 100%;'>" +
            "<option selected disabled>Pilih Barang</option>" +
            _dataBarang +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-2'>" +
            "<div class='form-group'>" +
            "<label>Stok</label>" +
            "<input type='number' name='stok[]' id='stoks" + _banyakPilihanBarang + "' required='required' placeholder='Stok' class='form-control' readonly>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-2'>" +
            "<div class='form-group'>" +
            "<label>Jumlah</label>" +
            "<input type='number' name='transfer_barang_detail_jml[]' id='jumlah" + _banyakPilihanBarang + "' onkeyup='batasKirim(this," + _banyakPilihanBarang + ")' required='required' placeholder='Jumlah' class='form-control'>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-1'>" +
            "<div class='form-group'>" +
            "<label>&nbsp;</label>" +
            "<button class='btn btn-danger' type='button' onclick='hapusBaris(" + _banyakPilihanBarang + ")'><i class='fa fa-trash'></i></button>" +
            "</div>" +
            "</div>"
        "</div>";
        console.log(_banyakPilihanBarang)

        $('#formInput').append(html_row)
        $('.select2').select2({
            dropdownAutoWidth: true
        });
    })
    // utk hapus baris add row
    function hapusBaris(no) {
        document.getElementById("baris_" + no).innerHTML = "";
    }

    // cari toko tujuan dan barang dari toko tsb
    $("#id_toko").change(function() {
        var id_toko = $('#id_toko option:selected').val();
        if (id_toko == 'gudang') {
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
        } else {
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
    // cari barangnya
    $("#id_toko").change(function() {
        $('#formInput').html(_pilihanBarangDefault);
        $('.select2').select2({
            dropdownAutoWidth: true
        });
        var id_toko = $('#id_toko option:selected').val();
        // jika dari gudang maka tampilkan data barang gudang
        if (id_toko == 'gudang') {
            $.ajax({
                type: "GET",
                url: "inc/transfer_barang/data_barang_gudang.php",
                data: {
                    'id_toko': id_toko
                },
                success: function(response) {
                    _dataBarang = response;
                    $('[name ="barang_detail_id[]"]').html(response);
                }
            });
        }
        // jika dari toko maka tampilkan brang dari toko
        else {
            $.ajax({
                type: "GET",
                url: "inc/transfer_barang/data_barang_toko.php",
                data: {
                    'id_toko': id_toko
                },
                success: function(response) {
                    _dataBarang = response;
                    $('[name ="barang_detail_id[]"]').html(response);
                }
            });
        }
    })

    // cari jumlah stoknya
    function tampilkanStok(id, angka) {
        var barang_detail_id = id.value
        var id_toko = $('#id_toko').val()
        if (id_toko == 'gudang') {
            axios.post('inc/transfer_barang/stok_barang_gudang.php', {
                'barang_detail_id': barang_detail_id
            }).then(function(res) {
                var data = res.data
                $('#stoks' + angka).val(data.barang_detail_jml)
            })
        } else {
            axios.post('inc/transfer_barang/stok_barang_toko.php', {
                'barang_detail_id': barang_detail_id
            }).then(function(res) {
                var data = res.data
                $('#stoks' + angka).val(data.barang_toko_jml)
            })
        }
    }
    // cek batas jumlah transfer/pengiriman
    function batasKirim(angka, int) {
        var jumlah = angka.value
        var stok = $('#stoks' + int).val();
        if (parseInt(jumlah) > parseInt(stok)) {
            alert('Maaf Stok Tidak Mencukupi')
            $('#jumlah' + int).val('');
        }
    }

    function tampil() {
        $('#dataTransfer').modal()
    }

    function dataBarang(transfer_barang_id) {
        var transfer_barang_id = transfer_barang_id;
        axios.post('inc/transfer_barang/tampil_tabel_data_barang.php', {
            'transfer_barang_id': transfer_barang_id,
        }).then(function(res) {
            var data = res.data
            $('#tampilkan').html(data)
            $('#cekBarang').modal();
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>

<script>
    $('#stoks10').change(function() {
        var id_detail = $(this).val()
        alert(id_detail)
    })

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
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/transfer_barang/aksi_hapus_transfer.php', {
                'divisi_id': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi').load('inc/transfer_barang/data_transfer.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
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

    $('#isi').load('inc/transfer_barang/data_transfer.php');
</script>
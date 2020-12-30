<div class="page-title">
    <div class="title_left">
        <h3>Data Voucher Ongkir</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-12 col-sm-12">
        <div class="x_panel">
            <div class="x_title">
                <button type="button" onclick="tampil()" class="btn btn-success"><i class="fa fa-plus"> Buat Voucher</i></button>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#akan-datang" role="tab" aria-controls="home" aria-selected="true">Akan Datang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#sedang-berjalan" role="tab" aria-controls="profile" aria-selected="false">Sedang Berjalan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#telah-berlalu" role="tab" aria-controls="contact" aria-selected="false">Telah Berlalu</a>
                    </li>
                </ul>

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="akan-datang" role="tabpanel" aria-labelledby="home-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-striped" id="datatable-keytable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Voucher</th>
                                        <th>Jenis Voucher</th>
                                        <th>Potongan Harga</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Toko</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="isi-akan-datang"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sedang-berjalan" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-striped" id="datatable-responsive">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Voucher</th>
                                        <th>Jenis Voucher</th>
                                        <th>Potongan Harga</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Toko</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="isi-sedang-berjalan"></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="telah-berlalu" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="x_content table-responsive">
                            <table class="table table-striped" id="datatable">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Voucher</th>
                                        <th>Jenis Voucher</th>
                                        <th>Potongan Harga</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Berakhir</th>
                                        <th>Toko</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="isi-telah-berlalu"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- the modal set ongkir -->
<div class="modal" id="dataVoucher">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Voucher</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group" style="display: none;">
                                <label>Kode Voucher</label>
                                <?php
                                //membaca kode barang terbesar
                                $kode_faktur = $con->query("SELECT max(voucher_kode) FROM tb_voucher_ongkir")->fetch();
                                if ($kode_faktur) {
                                    $nilai = substr($kode_faktur[0], 1);
                                    $kode = (int) $nilai;
                                    //tambahkan sebanyak + 1
                                    $kode = $kode + 1;
                                    $auto_kode = "O" . str_pad($kode, 5, "0",  STR_PAD_LEFT);
                                } else {
                                    $auto_kode = "O00001";
                                }
                                $_SESSION["auto_kode"] = $auto_kode;
                                ?>
                                <input type="text" name="voucher_kode" id="voucher_kode" required="required" placeholder="Nama Voucher" value="<?php echo $_SESSION["auto_kode"]; ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Voucher</label>
                                <input type="text" name="voucher_nama" id="voucher_nama" required="required" placeholder="Nama Voucher" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Provinsi</label>
                                <select class="form-control select2" style="width: 100%;" name="id_prov" id="id_prov" required>
                                    <option selected disabled>-Pilih Provinsi-</option>
                                    <?php
                                    $data = $con->select("tb_provinsi", '*');
                                    foreach ($data as $i => $a) {
                                        echo "<option value='" . $a['id_prov'] . "'>" . $a['nama_prov'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kota/Kabupaten</label>
                                <select name="areapengiriman" id="areapengiriman" class="form-control select2" style="width:100%">
                                    <option selected disabled>-Pilih Kota-</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jenis</label>
                                <select name="voucher_jenis" id="voucher_jenis" class="form-control" style="width: 100%;">
                                    <option value="harga">Potongan Harga</option>
                                    <option value="persen">Potongan Persen</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Potongan Harga</label>
                                <input type="number" name="voucher_harga" id="voucher_harga" required="required" placeholder="Potongan Voucher" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Minimum Belanja</label>
                                <input type="text" name="minimum" class="form-control" id="minimum" placeholder="Minimum Belanja">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Mulai Voucher</label>
                                <input type="date" name="voucher_tgl_mulai" id="voucher_tgl_mulai" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal Berakhir Voucher</label>
                                <input type="date" name="voucher_tgl_akhir" id="voucher_tgl_akhir" required="required" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Toko</label>
                                <select name="id_toko" class="form-control" style="width: 100%;" id="id_toko">
                                    <option value="0">Semua Toko</option>
                                    <?php
                                    $data = $con->query("SELECT * FROM toko WHERE id_toko != 0");
                                    foreach ($data as $i => $a) {
                                        echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jumlah Voucher</label>
                                <input type="number" name="voucher_jumlah" id="voucher_jumlah" required="required" placeholder="" class="form-control">
                                <input type="hidden" id="voucher_id">
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
    // cari data kota
    $("#id_prov").change(function() {
        var id_prov = $('#id_prov option:selected').val();
        console.log(id_prov);
        $.ajax({
            type: "GET",
            url: "inc/diskon/ongkir/data_kota.php",
            data: {
                'id_prov': id_prov
            },
            success: function(response) {
                $('#areapengiriman').html(response);
            }
        });
    })


    function tampil() {
        $('#dataVoucher').modal()
    }

    function simpan() {
        var voucher_nama = $('#voucher_nama').val()
        var areapengiriman = $('#areapengiriman').val()
        var voucher_tgl_mulai = $('#voucher_tgl_mulai').val()
        var voucher_tgl_akhir = $('#voucher_tgl_akhir').val()
        var voucher_harga = $('#voucher_harga').val()
        var voucher_kode = $('#voucher_kode').val()
        var voucher_jumlah = $('#voucher_jumlah').val()
        var voucher_jenis = $('#voucher_jenis').val()
        var id_toko = $('#id_toko').val()
        var minimum = $('#minimum').val()
        var voucher_id = $('#voucher_id').val()

        axios.post('inc/diskon/ongkir/aksi_simpan_voucher.php', {
            'voucher_nama': voucher_nama,
            'areapengiriman': areapengiriman,
            'voucher_harga': voucher_harga,
            'voucher_tgl_mulai': voucher_tgl_mulai,
            'voucher_tgl_akhir': voucher_tgl_akhir,
            'voucher_kode': voucher_kode,
            'voucher_jumlah': voucher_jumlah,
            'voucher_jenis': voucher_jenis,
            'id_toko': id_toko,
            'minimum': minimum,
            'voucher_id': voucher_id
        }).then(function(res) {
            $('#dataVoucher').modal('hide')
            $('#isi-akan-datang').load('inc/diskon/ongkir/data_voucher_akan_datang.php');
            $('#isi-sedang-berjalan').load('inc/diskon/ongkir/data_voucher_sedang_berlaku.php');
            $('#isi-telah-berlalu').load('inc/diskon/ongkir/data_voucher_telah_berlalu.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataVoucher').modal('hide')
            $('#isi-akan-datang').load('inc/diskon/ongkir/data_voucher_akan_datang.php');
            $('#isi-sedang-berjalan').load('inc/diskon/ongkir/data_voucher_sedang_berlaku.php');
            $('#isi-telah-berlalu').load('inc/diskon/ongkir/data_voucher_telah_berlalu.php');
        })
    }

    function kosong() {
        $('#voucher_nama').val('')
        $('#areapengiriman').val('')
        $('#voucher_tgl_mulai').val('')
        $('#voucher_tgl_akhir').val('')
        $('#voucher_harga').val('')
        $('#voucher_kode').val('')
        $('#voucher_jumlah').val('')
        $('#id_toko').val('')
        $('#minimum').val('')
        $('#voucher_id').val('')
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/diskon/ongkir/aksi_hapus_voucher.php', {
                'voucher_id_ongkir': id
            }).then(function(res) {
                var hapus = res.data
                $('#isi-akan-datang').load('inc/diskon/ongkir/data_voucher_akan_datang.php');
                $('#isi-sedang-berjalan').load('inc/diskon/ongkir/data_voucher_sedang_berlaku.php');
                $('#isi-telah-berlalu').load('inc/diskon/ongkir/data_voucher_telah_berlalu.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }



    $('#isi-akan-datang').load('inc/diskon/ongkir/data_voucher_akan_datang.php');
    $('#isi-sedang-berjalan').load('inc/diskon/ongkir/data_voucher_sedang_berlaku.php');
    $('#isi-telah-berlalu').load('inc/diskon/ongkir/data_voucher_telah_berlalu.php');

    <?php
    if (!empty($_POST['a'])) {
    ?>
        $(document).ready(function() {
            document.getElementById('<?php echo $_POST['a']; ?>').click();
        })

    <?php
    }
    ?>
</script>
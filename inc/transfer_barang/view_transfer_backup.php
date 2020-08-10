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
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
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
                                <div class="form-group">
                                    <label>Nama Toko Asal</label>
                                    <select class="form-control select2" name="id_toko" id="id_toko" required style="width: 100%;">
                                        <option selected disabled>Pilih Toko</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM toko");
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <script>
                                    $("#id_toko").change(function() {
                                        var id_toko = $('#id_toko option:selected').val();
                                        console.log(id_toko);
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
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Nama Barang</label>
                                                        <select class="form-control select2 id_gudang" name="id_gudang[]" required style="width: 100%;">
                                                            <option selected disabled>Pilih Barang</option>
                                                            <?php
                                                            $data = $con->query("SELECT * FROM tb_gudang");
                                                            foreach ($data as $i => $a) {
                                                                echo "<option value=" . $a['id_gudang'] . ">" . $a['nama'] . "</option>";
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label>Ukuran</label>
                                                        <select class="form-control select2 ukuran" name="ukuran[]" required style="width: 100%;"></select>
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
                    <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
</div>

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

        for (let i = 0; i < 100; i++) {
            const element = i;
            console.log(element);
        }

        var html_row =
            "<div class='row'>" +
            "<div class='col-md-4'>" +
            "<div class='form-group'>" +
            "<label>Nama Barang</label>" +
            "<select class='form-control select2 id_gudang' name='id_gudang[]' required style='width: 100%;'>" +
            "<option selected disabled>Pilih Barang</option>" +
            "<?php
                $data = $con->query("SELECT * FROM tb_gudang");
                foreach ($data as $i => $a) {
                    echo "<option value=" . $a['id_gudang'] . ">" . $a['nama'] . "</option>";
                }
                ?>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-4'>" +
            "<div class='form-group'>" +
            "<label>Ukuran</label>" +
            "<select class='form-control select2 ukuran' name='ukuran[]' required style='width: 100%;'>" +
            "</select>" +
            "</div>" +
            "</div>" +
            "<div class='col-md-4'>" +
            "<div class='form-group'>" +
            "<label>Jumlah</label>" +
            "<input type='number' name='jumlah' id='jumlah' required='required' placeholder='Jumlah' class='form-control'>" +
            "</div>" +
            "</div>" +
            "</div>";



        $('#formInput').append(html_row)
        $('.select2').select2({
            dropdownAutoWidth: true
        });

        $('[name ="id_gudang[]"]').change(function() {
            var id_gudang = $(this).val()
            axios.post('inc/transfer_barang/ukuran.php', {
                'id': id_gudang
            }).then(function(res) {
                var data = res.data
                console.log(data)
                $('[name ="ukuran[]"]').html(data)
            }).catch(function(err) {
                console.log(err)
            })
        })
    })

    $('[name ="id_gudang[]"]').change(function() {
        var id_gudang = $(this).val()
        axios.post('inc/transfer_barang/ukuran.php', {
            'id': id_gudang
        }).then(function(res) {
            var data = res.data
            console.log(data)
            $('[name ="ukuran[]"]').html(data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#isi').load('inc/transfer_barang/data_transfer.php');
</script>
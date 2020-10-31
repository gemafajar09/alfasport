<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="text-left">
                <a href="stok_barang_gudang_lainnya.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
            </div>
            <div class="text-center">
                Entry Stok Gudang Lainnya
            </div>
        </div>
        <form action="inc/gudang_lainnya/simpan_stok_lainnya.php" method="POST">
            <div class="card-body">
                <div class="col-md-12 mx-auto py-4">
                    <div class="card">
                        <div class="card-header">
                            Masukan Ukuran <i>
                                <marquee>Tetapkan Jumlah Kolum Ukuran/ Size Yang Akan Ditambahakan.</marquee>
                            </i>
                        </div>
                        <?php
                        $no = 1;
                        $no1 = 1;
                        ?>
                        <div class="card-body" id="formInput">
                            <div class="row">
                                <input name="gudang_lainnya_kode" type="hidden" value="<?= $_GET['id'] ?>" class="form-control">
                                <div class="col-md-2">
                                    <label>Artikel</label><br>
                                    <input name="gudang_lainnya_artikel[]" value="<?= $_GET['artikel'] ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Barcode</label><br>
                                    <input name="gudang_lainnya_detail_barcode[]" value="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Ukuran</label><br>
                                    <select name="ukuran_barang_detail_id[]" class="form-control select2">
                                        <option value="">-PILIH-</option>
                                        <?php

                                        $data = $con->query("SELECT
                                                                tb_ukuran_barang_detail.ukuran_barang_detail_id,
                                                                tb_ukuran_barang_detail.ukuran_barang_detail_nama
                                                            From
                                                                tb_ukuran_barang_detail Inner Join
                                                                tb_ukuran_barang On tb_ukuran_barang_detail.ukuran_barang_id = tb_ukuran_barang.ukuran_barang_id 
                                                            WHERE tb_ukuran_barang.id_merek='$_GET[merek]' AND tb_ukuran_barang.id_kategori='$_GET[kategori]'")->fetchAll();
                                        foreach ($data as $a) {
                                        ?>
                                            <option value="<?= $a['ukuran_barang_detail_id'] ?>">Nama Ukuran : <?= $a['ukuran_barang_detail_nama'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Jumlah</label>
                                    <input type="text" class="form-control" name="gudang_lainnya_detail_jumlah[]">
                                </div>
                            </div>
                        </div>
                        <button type="button" id="addRow" class="btn btn-primary btn-block btn-sm">Add Row</button>
                        <button type="submit" name="simpan" class="btn btn-success btn-block btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    function hapusBaris(no) {
        document.getElementById("baris_" + no).innerHTML = "";
    }

    var _dataBarang = "";

    var _banyakPilihanBarang = -1;
    $('#addRow').on('click', function(e) {
        _banyakPilihanBarang++;
        e.preventDefault();
        var kategori = '<?= $_GET['kategori'] ?>'
        var merek = '<?= $_GET['merek'] ?>'
        var html_row = "<div class='row' id='baris_" + _banyakPilihanBarang + "'>" +

            "<div class='col-md-2'>" +
            "<label>Artikel</label>" +
            "<input type='text' value='<?= $_GET['artikel'] ?>' class='form-control' name='gudang_lainnya_artikel[]' readonly>" +
            "</div>" +

            "<div class='col-md-3'>" +
            "<label>Barcode</label>" +
            "<input type='text' class='form-control' name='gudang_lainnya_detail_barcode[]'>" +
            "</div>" +

            "<div class='col-md-4'>" +
            "<label>Ukuran</label><br>" +
            "<select name='ukuran_barang_detail_id[]' class='form-control select2'>" +
            "<option value=''>-PILIH-</option>" +
            "<?php
                $data = $con->query("SELECT
                                        tb_ukuran_barang_detail.ukuran_barang_detail_id,
                                        tb_ukuran_barang_detail.ukuran_barang_detail_nama
                                    From
                                        tb_ukuran_barang_detail Inner Join
                                        tb_ukuran_barang On tb_ukuran_barang_detail.ukuran_barang_id = tb_ukuran_barang.ukuran_barang_id 
                                    WHERE tb_ukuran_barang.id_merek='$_GET[merek]' AND tb_ukuran_barang.id_kategori='$_GET[kategori]'")->fetchAll();
                foreach ($data as $a) {
                ?>" +
            "<option value='<?= $a['ukuran_barang_detail_id'] ?> ' > Nama Ukuran : <?= $a['ukuran_barang_detail_nama'] ?></option>" +
            "<?php } ?>" +
            "</select>" +
            "</div>" +

            "<div class='col-md-2'>" +
            "<label>Jumlah</label>" +
            "<input type='text' class='form-control' name='gudang_lainnya_detail_jumlah[]'>" +
            "</div>" +

            "<div class='col-md-1'>" +
            "<label>&nbsp; &nbsp; &nbsp; &nbsp;</label>" +
            "<button class='btn btn-danger' type='button' onclick='hapusBaris(" + _banyakPilihanBarang + ")'><i class='fa fa-trash'></i></button>" +
            "</div>" +
            "</div>";
        $('#formInput').append(html_row)
        $('.select2').select2({
            dropdownAutoWidth: true
        });

        // axios.post('inc/gudang/ukuran.php', {
        //     'id_merek': merek,
        //     'id_kategori': kategori
        // }).then(function(res) {
        //     $('[name ="ukuran[]"]').html(res.data)
        // }).catch(function(err) {
        //     console.log(err)
        // });
    })
</script>
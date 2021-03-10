<?php
$ambil = $con->get('tb_barang', '*', array('barang_kode' => $_GET['kode']));
?>
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="text-left">
                <a href="barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
            </div>
            <div class="text-center">
                Input Stok Barang Gudang
            </div>
        </div>
        <form action="inc/barang_gudang/aksi_simpan_stok_barang_gudang.php" method="POST">
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
                                <input name="barang_id" type="hidden" value="<?= $ambil['barang_id'] ?>" class="form-control">
                                <input name="barang_detail_tgl" type="hidden" value="<?= $ambil['barang_tgl'] ?>" class="form-control">
                                <div class="col-md-2">
                                    <label>Artikel</label><br>
                                    <input name="barang_detail_artikel[]" value="<?= $ambil['barang_artikel'] ?>" class="form-control" readonly>
                                </div>
                                <div class="col-md-3">
                                    <label>Barcode</label><br>
                                    <input name="barang_detail_barcode[]" value="" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Ukuran</label><br>
                                    <select name="ukuran_id[]" class="form-control select2">
                                        <option value="">-PILIH-</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM tb_ukuran WHERE merk_id = '$_GET[merek]' AND subdivisi_id = '$_GET[subdivisi]' AND ukuran_kategori = '$ambil[barang_kategori]'")->fetchAll();

                                        if ($ambil['barang_kategori'] == 'Sepatu') {
                                            foreach ($data as $a) {
                                        ?>
                                                <option value="<?= $a['ukuran_id'] ?>">EU:<?= $a['sepatu_ue'] ?> | UK:<?= $a['sepatu_uk'] ?> | US:<?= $a['sepatu_us'] ?> | CM:<?= $a['sepatu_cm'] ?> </option>
                                            <?php
                                            }
                                        } else if ($ambil['barang_kategori'] == 'Kaos Kaki') {
                                            foreach ($data as $a) {
                                            ?>
                                                <option value="<?= $a['ukuran_id'] ?>">EU : <?= $a['kaos_kaki_eu'] ?> | SIZE : <?= $a['kaos_kaki_size'] ?> </option>
                                            <?php
                                            }
                                        } else if ($ambil['barang_kategori'] == 'Barang Lainnya') {
                                            foreach ($data as $a) {
                                            ?>
                                                <option value="<?= $a['ukuran_id'] ?>">Nama Ukuran : <?= $a['barang_lainnya_nama_ukuran'] ?></option>
                                        <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="col-md-2">
                                    <label>Jumlah</label>
                                    <input type="text" class="form-control" name="barang_detail_jml[]">
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
        var html_row = "<div class='row' id='baris_" + _banyakPilihanBarang + "'>" +
            "<div class='col-md-2'>" +
            "<label>Artikel</label>" +
            "<input type='text' value='<?= $ambil['barang_artikel'] ?>' class='form-control' name='barang_detail_artikel[]' readonly>" +
            "</div>" +

            "<div class='col-md-3'>" +
            "<label>Barcode</label>" +
            "<input type='text' class='form-control' name='barang_detail_barcode[]'>" +
            "</div>" +

            "<div class='col-md-4'>" +
            "<label>Ukuran</label><br>" +
            "<select name='ukuran_id[]' class='form-control select2'>" +
            "<option value=''>-PILIH-</option>" +
            "<?php
                $data = $con->query("SELECT * FROM tb_ukuran WHERE merk_id = '$_GET[merek]' AND subdivisi_id = '$_GET[subdivisi]' AND ukuran_kategori = '$ambil[barang_kategori]'")->fetchAll();
                if ($ambil['barang_kategori'] == 'Sepatu') {
                    foreach ($data as $a) {
                ?>" +
            "<option value='<?= $a['ukuran_id'] ?>'> EU: <?= $a['sepatu_ue'] ?> | UK: <?= $a['sepatu_uk'] ?> | US: <?= $a['sepatu_us'] ?> | CM: <?= $a['sepatu_cm'] ?>" +
            "</option>" +
            "<?php
                    }
                } else if ($ambil['barang_kategori'] == 'Kaos Kaki') {
                    foreach ($data as $a) {
                ?>" +
            "<option value ='<?= $a['ukuran_id'] ?>'> EU : <?= $a['kaos_kaki_eu'] ?> | SIZE: <?= $a['kaos_kaki_size'] ?> " +
            "</option>" +
            "<?php
                    }
                } else if ($ambil['barang_kategori'] == 'Barang Lainnya') {
                    foreach ($data as $a) {
                ?>" +
            "<option value = '<?= $a['ukuran_id'] ?>' > Nama Ukuran: <?= $a['barang_lainnya_nama_ukuran'] ?> " +
            "</option>" +
            "<?php
                    }
                }
                ?> " +
            "</select>" +
            "</div>" +

            "<div class='col-md-2'>" +
            "<label>Jumlah</label>" +
            "<input type='text' class='form-control' name='barang_detail_jml[]'>" +
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
    })
</script>
<div class="container">
    <div class="card">
        <form action="simpan_gudang.html" method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="stok_barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                    <!-- <button type="button" onclick="showss()" data-toggle="tooltip" title="Upload Ukuran" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button> -->
                </div>
                <div class="text-center">
                    Entry Barang Gudang
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" required name="tanggal" value="<?= date('Y-m-d') ?>" id="tanggal" class="form-control">
                        </div>
                    </div>
                    <!-- uniq id -->
                    <?php

                    $karakter = '1234567890';
                    $shuffle  = substr(str_shuffle($karakter), 0, 14);
                    $artikel  = substr(str_shuffle($karakter), 0, 8);

                    ?>
                    <input type="hidden" value="<?= $shuffle ?>" required name="id" id="id" class="form-control">

                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" required name="artikel" value="AS-<?= $artikel ?>" id="artikel" class="form-control" placeholder="Artikel">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Merek</label>
                            <select name="merek" id="mereks" required class="form-control select2">
                                <option value="">-Merek-</option>
                                <?php
                                $merek = $con->select('tb_merk', '*');
                                foreach ($merek as $b) {
                                ?>
                                    <option value="<?= $b['merk_id'] ?>"><?= $b['merk_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" required id="kategoris" class="form-control select2">
                                <option value="">-Kategori-</option>
                                <?php
                                $kategori = $con->select('tb_kategori', '*');
                                foreach ($kategori as $b) {
                                ?>
                                    <option value="<?= $b['kategori_id'] ?>"><?= $b['kategori_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Divisi</label>
                            <select required name="divisi" id="divisis" class="form-control select2">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Sub Divisi</label>
                            <select name="sub_divisi" id="sub_divisis" class="form-control select2">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Gender</label>
                            <select required name="gender" id="genders" class="form-control select2">
                                <option value="">-Gender-</option>
                                <?php
                                $gender = $con->select('tb_gender', '*');
                                foreach ($gender as $b) {
                                ?>
                                    <option value="<?= $b['gender_id'] ?>"><?= $b['gender_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Modal</label>
                            <input type="text" required name="modal" class="form-control" id="modal" placeholder="Harga Modal...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" required name="jual" class="form-control" id="jual" placeholder="Harga Jual...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="text" name="thumbnail" class="form-control" id="thumbnail" placeholder="Thumbnail...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto1</label>
                            <input type="text" name="foto1" class="form-control" id="foto1" placeholder="Foto 1...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto2</label>
                            <input type="text" name="foto2" class="form-control" id="foto2" placeholder="Foto 2...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto3</label>
                            <input type="text" name="foto3" class="form-control" id="foto3" placeholder="Foto 3...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto4</label>
                            <input type="text" name="foto4" class="form-control" id="foto4" placeholder="Foto 4...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto5</label>
                            <input type="text" name="foto5" class="form-control" id="foto5" placeholder="Foto 5...">
                        </div>
                    </div>

                </div>
                <div class="text-right">
                    <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $("#kategoris").change(function() {
        var kategoris = $('#kategoris option:selected').val();
        console.log(kategoris);
        $.ajax({
            type: "GET",
            url: "inc/gudang/filter/data_divisi.php",
            data: {
                'kategori_id': kategoris
            },
            success: function(response) {
                $('#divisis').html(response);
            }
        });
    })

    $("#divisis").change(function() {
        var divisis = $('#divisis option:selected').val();
        console.log(divisis);
        $.ajax({
            type: "GET",
            url: "inc/gudang/filter/data_subdivisi.php",
            data: {
                'divisi_id': divisis
            },
            success: function(response) {
                $('#sub_divisis').html(response);
            }
        });
    })






    $(document).ready(function() {
        $('#tanggal').change(function() {
            $('#id').focus()
        })

        $('#kategoris').change(function(e) {
            e.preventDefault();
            var kategori = $(this).val()
            var merek = $('#mereks').val()
            axios.post('inc/gudang/ukuran.php', {
                'id_merek': merek,
                'id_kategori': kategori
            }).then(function(res) {
                $('[name ="ukuran[]"]').html(res.data)
            }).catch(function(err) {
                console.log(err)
            })
        })
    })

    function kosong1() {
        $('#ue').val('')
        $('#us').val('')
        $('#uk').val('')
        $('#cm').val('')
    }

    function kosong() {
        $('#id').val('')
        $('#artikel').val('')
        $('#nama').val('')
        $('#jumlah').val('')
        $('#modal').val('')
        $('#jual').val('')
        $('#mereks').val('')
        $('#genders').val('')
        $('#kategoris').val('')
        $('#divisis').val('')
        $('#sub_divisis').val('')
    }
</script>
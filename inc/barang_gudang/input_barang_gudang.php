<div class="container">
    <div class="card">
        <form action="simpan_barang_gudang.html" method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
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
                            <input type="date" required name="barang_tgl" value="<?= date('Y-m-d') ?>" id="barang_tgl" class="form-control">
                        </div>
                    </div>
                    <!-- uniq id -->
                    <?php
                    $karakter = '1234567890';
                    $shuffle  = substr(str_shuffle($karakter), 0, 14);
                    $artikel  = substr(str_shuffle($karakter), 0, 8);
                    ?>
                    <input type="hidden" value="<?= $shuffle ?>" required name="barang_kode" id="barang_kode" class="form-control">
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Jenis</label>
                            <select name="barang_kategori" id="barang_kategori" class="form-control select2">
                                <option value="">Pilih</option>
                                <option value="Sepatu">Sepatu</option>
                                <option value="Kaos Kaki">Kaos Kaki</option>
                                <option value="Barang Lainnya">Barang Lainnya</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" required name="barang_artikel" value="" id="barang_artikel" class="form-control" placeholder="Artikel">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required name="barang_nama" id="barang_nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Merek</label>
                            <select name="id_merek" id="id_merek" required class="form-control select2">
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
                            <select name="id_kategori" required id="id_kategori" class="form-control select2" style="width: 100%;">
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
                            <select required name="id_divisi" id="id_divisi" class="form-control select2" style="width: 100%;">
                                <option value="">-Pilih Divisi-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Subdivisi</label>
                            <select name="id_subdivisi" id="id_subdivisi" class="form-control select2" required style="width: 100%;">
                                <option value="">-Pilih Subdivisi-</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Gender</label>
                            <select required name="id_gender" id="id_gender" class="form-control select2">
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
                            <input type="number" required name="barang_modal" class="form-control" id="barang_modal" placeholder="Harga Modal...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="number" required name="barang_jual" class="form-control" id="barang_jual" placeholder="Harga Jual...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Berat Barang</label>
                            <input type="number" required name="barang_berat" class="form-control" id="barang_berat" placeholder="Berat Barang ...">
                            <span style="color: red; font-size: 12px;">*Dalam satuan gram</span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Thumbnail</label>
                            <input type="text" name="barang_thumbnail" class="form-control" id="barang_thumbnail" placeholder="Thumbnail...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto1</label>
                            <input type="text" name="barang_foto1" class="form-control" id="barang_foto1" placeholder="Foto 1...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto2</label>
                            <input type="text" name="barang_foto2" class="form-control" id="barang_foto2" placeholder="Foto 2...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto3</label>
                            <input type="text" name="barang_foto3" class="form-control" id="barang_foto3" placeholder="Foto 3...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto4</label>
                            <input type="text" name="barang_foto4" class="form-control" id="barang_foto4" placeholder="Foto 4...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Foto5</label>
                            <input type="text" name="barang_foto5" class="form-control" id="barang_foto5" placeholder="Foto 5...">
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
    $("#id_kategori").change(function() {
        var id_kategori = $('#id_kategori option:selected').val();
        console.log(id_kategori);
        $.ajax({
            type: "GET",
            url: "inc/barang_gudang/filter/data_divisi.php",
            data: {
                'kategori_id': id_kategori
            },
            success: function(response) {
                $('#id_divisi').html(response);
                $('#id_subdivisi').html("<option>-Pilih Subdivisi-</option>");
            }
        });
    })

    $("#id_divisi").change(function() {
        var id_divisi = $('#id_divisi option:selected').val();
        console.log(id_divisi);
        $.ajax({
            type: "GET",
            url: "inc/barang_gudang/filter/data_subdivisi.php",
            data: {
                'divisi_id': id_divisi
            },
            success: function(response) {
                $('#id_subdivisi').html(response);
            }
        });
    })

    $(document).ready(function() {
        $('#barang_tgl').change(function() {
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
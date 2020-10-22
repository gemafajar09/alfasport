<div class="page-title">
    <div class="title_left">
        <h3>Cari Barang</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
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
    <div class="x_content table-responsive">
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Artikel Barang</label>
                <select name="artikel" id="artikel" class="form-control select2">
                    <option value="">-Artikel Barang-</option>
                    <?php
                    $artikel = $con->select('tb_gudang', '*');
                    foreach ($artikel as $a) {
                    ?>
                        <option value="<?= $a['id_gudang'] ?>"><?= $a['nama'] ?> - <?= $a['artikel'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Toko</label>
                <select name="toko" id="toko" class="form-control select2">
                    <option value="">-Semua Toko-</option>
                    <?php
                    if($_COOKIE['id_toko'] == 0){
                        $toko = $con->query('SELECT * FROM toko WHERE id_toko != 0');
                    }else{
                        $toko = $con->query("SELECT * FROM toko WHERE id_toko = '$_COOKIE[id_toko]'");
                    }
                    foreach ($toko as $t) {
                    ?>
                        <option value="<?= $t['id_toko'] ?>"><?= $t['nama_toko'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <hr>
        </div>
        <div id="kops" style="display: none;">
            <div class="col-sm-6 col-md-6 col-lg-6">
                <table>
                    <tr>
                        <th>Artikel</th>
                        <td>:</td>
                        <td><span id="namaartikel"></span></td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>:</td>
                        <td><span id="namabarang"></span></td>
                    </tr>
                    <tr>
                        <th>Harga Modal</th>
                        <td>:</td>
                        <td><span id="modal"></span></td>
                    </tr>
                    <tr>
                        <th>Harga Jual</th>
                        <td>:</td>
                        <td><span id="jual"></span></td>
                    </tr>
                    <!-- <tr>
                        <th>Harga Diskon</th>
                        <td>:</td>
                        <td><span id="hargadiskon"></span></td>
                    </tr> -->
                    <!-- <tr>
                        <th>Diskon</th>
                        <td>:</td>
                        <td><span id="diskon"></span>%</td>
                    </tr> -->
                    <!-- <tr>
                        <th>Merk</th>
                        <td>:</td>
                        <td><span id="merk"></span></td>
                    </tr> -->
                </table>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-6">
                <table>
                    <tr>
                        <th>Merk</th>
                        <td>:</td>
                        <td><span id="merk"></span></td>
                    </tr>
                    <tr>
                        <th>Divisi</th>
                        <td>:</td>
                        <td><span id="divisi"></span></td>
                    </tr>
                    <tr>
                        <th>Kategori</th>
                        <td>:</td>
                        <td><span id="kategori"></span></td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td>:</td>
                        <td><span id="gender"></span></td>
                    </tr>
                    <!-- <tr>
                        <th>Pelanggan</th>
                        <td>:</td>
                        <td><span id="">All</span></td>
                    </tr> -->
                </table>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <hr>
            </div>
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <!-- <th>Barcode</th> -->
                        <th>Nama Toko</th>
                        <th>Jumlah</th>
                        <th>
                            <select name="ukuran_nama" id="ukuran_nama" class="form-control" width="100%">
                                <option value="ue">UE</option>
                                <option value="uk">UK</option>
                                <option value="us">US</option>
                                <option value="cm">CM</option>
                            </select>
                        </th>
                        <th>Umur Barang</th>
                        <th>Tanggal Masuk Gudang</th>
                        <th>Tanggal Masuk Toko</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#toko').change(function(e) {
        e.preventDefault()
        var toko = $(this).val()
        var artikel = $('#artikel').val()
        axios.post('inc/cari/filter/toko.php', {
            'toko': toko,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            var data = res.data;
            console.log(data.detail);
            if (data.detail != false) {

                var caridiskon = data.detail.jual * data.detail.diskon / 100;
                var hargadiskon = data.detail.jual - caridiskon;

                $('#namaartikel').text(data.detail.artikel);
                $('#modal').text(data.detail.modal);
                $('#jual').text(data.detail.jual);
                $('#gender').text(data.detail.gender_nama);
                $('#kategori').text(data.detail.kategori_nama);
                $('#divisi').text(data.detail.divisi_nama);
                $('#merk').text(data.detail.merk_nama);
                // $('#diskon').text(data.detail.diskon);
                // $('#hargadiskon').text(hargadiskon);
            } else {
                $('#namaartikel').text('');
                $('#modal').text('');
                $('#jual').text('');
                $('#gender').text('');
                $('#kategori').text('');
                $('#divisi').text('');
                $('#merk').text('');
                $('#diskon').text('');
                $('#hargadiskon').text('');
            }

            $('#isi').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#artikel').change(function(e) {
        e.preventDefault()
        var artikel = $(this).val()
        var toko = $('#toko').val()
        axios.post('inc/cari/filter/toko.php', {
            'toko': toko,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            // console.log(res);
            var data = res.data;
            if (data.detail != false) {

                var caridiskon = data.detail.jual * data.detail.diskon / 100;
                var hargadiskon = data.detail.jual - caridiskon;

                $('#namaartikel').text(data.detail.artikel);
                $('#namabarang').text(data.detail.nama);
                $('#modal').text(data.detail.modal);
                $('#jual').text(data.detail.jual);
                $('#gender').text(data.detail.gender_nama);
                $('#kategori').text(data.detail.kategori_nama);
                $('#divisi').text(data.detail.divisi_nama);
                $('#merk').text(data.detail.merk_nama);
                $('#diskon').text(data.detail.diskon);
                $('#hargadiskon').text(hargadiskon);
            } else {
                $('#namaartikel').text('');
                $('#namabarang').text('');
                $('#modal').text('');
                $('#jual').text('');
                $('#gender').text('');
                $('#kategori').text('');
                $('#divisi').text('');
                $('#merk').text('');
                $('#diskon').text('');
                $('#hargadiskon').text('');
            }
            $('#isi').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })

    $(document).ready(function() {
        $("#ukuran_nama").change(function() {
            var ukuran_nama = $(this).children("option:selected").val();
            if (ukuran_nama == "us") {
                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "block";
                }

                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }

            } else if (ukuran_nama == "uk") {

                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }
            } else if (ukuran_nama == "cm") {
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
            } else {
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }
            }
        });
    });
</script>
<div class="page-title">
    <div class="title_left">
        <h3>Cari Sepatu</h3>
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
                <label>Artikel Sepatu</label>
                <select name="artikel" id="artikel" class="form-control select2">
                    <option value="">-Artikel Sepatu-</option>
                    <?php
                    $artikel = $con->select('tb_barang', '*', array('barang_kategori' => 'Sepatu'));
                    foreach ($artikel as $a) {
                    ?>
                        <option value="<?= $a['barang_id'] ?>"><?= $a['barang_nama'] ?> - <?= $a['barang_artikel'] ?></option>
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
                    if ($_COOKIE['id_toko'] == 0) {
                        $toko = $con->query('SELECT * FROM toko WHERE id_toko != 0');
                    } else {
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

            <div id="tampilkan">

            </div>

        </div>
    </div>
</div>

<script>
    $('#toko').change(function(e) {
        e.preventDefault()
        var toko = $(this).val()
        var artikel = $('#artikel').val()
        axios.post('inc/searching/cari_sepatu/filter/toko.php', {
            'toko': toko,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            // console.log(res);
            var data = res.data;
            if (data.detail != false) {
                // var caridiskon = data.detail.jual * data.detail.diskon / 100;
                // var hargadiskon = data.detail.jual - caridiskon;
                $('#namaartikel').text(data.detail.barang_artikel);
                $('#namabarang').text(data.detail.barang_nama);
                $('#modal').text(data.detail.barang_modal);
                $('#jual').text(data.detail.barang_jual);
                $('#gender').text(data.detail.gender_nama);
                $('#kategori').text(data.detail.kategori_nama);
                $('#divisi').text(data.detail.divisi_nama);
                $('#merk').text(data.detail.merk_nama);
                // $('#diskon').text(data.detail.diskon);
                // $('#hargadiskon').text(hargadiskon);
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
            $('#tampilkan').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#artikel').change(function(e) {
        e.preventDefault()
        var artikel = $(this).val()
        var toko = $('#toko').val()
        axios.post('inc/searching/cari_sepatu/filter/toko.php', {
            'toko': toko,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            // console.log(res);
            var data = res.data;
            if (data.detail != false) {
                // var caridiskon = data.detail.jual * data.detail.diskon / 100;
                // var hargadiskon = data.detail.jual - caridiskon;
                $('#namaartikel').text(data.detail.barang_artikel);
                $('#namabarang').text(data.detail.barang_nama);
                $('#modal').text(data.detail.barang_modal);
                $('#jual').text(data.detail.barang_jual);
                $('#gender').text(data.detail.gender_nama);
                $('#kategori').text(data.detail.kategori_nama);
                $('#divisi').text(data.detail.divisi_nama);
                $('#merk').text(data.detail.merk_nama);
                // $('#diskon').text(data.detail.diskon);
                // $('#hargadiskon').text(hargadiskon);
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
            $('#tampilkan').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })
</script>
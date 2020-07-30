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
                        <option value="<?= $a['id_gudang'] ?>"><?= $a['artikel'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Toko</label>
                <select name="toko" id="toko" class="form-control select2">
                    <option value="">-Toko-</option>
                    <?php
                    $toko = $con->select('toko', '*');
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
            <div class="col-sm-4 col-md-4 col-lg-4">
                <table>
                    <tr>
                        <th>Artikel</th>
                        <td>:</td>
                        <td><span id="namaartikel"></span></td>
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
                    <tr>
                        <th>Harga Diskon</th>
                        <td>:</td>
                        <td><span id="hargadiskon"></span></td>
                    </tr>
                    <!-- <tr>
                        <th>Satuan</th>
                        <td>:</td>
                        <td><span id=""></span></td>
                    </tr> -->
                </table>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
                <table>
                    <tr>
                        <th>Diskon ID</th>
                        <td>:</td>
                        <td><span id="diskonid"></span></td>
                    </tr>
                    <tr>
                        <th>Diskon</th>
                        <td>:</td>
                        <td><span id="diskon"></span></td>
                    </tr>
                    <tr>
                        <th>Berlaku</th>
                        <td>:</td>
                        <td><span id="berlaku"></span></td>
                    </tr>
                    <tr>
                        <th>Pelanggan</th>
                        <td>:</td>
                        <td><span id="">All</span></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-4 col-md-4 col-lg-4">
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
                </table>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-12">
                <hr>
            </div>
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>ID</th>
                        <th>Jumlah</th>
                        <th colspan="4" class="text-center">Ukuran</th>
                        <th>Tanggal Masuk Gudang</th>
                        <th>Tanggal Masuk Toko</th>
                    </tr>
                    <tr>
                        <th colspan="3">&nbsp;</th>
                        <th>UE</th>
                        <th>UK</th>
                        <th>US</th>
                        <th>CM</th>
                        <th colspan="2">&nbsp;</th>
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
            console.log(res);
            var data = res.data;
            $('#namaartikel').text(data.detail.artikel);
            $('#modal').text(data.detail.modal);
            $('#jual').text(data.detail.jual);
            $('#gender').text(data.detail.gender_nama);
            $('#kategori').text(data.detail.kategori_nama);
            $('#divisi').text(data.detail.divisi_nama);
            $('#merk').text(data.detail.merk_nama);

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
            $('#namaartikel').text(data.detail.artikel);
            $('#modal').text(data.detail.modal);
            $('#jual').text(data.detail.jual);
            $('#gender').text(data.detail.gender_nama);
            $('#kategori').text(data.detail.kategori_nama);
            $('#divisi').text(data.detail.divisi_nama);
            $('#merk').text(data.detail.merk_nama);

            $('#isi').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })
</script>
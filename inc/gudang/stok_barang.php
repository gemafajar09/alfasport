<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Gudang</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12   form-group pull-right top_search">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2">
                            <option value="">-SELECT-</option>
                            <?php 
                                $data = $con->select('tb_merk','*');
                                foreach($data as $merk){
                            ?>
                            <option value="<?= $merk['merk_id'] ?>"><?= $merk['merk_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2">
                            <option value="">-SELECT-</option>
                            <?php 
                                $datak = $con->select('tb_kategori','*');
                                foreach($datak as $kategori){
                            ?>
                            <option value="<?= $kategori['kategori_id'] ?>"><?= $kategori['kategori_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2">
                            <option value="">-SELECT-</option>
                            <?php 
                                $datad = $con->select('tb_divisi','*');
                                foreach($datad as $divisi){
                            ?>
                            <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option value="">-SELECT-</option>
                            <?php 
                                $datag = $con->select('tb_gender','*');
                                foreach($datag as $gender){
                            ?>
                            <option value="<?= $gender['gender_id'] ?>"><?= $gender['gender_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
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
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Divsi</th>
                    <th>Sub Divisi</th>
                    <th>Gender</th>
                    <th>Jumlah</th>
                    <th colspan=2>
                        <center>Harga</center>
                    </th>
                    <th>Total</th>
                    <th style="width:160px">Action</th>
                </tr>
                <tr>
                    <th colspan="10"></th>
                    <th>Modal</th>
                    <th>Jual</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataGudang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Data Gudang</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="text" name="id" id="id" class="form-control" placeholder="ID..">
                            </div>

                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="kategoris" id="kategoris" class="form-control">
                                    <option value="">-Kategori-</option>
                                    <?php
                                        $kategori = $con->select('tb_kategori','*');
                                        foreach($kategori as $b){
                                    ?>
                                    <option value="<?= $b['kategori_id'] ?>"><?= $b['kategori_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input type="text" class="form-control" id="modal" placeholder="Harga Modal...">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Artikel</label>
                                <input type="text" name="artikel" id="artikel" class="form-control" placeholder="Artikel..">
                            </div>

                            <div class="form-group">
                                <label>Divisi</label>
                                <select name="divisi" id="divisis" class="form-control">
                                    <option value="">-Divisi-</option>
                                    <?php
                                        $divisi = $con->select('tb_divisi','*');
                                        foreach($divisi as $b){
                                    ?>
                                    <option value="<?= $b['divisi_id'] ?>"><?= $b['divisi_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="text" class="form-control" id="jual" placeholder="Harga Jual...">
                            </div>
                            <!-- id_gudang -->
                            <input type="hidden" readonly id="id_gudang">
                            <!--  -->
                            
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label>Sub Divisi</label>
                                <select name="sub_divisi" id="sub_divisis" class="form-control">
                                    <option value="">-Sub Divisi-</option>
                                    <?php
                                        $subdivisi = $con->select('tb_subdivisi','*');
                                        foreach($subdivisi as $b){
                                    ?>
                                    <option value="<?= $b['subdivisi_id'] ?>"><?= $b['subdivisi_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" placeholder="Jumlah">
                            </div>
                                                       
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Merek</label>
                                <select name="merek" id="mereks" class="form-control">
                                    <option value="">-Merek-</option>
                                    <?php
                                        $merek = $con->select('tb_merk','*');
                                        foreach($merek as $b){
                                    ?>
                                    <option value="<?= $b['merk_id'] ?>"><?= $b['merk_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gender</label>
                                <select name="gender" id="genders" class="form-control">
                                    <option value="">-Gender-</option>
                                    <?php
                                        $gender = $con->select('tb_gender','*');
                                        foreach($gender as $b){
                                    ?>
                                    <option value="<?= $b['gender_id'] ?>"><?= $b['gender_nama'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                <button type="button" onclick="clearData()" class="btn btn-danger" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<div class="modal" id="dataUkuran">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                    <input type="hidden" id="idgudang" readonly>
                        <div class="col-md-3">
                            <label>Eu</label>
                            <input type="number" class="form-control" id="ue">
                        </div>
                        <div class="col-md-3">
                            <label>Us</label>
                            <input type="number" class="form-control" id="us">
                        </div>
                        <div class="col-md-3">
                            <label>Uk</label>
                            <input type="number" class="form-control" id="uk">
                        </div>
                        <div class="col-md-3">
                            <label>Cm</label>
                            <input type="number" class="form-control" id="cm">
                        </div>
                    </div>
                    <br>
                    <div align="right">
                        <button type="button" onclick="simpanukuran()" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Artikel</th>
                                <th>Nama</th>
                                <th>Merek</th>
                                <th>Kategori</th>
                                <th>Divsi</th>
                                <th>Sub Divisi</th>
                                <th>Gender</th>
                                <th>Jumlah</th>
                                <th colspan=2>
                                    <center>Harga</center>
                                </th>
                            </tr>
                            <tr>
                                <th colspan="9"></th>
                                <th>Modal</th>
                                <th>Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b id="id1"></b></td>
                                <td><b id="artikel1"></b></td>
                                <td><b id="nama1"></b></td>
                                <td><b id="merek1"></b></td>
                                <td><b id="kategori1"></b></td>
                                <td><b id="divisi1"></b></td>
                                <td><b id="subdivisi1"></b></td>
                                <td><b id="gender1"></b></td>
                                <td><b id="jumlah1"></b></td>
                                <td><b id="modal1"></b></td>
                                <td><b id="jual1"></b></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                        <center>Ukuran</center>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>UE</th>
                                        <th>UK</th>
                                        <th>US</th>
                                        <th>CM</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b id="ues"></b></td>
                                        <td><b id="uks"></b></td>
                                        <td><b id="uss"></b></td>
                                        <td><b id="cms"></b></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function size(id)
    {
        $('#idgudang').val(id)
        $('#dataUkuran').modal()
    }

    function show(id)
    {
        axios.post('inc/gudang/show_detail.php',{
            'id':id
        }).then(function(res){
            var data = res.data
            $('#ues').html(data.ue)
            $('#uks').html(data.uk)
            $('#uss').html(data.us)
            $('#cms').html(data.cm)

            $('#nama1').html(data.nama)
            $('#id1').html(data.id)
            $('#artikel1').html(data.artikel)
            $('#merek1').html(data.merk_nama)
            $('#gender1').html(data.gender_nama)
            $('#divisi1').html(data.divisi_nama)
            $('#subdivisi1').html(data.subdivisi_nama)
            $('#jumlah1').html(data.jumlah)
            $('#modal1').html(data.modal)
            $('#jual1').html(data.jual)
            $('#kategori1').html(data.kategori_nama)
        }).catch(function(err){
            console.log(err)
        })
        $('#dataDetail').modal()
    }

    function tampil()
    {
        $('#dataGudang').modal()
    }

    function simpanukuran()
    {
        var id = $('#idgudang').val()
        var ue = $('#ue').val()
        var us = $('#us').val()
        var uk = $('#uk').val()
        var cm = $('#cm').val()
        axios.post('inc/gudang/aksi_ukuran.php',{
            'ue' : ue,
            'us' : us,
            'uk' : uk,
            'cm' : cm,
            'id' : id,
        }).then(function(res){
            $('#dataUkuran').modal('hide')
            ulangi(id)
            kosong1()
            $('#isi').load('inc/gudang/data_stok.php');
        }).catch(function(err){
            $('#isi').load('inc/gudang/data_stok.php');
            console.log(err)
        })
    }

    function simpan() 
    {
        var id = $('#id').val()
        var artikel = $('#artikel').val()
        var nama = $('#nama').val()
        var jumlah = $('#jumlah').val()
        var modal = $('#modal').val()
        var jual = $('#jual').val()
        var mereks = $('#mereks').val()
        var genders = $('#genders').val()
        var kategoris = $('#kategoris').val()
        var divisis = $('#divisis').val()
        var sub_divisis = $('#sub_divisis').val()
        var id_gudang = $('#id_gudang').val()
        axios.post('inc/gudang/aksi_simpan_gudang.php', {
            'id': id,
            'artikel': artikel,
            'nama': nama,
            'jumlah': jumlah,
            'modal': modal,
            'jual': jual,
            'merek': mereks,
            'gender': genders,
            'kategori': kategoris,
            'divisi': divisis,
            'sub_divisi': sub_divisis,
            'id_gudang': id_gudang
        }).then(function(res) {
            var id = res.data
            kosong()
            size(id.id_gudang)
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/data_stok.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/data_stok.php');
        })
    }

    function ulangi(id)
    {
        axios.post('inc/gudang/aksi_edit_gudang.php',{
        'id':id
        }).then(function(res){
            var data = res.data
            $('#id').val(data.id)
            $('#artikel').val(data.artikel)
            $('#nama').val(data.nama)
            $('#jumlah').val(data.jumlah)
            $('#modal').val(data.modal)
            $('#jual').val(data.jual)
            $('#mereks').val(data.id_merek)
            $('#genders').val(data.id_gender)
            $('#kategoris').val(data.id_kategori)
            $('#divisis').val(data.id_divisi)
            $('#sub_divisis').val(data.id_sub_divisi)
            $('#dataGudang').modal()
        }).catch(function(err){
            console.log(err)
        })
    }

    function edit(id)
    {
        axios.post('inc/gudang/aksi_edit_gudang.php',{
        'id':id
        }).then(function(res){
            var data = res.data
            $('#id').val(data.id)
            $('#artikel').val(data.artikel)
            $('#nama').val(data.nama)
            $('#jumlah').val(data.jumlah)
            $('#modal').val(data.modal)
            $('#jual').val(data.jual)
            $('#mereks').val(data.id_merek)
            $('#genders').val(data.id_gender)
            $('#kategoris').val(data.id_kategori)
            $('#divisis').val(data.id_divisi)
            $('#sub_divisis').val(data.id_sub_divisi)
            $('#id_gudang').val(data.id_gudang)
            $('#ue').val(data.ue)
            $('#us').val(data.us)
            $('#uk').val(data.uk)
            $('#cm').val(data.cm)
            $('#idgudang').val(data.id_gudang)
            $('#dataGudang').modal()
        }).catch(function(err){
            console.log(err)
        })
    }

    function hapus(id) 
    {
        axios.post('inc/gudang/aksi_hapus_gudang.php', {
            'id_gudang': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/gudang/data_stok.php');
        })
    }

    function kosong1()
    {
        $('#ue').val('')
        $('#us').val('')
        $('#uk').val('')
        $('#cm').val('')
        $('#idgudang').val('')
    }

    function kosong() 
    {
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

    function clearData()
    {
        kosong()
        kosong1()
    }

    $('#isi').load('inc/gudang/data_stok.php');
</script>
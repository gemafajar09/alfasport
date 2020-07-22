<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Toko</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Toko</label>
                        <select name="tokos" id="tokos" class="form-control select2">
                            <option value="">ALL</option>
                            <?php
                            $data = $con->select('toko','*');
                            foreach($data as $a){
                            ?>
                                <option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2">
                            <option value="">-Merek-</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2">
                            <option value="">-Kategori-</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2">
                            <option value="">-Divisi-</option>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option value="">-Gender-</option>
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Artikel</th>
                    <th>Merek</th>
                    <th>Kategori</th>
                    <th>Divsi</th>
                    <th>Sub Divisi</th>
                    <th>Gender</th>
                    <th>Jumlah</th>
                    <th>Modal</th>
                    <th>Jual</th>
                    <!-- <th>Total</th> -->
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataToko">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h5 class="modal-title">Data Toko</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Toko</label><br>
                                <select name="toko" id="toko" style="width:260px" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <?php
                                        $data = $con->select('toko','*');
                                        foreach($data as $a){
                                    ?>
                                        <option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="">Barang Gudang</label><br>
                                <select name="gudang" id="gudang" style="width:460px" class="form-control select2">
                                    <option value="">-PILIH-</option>
                                    <?php
                                        $data = $con->query("SELECT a.*, b.*, c.* FROM tb_gudang_detail a JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran JOIN tb_gudang c ON a.id=c.id ")->fetchAll();
                                        foreach($data as $a){
                                    ?>
                                        <option value="<?= $a['id_gudang'] ?>"><?=  $a['artikel']  ?> - <?=  $a['nama']  ?> - <?=  $a['id']  ?>-(UE:<?= $a['ue'] ?>&nbsp;US:<?= $a['us'] ?>&nbsp;UK:<?= $a['uk'] ?>&nbsp;CM:<?= $a['cm'] ?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 text-left">
                            <label for="">Jumlah</label><br>
                            <input type="text" style="width:80px" name="jumlah" id="jumlah" class="form-control">
                            <input type="hidden" id="id_stok_toko">
                        </div>
                        </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary btn-sm" data-dismiss="modal">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
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
                                <th>Nama Toko</th>
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
                                <th colspan="10"></th>
                                <th>Modal</th>
                                <th>Jual</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><b id="id1"></b></td>
                                <td><b id="nama_toko1"></b></td>
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
    function tampil()
    {
        $('#toko').focus()
        $('#dataToko').modal()
    }

    $('#gudang').change(function(){
        document.getElementById('jumlah').focus()
    })

    function simpan() {
        var toko = $('#toko').val()
        var gudang = $('#gudang').val()
        var jumlah = $('#jumlah').val()
        var id_stok_toko = $('#id_stok_toko').val()
        axios.post('inc/toko/toko_gudang/simpan_Stok_toko.php', {
            'toko': toko,
            'gudang': gudang,
            'jumlah': jumlah,
            'id': id_stok_toko
        }).then(function(res) {
            kosong()
            $('#dataToko').modal('hide')
            $('#isi').load('inc/toko/toko_gudang/data_stok.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataToko').modal('hide')
            $('#isi').load('inc/toko/toko_gudang/data_stok.php');
        })
    }

    function show(id)
    {
        axios.post('inc/toko/toko_gudang/show_detail.php',{
            'id':id
        }).then(function(res){
            var data = res.data
            $('#ues').html(data.ue)
            $('#uks').html(data.uk)
            $('#uss').html(data.us)
            $('#cms').html(data.cm)

            $('#nama1').html(data.nama)
            $('#nama_toko1').html(data.nama_toko)
            $('#id1').html(data.id)
            $('#artikel1').html(data.artikel)
            $('#merek1').html(data.merk_nama)
            $('#gender1').html(data.gender_nama)
            $('#divisi1').html(data.divisi_nama)
            $('#subdivisi1').html(data.subdivisi_nama)
            $('#jumlah1').html(data.jml)
            $('#modal1').html(data.modal)
            $('#jual1').html(data.jual)
            $('#kategori1').html(data.kategori_nama)
        }).catch(function(err){
            console.log(err)
        })
        $('#dataDetail').modal()
    }


    function edit(id)
    {
    axios.post('inc/toko/toko_gudang/edit_Stok_toko.php',{
        'id':id
        }).then(function(res){
            var data = res.data
            $('#toko').val(data.id_toko)
            $('#gudang').val(data.id_gudang)
            $('#jumlah').val(data.jumlah)
            $('#id_stok_toko').val(data.id_stok_toko)
            $('#dataToko').modal()
        }).catch(function(err){
            console.log(err)
        })
    }
    function hapus(id) {
        axios.post('inc/toko/toko_gudang/hapus_Stok_toko.php', {
            'id_stok_toko': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/toko/toko_gudang/data_stok.php');
        })
    }

    function kosong() {
        $('#id_stok_toko').val('')
        $('#toko').val('')
        $('#gudang').val('')
        $('#jumlah').val('')
    }

    $('#isi').load('inc/toko/toko_gudang/data_stok.php');
</script>
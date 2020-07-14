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
            <a href="entry_gudang.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
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
    <div class="x_content">
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
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
                    <!-- <th>Jumlah</th> -->
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <!-- <th>Total</th> -->
                    <th class="text-center" style="width:160px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
               <h4>Detail Barang Gudang</h4><hr>
               <div id="detail"></div>
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
            $('#detail').html(data)
        }).catch(function(err){
            console.log(err)
        })
        $('#dataDetail').modal()
    }

    function tampil()
    {
        $('#dataGudang').modal()
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
        var tanggal = $('#tanggal').val()
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
            'id_gudang': id_gudang,
            'tanggal': tanggal
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
            $('#tanggal').val(data.tangal)
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

    function hapus(id_gudang) 
    {
        axios.post('inc/gudang/aksi_hapus_gudang.php', {
            'id_gudang': id_gudang
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
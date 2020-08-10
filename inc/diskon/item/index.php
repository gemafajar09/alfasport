<div class="page-title">
    <div class="title_left">
        <h3>Data Diskon Per Item</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2">
                            <option value="">-Merek-</option>
                            <?php
                            $merek = $con->select('tb_merk','*');
                            foreach($merek as $merk){
                            ?>
                                <option value="<?= $merk['merk_id'] ?>"><?= $merk['merk_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2">
                            <option value="">-Kategori-</option>
                            <?php
                            $kategori = $con->select('tb_kategori','*');
                            foreach($kategori as $kategori){
                            ?>
                                <option value="<?= $kategori['kategori_id'] ?>"><?= $kategori['kategori_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2">
                            <option value="">-Divisi-</option>
                            <?php
                            $divisi = $con->select('tb_divisi','*');
                            foreach($divisi as $divisi){
                            ?>
                                <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Sub Divisi</label>
                        <select name="tokos" id="tokos" class="form-control select2">
                            <option value="">-Sub Divisi-</option>
                            <?php
                            $subdivisi = $con->select('tb_subdivisi','*');
                            foreach($subdivisi as $subdivisi){
                            ?>
                                <option value="<?= $subdivisi['subdivisi_id'] ?>"><?= $subdivisi['subdivisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option value="">-Gender-</option>
                            <?php
                            $gender = $con->select('tb_gender','*');
                            foreach($gender as $gender){
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
                <a href="item_diskon.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
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
                    <th>
                        <!-- <input type="checkbox" class="check_all" id="checkAll"> -->
                    </th>
                    <th>Artikel</th>
                    <th>Nama</th>
                    <th>Merek</th>
                    <th>Harga Modal</th>
                    <th>Harga Jual</th>
                    <th>UE</th>
                    <th>UK</th>
                    <th>US</th>
                    <th>CM</th>
                    <th>Umur Barang</th>
                    <th>Mulai</th>
                    <th>Berakhir</th>
                    <th>Diskon</th>
                    <th>Action</th>
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
            toastr.info('SUCCESS..')
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/data_stok.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            toastr.warning('ERROR..')
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/data_stok.php');
        })
    }

    function hapus(id) 
    {
        axios.post('inc/gudang/aksi_hapus_gudang.php', {
            'id': id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/gudang/data_stok.php');
        }).catch(function(err){
            toastr.warning('ERROR..')
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

    $('#merek').change(function(e){
        e.preventDefault()
        var merek = $(this).val()
        axios.post('inc/gudang/filter/merek.php',{
            'merek':merek
        }).then(function(res){
            $('#isi').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    })

    $('#kategori').change(function(e){
        e.preventDefault()
        var kategori = $(this).val()
        axios.post('inc/gudang/filter/kategori.php',{
            'kategori':kategori
        }).then(function(res){
            $('#isi').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    })

    $('#divisi').change(function(e){
        e.preventDefault()
        var divisi = $(this).val()
        axios.post('inc/gudang/filter/divisi.php',{
            'divisi':divisi
        }).then(function(res){
            $('#isi').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    })

    $(document).ready(function(){
        $('#isi').load('inc/diskon/item/data_barang.php');
    })

    $(function() {
        $('.checkAll').click(function(e) {
            e.preventDefault()
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });

</script>
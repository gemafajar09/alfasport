<div class="page-title">
    <div class="title_left">
        <h3>Data Barang Toko</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12   form-group pull-right top_search">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2" multiple="multiple">
                            <option value="">-Merek-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2" multiple="multiple">
                            <option value="">-Kategori-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2" multiple="multiple">
                            <option value="">-Divisi-</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2" multiple="multiple">
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive" style="font-size:11px">
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
                    <th colspan=2>
                        <center>Harga</center>
                    </th>
                    <th>Total</th>
                    <th style="width:180px">Action</th>
                </tr>
                <tr>
                    <th colspan="11"></th>
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
                                        $data = $con->query("SELECT a.id_gudang, a.artikel, a.nama, a.id, b.ue, b.us, b.uk, b.cm FROM tb_gudang a JOIN tb_gudang_detail b ON a.id_gudang=b.id_gudang")->fetchAll();
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
        axios.post('inc/toko/simpan_Stok_toko.php', {
            'toko': toko,
            'gudang': gudang,
            'jumlah': jumlah,
            'id': id_stok_toko
        }).then(function(res) {
            kosong()
            $('#dataToko').modal('hide')
            $('#isi').load('inc/toko/data_stok.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataToko').modal('hide')
            $('#isi').load('inc/toko/data_stok.php');
        })
    }


function edit(id)
{
    axios.post('inc/toko/edit_Stok_toko.php',{
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
        axios.post('inc/toko/hapus_Stok_toko.php', {
            'id_toko': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/toko/data_stok.php');
        })
    }

    function kosong() {
        $('#id_stok_toko').val('')
        $('#toko').val('')
        $('#gudang').val('')
        $('#jumlah').val('')
    }

    $('#isi').load('inc/toko/data_stok.php');
</script>
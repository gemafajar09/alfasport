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
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px">
            <thead>
                <tr>
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
                    <th style="width:120px">Action</th>
                </tr>
                <tr>
                    <th colspan="9"></th>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Toko</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>ID</label>
                                <input type="number" name="id" id="id" class="form-control" placeholder="ID..">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label>Artikel</label>
                                <input type="text" name="artikel" id="artikel" class="form-control" placeholder="Artikel">
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" placeholder="Jumlah..">
                            </div>
                            <div class="form-group">
                                <label>Harga Modal</label>
                                <input type="number" name="modal" id="modal" class="form-control" placeholder="Harga Modal..">
                            </div>
                            <div class="form-group">
                                <label>Harga Jual</label>
                                <input type="number" name="jual" id="jual" class="form-control" placeholder="Harga Jual..">
                            </div>
                        </div>
                        <div class="col-md-6">
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
                            <input type="hidden" id="id_toko">
                        </div>
                    </div>
                </div>
            </div>

      <div class="modal-footer">
        <button type="button" onclick="simpan()" class="btn btn-primary" data-dismiss="modal">Simpan</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>


        </div>
    </div>
</div>

<script>
    function tampil()
    {
        $('#dataToko').modal()
    }

    function simpan() {
        var id = $('#id').val()
        var nama = $('#nama').val()
        var artikel = $('#artikel').val()
        var jumlah = $('#jumlah').val()
        var modal = $('#modal').val()
        var jual = $('#jual').val()
        var mereks = $('#mereks').val()
        var genders = $('#genders').val()
        var kategoris = $('#kategoris').val()
        var divisis = $('#divisis').val()
        var sub_divisis = $('#sub_divisis').val()
        var id_gudang = $('#id_gudang').val()

        axios.post('inc/toko/simpan_Stok_toko.php', {
            'id': id,
            'nama': nama,
            'artikel': artikel,
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
            $('#id').val(data.id)
            $('#nama').val(data.nama)
            $('#artikel').val(data.artikel)
            $('#jumlah').val(data.jumlah)
            $('#modal').val(data.modal)
            $('#jual').val(data.jual)
            $('#mereks').val(data.id_merek)
            $('#genders').val(data.id_gender)
            $('#kategoris').val(data.id_kategori)
            $('#divisis').val(data.id_divisi)
            $('#sub_divisis').val(data.id_sub_divisi)
            $('#id_gudang').val(data.id_gudang)
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
        $('#id').val('')
        $('#nama').val('')
        $('#artikel').val('')
        $('#jumlah').val('')
        $('#modal').val('')
        $('#jual').val('')
        $('#mereks').val('')
        $('#genders').val('')
        $('#kategoris').val('')
        $('#divisis').val('')
        $('#sub_divisis').val('')
    }

    $('#isi').load('inc/toko/data_stok.php');
</script>
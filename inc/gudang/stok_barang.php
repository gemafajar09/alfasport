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
        <table class="table table-striped" id="datatable" style="font-size:11px">
            <thead>
                <tr>
                    <th>ID</th>
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
                    <th style="width:120px">Action</th>
                </tr>
                <tr>
                    <th colspan="8"></th>
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
                <h4 class="modal-title">Data Gudang</h4>
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
                                <label>Merek</label>
                                <select name="nama" id="nama" class="form-control">
                                    <option value="">-Merek-</option>
                                </select>
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
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Merek</label>
                                <select name="merek" id="mereks" class="form-control">
                                    <option value="">-Merek-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>
                                <select name="merek" id="kategoris" class="form-control">
                                    <option value="">-Kategori-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Divisi</label>
                                <select name="divisi" id="divisis" class="form-control">
                                    <option value="">-Divisi-</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sub Divisi</label>
                                <select name="sub_divisi" id="sub_divisis" class="form-control">
                                    <option value="">-Sub Divisi-</option>
                                </select>
                            </div>
                            <input type="hidden" id="id_gudang">
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
        $('#dataGudang').modal()
    }

    function simpan() {
        var id = $('#id').val()
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
            'nama': nama,
            'jumlah': jumlah,
            'modal': modal,
            'jual': jual,
            'mereks': mereks,
            'genders': genders,
            'kategories': kategories,
            'divisis': divisis,
            'sub_divisis': sub_divisis,
            'id_gudang': id_gudang,
        }).then(function(res) {
            kosong()
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/stok_barang.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/gudang/stok_barang.php');
        })
    }


function edit(id)
{
    axios.post('inc/gudang/aksi_edit_gudang.php',{
        'id':id
        }).then(function(res){
            var data = res.data
            $('#id').val(data.id)
            $('#nama').val(data.nama)
            $('#jumlah').val(data.jumlah)
            $('#modal').val(data.modal)
            $('#jual').val(data.jual)
            $('#mereks').val(data.merek)
            $('#genders').val(data.gender)
            $('#kategories').val(data.id_kategori)
            $('#divisia').val(data.id_divisi)
            $('#sub_divisis').val(data.id_sub_divisi)
            $('#id_gudang').val(data.id_gudang)
            $('#dataGudang').modal()
        }).catch(function(err){
            console.log(err)
        })
    }
    function hapus(id) {
        axios.post('inc/gudang/aksi_hapus_gudang.php', {
            'id_gudang': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/gudang/stok_barang.php');
        })
    }

    function kosong() {
        $('#id').val('')
        $('#nama').val('')
        $('#jumlah').val('')
        $('#modal').val('')
        $('#jual').val('')
        $('#mereks').val('')
        $('#genders').val('')
        $('#kategories').val('')
        $('#divisis').val('')
        $('#sub_divisis').val('')
    }

    $('#isi').load('inc/toko/data_stok.php');
</script>
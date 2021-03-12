<div class="page-title">
    <div class="title_left">
        <h3>Entry Return Barang</h3>
    </div>
</div>
<?php
$angka = '1234567890';
$shuffle  = substr(str_shuffle($angka), 0, 11);
$ID = 'STO_'.$shuffle;
?>
<div class="x_panel">
    <div class="x_title">
        <div class="row">
                <div class="form-group">
                    <a href="return.html" class="btn btn-info btn-round btn-xl"><i class="fa fa-arrow-left"></i></a>
                </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <div class="input-group-content">
                        <label for="vid">ID</label>
                        <input type="text" class="form-control" id="id" value="<?= $ID ?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <label>Tanggal</label>
                            <input type="datetime-local" id="tanggal" class="form-control" name="tanggal" value="<?= date('Y-m-d H:i:s') ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <label>Toko</label>
                            <select name="toko" id="toko" class="form-control select2">
                                <option value="">-Toko-</option>
                                <?php
                                $toko = $con->query("SELECT * FROM toko WHERE id_toko != 0");
                                foreach ($toko as $toko) {
                                ?>
                                    <option value="<?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <button type="button" onclick="input()" class="btn btn-info btn-round btn-xl"><i class="fa fa-plus"></i></button>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <div class="container-fluid">
            <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Ukuran</th>
                        <th>Stok Awal</th>
                        <th>Return</th>
                        <th>Stok Akhir</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal" id="returnEntry">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Entry Return</h5>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <label>Barang</label>
                            <select name="produk" id="tampilProduk" class="form-control select2 tampilProduk" style="width:100%"></select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok Awal</label>
                                <input type="number" id="stokAwal" name="stokAwal" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Penyesuaian</label>
                                <input type="number" name="penyesuaian" id="penyesuaian" onkeyup="penyesuaian(this)" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok Akhir</label>
                                <input type="number" name="stokAkhir" id="stokAkhir" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <input type="text" value="-" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div align="right">
                    <button type="reset" onclick="tutup()" class="btn btn-outline-warning">Batal</button>
                    <button type="button" id="rekap" class="btn btn-outline-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function input()
    {
        var id_toko = $('#toko').val()
        var tanggal = $('#tanggal').val()
        var id = $('#id').val()
        if(id_toko == '')
        {
            toastr.warning('Silahkan Pilih Toko');
        }else{
            axios.post('inc/return/listStok.php',
            {
                'id':id,
                'tanggal':tanggal,
                'id_toko':id_toko
            }).then(function(res){
                var data = res.data
                $('.tampilProduk').html(data)
                $('#returnEntry').modal()
            })
        }
    }

    $('#rekap').on('click',function(){
        var id = $('#id').val()
        var id_stok_toko = $('#tampilProduk').val()
        var stokAwal = $('#stokAwal').val()
        var penyesuaian = $('#penyesuaian').val()
        var stokAkhir = $('#stokAkhir').val()
        axios.post('inc/return/rekapReturn.php',{
            'id':id,
            'id_stok_toko': id_stok_toko,
            'stok_awal': stokAwal,
            'penyesuaian': penyesuaian,
            'stok_akhir': stokAkhir
        }).then(function(res){
            var data = res.data 
            kosong()
        })
    })

    $('.tampilProduk').change(function(){
        var id_stok_toko = $(this).val()
        axios.post('inc/return/stokToko.php',{
            'id_stok_toko': id_stok_toko
        }).then(function(res){
            var data = res.data
            $('#stokAwal').val(data.jumlah)
        })
    })

    function penyesuaian(nilai)
    {
        var nilai = nilai.value
        var stokawal = $('#stokAwal').val()
        var hasil = parseInt(stokawal) + parseInt(nilai)
        $('#stokAkhir').val(hasil)
    }

    function kosong()
    {
        $('#tampilProduk').val()
        $('#stokAwal').val(0)
        $('#penyesuaian').val(0)
        $('#stokAkhir').val(0)
    }

    function tutup()
    {
        $('#returnEntry').modal('hide')
        $('#isi').load('inc/return/dataReturn.php');
    }

    function hapusData(id)
    {
        console.log(id)
        axios.post('inc/return/hapusDetailReturn.php',{
            'id_detail_return': id
        }).then(function(res){
            toastr.success('Data Berhasil Dihapus')
            $('#isi').load('inc/return/dataReturn.php');
        })
    }

    $('#isi').load('inc/return/dataReturn.php');
</script>
<div class="page-title">
    <div class="title_left">
        <h3>Entry Return Barang</h3>
    </div>
</div>
<?php
$angka = '1234567890';
$shuffle  = substr(str_shuffle($angka), 0, 11);
$ID = 'STO_' . $shuffle;
?>
<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <a href="return_barang.html" class="btn btn-info btn-round btn-xl"><i class="fa fa-arrow-left"></i></a>
                </div>
                <hr>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group-content">
                            <label for="vid">ID</label>
                            <input type="text" class="form-control" id="id" value="<?= $ID ?>" readonly>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <label>Tanggal</label>
                                <input type="datetime-local" id="tanggal" class="form-control" name="tanggal" value="<?= date('Y-m-d H:i:s') ?>" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <label>Toko</label>
                                <select name="toko" id="toko" class="form-control select2">
                                    <option value="">-Toko-</option>
                                    <?php
                                    $toko = $con->query("SELECT * FROM toko WHERE nama_toko != 'Gudang'");
                                    foreach ($toko as $toko) {
                                    ?>
                                        <option value="<?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group">
                            <div class="input-group-content">
                                <label>&nbsp;</label>
                                <button type="button" onclick="input()" class="form-control btn btn-info btn-round btn-xl"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                    </div>
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
                        <th>Jenis</th>
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
                        <div class="col-md-3">
                            <label>Jenis</label>
                            <select name="barang_kategori" id="barang_kategori" class="form-control" style="width:100%">
                                <option value="">- Pilih -</option>
                                <option value="Sepatu">Sepatu</option>
                                <option value="Kaos Kaki">Kaos Kaki</option>
                                <option value="Barang Lainnya">Barang Lainnya</option>
                            </select>
                        </div>
                        <div class="col-md-9">
                            <label>Barang</label>
                            <select name="barang_toko_id" id="barang_toko_id" class="form-control select2" style="width:100%"></select>
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
    // isi form id, tgl, toko terlebih dahulu
    function input() {
        var id_toko = $('#toko').val()
        var tanggal = $('#tanggal').val()
        var id = $('#id').val()
        if (id_toko == '') {
            toastr.warning('Silahkan Pilih Toko');
        } else {
            axios.post('inc/return_barang/simpan_ke_tb_return_barang.php', {
                'return_barang_kode': id,
                'return_barang_tgl': tanggal,
                'id_toko': id_toko
            }).then(function(res) {
                var data = res.data
                $('#returnEntry').modal()
            })
        }
    }

    // pilih jenis barang sebelum tampilkan nama barang
    $('#barang_kategori').change(function(e) {
        e.preventDefault();
        var barang_kategori = $(this).val();
        var id_toko = $('#toko').val()
        axios.post('inc/return_barang/cari_jenis_barang.php', {
            'barang_kategori': barang_kategori,
            'id_toko': id_toko,
        }).then(function(res) {
            var data = res.data
            $('#barang_toko_id').html(res.data);
            $('#stokAwal').val('')
        })
    })

    // cari jumlah stock toko
    $('#barang_toko_id').change(function() {
        var barang_toko_id = $(this).val()
        axios.post('inc/return_barang/stok_toko.php', {
            'barang_toko_id': barang_toko_id
        }).then(function(res) {
            var data = res.data
            $('#stokAwal').val(data.barang_toko_jml)
        })
    })

    // simpan ke tb_return_barang_detail
    $('#rekap').on('click', function() {
        var id = $('#id').val()
        var barang_toko_id = $('#barang_toko_id').val()
        var stokAwal = $('#stokAwal').val()
        var penyesuaian = $('#penyesuaian').val()
        var stokAkhir = $('#stokAkhir').val()
        axios.post('inc/return_barang/rekapReturn.php', {
            'return_barang_kode': id,
            'barang_toko_id': barang_toko_id,
            'return_barang_detail_stok_awal': stokAwal,
            'return_barang_detail_stok_tambah': penyesuaian,
            'return_barang_detail_stok_akhir': stokAkhir
        }).then(function(res) {
            var data = res.data
            toastr.info(data)
            kosong()
            $('#isi').load('inc/return_barang/dataReturn.php');
        })
    })

    function penyesuaian(nilai) {
        var nilai = nilai.value
        var stokawal = $('#stokAwal').val()
        var hasil = parseInt(stokawal) + parseInt(nilai)
        $('#stokAkhir').val(hasil)
    }

    function kosong() {
        $('#barang_toko_id').val('').change()
        $('#stokAwal').val(0)
        $('#penyesuaian').val(0)
        $('#stokAkhir').val(0)
    }

    function tutup() {
        $('#returnEntry').modal('hide')
        $('#isi').load('inc/return_barang/dataReturn.php');
    }

    function hapusData(return_barang_detail_id) {
        axios.post('inc/return_barang/hapusDetailReturn.php', {
            'return_barang_detail_id': return_barang_detail_id
        }).then(function(res) {
            toastr.success('Data Berhasil Dihapus')
            $('#isi').load('inc/return_barang/dataReturn.php');
        })
    }

    $('#isi').load('inc/return_barang/dataReturn.php');
</script>
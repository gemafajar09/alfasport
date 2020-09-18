<div class="page-title">
    <div class="title_left">
        <h3>Data Transaksi Penjualan</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="form-group">
                        <label>Pilih Toko</label>
                        <select name="toko" id="toko" class="form-control select2">
                            <option value="">-Toko-</option>
                            <?php
                            $toko = $con->select('toko', '*');
                            foreach ($toko as $toko) {
                            ?>
                                <option value="<?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?></option>
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
                <a href="entry_penjualan.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
                <a href="cari_penjualan.html" class="btn btn-success btn-round"><i class="fa fa-search"> Riwayat Penjualan</i></a>
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
                    <th>Toko</th>
                    <th>Cara Bayar</th>
                    <th colspan="2" class="text-center">Jumlah</th>
                    <th>Total Belanja</th>
                    <th>Bank</th>
                    <th>Create At</th>
                    <th>Keterangan</th>
                    <th class="text-center">Action</th>
                </tr>
                <tr>
                    <th colspan="4">&nbsp;</th>
                    <th>Cash</th>
                    <th>Debit/Kredit</th>
                    <th colspan="5">&nbsp;</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<div class="modal" id="dataDetail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Detail Transaksi</h2>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row my-1">
                        <table>
                            <tr>
                                <td><b>No Faktur</b></td>
                                <td>:</td>
                                <td><b><span id="id_jual"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>:</td>
                                <td><b><span id="tgl_jual"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Toko</b></td>
                                <td>:</td>
                                <td><b><span id="toko_nama"></span></b></td>
                            </tr>
                        </table>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Jumlah</th>
                                <th>Harga Jual</th>
                                <th>Diskon Item</th>
                                <th>Hasil Per Diskon</th>
                                <th>Sub Total</th>
                            </tr>
                        </thead>
                        <tbody id="isi2"></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function show(transaksi_id) {
        axios.post('inc/transaksi/show_detail_transaksi.php', {
                'transaksi_id': transaksi_id
            }).then(function(res) {
                var data = res.data
                $('#id_jual').text(data.transaksi_kode)
                $('#tgl_jual').text(data.transaksi_tgl)
                $('#toko_nama').text(data.nama_toko)

                // modal table
                return axios.post('inc/transaksi/show_detail_transaksi_tabel.php', {
                    'transaksi_id': transaksi_id
                })

            }).then(function(res) {
                $('#isi2').html(res.data);
            })
            .catch(function(err) {
                console.log(err)
            })
        $('#dataDetail').modal()
    }

    function tampilTabelDetail() {

    }

    function hapus(transaksi_id) {
        axios.post('inc/transaksi/aksi_hapus_transaksi.php', {
            'transaksi_id': transaksi_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/transaksi/data_transaksi.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }

    $('#toko').change(function(e) {
        e.preventDefault()
        var toko = $(this).val()
        axios.post('inc/transaksi/filter/toko.php', {
            'toko': toko
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })

    $(document).ready(function() {
        $('#isi').load('inc/transaksi/data_transaksi.php');
    })
</script>
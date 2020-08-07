<div class="page-title">
    <div class="title_left">
        <h3>Data Pembelian</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                    <div class="form-group">
                        <label>Toko</label>
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
                <a href="entry_pembelian.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
                <!-- <a href="entry_gudang.html" class="btn btn-success btn-round"><i class="fa fa-download"></i></a> -->
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
                    <th>No Invoice</th>
                    <th>Tanggal Beli</th>
                    <th>Vendor</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th class="text-center">Action</th>
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
                <h2>Detail Pembelian</h2>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row my-1">
                        <table>
                            <tr>
                                <td><b>ID Beli</b></td>
                                <td>:</td>
                                <td><b><span id="id_beli"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Tanggal</b></td>
                                <td>:</td>
                                <td><b><span id="tgl_beli"></span></b></td>
                            </tr>
                            <tr>
                                <td><b>Vendor</b></td>
                                <td>:</td>
                                <td><b><span id="nama_vendor"></span></b></td>
                            </tr>
                        </table>
                    </div>

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Artikel</th>
                                <th>Nama</th>
                                <th>Jumlah</th>
                                <th>Satuan</th>
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
    function show(pembelian_id) {
        axios.post('inc/pembelian/show_detail_pembelian.php', {
                'pembelian_id': pembelian_id
            }).then(function(res) {
                var data = res.data
                $('#id_beli').text(data.pembelian_no_invoice)
                $('#tgl_beli').text(moment(new Date(data.pembelian_tgl_beli)).format('DD MMMM YYYY'))
                $('#nama_vendor').text(data.supplier_nama)

                // modal table
                return axios.post('inc/pembelian/show_detail_pembelian_tabel.php', {
                    'pembelian_id': pembelian_id
                })

            }).then(function(res) {
                $('#isi2').html(res.data);
            })
            .catch(function(err) {
                console.log(err)
            })
        $('#dataDetail').modal()
    }


    function hapus(pembelian_id) {
        axios.post('inc/pembelian/aksi_hapus_pembelian.php', {
            'pembelian_id': pembelian_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/pembelian/data_pembelian.php');
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
        $('#isi').load('inc/pembelian/data_pembelian.php');
    })
</script>
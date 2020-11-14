<div class="page-title">
    <div class="title_left">
        <h3>Permohonan Transfer Barang</h3>
    </div>
    <div class="title_right">
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5" style="padding-left:26px">
                </div>
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
        <div class="row">
            <?php
            $data = $con->query("SELECT
                                    tb_transfer_barang.transfer_barang_id,
                                    tb_transfer_barang.transfer_barang_kode,
                                    tb_transfer_barang.transfer_barang_tgl,
                                    tb_transfer_barang.transfer_barang_acc_owner,
                                    toko.nama_toko as nama_toko,
                                    toko1.nama_toko As nama_toko_tujuan
                                From
                                    tb_transfer_barang Inner Join
                                    toko On toko.id_toko = tb_transfer_barang.id_toko Inner Join
                                    toko toko1 On toko1.id_toko = tb_transfer_barang.id_toko_tujuan
                                    ORDER BY tb_transfer_barang.transfer_barang_id DESC
                                    ")->fetchAll();
            foreach ($data as $a) {
            ?>
                <div class="col-md-4 py-2">
                    <div class="card">
                        <div class="card-header">
                            <p><i><?= $a['nama_toko'] ?>&nbsp;&nbsp;&nbsp;<?= $a['transfer_barang_kode'] ?>&nbsp;&nbsp;&nbsp;<?= tgl_indo($a['transfer_barang_tgl']) ?></i></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <i><?= $a['nama_toko'] ?></i>
                                </div>
                                <div class="col-md-6">
                                    <i><?= $a['nama_toko_tujuan'] ?></i>
                                </div>
                            </div>
                            <br>
                            <div align="right">
                                <?php if ($a['transfer_barang_acc_owner'] == 0) { ?>
                                    <button type="button" onclick="tampil('<?= $a['transfer_barang_id'] ?>')" class="btn btn-primary btn-block btn-sm">View</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 1 or $a['transfer_barang_acc_owner'] == 3) { ?>
                                    <button type="button" class="btn btn-success btn-block btn-sm">SUCCESS</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 4) { ?>
                                    <button type="button" onclick="showKomentar('<?= $a['transfer_barang_id'] ?>')" class="btn btn-info btn-block btn-sm">Tidak Cukup</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 2) { ?>
                                    <button type="button" class="btn btn-warning btn-block btn-sm">Ditolak</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<input type="hidden" id="idTrans">

<!-- tampilkan modal untuk view detail barang yg ditransfer -->
<div class="modal" id="Acc">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Acc Transfer Barang</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="continer" id="tampilkan">

                </div>
            </div>

        </div>
    </div>
</div>

<!--  -->
<div class="modal" id="Show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <div class="container" id="pesan"></div>
            </div>
        </div>
    </div>
</div>


<script>
    function showKomentar(id) {
        axios.post('inc/permohonan/cekKomentarTransfer.php', {
            'transfer_barang_id': id
        }).then(function(res) {
            var data = res.data
            $('#pesan').html(data)
            $('#Show').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function tampil(id) {
        axios.post('inc/permohonan/detail.php', {
            'transfer_barang_id': id
        }).then(function(res) {
            var data = res.data
            $('#idTrans').val(id)
            $('#tampilkan').html(data)
            $('#Acc').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>
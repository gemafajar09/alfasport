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
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <div class="input-group-content">
                        <label for="vid">ID</label>
                        <input type="text" class="form-control" value="<?= $ID ?>">
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-content">
                            <label>Tanggal</label>
                            <input type="date" class="form-control" name="tanggal" value="<?= date('Y-m-d') ?>">
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
                        <th class="text-center">total</th>
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
                            <select name="" class="form-control select2" style="width:100%" id="">
                                <option value="">-PILIH-</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok Awal</label>
                                <input type="number" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Penyesuaian</label>
                                <input type="number" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Stok Akhir</label>
                                <input type="number" readonly class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <input type="text" readonly class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div align="right">
                    <button type="reset" class="btn btn-outline-warning">Batal</button>
                    <button type="button" class="btn btn-outline-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function input()
    {
        var id_toko = $('#toko').val()
        $.ajax({
            url: 'inc/return/listStok.php',
            type: 'POST',
            data: {'id_toko':id_toko},
            dataType: 'JSON',
            success: function(res)
            {

            }
        })
        alert(id_toko)
        $('#returnEntry').modal()
    }
</script>
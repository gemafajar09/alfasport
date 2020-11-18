<div class="page-title">
    <div class="title_left">
        <h3>Data Return Barang</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-md-6"></div>
                <div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
                    <div class="form-group">
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
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <a href="buat_return_barang.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a>
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
                    <th>Kode</th>
                    <th>Toko</th>
                    <th>Create At</th>
                    <th>Create By</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<div class="modal" id="viewsReturn">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body" id="modalIsi">

            </div>
        </div>
    </div>
</div>

<script>
    $('#isi').load('inc/return_barang/listReturn.php')

    function hapus(return_barang_id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/return_barang/hapusReturn.php', {
                'return_barang_id': return_barang_id
            }).then(function(res) {
                toastr.success('Data Terhapus')
                $('#isi').load('inc/return_barang/listReturn.php')
            }).catch(function(err) {
                $('#isi').load('inc/return_barang/listReturn.php')
            })
        }
    }

    function views(return_barang_id) {
        axios.post('inc/return_barang/viewsReturn.php', {
            'return_barang_id': return_barang_id
        }).then(function(res) {
            var data = res.data
            $('#modalIsi').html(data)
            $('#viewsReturn').modal()
        }).catch(function(err) {
            $('#isi').load('inc/return_barang/listReturn.php')
        })
    }

    $('#toko').change(function(e) {
        e.preventDefault()
        var toko = $(this).val()
        axios.post('inc/return_barang/filter/searching.php', {
            'toko': toko
        }).then(function(res) {
            $('#isi').html(res.data)
        }).catch(function(err) {
            console.log(err)
        })
    })
</script>
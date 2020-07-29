<div class="page-title">
    <div class="title_left">
        <h3>Data Voucher</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <button type="button" onclick="tampil()" class="btn btn-success"><i class="fa fa-plus"> Buat Voucher</i></button>
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
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Voucher</th>
                    <th>Kode Voucher</th>
                    <th>Status Voucher</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataVoucher">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Voucher</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Voucher</label>
                                <input type="text" name="voucher_nama" id="voucher_nama" required="required" placeholder="Nama Voucher" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jumlah Voucher</label>
                                <input type="number" name="voucher_jumlah" id="voucher_jumlah" required="required" placeholder="Diskon" class="form-control">
                                <input type="hidden" id="voucher_id">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpan()" class="btn btn-primary btn-sm">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    function tampil() {
        $('#dataVoucher').modal()
    }

    function simpan() {
        var voucher_nama = $('#voucher_nama').val()
        var voucher_jumlah = $('#voucher_jumlah').val()
        var voucher_id = $('#voucher_id').val()

        axios.post('inc/diskon/voucher/aksi_simpan_voucher.php', {
            'voucher_nama': voucher_nama,
            'voucher_jumlah': voucher_jumlah,
            'voucher_id': voucher_id
        }).then(function(res) {
            $('#dataVoucher').modal('hide')
            $('#isi').load('inc/diskon/voucher/data_voucher.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataVoucher').modal('hide')
            $('#isi').load('inc/diskon/voucher/data_voucher.php');
        })
    }

    $('#isi').load('inc/diskon/voucher/data_voucher.php');
</script>
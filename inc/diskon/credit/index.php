<div class="page-title">
    <div class="title_left">
        <h3>Metode Pembayaran</h3>
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
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th style="width:30px">No</th>
                    <th>Kategori</th>
                    <th class="text-center" style="width:140px">Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataCredit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Metode</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <input type="text" id="metode" name="metode" class="form-control">
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
        $('#dataCredit').modal()
    }

    function simpan() {
        var metode = $('#metode').val()
        axios.post('inc/diskon/credit/aksi_simpan_metode.php', {
            'metode': metode
        }).then(function(res) {
            $('#dataCredit').modal('hide')
            $('#isi').load('inc/diskon/credit/data_credit.php');
        })
    }

    function hapus(id) {
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/diskon/credit/aksi_hapus_metode.php', {
                'id': id
            }).then(function(res) {
                toastr.info('Delete Success')
                $('#dataCredit').modal('hide')
                $('#isi').load('inc/diskon/credit/data_credit.php');
            })
        }
    }

    $('#isi').load('inc/diskon/credit/data_credit.php');
</script>
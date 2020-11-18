<div class="page-title">
    <div class="title_left">
        <h3>Restock Gudang Barang Lainnya</h3>
    </div>
    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
            </div>
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
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
        <form action="edit_multiple_restock_barang_lainnya.html" method="POST">
            <table class="table table-striped" id="datatable-checkbox" style="font-size:11px;font: italic small-caps bold;">
                <button type="submit" name="submit" class="btn btn-warning btn-md" disabled><i class="fa fa-plus"> Restock Sekaligus</i></button>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="check_all" id="check_all" onchange="cekeditSekaligus()">
                        </th>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Artikel</th>
                        <th>Barcode</th>
                        <th>Nama Ukuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </form>
    </div>
</div>

<div class="modal" id="dataStokGudang">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Detail Barang Gudang</h4>
                <hr>
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Artikel</label>
                                <input type="text" id="artikel" class="form-control" readonly>
                                <input type="hidden" id="barang_detail_id">
                                <input type="hidden" id="barang_kode">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Stok Awal</label>
                                <input type="text" name="jumlah" id="jumlah" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Restock Barang</label>
                                <input type="number" name="jumlah_restock" id="jumlah_restock" required="required" class="form-control">
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


<div class="modal" id="cekRestock">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Riwayat Restock Barang</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container" id="tampilkan">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function detail(barang_detail_id) {
        axios.post('inc/restock/restock_barang_lainnya/aksi_detail_restock.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            var data = res.data
            $('#tampilkan').html(data)
            $('#cekRestock').modal();
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpan() {
        var barang_detail_id = $('#barang_detail_id').val()
        var barang_kode = $('#barang_kode').val()
        var jumlah_restock = $('#jumlah_restock').val()
        var barang_detail_jumlah = $('#jumlah').val()
        axios.post('inc/restock/restock_barang_lainnya/aksi_simpan_restock.php', {
            'barang_detail_id': barang_detail_id,
            'barang_kode': barang_kode,
            'jumlah_restock': jumlah_restock,
            'barang_detail_jumlah': barang_detail_jumlah
        }).then(function(res) {
            toastr.info('SUCCESS..')
            kosong()
            $('#dataStokGudang').modal('hide')
            $('#isi').load('inc/restock/restock_barang_lainnya/data_restock.php');
        }).catch(function(err) {
            console.log(err)
            toastr.warning('ERROR..')
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/restock/restock_barang_lainnya/data_restock.php');
        })
    }

    function edit(barang_detail_id) {
        axios.post('inc/restock/restock_barang_lainnya/aksi_edit_restock.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            var edit = res.data
            console.log(edit);
            $('#barang_kode').val(edit.barang_kode);
            $('#artikel').val(edit.barang_nama + " - " + edit.barang_artikel + " - " + edit.barang_detail_barcode)
            $('#barang_detail_id').val(edit.barang_detail_id)
            $('#jumlah').val(edit.barang_detail_jml)
            $('#dataStokGudang').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function kosong() {
        $('#id_detail').val('')
        $('#id_artikel').val('')
        $('#artikel').val('')
        $('#jumlah').val('')
        $('#jumlah_restock').val('')
    }

    function cekeditSekaligus() {
        var ceklist = document.getElementsByName("barang_detail_id[]");
        var banyak_ceklist = ceklist.length;
        var banyak_dicek = 0;
        for (var x = 0; x < banyak_ceklist; x++) {
            if (ceklist[x].checked) {
                banyak_dicek++;
            }
        }
        if (banyak_dicek > 0) {
            document.getElementsByName("submit")[0].disabled = false;
        } else {
            document.getElementsByName("submit")[0].disabled = true;
        }
    }

    $(function() {
        $('.check_all').click(function() {
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });

    $('#isi').load('inc/restock/restock_barang_lainnya/data_restock.php');
</script>
<div class="page-title">
    <div class="title_left">
        <h3>Restock Barang Gudang Sepatu</h3>
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
        <form action="editMultipleRestock.html" method="POST">
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
                        <th>UE</th>
                        <th>UK</th>
                        <th>US</th>
                        <th>CM</th>
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
                                <input type="hidden" id="id_detail">
                                <input type="hidden" id="id_artikel">
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
    function detail(id_detail) {
        axios.post('inc/restock_gudang/aksi_detail_restock.php', {
            'id_detail': id_detail
        }).then(function(res) {
            var data = res.data
            $('#tampilkan').html(data)
            $('#cekRestock').modal();
        }).catch(function(err) {
            console.log(err)
        })
    }


    function simpan() {
        var id_detail = $('#id_detail').val()
        var id_artikel = $('#id_artikel').val()
        var artikel = $('#artikel').val()
        var jumlah_restock = $('#jumlah_restock').val()
        var jumlah = $('#jumlah').val()
        axios.post('inc/restock_gudang/aksi_simpan_restock.php', {
            'id_detail': id_detail,
            'id_artikel': id_artikel,
            'artikel': artikel,
            'jumlah_restock': jumlah_restock,
            'jumlah': jumlah
        }).then(function(res) {
            toastr.info('SUCCESS..')
            kosong()
            $('#dataStokGudang').modal('hide')
            $('#isi').load('inc/restock_gudang/data_restock.php');
        }).catch(function(err) {
            console.log(err)
            toastr.warning('ERROR..')
            $('#dataGudang').modal('hide')
            $('#isi').load('inc/restock_gudang/data_restock.php');
        })
    }

    function edit(id_detail) {
        axios.post('inc/restock_gudang/aksi_edit_restock.php', {
            'id_detail': id_detail
        }).then(function(res) {
            console.log(res);
            var edit = res.data
            console.log(edit)
            $('#id_artikel').val(edit.id);
            $('#artikel').val(edit.nama + " - " + edit.artikel + " - " + edit.barcode)
            $('#id_detail').val(edit.id_detail)
            $('#jumlah').val(edit.jumlah)
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
        var ceklist = document.getElementsByName("id_detail[]");
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

    $(document).ready(function() {
        $('#isi').load('inc/restock_gudang/data_restock.php');
    })
</script>
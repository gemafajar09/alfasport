<?php
$data_diskon = $con->query("SELECT * FROM tb_metode WHERE id_metode = '$_GET[id_metode]' LIMIT 1")->fetch();
?>

<div class="page-title">
    <div class="title_left">
        <h3>Detail Diskon <?php echo $data_diskon['kategori'] ?> </h3>
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
                <button type="button" onclick="tampil1()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
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
        <form action="editMultipleDiskon.html" method="POST">
            <table class="table table-striped" id="datatable-checkbox">
                <button type="submit" name="submit" class="btn btn-warning btn-md" disabled><i style="color:white" class="fa fa-pencil"> Edit Sekaligus</i></button>
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="check_all" id="check_all" onchange="cekeditSekaligus()">
                        </th>
                        <th>Metode</th>
                        <th>Bank</th>
                        <th>Diskon</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Habis</th>
                        <th class="text-center" style="width:140px">Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </form>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataDiskonDetail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Diskon</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <input type="text" id="bank" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="text" name="diskon" id="diskon" required="required" placeholder="Diskon" class="form-control">
                                <span style="color: red;">*Dalam % (persen)</span>
                                <input type="hidden" id="id_diskon">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Masa Diskon</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="datetime-local" id="tanggal_mulai" class="form-control">
                                    </div>
                                    <div class="col-md-2">Sampai</div>
                                    <div class="col-md-5">
                                        <input type="datetime-local" id="tanggal_habis" class="form-control">
                                    </div>
                                </div>
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

<!-- The Modal -->
<div class="modal" id="dataDiskonDetail1">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Diskon</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Bank</label>
                                <select name="bank" style="width: 100%;" id="bank1" class="form-control select2">
                                    <option value="">-Pilih Bank-</option>
                                    <?php
                                        $data = $con->query("SELECT * FROM `tb_bank`")->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($data as $isi){
                                    ?>
                                    <option value="<?= $isi['id_bank'] ?>"><?= $isi['bank'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="text" name="diskon" id="diskon1" required="required" placeholder="Diskon" class="form-control">
                                <span style="color: red;">*Dalam % (persen)</span>
                                <input type="hidden" id="id_metodes" value="<?= $_GET['id_metode'] ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Masa Diskon</label>
                                <div class="row">
                                    <div class="col-md-5">
                                        <input type="datetime-local" id="tanggal_mulai1" class="form-control">
                                    </div>
                                    <div class="col-md-2">Sampai</div>
                                    <div class="col-md-5">
                                        <input type="datetime-local" id="tanggal_habis1" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpan1()" class="btn btn-primary btn-sm">Simpan</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div>
</div>

<script>
    function tampil1() {
        $('#dataDiskonDetail1').modal()
    }

    function editDiskon(id_diskon) {
        axios.post('inc/diskon/credit/aksi_edit_credit_detail_diskon.php', {
            'id_diskon': id_diskon
        }).then(function(res) {
            var edit = res.data
            $('#bank').val(edit.bank)
            $('#diskon').val(edit.diskon)
            $('#id_diskon').val(edit.id_diskon)
            $('#tanggal_mulai').val(edit.tanggal_mulai)
            $('#tanggal_habis').val(edit.tanggal_habis)
            $('#dataDiskonDetail').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpan() {
        var diskon = $('#diskon').val()
        var id_diskon = $('#id_diskon').val()
        axios.post('inc/diskon/credit/aksi_simpan_credit_detail_diskon.php', {
            'diskon': diskon,
            'id_diskon': id_diskon,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataDiskonDetail').modal('hide')
            $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');
        }).catch(function(err) {
            alert(err)
            $('#dataDiskonDetail').modal('hide')
            $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');
        })
    }
    
    function simpan1() {
        var diskon = $('#diskon1').val()
        var bank = $('#bank1').val()
        var id_metodes = $('#id_metodes').val()
        var tanggal_mulai = $('#tanggal_mulai1').val()
        var tanggal_habis = $('#tanggal_habis1').val()
        axios.post('inc/diskon/credit/aksi_simpan_credit_baru.php', {
            'diskon': diskon,
            'bank': bank,
            'id_metodes': id_metodes,
            'tanggal_mulai': tanggal_mulai,
            'tanggal_habis': tanggal_habis,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#dataDiskonDetail1').modal('hide')
            $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');
        }).catch(function(err) {
            alert(err)
            $('#dataDiskonDetail1').modal('hide')
            $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');
        })
    }

    function hapus(id)
    {
        axios.post('inc/diskon/credit/aksi_hapus_detail_metode.php',{
            'id':id
        }).then(function(res){
            $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');
        })
    }

    function cekeditSekaligus() {
        var ceklist = document.getElementsByName("id_diskon[]");
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

    $('#isi').load('inc/diskon/credit/data_credit_detail.php?id_metode=<?= $_GET["id_metode"] ?>');


    $(function() {
        $('.check_all').click(function() {
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });
</script>
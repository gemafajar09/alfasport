<div class="page-title">
    <div class="title_left">
        <h3>Cari Pembelian Barang</h3>
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
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Artikel Barang</label>
                <select name="artikel" id="artikel" class="form-control select2">
                    <option value="">-Artikel Barang-</option>
                    <?php
                    $artikel = $con->query("SELECT * From tb_gudang");
                    foreach ($artikel as $a) {
                    ?>
                        <option value="<?= $a['id_gudang'] ?>"><?= $a['nama'] ?> - <?= $a['artikel'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-6">
            <div class="form-group">
                <label>Supplier</label>
                <select name="supplier_id" id="supplier_id" class="form-control select2">
                    <option value="">-All Supplier-</option>
                    <?php
                    $supplier = $con->select('tb_supplier', '*');
                    foreach ($supplier as $t) {
                    ?>
                        <option value="<?= $t['supplier_id'] ?>"><?= $t['supplier_nama'] ?></option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-12">
            <hr>
        </div>
        <div id="kops" style="display: none;">
            <table class="table table-striped" style="width: 100%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>
                            <select name="ukuran_nama" id="ukuran_nama" class="form-control" width="100%">
                                <option value="ue">UE</option>
                                <option value="uk">UK</option>
                                <option value="us">US</option>
                                <option value="cm">CM</option>
                            </select>
                        </th>
                        <th>Jumlah Beli</th>
                        <th>Tanggal Beli</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#supplier_id').change(function(e) {
        e.preventDefault()
        var supplier_id = $(this).val()
        var artikel = $('#artikel').val()
        axios.post('inc/pembelian/filter/cari_data_pembelian.php', {
            'supplier_id': supplier_id,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            var data = res.data;
            $('#isi').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })

    $('#artikel').change(function(e) {
        e.preventDefault()
        var artikel = $(this).val()
        var supplier_id = $('#supplier_id').val()
        axios.post('inc/pembelian/filter/cari_data_pembelian.php', {
            'supplier_id': supplier_id,
            'artikel': artikel
        }).then(function(res) {
            document.getElementById("kops").style.display = "block";
            // console.log(res);
            var data = res.data;
            $('#isi').html(data.table);
        }).catch(function(err) {
            console.log(err)
        })
    })

    $(document).ready(function() {
        $("#ukuran_nama").change(function() {
            var ukuran_nama = $(this).children("option:selected").val();
            if (ukuran_nama == "us") {
                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "block";
                }

                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }

            } else if (ukuran_nama == "uk") {

                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }
            } else if (ukuran_nama == "cm") {
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "none";
                }
                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
            } else {
                var uue = document.querySelectorAll('#ukuran_ue');
                for (var ue of uue) {
                    ue.style.display = "block";
                }

                var uus = document.querySelectorAll('#ukuran_us');
                for (var us of uus) {
                    us.style.display = "none";
                }
                var uuk = document.querySelectorAll('#ukuran_uk');
                for (var uk of uuk) {
                    uk.style.display = "none";
                }
                var ucm = document.querySelectorAll('#ukuran_cm');
                for (var cm of ucm) {
                    cm.style.display = "none";
                }
            }
        });
    });
</script>
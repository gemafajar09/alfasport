<div class="container">
    <div class="card">
        <form method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="pembelian.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
                <div class="text-center">
                    Entry Pembelian
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <?php
                            //membaca kode barang terbesar
                            $kode_faktur = $con->query("SELECT max(pembelian_no_invoice) FROM tb_pembelian")->fetch();
                            if ($kode_faktur) {
                                $nilai = substr($kode_faktur[0], 1);
                                $kode = (int) $nilai;
                                //tambahkan sebanyak + 1
                                $kode = $kode + 1;
                                $auto_kode = "P" . str_pad($kode, 5, "0",  STR_PAD_LEFT);
                            } else {
                                $auto_kode = "P00001";
                            }
                            $_SESSION["auto_kode"] = $auto_kode;
                            ?>
                            <label>No Invoice</label>
                            <input type="text" required name="pembelian_no_invoice" id="pembelian_no_invoice" class="form-control" placeholder="" value="<?php echo $_SESSION["auto_kode"]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" required name="tanggal" value="<?= date('Y-m-d') ?>" id="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <label>Vendor</label>
                            <select name="supplier_id" id="supplier_id" required class="form-control select2">
                                <option value="">-Vendor-</option>
                                <?php
                                $supplier = $con->select('tb_supplier', '*');
                                foreach ($supplier as $b) {
                                ?>
                                    <option value="<?= $b['supplier_id'] ?>"><?= $b['supplier_nama'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="hidden" id="pembelian_id">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" id="tampilPembelian" class="btn btn-info form-control"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr style="border: 10px solid; border-radius: 5px;">

        <!-- tabel keranjang -->
        <div class="x_content">
            <button type="button" id="checkout" class="btn btn-primary btn-md" style="float: right;">Checkout</button>
            <table class="table table-striped" id="" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Artikel</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>

        <!-- awal modal tampilPembelian -->
        <div class="modal" id="modalPembelian">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Entry Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Artikel</label>
                                        <select name="id_gudang_detail" id="id_gudang_detail" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <?php
                                            $gudang = $con->query('SELECT 
                                                                    a.artikel, 
                                                                    a.nama, 
                                                                    a.id, 
                                                                    b.id_ukuran, 
                                                                    b.id_detail, 
                                                                    c.ue 
                                                                    FROM tb_gudang a 
                                                                    JOIN tb_gudang_detail b ON a.id = b.id JOIN tb_all_ukuran c ON b.id_ukuran = c.id_ukuran  
                                            ');
                                            foreach ($gudang as $a) {
                                            ?>
                                                <option value="<?= $a['id_detail'] ?>"><?= $a['artikel'] ?> - <?= $a['nama'] ?> - (<?= $a['ue'] ?>)</option>
                                            <?php } ?>
                                        </select>
                                        <input type="hidden" id="tmp_id">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Satuan</label>
                                        <select name="satuan_id" id="satuan_id" class="form-control" required>
                                            <?php
                                            $satuan = $con->select('tb_satuan', '*');
                                            foreach ($satuan as $b) {
                                            ?>
                                                <option value="<?= $b['satuan_id'] ?>"><?= $b['satuan_nama'] ?></option>
                                            <?php } ?>
                                        </select>
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
        <!-- akhir modal tampilPembelian -->


        <!-- awal modal tampilPembelian -->
        <div class="modal" id="modalCheckout">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Entry Nota</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Foto Nota</label>
                                        <input type="file" name="pembelian_nota" id="pembelian_nota" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" id="simpanCheckout" class="btn btn-primary btn-sm">Simpan</button>
                        <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>

        </div>


        <!-- akhir modal tampilPembelian -->


    </div>
</div>

<script>
    $('#isi').load('inc/pembelian/data_keranjang_pembelian.php');

    // tampilkan modal untuk pembelian barang
    $('#tampilPembelian').on('click', function() {
        $('#modalPembelian').modal()
    })

    // simpan ke keranjang
    function simpan() {
        var id_gudang_detail = $('#id_gudang_detail').val()
        var tmp_jumlah = $('#jumlah_beli').val()
        var satuan_id = $('#satuan_id').val()
        var pembelian_no_invoice = $('#pembelian_no_invoice').val()
        var tmp_id = $('#tmp_id').val()
        axios.post('inc/pembelian/aksi_simpan_keranjang_pembelian.php', {
            'id_gudang_detail': id_gudang_detail,
            'tmp_jumlah': tmp_jumlah,
            'satuan_id': satuan_id,
            'pembelian_no_invoice': pembelian_no_invoice,
            'tmp_id': tmp_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#isi').load('inc/pembelian/data_keranjang_pembelian.php');
            $('#modalPembelian').modal()
        }).catch(function(err) {
            alert(err)
            kosong()
        })
    }

    // untuk menghapus data dari keranjang
    function hapusKeranjang(tmp_id) {
        axios.post('inc/pembelian/aksi_hapus_keranjang.php', {
            'tmp_id': tmp_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/pembelian/data_keranjang_pembelian.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }


    // meanmpilakn modal checkout
    $('#checkout').on('click', function() {
        $('#modalCheckout').modal()
    })

    // proses checkout dan proses simpan ke tabel transaksi
    $('#simpanCheckout').on('click', function() {

        // UPLOAD GAMBAR TERLEBIH DAHULU
        var data = new FormData();
        var inputGambar = document.getElementById('pembelian_nota').files[0];

        // Tambahkan data video ke Form Data
        data.append('_file_upload', inputGambar);

        // Kirim, 
        axios.post('gambar_service/file-add.php', data)
            .then(function(res) {
                // PANGGIL AJAX UNTUK INSERT KE SIMPAN PEMBELIAN
                var pembelian_no_invoice = $('#pembelian_no_invoice').val()
                var tanggal = $('#tanggal').val()
                var supplier_id = $('#supplier_id').val()
                var pembelian_id = $('#pembelian_id').val()
                return axios.post('inc/pembelian/aksi_simpan_pembelian.php', {
                    'pembelian_id': pembelian_id,
                    'supplier_id': supplier_id,
                    'tanggal': tanggal,
                    'pembelian_no_invoice': pembelian_no_invoice,
                    'pembelian_nota': res.data.data.name + "." + res.data.data.extension,
                    'pembelian_nota_id': res.data.data.id
                })
            })
            .then(function(res) {
                var simpan = res.data
                console.log(simpan)
                window.location = 'pembelian.html';
                kosong()
            }).catch(function(err) {
                alert(err)
                kosong()
            })
    })
</script>
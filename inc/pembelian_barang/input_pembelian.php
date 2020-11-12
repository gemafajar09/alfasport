<div class="container">
    <div class="card">
        <form method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="pembelian.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
                <div class="text-center">
                    Input Pembelian
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
                        <div class="form-group">
                            <?php
                            //membaca kode barang terbesar
                            $kode_faktur = $con->query("SELECT max(beli_invoice) FROM tb_beli")->fetch();
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
                            <input type="text" required name="beli_invoice" id="beli_invoice" class="form-control" placeholder="" value="<?php echo $_SESSION["auto_kode"]; ?>" readonly>
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
                            <label>Supplier</label>
                            <select name="supplier_id" id="supplier_id" required class="form-control select2">
                                <option value="">-Supplier-</option>
                                <?php
                                $supplier = $con->select('tb_supplier', '*');
                                foreach ($supplier as $b) {
                                ?>
                                    <option value="<?= $b['supplier_id'] ?>"><?= $b['supplier_nama'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="text" id="beli_id">
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
                        <th>Jenis</th>
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
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Input Data</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="">Jenis</label><br>
                                        <select name="barang_kategori" id="barang_kategori" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="Sepatu">Sepatu</option>
                                            <option value="Kaos Kaki">Kaos Kaki</option>
                                            <option value="Barang Lainnya">Barang Lainnya</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Barang Gudang</label><br>
                                        <select name="barang_detail_id" style="width:100%" id="barang_detail_id" class="form-control select2">
                                            <option value="">-Pilih Barang-</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Jumlah</label>
                                        <input type="number" class="form-control" id="jumlah_beli" name="jumlah_beli">
                                    </div>
                                </div>
                                <div class="col-md-2">
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


        <!-- awal modal tampilCheckout -->
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
                                        <input type="file" name="beli_nota" id="beli_nota" class="form-control">
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
        <!-- akhir modal tampilCheckout -->


    </div>
</div>

<script>
    $('#isi').load('inc/pembelian_barang/data_keranjang_pembelian.php');

    // cari kategori barang
    $('#barang_kategori').change(function(e) {
        e.preventDefault();
        var barang_kategori = $(this).val();
        axios.post('inc/pembelian_barang/cari_jenis_barang.php', {
            'barang_kategori': barang_kategori
        }).then(function(res) {
            var data = res.data
            $('#barang_detail_id').html(res.data);
            $('#jumlah_beli').val('')
        })
    })

    // tampilkan modal untuk pembelian barang
    $('#tampilPembelian').on('click', function() {
        $('#modalPembelian').modal()
    })

    // simpan ke keranjang
    function simpan() {
        var barang_detail_id = $('#barang_detail_id').val()
        var beli_tmp_jml = $('#jumlah_beli').val()
        var satuan_id = $('#satuan_id').val()
        var beli_invoice = $('#beli_invoice').val()
        axios.post('inc/pembelian_barang/aksi_simpan_keranjang_pembelian.php', {
            'barang_detail_id': barang_detail_id,
            'beli_tmp_jml': beli_tmp_jml,
            'satuan_id': satuan_id,
            'beli_invoice': beli_invoice,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            $('#isi').load('inc/pembelian_barang/data_keranjang_pembelian.php');
            $('#modalPembelian').modal()
        }).catch(function(err) {
            alert(err)
            kosong()
        })
    }

    // untuk menghapus data dari keranjang
    function hapusKeranjang(beli_tmp_id) {
        axios.post('inc/pembelian_barang/aksi_hapus_keranjang.php', {
            'beli_tmp_id': beli_tmp_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/pembelian_barang/data_keranjang_pembelian.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }

    // meanmpilakn modal checkout
    $('#checkout').on('click', function() {
        $('#modalCheckout').modal()
    })

    // proses checkout dan proses simpan ke tabel
    $('#simpanCheckout1').on('click', function() {

        // UPLOAD GAMBAR TERLEBIH DAHULU
        var data = new FormData();
        var inputGambar = document.getElementById('pembelian_nota').files[0];

        // Tambahkan data video ke Form Data
        data.append('_file_upload', inputGambar);

        // Kirim, 
        axios.post('gambar_service/file-add.php', data)
            .then(function(res) {
                // PANGGIL AJAX UNTUK INSERT KE SIMPAN PEMBELIAN
                var beli_invoice = $('#beli_invoice').val()
                var tanggal = $('#tanggal').val()
                var supplier_id = $('#supplier_id').val()
                var beli_id = $('#beli_id').val()
                return axios.post('inc/pembelian/aksi_simpan_pembelian.php', {
                    'beli_id': beli_id,
                    'supplier_id': supplier_id,
                    'tanggal': tanggal,
                    'beli_invoice': beli_invoice,
                    'pembelian_nota': res.data.data.name + "." + res.data.data.extension,
                    'pembelian_nota_id': res.data.data.id
                })
            })
            .then(function(res) {
                var simpan = res.data
                console.log(simpan)
                window.location = 'pembelian.html';
            }).catch(function(err) {
                alert(err)
                kosong()
            })
    })

    $('#simpanCheckout').on('click', function() {
        var beli_invoice = $('#beli_invoice').val()
        var tanggal = $('#tanggal').val()
        var supplier_id = $('#supplier_id').val()
        var beli_id = $('#beli_id').val()
        var beli_nota = $('#beli_nota').prop('files')[0];

        var data = new FormData();
        // Tambahkan data ke Form Data
        data.append('beli_invoice', beli_invoice);
        data.append('tanggal', tanggal);
        data.append('supplier_id', supplier_id);
        data.append('beli_nota', beli_nota);
        data.append('beli_id', beli_id);
        axios.post('inc/pembelian_barang/aksi_simpan_pembelian.php', data)
            .then(function(res) {
                var simpan = res.data
                console.log(simpan)
                window.location = 'pembelian_barang.html';
            }).catch(function(err) {
                alert(err)
                kosong()
            })
    })
</script>
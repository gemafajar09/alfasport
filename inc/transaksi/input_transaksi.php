<div class="container">
    <div class="card">
        <form method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="penjualan.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
                <div class="text-center">
                    Entry Penjualan
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <?php
                            //membaca kode barang terbesar
                            $kode_faktur = $con->query("SELECT max(transaksi_kode) FROM tb_transaksi")->fetch();
                            if ($kode_faktur) {
                                $nilai = substr($kode_faktur[0], 1);
                                $kode = (int) $nilai;
                                //tambahkan sebanyak + 1
                                $kode = $kode + 1;
                                $auto_kode = "T" . str_pad($kode, 5, "0",  STR_PAD_LEFT);
                            } else {
                                $auto_kode = "T00001";
                            }
                            $_SESSION["auto_kode"] = $auto_kode;
                            ?>
                            <label>ID</label>
                            <input type="text" required name="kode" id="kode" class="form-control" placeholder="ID" value="<?php echo $_SESSION["auto_kode"]; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" required name="tanggal" value="<?= date('Y-m-d') ?>" id="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Toko</label>
                            <select name="id_toko" id="id_toko" required class="form-control select2">
                                <option value="">-toko-</option>
                                <?php
                                $toko = $con->select('toko', '*');
                                foreach ($toko as $b) {
                                ?>
                                    <option value="<?= $b['id_toko'] ?>"><?= $b['nama_toko'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Tipe Konsumen</label>
                            <select name="tipe_konsumen" id="tipe_konsumen" class="form-control" required>
                                <option value="">-Konsumen-</option>
                                <option value="Non Member">Non Member</option>
                                <option value="Member">Member</option>
                                <option value="Distributor">Distributor</option>
                            </select>
                        </div>
                    </div>
                    <div id="tipe_member" style="display: none;" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Member</label>
                            <select name="member_id" id="member_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">-Pilih-</option>
                                <?php
                                $datag = $con->select('tb_member', '*');
                                foreach ($datag as $member) {
                                ?>
                                    <option value="<?= $member['member_id'] ?>"><?= $member['member_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div id="tipe_distributor" style="display: none;" class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Distributor</label>
                            <select name="distributor_id" id="distributor_id" class="form-control select2" style="width: 100%;" required>
                                <option value="">-Pilih-</option>
                                <?php
                                $datag = $con->select('tb_distributor', '*');
                                foreach ($datag as $distributor) {
                                ?>
                                    <option value="<?= $distributor['distributor_id'] ?>"><?= $distributor['distributor_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <script>

                    </script>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select class="form-control select2" name="id_gudang" id="id_gudang" required style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" required name="transaksi_jumlah_beli" id="transaksi_jumlah_beli" class="form-control" onkeyup="dapatHarga()">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" required name="harga" id="harga" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Sub Total</label>
                            <input type="text" required name="transaksi_total_harga" id="transaksi_total_harga" class="form-control" readonly>
                            <input type="hidden" id="tmp_id">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" id="simpans" class="btn btn-info form-control">Tambah Keranjang</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr style="border: 10px solid; border-radius: 5px;">

        <!-- tabel keranjang -->
        <div class="x_content">
            <button type="button" id="checkout" class="btn btn-primary btn-lg" style="float: right;">Checkout</button>
            <table class="table table-striped" id="" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Jumlah</th>
                        <th>Harga</th>
                        <th>Diskon 1</th>
                        <th>Diskon 2</th>
                        <th>Tipe Diskon</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>

        <!-- awal modal checkout -->
        <div class="modal" id="modalCheckout">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Checkout</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cara Bayar</label>
                                        <select name="transaksi_tipe_bayar" id="transaksi_tipe_bayar" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <option value="Cash">Cash</option>
                                            <option value="Card">Card</option>
                                            <option value="Cash+Card">Cash+Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: none;" id="tipe_bayar">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select name="transaksi_bank" id="transaksi_bank" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <option value="Nagari">Nagari</option>
                                            <option value="Mandiri">Mandiri</option>
                                            <option value="BNI">BNI</option>
                                            <option value="BCA">BCA</option>
                                            <option value="BRI">BRI</option>
                                            <option value="Bukopin">Bukopin</option>
                                            <option value="Danamon">Danamon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Total</label>
                                        <input type="text" class="form-control" id="subTotalBelanja" readonly>
                                        <input type="hidden" class="form-control" id="jumlahTotal" readonly>
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bayar_cash">
                                    <div class="form-group">
                                        <label>Bayar Cash</label>
                                        <input type="text" class="form-control" id="txtBayarCash" onkeyup="dapatKembalian()">
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bayar_card">
                                    <div class="form-group">
                                        <label>Bayar Card</label>
                                        <input type="number" class="form-control" id="txtBayarCard" onkeyup="dapatKembalian()">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Kembalian</label>
                                        <input type="number" id="kembalian" class="form-control" readonly>
                                        <input type="hidden" id="transaksi_id" class="form-control">
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
        <!-- akhir modal checkout -->

    </div>
</div>

<script>
    $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
    // menampilkan data gudang dari toko yang dipilih
    $("#id_toko").change(function() {
        var id_toko = $('#id_toko option:selected').val();
        console.log(id_toko);
        $.ajax({
            type: "GET",
            url: "inc/transaksi/filter/barang_toko.php",
            data: {
                'id_toko': id_toko
            },
            success: function(response) {
                $('#id_gudang').html(response);
            }
        });
    })

    // menampilkan tipe konsumen jika salah satu select box dipilih
    document.getElementById("tipe_konsumen").addEventListener("change", function() {
        if (this.value == "Member") {
            document.getElementById("tipe_member").style.display = "block";
        } else {
            document.getElementById("tipe_member").style.display = "none";
        }

        if (this.value == "Distributor") {
            document.getElementById("tipe_distributor").style.display = "block";
        } else {
            document.getElementById("tipe_distributor").style.display = "none";
        }
    })

    // menampilkan harga dari barang yang dipilih
    $("#id_gudang").change(function() {
        var id_gudang = $('#id_gudang option:selected').val();
        console.log(id_gudang);
        $.ajax({
            type: "GET",
            url: "inc/transaksi/filter/barang_toko2.php",
            data: {
                'id_gudang': id_gudang
            },
            dataType: 'JSON',
            success: function(data) {
                console.log(data.jual);
                $('#harga').val(data.jual);
            }
        });
    })

    // mendapatkan total harga dari jumlah beli kali dengan total harga
    function dapatHarga() {
        var jumlahBeli = document.getElementById("transaksi_jumlah_beli").value;
        var harga = document.getElementById("harga").value;
        total = jumlahBeli * harga;
        document.getElementById("transaksi_total_harga").value = total;
        // $('#transaksi_total_harga').val(total);
    }

    // proses masuk ke keranjang
    $('#simpans').on('click', function(e) {
        var tmp_kode = $('#kode').val()
        var tmp_tgl = $('#tanggal').val()
        var id_toko = $('#id_toko').val()
        var id_gudang = $('#id_gudang').val()
        var tipe_konsumen = $('#tipe_konsumen').val()
        var member_id = $('#member_id').val()
        var distributor_id = $('#distributor_id').val()
        var tmp_jumlah_beli = $('#transaksi_jumlah_beli').val()
        var tmp_total_harga = $('#transaksi_total_harga').val()
        var tmp_id = $('#tmp_id').val()
        e.preventDefault()
        axios.post('inc/transaksi/aksi_simpan_keranjang_transaksi.php', {
            'tmp_kode': tmp_kode,
            'tmp_tgl': tmp_tgl,
            'id_toko': id_toko,
            'id_gudang': id_gudang,
            'tipe_konsumen': tipe_konsumen,
            'member_id': member_id,
            'distributor_id': distributor_id,
            'tmp_jumlah_beli': tmp_jumlah_beli,
            'tmp_total_harga': tmp_total_harga,
            'tmp_id': tmp_id
        }).then(function(res) {
            $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
        }).catch(function(err) {
            console.log(err)
            $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
        })
    })


    // proses checkout
    $('#checkout').on('click', function() {
        var sub = document.getElementById('subtotal').value;
        var tot = document.getElementById('jmlTot').value;
        document.getElementById('subTotalBelanja').value = sub;
        document.getElementById('jumlahTotal').value = tot;
        console.log(sub)
        console.log(tot)
        $('#modalCheckout').modal()

    })

    // menampilkan pilihan bank
    document.getElementById("transaksi_tipe_bayar").addEventListener("change", function() {
        if (this.value == "Card") {
            document.getElementById("tipe_bayar").style.display = "block";
            document.getElementById("bayar_card").style.display = "block";
            document.getElementById("bayar_cash").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
        } else if (this.value == "Cash+Card") {
            document.getElementById("tipe_bayar").style.display = "block";
            document.getElementById("bayar_cash").style.display = "block";
            document.getElementById("bayar_card").style.display = "block";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
        } else if (this.value == "Cash") {
            document.getElementById("tipe_bayar").style.display = "none";
            document.getElementById("bayar_cash").style.display = "block";
            document.getElementById("bayar_card").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
        }
    })

    // menampilkan kembalian
    function dapatKembalian() {

        var bayar_cash = parseInt(document.getElementById("txtBayarCash").value);
        var bayar_card = parseInt(document.getElementById("txtBayarCard").value);
        var subTotalHarga = parseInt(document.getElementById("subTotalBelanja").value);

        if (bayar_cash != 0 && bayar_card == 0) {
            bayar_card = 0;
            total = bayar_cash + bayar_card - subTotalHarga;
            document.getElementById("kembalian").value = total;
        } else if (bayar_cash != 0 && bayar_card != 0) {
            total = bayar_cash + bayar_card - subTotalHarga;
            document.getElementById("kembalian").value = total;
        } else if (bayar_cash == 0 && bayar_card != 0) {
            bayar_cash = 0;
            total = bayar_card + bayar_cash - subTotalHarga;
            document.getElementById("kembalian").value = total;
        }
        // $('#transaksi_total_harga').val(total);
    }

    // proses simpan ke tabel transaksi
    function simpan() {
        var transaksi_tipe_bayar = $('#transaksi_tipe_bayar').val()
        var transaksi_bank = $('#transaksi_bank').val()
        var transaksi_cash = $('#txtBayarCash').val()
        var transaksi_card = $('#txtBayarCard').val()
        var transaksi_id = $('#transaksi_id').val()
        var transaksi_jumlah_beli = $('#jumlahTotal').val()
        axios.post('inc/transaksi/aksi_simpan_transaksi.php', {
            'transaksi_tipe_bayar': transaksi_tipe_bayar,
            'transaksi_bank': transaksi_bank,
            'transaksi_cash': transaksi_cash,
            'transaksi_card': transaksi_card,
            'transaksi_id': transaksi_id,
            'transaksi_jumlah_beli': transaksi_jumlah_beli,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            // $('#dataKategori').modal('hide')
            // $('#isi').load('inc/kategori/data_kategori.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            // $('#dataKategori').modal('hide')
            // $('#isi').load('inc/kategori/data_kategori.php');
            kosong()
        })
    }

    // untuk menghapus data dari keranjang
    function hapusKeranjang(tmp_id) {
        axios.post('inc/transaksi/aksi_hapus_keranjang.php', {
            'tmp_id': tmp_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }

    // utk mengosongkan jisa selesai pilih barang
    function kosong() {
        $('#id_toko').val('')
        $('#artikel').val('')
        $('#nama').val('')
        $('#jumlah').val('')
        $('#modal').val('')
        $('#jual').val('')
        $('#mereks').val('')
        $('#genders').val('')
        $('#kategoris').val('')
        $('#divisis').val('')
        $('#sub_divisis').val('')
    }
</script>
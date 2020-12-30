<div class="container">
    <div class="card">
        <form method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="penjualan_online.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
                <div class="text-center">
                    Entry Penjualan Online
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <?php
                            //membaca kode barang terbesar
                            $kode_faktur = $con->query("SELECT max(transol_kode) FROM tb_transaksi_online")->fetch();
                            if ($kode_faktur) {
                                $nilai = substr($kode_faktur[0], 1);
                                $kode = (int) $nilai;
                                //tambahkan sebanyak + 1
                                $kode = $kode + 1;
                                $auto_kode = "N" . str_pad($kode, 5, "0",  STR_PAD_LEFT);
                            } else {
                                $auto_kode = "N00001";
                            }
                            $_SESSION["auto_kodes"] = $auto_kode;
                            ?>
                            <label>ID</label>
                            <input type="text" required name="kode" id="kode" class="form-control" placeholder="ID" value="<?php echo $_SESSION["auto_kodes"]; ?>" readonly>
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
                                $toko = $con->query('SELECT * FROM toko WHERE id_toko != 0');
                                foreach ($toko as $b) {
                                ?>
                                    <option value="<?= $b['id_toko'] ?>"><?= $b['nama_toko'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Nama Toko Online</label>
                            <select name="data_toko_online_id" id="data_toko_online_id" class="form-control select2" required>
                                <option value="">-Pilih Toko Online-</option>
                                <?php
                                $toko = $con->select('tb_data_toko_online', '*');
                                foreach ($toko as $b) {
                                ?>
                                    <option value="<?= $b['data_toko_online_id'] ?>"><?= $b['data_toko_online_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select class="form-control select2" name="id_gudang" id="id_gudang" required style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>
                                <input type="radio" name="radio" id="radio" value="ue">ue&nbsp;&nbsp;
                                <input type="radio" name="radio" id="radio" value="uk">uk&nbsp;&nbsp;
                                <input type="radio" name="radio" id="radio" value="us">us&nbsp;&nbsp;
                                <input type="radio" name="radio" id="radio" value="cm">cm
                            </label>
                            <select class="form-control select2" name="ukurans" id="ukurans" required style="width: 100%;">
                            </select>
                        </div>
                    </div> -->
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label id="sizes">Ukuran</label>
                            <select class="form-control select2" name="ukurans" id="ukurans" required style="width: 100%;">
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>Stok</label>
                            <input type="text" readonly value="" name="transaksi_stok" id="transaksi_stok" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="text" required name="transol_tmp_jumlah_beli" id="transol_tmp_jumlah_beli" class="form-control" onkeyup="dapatHarga(this)">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga</label>
                            <input type="text" name="harga" value="" id="harga" class="form-control" readonly>
                            <input type="hidden" id="harga1">
                            <input type="hidden" id="hasilDsc">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>Dis Item</label>
                            <input type="text" readonly name="diskon" value="0" id="discItm" class="form-control">
                        </div>
                    </div>
                    <!-- <div class="col-xs-12 col-sm-4 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" name="diskon" value="0" onkeyup="potongan(this)" id="disc" class="form-control">
                            <input type="text" name="diskon1" id="diskon1" class="form-control">
                        </div>
                    </div> -->
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <label>Sub Total</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Rp.</div>
                            </div>
                            <input type="text" required name="transol_tmp_total_harga" id="transol_tmp_total_harga" class="form-control" readonly>
                            <input type="hidden" id="tmp_id">
                            <input type="hidden" id="id_gudangs">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-1 col-lg-1">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" id="simpans" class="btn btn-info form-control"><i class="fa fa-plus"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr style="border: 10px solid; border-radius: 5px;">

        <!-- tabel keranjang -->
        <div class="x_content">
            <button type="button" onclick="deleteAll('<?php echo $_SESSION['auto_kodes']; ?>')" class="btn btn-danger btn-md" style="float: left;">Delete All</button>
            <button type="button" id="checkout" class="btn btn-primary btn-md" style="float: right;">Checkout</button>
            <table class="table table-striped" id="" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Artikel</th>
                        <th>Jumlah</th>
                        <th>Harga Jual</th>
                        <th>Diskon Item</th>
                        <th>Hasil Per Diskon</th>
                        <th>Sub Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="isi"></tbody>
            </table>
        </div>

        <!-- awal modal checkout -->
        <div class="modal" id="modalCheckout">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Checkout</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cara Bayar</label>
                                        <select name="transaksi_tipe_bayar" id="transaksi_tipe_bayar" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <option value="1">Cash</option>
                                            <option value="2">Debit Card</option>
                                            <option value="3">Credit Card</option>
                                            <option value="4">Cash + Debit Card</option>
                                            <option value="5">Cash + Credit Card</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6" style="display: none;" id="tipe_bayar">
                                    <div class="form-group">
                                        <label>Nama Bank</label>
                                        <select name="transaksi_bank" id="transaksi_bank" class="form-control" required>
                                            <option value="">-Pilih-</option>
                                            <?php
                                            $bank = $con->select('tb_bank', '*');
                                            foreach ($bank as $b) {
                                            ?>
                                                <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div> -->
                                <div class="col-md-12">
                                    <label>Total</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control" id="subTotalBelanja" readonly>
                                        <input type="hidden" id="subTotalBelanjaBantuan" readonly>
                                        <input type="hidden" id="subTotalBelanja1" readonly>
                                        <input type="hidden" id="jumlahTotal" readonly>
                                    </div>
                                </div>
                                <!-- <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Diskon Bank</label>
                                        <input type="text" class="form-control" id="diskons" readonly>
                                        <input type="hidden" class="form-control" id="diskonss" readonly>
                                    </div>
                                </div> -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipe Diskon</label>
                                        <select name="tipe_diskon" id="tipe_diskon" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="dis_persen">Potongan Persen</option>
                                            <option value="dis_harga">Potongan Harga</option>
                                        </select>
                                        <!-- <form action="voucher.html" method="POST" target="_blank">
                                            <input type="hidden" name="a" value="profile-tab">
                                            <button class="btn btn-sm btn-info" type="submit">Punya Voucher ?</button>
                                        </form> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" class="form-control">
                                        <label>Potongan Diskon</label>
                                        <input type="text" class="form-control" name="diskon_persen" id="diskon_persen" style="display:none;" placeholder="Potongan Persen" onkeyup="potDis(this)">
                                        <input type="number" class="form-control" name="diskon_harga" id="diskon_harga" style="display: none;" placeholder="Potongan Harga">
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: block;" id="bayar_cash">
                                    <label>Bayar Cash</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control" id="txtBayarCash" onkeyup="dapatKembalian()">
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bayar_card">
                                    <label>Bayar Card</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" class="form-control" id="txtBayarCard" onkeyup="dapatKembalian()">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Kembalian</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" id="kembalian" class="form-control" readonly>
                                        <input type="hidden" id="transol_id" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <textarea name="katerangan" id="keterangan" class="form-control"></textarea>
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
    $('#isi').load('inc/transaksi_online/data_keranjang_transaksi_online.php');

    // menampilkan data gudang dari toko yang dipilih
    $("#id_toko").change(function() {
        var id_toko = $('#id_toko option:selected').val();
        console.log(id_toko);
        $.ajax({
            type: "GET",
            url: "inc/transaksi_online/filter/barang_toko.php",
            data: {
                'id_toko': id_toko
            },
            success: function(response) {
                $('#id_gudang').html(response);
            }
        });
    })
    // cari ukuran
    $('#id_gudang').change(function(e) {
        e.preventDefault()
        var barang_id = $(this).val()
        var id_toko = $('#id_toko').val()
        axios.post('inc/transaksi_online/filter/ukuran.php', {
            'id_toko': id_toko,
            'id': barang_id
        }).then(function(res) {
            var data = res.data
            $('#ukurans').html(data)
        }).catch(function(err) {
            console.log(err)
        })
    })
    // cek stok dan harga
    $('#ukurans').change(function() {
        var ukuran = $(this).val()
        console.log(ukuran)
        axios.post('inc/transaksi_online/filter/stok.php', {
            'id': ukuran
        }).then(function(res) {
            var data = res.data
            var hasil = data.barang_jual - data.potongan
            console.log(hasil)
            var pengurangan = hasil
            $('#transaksi_stok').val(data.barang_toko_jml)
            $('#harga').val(pengurangan)
            $('#discItm').val(data.persen)
            $('#hasilDsc').val(hasil)
            $('#harga1').val(pengurangan)
            $('#id_gudangs').val(data.barang_detail_id)
        })
    })


    function potongan(disc) {
        var diskon = disc.value
        var harga = $('#harga1').val()
        var jumlah = $('#transol_tmp_jumlah_beli').val()
        var hasil = (harga * parseFloat(diskon)) / 100
        var nominal = harga - hasil
        var totalBayar = parseInt(jumlah) * nominal
        console.log(jumlah)
        $('#transol_tmp_total_harga').val(totalBayar)
        // $('#harga').val(nominal)
    }

    // menampilkan harga dari barang yang dipilih
    // $('[name="radio"]').on('click', function() {
    //     var id = $('#id_gudang').val();
    //     var size = $(this).val()
    //     var id_toko = $('#id_toko option:selected').val();
    //     // console.log(id_gudang);
    //     $.ajax({
    //         type: "POST",
    //         url: "inc/transaksi_online/filter/ukuran.php",
    //         data: {
    //             'id': id,
    //             'size': size,
    //             'id_toko': id_toko
    //         },
    //         dataType: 'HTML',
    //         success: function(data) {
    //             $('#ukurans').html(data);
    //         }
    //     });
    // })



    // mendapatkan total harga dari jumlah beli kali dengan total harga
    function dapatHarga(nilai) {
        var stok = parseInt($('#transaksi_stok').val());
        var jumlahBeli = parseInt(nilai.value);
        if (stok < jumlahBeli) {
            alert('Maaf Stok Tidak Mencukupi')
            $('#transol_tmp_jumlah_beli').val('')
            $('#transol_tmp_total_harga').val(0)
        } else {
            console.log('Aman')
            // dapatkan harga
            var harga = document.getElementById("harga").value;
            // cari total harga
            var total = harga * jumlahBeli;
            document.getElementById("transol_tmp_total_harga").value = total;
        }
    }

    // proses masuk ke keranjang
    $('#simpans').on('click', function() {
        var transol_tmp_kode = $('#kode').val()
        var transol_tmp_tgl = $('#tanggal').val()
        var id_toko = $('#id_toko').val()
        var id_gudang = $('#id_gudangs').val()
        var data_toko_online_id = $('#data_toko_online_id').val()
        var transol_tmp_jumlah_beli = $('#transol_tmp_jumlah_beli').val()
        var transol_tmp_total_harga = $('#transol_tmp_total_harga').val()
        var transol_tmp_potongan = $('#hasilDsc').val()
        var transol_tmp_diskon1 = $('#discItm').val()
        var transol_tmp_id = $('#tmp_id').val()

        axios.post('inc/transaksi_online/aksi_simpan_keranjang_transaksi_online.php', {
            'transol_tmp_kode': transol_tmp_kode,
            'transol_tmp_tgl': transol_tmp_tgl,
            'id_toko': id_toko,
            'id_gudang': id_gudang,
            'data_toko_online_id': data_toko_online_id,
            'transol_tmp_jumlah_beli': transol_tmp_jumlah_beli,
            'transol_tmp_total_harga': transol_tmp_total_harga,
            'transol_tmp_potongan': transol_tmp_potongan,
            'transol_tmp_diskon1': transol_tmp_diskon1,
            'transol_tmp_id': transol_tmp_id
        }).then(function(res) {
            $('#isi').load('inc/transaksi_online/data_keranjang_transaksi_online.php');
            kosong()
        }).catch(function(err) {
            console.log(err)
            $('#isi').load('inc/transaksi_online/data_keranjang_transaksi_online.php');
            kosong()
        })
    })

    // menampilkan pilihan bank
    $('#transaksi_tipe_bayar').change(function(e) {
        var id = $(this).val()
        if (id != 3) {
            $('#transaksi_bank').change(function(e) {
                var bank = $(this).val()
                var subtotal = $('#subTotalBelanja1').val()
                axios.post('inc/transaksi/diskon.php', {
                    'id': id,
                    'bank': bank
                }).then(function(res) {
                    var data = res.data
                    $('#diskons').val(data.diskon)
                    var disc = data.diskon
                    var total = (subtotal * disc) / 100
                    var bersih = subtotal - total
                    $('#subTotalBelanja').val(bersih)
                    $('#subTotalBelanjaBantuan').val(bersih)
                    $('#diskonss').val(total)
                    console.log(data.diskon)
                }).catch(function(err) {
                    console.log(err)
                })
            })
        } else {
            axios.post('inc/transaksi/diskon.php', {
                'id': id,
                'bank': 0
            }).then(function(res) {
                var data = res.data
                $('#diskons').val(data.diskon)
                console.log(data.diskon)
            }).catch(function(err) {
                console.log(err)
            })
        }
    })

    // proses checkout
    $('#checkout').on('click', function() {
        var id_toko = $('#id_toko').val()
        var data_toko_online_id = $('#data_toko_online_id').val()
        if (id_toko == '' && data_toko_online_id == '') {
            toastr.warning('Silahkan Pilih Toko');
        } else {

            var sub = document.getElementById('subtotal').value;
            var tot = document.getElementById('jmlTot').value;
            document.getElementById('subTotalBelanja').value = sub;
            document.getElementById('subTotalBelanjaBantuan').value = sub;
            document.getElementById('subTotalBelanja1').value = sub;
            document.getElementById('jumlahTotal').value = tot;
            console.log(sub)
            console.log(tot)
            $('#modalCheckout').modal()
        }
    })

    // document.getElementById("transaksi_tipe_bayar").addEventListener("change", function() {
    //     if (this.value == 0) {
    //         $('#kembalian').val(0);
    //         $("#subTotalBelanja").val(hrgAwal);
    //         $("#subTotalBelanjaBantuan").val(hrgAwal);
    //         document.getElementById("tipe_bayar").style.display = "none";
    //         document.getElementById("bayar_cash").style.display = "none";
    //         document.getElementById("bayar_card").style.display = "none";
    //         document.getElementById("diskonBank").style.display = "none";
    //         document.getElementById("txtBayarCash").value = 0;
    //         document.getElementById("txtBayarCard").value = 0;            
    //     } else if (this.value == 2 || this.value == 3) {
    //         document.getElementById("tipe_bayar").style.display = "block";
    //         document.getElementById("bayar_card").style.display = "block";
    //         document.getElementById("bayar_cash").style.display = "none";
    //         document.getElementById("txtBayarCash").value = 0;
    //         document.getElementById("txtBayarCard").value = 0;
    //     } else if (this.value == 4 || this.value == 5) {
    //         document.getElementById("tipe_bayar").style.display = "block";
    //         document.getElementById("bayar_cash").style.display = "block";
    //         document.getElementById("bayar_card").style.display = "block";
    //         document.getElementById("txtBayarCash").value = 0;
    //         document.getElementById("txtBayarCard").value = 0;
    //     } else if (this.value == 1) {
    //         document.getElementById("tipe_bayar").style.display = "none";
    //         document.getElementById("bayar_cash").style.display = "block";
    //         document.getElementById("bayar_card").style.display = "none";
    //         document.getElementById("txtBayarCash").value = 0;
    //         document.getElementById("txtBayarCard").value = 0;
    //     }
    // })

    // menampilkan kembalian
    function dapatKembalian() {

        var bayar_cash = parseInt(document.getElementById("txtBayarCash").value);
        var bayar_card = parseInt(document.getElementById("txtBayarCard").value);
        var subTotalHarga = parseInt(document.getElementById("subTotalBelanja").value);

        var total = bayar_cash - subTotalHarga;
        $('#kembalian').val(total)
        // if (bayar_cash != 0 && bayar_card == 0) {
        //     bayar_card = 0;
        //     total = bayar_cash + bayar_card - subTotalHarga;
        //     document.getElementById("kembalian").value = total;
        // } else if (bayar_cash != 0 && bayar_card != 0) {
        //     total = bayar_cash + bayar_card - subTotalHarga;
        //     document.getElementById("kembalian").value = total;
        // } else if (bayar_cash == 0 && bayar_card != 0) {
        //     bayar_cash = 0;
        //     total = bayar_card + bayar_cash - subTotalHarga;
        //     document.getElementById("kembalian").value = total;
        // }
        // $('#transaksi_total_harga').val(total);
    }

    // proses simpan ke tabel transaksi
    function simpan() {
        var transol_tipe_bayar = $('#transaksi_tipe_bayar').val()
        var transol_bank = $('#transaksi_bank').val()
        var transol_cash = $('#txtBayarCash').val()
        var transol_card = $('#txtBayarCard').val()
        var transol_id = $('#transol_id').val()
        var transol_total_belanja = $('#subTotalBelanja').val()
        var transol_kembalian = $('#kembalian').val()

        var transol_tipe_diskon = $('#tipe_diskon').val();
        if (transol_tipe_diskon == 'dis_persen') {
            var transol_diskon = $('#diskon_persen').val();
        } else if (transol_tipe_diskon == 'dis_harga') {
            var transol_diskon = $('#diskon_harga').val();
        } else {
            var transol_diskon = 0;
        }

        var transol_diskon_bank = $('#diskons').val()
        var transol_jumlah_beli = $('#jumlahTotal').val()
        var transol_kode = $('#kode').val()
        var transol_keterangan = $('#keterangan').val()
        axios.post('inc/transaksi_online/aksi_simpan_transaksi_online.php', {
            'transol_tipe_bayar': transol_tipe_bayar,
            'transol_bank': transol_bank,
            'transol_cash': transol_cash,
            'transol_card': transol_card,
            'transol_id': transol_id,
            'transol_kode': transol_kode,
            'transol_total_belanja': transol_total_belanja,
            'transol_kembalian': transol_kembalian,
            'transol_tipe_diskon': transol_tipe_diskon,
            'transol_diskon': transol_diskon,
            'transol_diskon_bank': transol_diskon_bank,
            'transol_jumlah_beli': transol_jumlah_beli,
            'transol_keterangan': transol_keterangan
        }).then(function(res) {
            var simpan = res.data
            // window.open('inc/struk_online/invo1.php?invoice=' + kode, '_blank');
            window.location = 'penjualan_online.html';
            kosong()
        }).catch(function(err) {
            alert(err)
            kosong()
        })
    }

    // untuk menghapus data dari keranjang
    function hapusKeranjang(tmp_id) {
        axios.post('inc/transaksi_online/aksi_hapus_keranjang_online.php', {
            'transol_tmp_id': tmp_id
        }).then(function(res) {
            var data = res.data
            toastr.info('SUCCESS..')
            $('#isi').load('inc/transaksi_online/data_keranjang_transaksi_online.php');
        }).catch(function(err) {
            toastr.warning('ERROR..')
        })
    }

    // utk mengosongkan jika selesai pilih barang
    function kosong() {
        // $('#id_toko').select2(null).trigger('change')
        // $('#id_gudang').select2(null).trigger('change')
        $('#ukurans').val(null).trigger('change');
        $('#id_gudang').val(null).trigger('change');
        $('#id_gudangs').val(null)
        $('#transaksi_stok').val(0)
        $('#harga').val(0)
        $('#ukurans').select2(null).trigger('change')
        // $('#member_id').val(null)
        // $('#distributor_id').val(null)
        $('#transol_tmp_jumlah_beli').val(null)
        $('#transol_total_harga').val(0)
        $('#tmp_id').val(null)
        $('#disc').val(null)
        // document.getElementsByName("radio")[0].checked = false;
    }

    // untuk mengecek apak tipe diskon persen atau potongan harga
    $('#tipe_diskon').change(function(e) {
        var tipe = $(this).val()
        if (tipe == 'dis_persen') {
            $('#diskon_persen').css('display', "block");
            $('#diskon_harga').css('display', "none");
        } else if (tipe == 'dis_harga') {
            $('#diskon_harga').css('display', "block");
            $('#diskon_persen').css('display', "none");
        } else {
            $('#diskon_harga').css('display', "none");
            $('#diskon_persen').css('display', "none");
        }
    })

    // cari potongan untuk diskon harg
    $('#diskon_harga').keyup(function(e) {
        var subHarga = $('#subTotalBelanja').val();
        var subHargaAwal = $('#subTotalBelanjaBantuan').val();
        var harga = $(this).val();
        console.log(harga)

        var total = parseInt(subHargaAwal) - parseInt(harga);
        if (harga == 0) {
            $('#subTotalBelanja').val(subHargaAwal);
        } else {
            $('#subTotalBelanja').val(total);
        }
    });
    // cari potongan untuk diskon diskon
    function potDis(dis) {
        var subHarga = $('#subTotalBelanja').val();
        var subHargaAwal = $('#subTotalBelanjaBantuan').val();
        var dis = dis.value;
        var hasil = (subHargaAwal * dis) / 100;
        var total = Math.round(hasil);
        console.log(total)
        var final = subHargaAwal - total;
        if (dis == 0) {
            $('#subTotalBelanja').val(subHargaAwal);
        } else {
            $('#subTotalBelanja').val(final);
        }
    }

    // bersihkan ukuran jika barang diganti
    $('#id_gudang').change(function() {
        $('#ukurans').select2(null).trigger('change')
        $('#ukurans').val(null).trigger('change');
        $('#id_gudangs').val(null)
        $('#harga').val(0)
        $('#transol_tmp_jumlah_beli').val(0)
        $('[name="radio"]').prop('checked', false);
    })

    // 
    function deleteAll(id) {  
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/transaksi_online/aksi_hapus_transaksi_all_tmp.php', {
                'transol_tmp_kode': id
            }).then(function(res) {
                var data = res.data
                toastr.info('SUCCESS..')
                $('#isi').load('inc/transaksi_online/data_keranjang_transaksi_online.php');
            }).catch(function(err) {
                toastr.error('ERROR..')
            })
        }
    }
</script>
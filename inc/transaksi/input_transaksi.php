<div class="container">
    <div class="card">
        <form method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="penjualan.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                </div>
                <div class="text-center">
                    Entry Penjualan Offline
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
                    <input type="hidden" name="namaPelanggan" id="member_id">
                    <input type="hidden" name="namaPelanggan" id="distributor_id">
                    <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5">
                        <div class="form-group">
                            <label>Nama Barang</label>
                            <select class="form-control select2" name="id_gudang" id="id_gudang" required style="width: 100%;">
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
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
                            <input type="text" required name="transaksi_jumlah_beli" id="transaksi_jumlah_beli" class="form-control" onkeyup="dapatHarga(this)">
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
                            <input type="text" readonly name="diskon" id="discItm" class="form-control">
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
                            <input type="text" required name="transaksi_total_harga" id="transaksi_total_harga" class="form-control" readonly>
                            <input type="hidden" id="tmp_id">
                            <input type="hidden" id="id_gudangs">
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Tipe Konsumen</label>
                            <select name="tipe_konsumen" id="tipe_konsumen" class="form-control select2" required>
                                <option value="">-SELECT-</option>
                                <option value="Non Member">Non Member</option>
                                <option value="Member">Member</option>
                                <!-- <option value="Distributor">Distributor</option> -->
                            </select>
                        </div>
                    </div>
                    <div id="customer" class="col-xs-12 col-sm-6 col-md-4 col-lg-3"></div>
                    <div id="pts" class="col-xs-8 col-sm-6 col-md-3 col-lg-2" style="display: none;">
                        <label for="">Point</label>
                        <input type="text" readonly id="points" class="form-control">
                    </div>
                    <div id="nmember" class="col-xs-8 col-sm-6 col-md-3 col-lg-2" style="display: none;">
                        <label for="">Nama</label>
                        <input type="text" readonly id="nmembers" class="form-control">
                    </div>
                    <div id="emember" class="col-xs-8 col-sm-6 col-md-4 col-lg-3" style="display: none;">
                        <label for="">Email</label>
                        <input type="text" readonly id="emembers" class="form-control">
                    </div>
                    <br>
                    <br>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <a href="data_member.html" target="_blank" class="btn btn-warning btn-sm">Tampilkan Data Member</a>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div class="form-group">
                            <label>&nbsp;</label>
                            <button type="button" id="simpans" class="btn btn-info form-control"><i class="fa fa-plus"> Tambah ke Keranjang</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <hr style="border: 3px solid; border-radius: 5px;">

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
        <div class="modal" id="modalCheckout" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Checkout</h4>
                        <br>
                        <i style="color:red" id="pesan"></i>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="row" style="font-size:12px">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Cara Bayar</label>
                                        <select name="transaksi_tipe_bayar" id="transaksi_tipe_bayar" class="form-control" required>
                                            <option value="0">-Pilih-</option>
                                           
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
                                </div>
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
                                <div class="col-md-12" style="display: none;" id="diskonBank">
                                    <div class="form-group">
                                        <label>Diskon Bank</label>
                                        <input type="text" class="form-control" id="diskons" readonly>
                                        <input type="hidden" class="form-control" id="diskonss" readonly>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tipe Diskon</label>
                                        <select name="tipe_diskon" id="tipe_diskon" class="form-control">
                                            <option value="">-Pilih-</option>
                                            <option value="dis_persen">Potongan Persen</option>
                                            <option value="dis_harga">Potongan Harga</option>
                                        </select>
                                        <form action="voucher.html" method="POST" target="_blank" class="mt-3">
                                            <input type="hidden" name="a" value="profile-tab">
                                            <button class="btn btn-sm btn-info" type="submit">Punya Voucher ?</button>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group" class="form-control">
                                        <label>Potongan Diskon</label>
                                        <input type="text" class="form-control" name="diskon_persen" id="diskon_persen" style="display:none;" placeholder="Potongan Persen" onkeyup="potDis(this)">
                                        <input type="number" class="form-control" name="diskon_harga" id="diskon_harga" style="display: none;" placeholder="Potongan Harga">
                                    </div>
                                </div>
                                <div class="col-md-12" style="display: none;" id="bayar_cash">
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
                                <div class="col-md-12" style="display: none;" id="bayar_point">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label>Total Point</label>
                                            <div class="input-group mb-2">
                                                <input type="text" readonly class="form-control" id="txtBayarTotalPoint">
                                                <input type="hidden" readonly class="form-control" id="txtBayarTotalPointBantuan">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Point</label>
                                            <div class="input-group mb-2">
                                                <input type="text" class="form-control" id="txtBayarPoint" onkeyup="dapatKembalian()">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label>Kembalian</label>
                                    <div class="input-group mb-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">Rp.</div>
                                        </div>
                                        <input type="text" id="kembalian" class="form-control" value="0" readonly>
                                        <input type="hidden" id="transaksi_id" class="form-control">
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
                        <button type="button" id="btnCheckoutPoint" onclick="simpan()" class="btn btn-primary btn-sm">Simpan</button>
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

    function potongan(disc) {
        var diskon = disc.value
        var harga = $('#harga1').val()
        var jumlah = $('#transaksi_jumlah_beli').val()
        var hasil = (harga * parseFloat(diskon)) / 100
        var nominal = harga - hasil
        var totalBayar = parseInt(jumlah) * nominal
        console.log(jumlah)
        $('#transaksi_total_harga').val(totalBayar)
        // $('#harga').val(nominal)
    }

    // menampilkan tipe konsumen jika salah satu select box dipilih
    $('#tipe_konsumen').change(function() {
        var tipe = $(this).val()
        if (tipe == "Member") {
            let member = "<div id='tipe_member' class='form-group'>" +
                "<label>Member</label>" +
                "<select name='member_id'  id='member_ids' class='form-control select3' style='width: 100%;' required>" +
                "<option value=''>-Pilih-</option>" +
                <?php
                $datag = $con->select('tb_member', '*');
                foreach ($datag as $member) {
                ?> "<option value = '<?= $member['member_id'] ?>' > <?= $member['member_notelp'] ?> | <?= $member['member_kode'] ?></option>" +
                <?php } ?> "</select>" +
                "</div>";
            document.getElementById('customer').innerHTML = member;
            $('.select3').select2({
                dropdownAutoWidth: true
            });
            $('#member_ids').change(function(e) {
                e.preventDefault()
                var id_member = $(this).select2().val();
                axios.post('inc/transaksi/filter/tampilpoint.php', {
                    'id_member': id_member
                }).then(function(res) {
                    var data = res.data
                    console.log(data);
                    $('#pts').show()
                    $('#nmember').show()
                    $('#emember').show()
                    $('#points').val(data.point)
                    $('#nmembers').val(data.member_nama)
                    $('#emembers').val(data.member_email)
                    $('#member_id').val(id_member)
                    $('#distributor_id').val('')
                }).catch(function(err) {
                    console.log(err)
                })
            })


        } else if (tipe == "Distributor") {
            var distributor =
                "<div class='form-group' id='tipe_distributor'>" +
                "<label>Distributor</label>" +
                "<select name='distributor_id' id='distributor_ids' class='form-control select3' style='width: 100%;' required>" +
                "<option value=''>-Pilih-</option>" +
                <?php
                $datag = $con->select('tb_distributor', '*');
                foreach ($datag as $distributor) {
                ?> "<option value = '<?= $distributor['distributor_id'] ?>' > <?= $distributor['distributor_nama'] ?></option>" +
                <?php } ?> "</select>" +
                "</div>";
            document.getElementById('customer').innerHTML = distributor;
            $('.select3').select2({
                dropdownAutoWidth: true
            });
            $('#distributor_ids').change(function(e) {
                e.preventDefault()
                var id_member = $(this).select2().val();
                $('#distributor_id').val(id_member)
                $('#member_id').val('')
            })
            $('#pts').hide()
            $('#nmember').hide()
            $('#emember').hide()    
            $('#points').val(0)
        } else {
            document.getElementById('customer').innerHTML = '';
            $('#member_id').val('')
            $('#distributor_id').val('')
            $('#pts').hide()
            $('#nmember').hide()
            $('#emember').hide() 
            $('#points').val(0)

        }
    })

    $('#id_gudang').change(function(e) {
        e.preventDefault()
        var barang_id = $(this).val()
        var id_toko = $('#id_toko').val()
        axios.post('inc/transaksi/filter/ukuran.php', {
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
        axios.post('inc/transaksi/filter/stok.php', {
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

    // mendapatkan total harga dari jumlah beli kali dengan total harga
    function dapatHarga(nilai) {
        var stok = parseInt($('#transaksi_stok').val());
        var jumlahBeli = parseInt(nilai.value);
        if (stok < jumlahBeli) {
            alert('Maaf Stok Tidak Mencukupi')
            $('#transaksi_jumlah_beli').val('')
            $('#transaksi_total_harga').val(0)
        } else {
            console.log('Aman')
            // dapatkan harga
            var harga = document.getElementById("harga").value;
            // cari total harga
            var total = harga * jumlahBeli;
            document.getElementById("transaksi_total_harga").value = total;
        }

    }

    // proses masuk ke keranjang
    $('#simpans').on('click', function() {
        var tipe_konsumen = $('#tipe_konsumen').val()
        if (tipe_konsumen == '') {
            toastr.warning('Silahkan Pilih Tipe Konsumen');
        } else {
            var tmp_kode = $('#kode').val()
            var tmp_tgl = $('#tanggal').val()
            var id_toko = $('#id_toko').val()
            var potongan = $('#hasilDsc').val()
            var diskon1 = $('#discItm').val()
            var id_gudang = $('#id_gudangs').val()
            var tipe_konsumen = $('#tipe_konsumen').val()
            var member_id = $('#member_id').val()
            var distributor_id = $('#distributor_id').val()
            var tmp_jumlah_beli = $('#transaksi_jumlah_beli').val()
            var tmp_total_harga = $('#transaksi_total_harga').val()
            var tmp_id = $('#tmp_id').val()

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
                'diskon1': diskon1,
                'potongan': potongan,
                'tmp_id': tmp_id
            }).then(function(res) {
                $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
                kosong()
            }).catch(function(err) {
                console.log(err)
                $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
                kosong()
            })
        }
    })

    // isi pilihan tipe bayar
    <?php 
        $nonmember = $con->query("SELECT * FROM `tb_metode` WHERE kategori NOT LIKE '%point%'")->fetchAll(PDO::FETCH_ASSOC);
    
        $diskon = $con->select('tb_metode', '*');
    ?>
    var kalau_member = <?= json_encode($diskon); ?>;
    var kalau_nonmember = <?= json_encode($nonmember); ?>;

    // console.log(kalau_member);
    // console.log(kalau_nonmember);

    // proses checkout
    $('#checkout').on('click', function() {
        var sub = document.getElementById('subtotal').value;
        var tot = document.getElementById('jmlTot').value;
        document.getElementById('subTotalBelanja').value = sub;
        document.getElementById('subTotalBelanjaBantuan').value = sub;
        document.getElementById('subTotalBelanja1').value = sub;
        document.getElementById('jumlahTotal').value = tot;
        console.log(sub)
        console.log(tot)
        var tipe_konsumen = $('#tipe_konsumen').val()
        if (tipe_konsumen == '') {
            toastr.warning('Silahkan Pilih Tipe Konsumen');
        } else {
                document.getElementById("transaksi_tipe_bayar").innerHTML = "<option value='0'>-Pilih-</option>"
            if(tipe_konsumen == "Member"){
                for(var x = 0; x < kalau_member.length; x++)
                {
                    document.getElementById("transaksi_tipe_bayar").innerHTML += "<option value='" + kalau_member[x].id_metode + "'>" + kalau_member[x].kategori + "</option>"
                }

                $("#tipenya_kalau_selain_member").css("display", "none");
                $("#tipenya_kalau_selain_member").prop("disabled", true);
                $("#tipenya_kalau_member").css("display", "block");
                $("#tipenya_kalau_member").prop("disabled", false);
                // $('td[name^="transaksi_tipe_bayar"]').attr('id', 'a') //awal
                // document.getElementsByName('transaksi_tipe_bayar')[1].id = 'gogo';
                // document.getElementsByName('transaksi_tipe_bayar')[0].id = 'transaksi_tipe_bayar';
                // 
            }else{
                for(var x = 0; x < kalau_nonmember.length; x++)
                {
                    document.getElementById("transaksi_tipe_bayar").innerHTML += "<option value='" + kalau_nonmember[x].id_metode + "'>" + kalau_nonmember[x].kategori + "</option>"
                }
                
                $("#tipenya_kalau_member").css("display", "none");
                $("#tipenya_kalau_member").prop("disabled", true);
                $("#tipenya_kalau_selain_member").css("display", "block");
                $("#tipenya_kalau_selain_member").prop("disabled", false);
                // $('td[name$="transaksi_tipe_bayar"]').attr('id', 'b') // end 
                // document.getElementsByName('transaksi_tipe_bayar')[1].id = 'transaksi_tipe_bayar';
                // document.getElementsByName('transaksi_tipe_bayar')[0].id = 'koko';
            }
            $('#modalCheckout').modal()
        }
    })

    $('#transaksi_bank').change(function(e) {
        var bank = $(this).val()
        var subtotal = $('#subTotalBelanja1').val()
        var id = $('#transaksi_tipe_bayar').val()
        if (id != 1) {
            axios.post('inc/transaksi/diskon.php', {
                'id': id,
                'bank': bank
            }).then(function(res) {
                var data = res.data
                if (data == false) {
                    var nilaidiskon = 0

                } else {
                    var nilaidiskon = data.diskon
                }
                $('#diskons').val(nilaidiskon)
                var disc = nilaidiskon
                var total = (subtotal * disc) / 100
                var bersih = subtotal - total
                $('#subTotalBelanja').val(bersih)
                $('#subTotalBelanjaBantuan').val(bersih)
                $('#diskonss').val(total)
            }).catch(function(err) {
                console.log(err)
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

    // cari tipe pembayaran
    document.getElementById("transaksi_tipe_bayar").addEventListener("change", function() {
        console.log(this.value);
        var poin = parseInt($('#points').val())
        var tot = parseInt($('#subTotalBelanjaBantuan').val())
        var hrgAwal = parseInt($('#subTotalBelanja1').val())
        // jika tipe null
        // alert(this.value)
        if (this.value == 0) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            document.getElementById("tipe_bayar").style.display = "none";
            document.getElementById("bayar_cash").style.display = "none";
            document.getElementById("bayar_point").style.display = "none";
            document.getElementById("bayar_card").style.display = "none";
            document.getElementById("diskonBank").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;

        }
        // jika tipe cash
        else if (this.value == 1) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            document.getElementById("tipe_bayar").style.display = "none";
            document.getElementById("bayar_cash").style.display = "block";
            document.getElementById("bayar_point").style.display = "none";
            document.getElementById("bayar_card").style.display = "none";
            document.getElementById("diskonBank").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
            $('#pesan').html('')
            document.getElementById("btnCheckoutPoint").style.display = "block";
        }
        // jika tipe debit / credit 
        else if (this.value == 2 || this.value == 3) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            $('#transaksi_bank').val('').change();
            document.getElementById("tipe_bayar").style.display = "block";
            document.getElementById("bayar_card").style.display = "block";
            document.getElementById("bayar_cash").style.display = "none";
            document.getElementById("diskonBank").style.display = "block";
            document.getElementById("bayar_point").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
            $('#pesan').html('')
            document.getElementById("btnCheckoutPoint").style.display = "block";
        }
        // jika tipe cash + debit / cash + credit
        else if (this.value == 4 || this.value == 5) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            $('#transaksi_bank').val('').change();

            document.getElementById("tipe_bayar").style.display = "block";
            document.getElementById("bayar_cash").style.display = "block";
            document.getElementById("bayar_card").style.display = "block";
            document.getElementById("diskonBank").style.display = "block";
            document.getElementById("bayar_point").style.display = "none";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarCard").value = 0;
            $('#pesan').html('')
            document.getElementById("btnCheckoutPoint").style.display = "block";
        }
        // jika tipe point 
        else if (this.value == 6) {
            $('#kembalian').val(0);
            $('#transaksi_bank').val('').change();
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            if (tot > poin) {
                // $('#btnCheckoutPoint').prop('display', 'none')
                document.getElementById("btnCheckoutPoint").style.display = "none";
                $('#pesan').html('* Maaf Point Anda Tidak Mencukupi');
            } else {
                document.getElementById("btnCheckoutPoint").style.display = "block";
            }
            document.getElementById("tipe_bayar").style.display = "none";
            document.getElementById("bayar_cash").style.display = "none";
            document.getElementById("bayar_point").style.display = "block";
            document.getElementById("bayar_card").style.display = "none";
            document.getElementById("diskonBank").style.display = "none";
            document.getElementById("txtBayarTotalPoint").value = poin;
            document.getElementById("txtBayarTotalPointBantuan").value = poin;
            document.getElementById("txtBayarCard").value = 0;
        }
        // jika point + credit/debit
        else if (this.value == 7 || this.value == 8) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            $('#transaksi_bank').val('').change();
            var penguranganpoint = tot - poin
            // alert(penguranganpoint)
            // $('#subTotalBelanja').val(penguranganpoint)
            document.getElementById("tipe_bayar").style.display = "block";
            document.getElementById("bayar_cash").style.display = "none";
            document.getElementById("bayar_card").style.display = "block";
            document.getElementById("diskonBank").style.display = "block";
            document.getElementById("bayar_point").style.display = "block";
            document.getElementById("txtBayarTotalPoint").value = poin;
            document.getElementById("txtBayarTotalPointBantuan").value = poin;
            document.getElementById("txtBayarCard").value = 0;
            $('#pesan').html('')
            document.getElementById("btnCheckoutPoint").style.display = "block";
        }
        // jika point + cash
        else if (this.value == 9) {
            $('#kembalian').val(0);
            $("#subTotalBelanja").val(hrgAwal);
            $("#subTotalBelanjaBantuan").val(hrgAwal);
            $('#transaksi_bank').val('').change();

            var penguranganpoint = tot - poin

            // $('#subTotalBelanja').val(penguranganpoint)
            document.getElementById("tipe_bayar").style.display = "none";
            document.getElementById("bayar_cash").style.display = "block";
            document.getElementById("bayar_card").style.display = "none";
            document.getElementById("diskonBank").style.display = "none";
            document.getElementById("bayar_point").style.display = "block";
            document.getElementById("txtBayarCash").value = 0;
            document.getElementById("txtBayarTotalPoint").value = poin;
            document.getElementById("txtBayarTotalPointBantuan").value = poin;
            $('#pesan').html('')
            document.getElementById("btnCheckoutPoint").style.display = "block";
        }
    })

    // menampilkan kembalian
    function dapatKembalian() {
        var bayar_cash = parseInt($('#txtBayarCash').val());
        var bayar_card = parseInt($('#txtBayarCard').val());
        var bayar_poin = parseInt($('#txtBayarPoint').val());
        if (isNaN(bayar_poin)) {
            bayar_poin = 0;
        }
        var subTotalHarga = parseInt($('#subTotalBelanja').val());
        var tipetras = $('#transaksi_tipe_bayar').val()
        if (tipetras == 1) {
            $('#kembalian').val(0);
            bayar_card = 0;
            total = bayar_cash + bayar_card - subTotalHarga;
            document.getElementById("kembalian").value = total;
        } else if (tipetras == 4 || tipetras == 5) {
            $('#kembalian').val(0);
            total = bayar_cash + bayar_card - subTotalHarga;
            document.getElementById("kembalian").value = total;
        } else if (tipetras == 2 || tipetras == 3) {
            $('#kembalian').val(0);
            bayar_cash = 0;
            total = bayar_card + bayar_cash - subTotalHarga;
            document.getElementById("kembalian").value = total;
        } else if (tipetras == 7 || tipetras == 8) {
            $('#kembalian').val(0);
            var subtot = parseInt($('#subTotalBelanja').val());
            var bayarcard = parseInt($('#txtBayarCard').val());
            total = bayarcard + bayar_poin - subtot;
            console.log(total)
            if (total == NaN) {
                total = 0;
            }
            document.getElementById("kembalian").value = total;
        } else if (tipetras == 9) {
            $('#kembalian').val(0);
            var subTotalHarga = parseInt($('#subTotalBelanja').val());
            var bayar_cash = parseInt($('#txtBayarCash').val());
            total = (bayar_cash + bayar_poin) - subTotalHarga;
            if (total == NaN) {
                total = 0;
            }
            document.getElementById("kembalian").value = total;
        }
        // $('#transaksi_total_harga').val(total);
    }

    // kurangi point jika pakai point 
    $('#txtBayarPoint').keyup(function(e) {
        e.preventDefault();
        var total_poin = parseInt($('#txtBayarTotalPointBantuan').val());
        if (total_poin < $(this).val()) {
            alert('Point tidak cukup...')
            $('#txtBayarPoint').val(0);
            $('#txtBayarTotalPoint').val(total_poin)
            $('#kembalian').val(0)
        } else {
            var hasil = total_poin - $(this).val();
            $('#txtBayarTotalPoint').val(hasil);
        }
    });

    // proses simpan ke tabel transaksi
    function simpan() {
        var transaksi_tipe_bayar = $('#transaksi_tipe_bayar').val()
        var transaksi_bank = $('#transaksi_bank').val()
        var transaksi_cash = $('#txtBayarCash').val()
        var transaksi_card = $('#txtBayarCard').val()
        var transaksi_id = $('#transaksi_id').val()
        var transaksi_diskon = $('#diskonss').val()
        var transaksi_total_belanja = $('#subTotalBelanja').val()
        var transaksi_kembalian = $('#kembalian').val()
        var tipe_konsumen = $('#tipe_konsumen').val()
        var member_id = $('#member_ids').val()
        var tipe_diskon2 = $('#tipe_diskon').val();
        if (tipe_diskon2 == 'dis_persen') {
            var diskon2 = $('#diskon_persen').val();
        } else if (tipe_diskon2 == 'dis_harga') {
            var diskon2 = $('#diskon_harga').val();
        } else {
            var diskon2 = 0;
        }
        var diskon_bank = $('#diskons').val()
        var transaksi_jumlah_beli = $('#jumlahTotal').val()
        var kode = $('#kode').val()
        var points = $('#txtBayarPoint').val()
        var keterangan = $('#keterangan').val()
        axios.post('inc/transaksi/aksi_simpan_transaksi.php', {
            'transaksi_tipe_bayar': transaksi_tipe_bayar,
            'transaksi_bank': transaksi_bank,
            'transaksi_cash': transaksi_cash,
            'transaksi_card': transaksi_card,
            'transaksi_id': transaksi_id,
            'transaksi_diskon': transaksi_diskon,
            'transaksi_total_belanja': transaksi_total_belanja,
            'transaksi_kembalian': transaksi_kembalian,
            'tipe_diskon2': tipe_diskon2,
            'diskon2': diskon2,
            'diskon_bank': diskon_bank,
            'transaksi_jumlah_beli': transaksi_jumlah_beli,
            'tipe_konsumen': tipe_konsumen,
            'member_id': member_id,
            'points': points,
            'keterangan': keterangan,
            'kode': kode,
        }).then(function(res) {
            var simpan = res.data
            window.open('inc/struk/invo1.php?invoice=' + kode, '_blank');
            window.location = 'penjualan.html';
            kosong()
        }).catch(function(err) {
            alert(err)
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

    // utk mengosongkan jika selesai pilih barang
    function kosong() {
        $('#ukurans').val(null).trigger('change');
        $('#id_gudang').val(null).trigger('change');
        $('#id_gudangs').val(null)
        $('#transaksi_stok').val(0)
        $('#harga').val(0)
        $('#ukurans').select2(null).trigger('change')
        $('#transaksi_jumlah_beli').val(null)
        $('#transaksi_total_harga').val(0)
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
        $('#transaksi_jumlah_beli').val(0)
        // $('[name="radio"]').prop('checked', false);
    })
    $(document).ready(function () {
        $('#nmember').hide()
        $('#pts').hide()
        $('#emember').hide()
    });

    // // type bayar
    // $('#transaksi_tipe_bayar').change(function(e) {
    //     var id = $(this).val()
    //     if (id != 1) {
    //         $('#transaksi_bank').change(function(e) {
    //             var bank = $(this).val()
    //             var subtotal = $('#subTotalBelanja').val()
    //             axios.post('inc/transaksi/diskon.php', {
    //                 'id': id,
    //                 'bank': bank
    //             }).then(function(res) {
    //                 var data = res.data
    //                 if(data == false)
    //                 {
    //                     var nilaidiskon = 0

    //                 }else{
    //                     var nilaidiskon = data.diskon
    //                 }
    //                 $('#diskons').val(nilaidiskon)
    //                 var disc = nilaidiskon
    //                 var total = (subtotal * disc) / 100
    //                 var bersih = subtotal - total
    //                 $('#subTotalBelanja').val(bersih)
    //                 $('#subTotalBelanjaBantuan').val(bersih)
    //                 $('#diskonss').val(total)
    //             }).catch(function(err) {
    //                 console.log(err)
    //             })
    //         })
    //     } else {
    //         axios.post('inc/transaksi/diskon.php', {
    //             'id': id,
    //             'bank': 0
    //         }).then(function(res) {
    //             var data = res.data
    //             $('#diskons').val(data.diskon)
    //             console.log(data.diskon)
    //         }).catch(function(err) {
    //             console.log(err)
    //         })
    //     }
    // })

    function deleteAll(id) {  
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/transaksi/aksi_hapus_transaksi_all_tmp.php', {
                'tmp_kode': id
            }).then(function(res) {
                var data = res.data
                toastr.info('SUCCESS..')
                $('#isi').load('inc/transaksi/data_keranjang_transaksi.php');
            }).catch(function(err) {
                toastr.error('ERROR..')
            })
        }
    }

</script>
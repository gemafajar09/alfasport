<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query(
    "SELECT
                        tb_barang.barang_id,
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_modal,
                        tb_barang.barang_jual,
                        tb_gender.gender_nama,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama
                    From
                        tb_barang Inner Join
                        tb_gender On tb_gender.gender_id = tb_barang.gender_id Inner Join
                        tb_merk On tb_merk.merk_id = tb_barang.merk_id Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_barang.kategori_id Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_barang.divisi_id Inner Join
                        tb_subdivisi On tb_subdivisi.subdivisi_id = tb_barang.subdivisi_id
                    WHERE     
                        tb_barang.barang_id = :barang_id",
    array("barang_id" => $_POST['barang_id'])
)->fetch();
?>

<div class="row">
    <div class="col-md-6">
        <table>
            <tr>
                <th>Artikel</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;<?= $data['barang_artikel'] ?></i></th>
            </tr>
            <tr>
                <th>Nama</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;<?= $data['barang_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Harga Modal</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($data['barang_modal']) ?></i></th>
            </tr>
            <tr>
                <th>Harga Jual</th>
                <th>:</th>
                <th><i>&nbsp;&nbsp;Rp.<?= number_format($data['barang_jual']) ?></i></th>
            </tr>
        </table>
    </div>
    <div class="col-md-6">
        <table>
            <tr>
                <th>Merek</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $data['merk_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Kategori</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $data['kategori_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Divisi</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $data['divisi_nama'] ?></i></th>
            </tr>
            <tr>
                <th>Gender</th>
                <th>:</th>
                <th><i id="artikel">&nbsp;&nbsp;<?= $data['gender_nama'] ?></i></th>
            </tr>
        </table>
    </div>

    <?php
    $isi = $con->query(
        "SELECT
            tb_barang.barang_kode,
            tb_barang.barang_nama,
            tb_barang.barang_kategori,
            tb_barang_detail.barang_detail_id,
            tb_barang_detail.barang_detail_barcode,
            tb_barang_detail.barang_detail_jml,
            tb_barang_detail.barang_detail_tgl,
            tb_ukuran.sepatu_ue,
            tb_ukuran.sepatu_uk,
            tb_ukuran.sepatu_us,
            tb_ukuran.sepatu_cm,
            tb_ukuran.kaos_kaki_eu,
            tb_ukuran.kaos_kaki_size,
            tb_ukuran.barang_lainnya_nama_ukuran
        From
            tb_barang Inner Join
            tb_barang_detail On tb_barang_detail.barang_id = tb_barang.barang_id Inner Join
            tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
        WHERE
            tb_barang.barang_id = :barang_id",
        array("barang_id" => $_POST['barang_id'])
    )->fetchAll();

    if ($data['barang_kategori'] == 'Sepatu') {
    ?>
        <div class="col-md-10 mx-auto py-4">
            <table class="table">
                <thead style="background-color:grey">
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th class="text-center" colspan="4">Ukuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                        <th>EU</th>
                        <th>UK</th>
                        <th>US</th>
                        <th>CM</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    foreach ($isi as $i => $a) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a['barang_detail_barcode'] ?></td>
                            <td><?= $a['sepatu_ue'] ?></td>
                            <td><?= $a['sepatu_uk'] ?></td>
                            <td><?= $a['sepatu_us'] ?></td>
                            <td><?= $a['sepatu_cm'] ?></td>
                            <td><?= $a['barang_detail_jml'] ?></td>
                            <td><?= tgl_indo($a['barang_detail_tgl']) ?></td>
                            <td>
                                <button type="button" id="edit" onclick="editSepatu('<?= $a['barang_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                <button type="button" id="hapus" onclick="hapusSepatu('<?= $a['barang_detail_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php
    } else if ($data['barang_kategori'] == 'Kaos Kaki') {
    ?>
        <div class="col-md-10 mx-auto py-4">
            <table class="table">
                <thead style="background-color:grey">
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th class="text-center" colspan="2">Ukuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                        <th>EU</th>
                        <th>SIZE</th>
                        <th colspan="3"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($isi as $i => $a) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a['barang_detail_barcode'] ?></td>
                            <td><?= $a['kaos_kaki_eu'] ?></td>
                            <td><?= $a['kaos_kaki_size'] ?></td>
                            <td><?= $a['barang_detail_jml'] ?></td>
                            <td><?= tgl_indo($a['barang_detail_tgl']) ?></td>
                            <td>
                                <button type="button" id="edit" onclick="editKaosKaki('<?= $a['barang_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                <button type="button" id="hapus" onclick="hapusKaosKaki('<?= $a['barang_detail_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php
    } else if ($data['barang_kategori'] == 'Barang Lainnya') {
    ?>
        <div class="col-md-10 mx-auto py-4">
            <table class="table">
                <thead style="background-color:grey">
                    <tr>
                        <th>No</th>
                        <th>Barcode</th>
                        <th>Ukuran</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($isi as $i => $a) {
                    ?>
                        <tr>
                            <td><?= $i + 1 ?></td>
                            <td><?= $a['barang_detail_barcode'] ?></td>
                            <td><?= $a['barang_lainnya_nama_ukuran'] ?></td>
                            <td><?= $a['barang_detail_jml'] ?></td>
                            <td><?= tgl_indo($a['barang_detail_tgl']) ?></td>
                            <td>
                                <button type="button" id="edit" onclick="editBaranglainnya('<?= $a['barang_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                                <button type="button" id="hapus" onclick="hapusBaranglainnya('<?= $a['barang_detail_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    <?php
    }
    ?>
</div>


<!-- modal sepatu -->
<div class="modal" id="editBarangDetailSepatu">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Barang Detail</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" name="barang_detail_barcode_sepatu" id="barang_detail_barcode_sepatu" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <select name="ukuran_id_sepatu" id="ukuran_id_sepatu" class="form-control select2">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="barang_detail_jml_sepatu" id="barang_detail_jml_sepatu" class="form-control">
                                <input type="hidden" id="barang_detail_id_sepatu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpanSepatu()" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    // sepatu
    function editSepatu(barang_detail_id) {
        var edit = null;
        axios.post('inc/barang_gudang/aksi_edit_data_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            edit = res.data
            $('#barang_detail_id_sepatu').val(edit.barang_detail_id);
            $('#barang_detail_barcode_sepatu').val(edit.barang_detail_barcode);
            $('#barang_detail_jml_sepatu').val(edit.barang_detail_jml);
            return axios.get('inc/barang_gudang/filter/data_ukuran.php?merk=' + edit.merk_id + '&subdivisi=' + edit.subdivisi_id + '&id=' + edit.barang_id)
        }).then(function(res) {
            $('#ukuran_id_sepatu').html(res.data);
            $('#ukuran_id_sepatu').val(edit.ukuran_id).change();
            $('#editBarangDetailSepatu').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpanSepatu() {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var barang_detail_id_sepatu = $('#barang_detail_id_sepatu').val()
        var barang_detail_barcode_sepatu = $('#barang_detail_barcode_sepatu').val()
        var barang_detail_jml_sepatu = $('#barang_detail_jml_sepatu').val()
        var ukuran_id_sepatu = $('#ukuran_id_sepatu').val()
        axios.post('inc/barang_gudang/aksi_simpan_hasil_edit_stok_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id_sepatu,
            'barang_detail_barcode': barang_detail_barcode_sepatu,
            'barang_detail_jml': barang_detail_jml_sepatu,
            'ukuran_id': ukuran_id_sepatu,
        }).then(function(res) {
            var simpan = res.data
            toastr.info(simpan)
            detail(id_dari_tb_barang)
            $('#editBarangDetailSepatu').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#editBarangDetailSepatu').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        })
    }

    function hapusSepatu(barang_detail_id) {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/barang_gudang/aksi_hapus_barang_gudang_detail.php', {
                'barang_detail_id': barang_detail_id
            }).then(function(res) {
                var hapus = res.data
                toastr.info('Data ukuran dihapus')
                detail(id_dari_tb_barang)
                $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }
</script>


<!-- modal kaos kaki -->
<div class="modal" id="editBarangDetailKaosKaki">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Barang Detail</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" name="barang_detail_barcode_kaos_kaki" id="barang_detail_barcode_kaos_kaki" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <select name="ukuran_id_kaos_kaki" id="ukuran_id_kaos_kaki" class="form-control select2">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="barang_detail_jml_kaos_kaki" id="barang_detail_jml_kaos_kaki" class="form-control">
                                <input type="hidden" id="barang_detail_id_kaos_kaki">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpanKaosKaki()" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    // kaos kaki
    function editKaosKaki(barang_detail_id) {
        var edit = null;
        axios.post('inc/barang_gudang/aksi_edit_data_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            edit = res.data
            $('#barang_detail_id_kaos_kaki').val(edit.barang_detail_id);
            $('#barang_detail_barcode_kaos_kaki').val(edit.barang_detail_barcode);
            $('#barang_detail_jml_kaos_kaki').val(edit.barang_detail_jml);
            return axios.get('inc/barang_gudang/filter/data_ukuran.php?merk=' + edit.merk_id + '&subdivisi=' + edit.subdivisi_id + '&id=' + edit.barang_id)
        }).then(function(res) {
            $('#ukuran_id_kaos_kaki').html(res.data);
            $('#ukuran_id_kaos_kaki').val(edit.ukuran_id).change();
            $('#editBarangDetailKaosKaki').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpanKaosKaki() {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var barang_detail_id_kaos_kaki = $('#barang_detail_id_kaos_kaki').val()
        var barang_detail_barcode_kaos_kaki = $('#barang_detail_barcode_kaos_kaki').val()
        var barang_detail_jml_kaos_kaki = $('#barang_detail_jml_kaos_kaki').val()
        var ukuran_id_kaos_kaki = $('#ukuran_id_kaos_kaki').val()
        axios.post('inc/barang_gudang/aksi_simpan_hasil_edit_stok_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id_kaos_kaki,
            'barang_detail_barcode': barang_detail_barcode_kaos_kaki,
            'barang_detail_jml': barang_detail_jml_kaos_kaki,
            'ukuran_id': ukuran_id_kaos_kaki,
        }).then(function(res) {
            var simpan = res.data
            toastr.info(simpan)
            detail(id_dari_tb_barang)
            $('#editBarangDetailKaosKaki').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#editBarangDetailKaosKaki').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        })
    }

    function hapusKaosKaki(barang_detail_id) {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/barang_gudang/aksi_hapus_barang_gudang_detail.php', {
                'barang_detail_id': barang_detail_id
            }).then(function(res) {
                var hapus = res.data
                toastr.info('Data ukuran dihapus')
                detail(id_dari_tb_barang)
                $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }
</script>


<!-- modal barang lainnya -->
<div class="modal" id="editBarangDetailBarangLainnya">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Barang Detail</h4>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Barcode</label>
                                <input type="text" name="barang_detail_barcode_barang_lainnya" id="barang_detail_barcode_barang_lainnya" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Ukuran</label>
                                <select name="ukuran_id_barang_lainnya" id="ukuran_id_barang_lainnya" class="form-control select2">

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah</label>
                                <input type="number" name="barang_detail_jml_barang_lainnya" id="barang_detail_jml_barang_lainnya" class="form-control">
                                <input type="hidden" id="barang_detail_id_sepatu">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="simpanBarangLainnya()" class="btn btn-primary btn-sm">Simpan</button>
            </div>
        </div>
    </div>
</div>
<script>
    // barang lainnya
    function editBaranglainnya(barang_detail_id) {
        var edit = null;
        axios.post('inc/barang_gudang/aksi_edit_data_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id
        }).then(function(res) {
            edit = res.data
            $('#barang_detail_id_sepatu').val(edit.barang_detail_id);
            $('#barang_detail_barcode_barang_lainnya').val(edit.barang_detail_barcode);
            $('#barang_detail_jml_barang_lainnya').val(edit.barang_detail_jml);
            return axios.get('inc/barang_gudang/filter/data_ukuran.php?merk=' + edit.merk_id + '&subdivisi=' + edit.subdivisi_id + '&id=' + edit.barang_id)
        }).then(function(res) {
            $('#ukuran_id_barang_lainnya').html(res.data);
            $('#ukuran_id_barang_lainnya').val(edit.ukuran_id).change();
            $('#editBarangDetailBarangLainnya').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpanBarangLainnya() {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var barang_detail_id_sepatu = $('#barang_detail_id_sepatu').val()
        var barang_detail_barcode_barang_lainnya = $('#barang_detail_barcode_barang_lainnya').val()
        var barang_detail_jml_barang_lainnya = $('#barang_detail_jml_barang_lainnya').val()
        var ukuran_id_barang_lainnya = $('#ukuran_id_barang_lainnya').val()
        axios.post('inc/barang_gudang/aksi_simpan_hasil_edit_stok_barang_gudang_detail.php', {
            'barang_detail_id': barang_detail_id_sepatu,
            'barang_detail_barcode': barang_detail_barcode_barang_lainnya,
            'barang_detail_jml': barang_detail_jml_barang_lainnya,
            'ukuran_id': ukuran_id_barang_lainnya,
        }).then(function(res) {
            var simpan = res.data
            toastr.info(simpan)
            detail(id_dari_tb_barang)
            $('#editBarangDetailBarangLainnya').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#editBarangDetailBarangLainnya').modal('hide')
            $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            kosong()
        })
    }

    function hapusBaranglainnya(barang_detail_id) {
        var id_dari_tb_barang = $('#id_dari_tb_barang').val()
        var tanya = confirm('Yakin hapus ?');
        if (tanya == true) {
            axios.post('inc/barang_gudang/aksi_hapus_barang_gudang_detail.php', {
                'barang_detail_id': barang_detail_id
            }).then(function(res) {
                var hapus = res.data
                toastr.info('Data ukuran dihapus')
                detail(id_dari_tb_barang)
                $('#isi').load('inc/barang_gudang/data_barang_gudang.php');
            }).catch(function(err) {
                console.log(err)
            })
        }
    }
</script>
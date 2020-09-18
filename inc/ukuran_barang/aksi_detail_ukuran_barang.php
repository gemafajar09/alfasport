<?php
include "../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

?>
<table class="table">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Ukuran</th>
            <!-- <th>Jumlah Stok</th> -->
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $data_table = $con->query("SELECT * FROM tb_ukuran_barang_detail WHERE ukuran_barang_id = '$_POST[ukuran_barang_id]'")->fetchAll();

        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $i + 1 ?></td>
                <td><?= $data['ukuran_barang_detail_nama'] ?></td>
                <!-- <td><?= $data['ukuran_barang_detail_stok'] ?></td> -->
                <td>
                    <button type="button" onclick="editDetail(<?= $data['ukuran_barang_detail_id'] ?>)" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
                    <button type="button" id="hapus" onclick="hapusDetail('<?= $data['ukuran_barang_detail_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>


<div class="modal" id="dataUkuranDetailEdit">
    <div class="modal-dialog modal-dialog-centered modal-l">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Ukuran</h4>
            </div>

            <div class="modal-body">
                <div class="container">
                    <div class="row" style="font-size:12px">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" name="ukuran_barang_detail_nama" id="ukuran_barang_detail_nama" class="form-control">
                            </div>
                        </div>
                        <!-- <div class="col-md-6">
                            <div class="form-group">
                                <label>Stok</label> -->
                        <input type="hidden" name="ukuran_barang_detail_stok" id="ukuran_barang_detail_stok" class="form-control">
                        <input type="hidden" id="ukuran_barang_detail_id">
                        <!-- </div>
                        </div> -->

                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" onclick="simpanD()" class="btn btn-primary btn-sm">Simpan</button>
            </div>

        </div>
    </div>
</div>

<script>
    function editDetail(id) {
        axios.post('inc/ukuran_barang/aksi_edit_ukuran_barang_detail.php', {
            'ukuran_barang_detail_id': id
        }).then(function(res) {
            var edit = res.data
            $('#ukuran_barang_detail_nama').val(edit.ukuran_barang_detail_nama)
            $('#ukuran_barang_detail_stok').val(edit.ukuran_barang_detail_stok)
            $('#ukuran_barang_detail_id').val(edit.ukuran_barang_detail_id)
            $('#dataUkuranDetailEdit').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function simpanD() {
        var id = $('#idDetailUkuran').val()
        var ukuran_barang_detail_nama = $('#ukuran_barang_detail_nama').val()
        var ukuran_barang_detail_stok = $('#ukuran_barang_detail_stok').val()
        var ukuran_barang_detail_id = $('#ukuran_barang_detail_id').val()
        axios.post('inc/ukuran_barang/aksi_simpan_ukuran_barang_detail.php', {
            'ukuran_barang_detail_nama': ukuran_barang_detail_nama,
            'ukuran_barang_detail_stok': ukuran_barang_detail_stok,
            'ukuran_barang_detail_id': ukuran_barang_detail_id,
        }).then(function(res) {
            var simpan = res.data
            console.log(simpan)
            detail(id)
            $('#dataUkuranDetailEdit').modal('hide')
            $('#isi').load('inc/ukuran_barang/data_ukuran_barang.php');
            kosong()
        }).catch(function(err) {
            alert(err)
            $('#dataUkuranDetailEdit').modal('hide')
            $('#isi').load('inc/ukuran_barang/data_ukuran_barang.php');
            kosong()
        })
    }

    function hapusDetail(id) {
        var idDetailUkuran = $('#idDetailUkuran').val()
        axios.post('inc/ukuran_barang/aksi_hapus_ukuran_barang_detail.php', {
            'ukuran_barang_detail_id': id
        }).then(function(res) {
            var hapus = res.data
            toastr.info('Data ukuran dihapus')
            detail(idDetailUkuran)
            $('#isi').load('inc/ukuran_barang/data_ukuran_barang.php');
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>
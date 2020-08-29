<div class="page-title">
    <div class="title_left">
        <h3>Data Transfer Terima</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            //
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <!-- <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button> -->
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
        <table class="table table-striped" id="datatable-responsive" id="datatable-responsive" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Toko</th>
                    <th>Nama Toko Tujuan</th>
                    <th>Tanggal</th>
                    <th width="200px">Status</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="cekBarang">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Cek Kelengkapan Barang</h4>
            </div>
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container" id="tampilkan">

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" name="simpanT" class="btn btn-primary btn-sm">Simpan</button>
                    <!-- <button type="button" onclick="simpan()" class="btn btn-primary btn-sm">Simpan</button> -->
                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['simpanT'])) {

    $id_transfer = $_POST['id_transfer'];
    $transfer_ket = $_POST['transfer_ket'];
    $jumlah = $_POST['jumlah'];
    $id_gudang = $_POST['id_gudang'];
    $id_toko_asal = $_POST['id_toko_asal'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];

    // var_dump($_POST);

    $con->query("UPDATE tb_transfer SET acc_owner='3', transfer_ket = '$transfer_ket' WHERE id_transfer = '$id_transfer'");

    foreach ($jumlah as $i => $a) {

        $con->query("UPDATE tb_stok_toko 
                        Inner Join tb_transfer On tb_transfer.id_toko_tujuan = tb_stok_toko.id_toko 
                        Inner Join tb_transfer_detail On tb_transfer_detail.id_transfer = tb_transfer.id_transfer Inner Join tb_gudang On tb_transfer_detail.id_gudang = tb_gudang.id_gudang 
                        SET tb_stok_toko.jumlah = tb_stok_toko.jumlah + '$jumlah[$i]' 
                        WHERE tb_stok_toko.id_gudang = '$id_gudang[$i]' 
                        AND tb_stok_toko.id_toko = '$id_toko_tujuan[$i]'");

        $con->query("UPDATE tb_stok_toko 
                    Inner Join tb_transfer On tb_transfer.id_toko = tb_stok_toko.id_toko 
                    Inner Join tb_transfer_detail On tb_transfer_detail.id_transfer = tb_transfer.id_transfer Inner Join tb_gudang On tb_transfer_detail.id_gudang = tb_gudang.id_gudang 
                    SET tb_stok_toko.jumlah = tb_stok_toko.jumlah - '$jumlah[$i]' 
                    WHERE tb_stok_toko.id_gudang = '$id_gudang[$i]'
                    AND tb_stok_toko.id_toko = '$id_toko_asal[$i]'");
    }
    echo "<script>
        window.location.href = 'terima_transfer.html';
    </script>";
}
?>



<script>
    function cekBarang(id_transfer) {
        var id_transfer = id_transfer;
        axios.post('inc/terima/tampil_tabel_cek_barang.php', {
            'id_transfer': id_transfer,
        }).then(function(res) {
            var data = res.data
            $('#tampilkan').html(data)
            $('#cekBarang').modal();
        }).catch(function(err) {
            console.log(err)
        })
    }

    // function simpan() {
    //     var transfer_ket = $('#transfer_ket').val();
    //     var id_transfer = $('#id_transfer').val();
    //     axios.post('inc/terima/aksi_update_keterangan_transfer.php', {
    //         'transfer_ket': transfer_ket,
    //         'id_transfer': id_transfer,
    //     }).then(function(res) {
    //         $('#cekBarang').modal('hide')
    //         $('#isi').load('inc/terima/data_transfer.php');
    //     }).catch(function(err) {
    //         console.log(err)
    //     })
    // }


    $('#isi').load('inc/terima/data_transfer.php');
</script>
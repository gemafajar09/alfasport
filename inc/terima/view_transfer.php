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
    $id_ukuran = $_POST['id_ukuran'];
    $id_toko_asal = $_POST['id_toko_asal'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];
    $tgl = date("Y-m-d");

    // var_dump($_POST);

    $con->query("UPDATE tb_transfer SET acc_owner='3', transfer_ket = '$transfer_ket' WHERE id_transfer = '$id_transfer'");

    // cek apakah pengirim dari gudang
    foreach ($jumlah as $i => $a) {
        if($id_toko_asal[$i] == 0)
        {
            // cek id toko
            $data = $con->query("
            SELECT
            id_stok_toko
            FROM tb_stok_toko
            WHERE id_toko= '$id_toko_tujuan[$i]' AND id_gudang= '$id_gudang[$i]' LIMIT 1
            ")->fetch(PDO::FETCH_ASSOC);
            // update stok toko (tambah)
            $con->query("UPDATE tb_stok_toko SET jumlah = jumlah + '$jumlah[$i]' WHERE id_stok_toko='$data[id_stok_toko]'");
            // update stok gudang (kurangi)
            $con->query("UPDATE tb_gudang_detail SET jumlah = jumlah - '$jumlah[$i]' WHERE id_detail = '$id_gudang[$i]'");

        }
        else if($id_toko_tujuan[$i] == 0)
        {
            // update stok gudang (tambah)
            $con->query("UPDATE tb_gudang_detail SET jumlah = jumlah + '$jumlah[$i]' WHERE id_detail = '$id_gudang[$i]'");
            // cek id toko
            $data = $con->query("
            SELECT
            id_stok_toko
            FROM tb_stok_toko
            WHERE id_toko= '$id_toko_asal[$i]' AND id_gudang= '$id_gudang[$i]' LIMIT 1
            ")->fetch(PDO::FETCH_ASSOC);
            // update stok toko (kurangi)
            $con->query("UPDATE tb_stok_toko SET jumlah = jumlah - '$jumlah[$i]' WHERE id_stok_toko='$data[id_stok_toko]'");
        }
        else if($id_toko_asal[$i] != 0 && $id_toko_tujuan[$i] != 0)
        {
            // cek data di stok toko tujuan apakah barang ada atau tidak
            $cek_stok_toko = $con->query("SELECT * FROM tb_stok_toko 
                                            JOIN tb_transfer ON tb_stok_toko.id_toko = tb_transfer.id_toko_tujuan
                                            WHERE tb_stok_toko.id_toko = '$id_toko_tujuan[$i]'")->fetch(); 
                                                                       
            // jika ada maka tinggal update stok toko
            if($cek_stok_toko > 0){
                // cek id toko
                $data = $con->query("
                SELECT
                id_stok_toko
                FROM tb_stok_toko
                WHERE id_toko= '$id_toko_tujuan[$i]' AND id_gudang= '$id_gudang[$i]' LIMIT 1
                ")->fetch(PDO::FETCH_ASSOC);
                // update stok toko tujuan (tambah)
                $con->query("UPDATE tb_stok_toko 
                             Inner Join tb_transfer On tb_transfer.id_toko_tujuan = tb_stok_toko.id_toko 
                             Inner Join tb_transfer_detail On tb_transfer_detail.id_transfer = tb_transfer.id_transfer 
                             Inner Join tb_gudang On tb_transfer_detail.id_gudang = tb_gudang.id_gudang 
                             SET tb_stok_toko.jumlah = tb_stok_toko.jumlah + '$jumlah[$i]' 
                             WHERE id_stok_toko='$data[id_stok_toko]'");

                    $data1 = $con->query("
                    SELECT
                    id_stok_toko
                    FROM tb_stok_toko
                    WHERE id_toko= '$id_toko_asal[$i]' AND id_gudang= '$id_gudang[$i]' LIMIT 1
                    ")->fetch(PDO::FETCH_ASSOC);
                // update stok toko asal (kurang) 
                $con->query("UPDATE tb_stok_toko 
                             Inner Join tb_transfer On tb_transfer.id_toko = tb_stok_toko.id_toko 
                             Inner Join tb_transfer_detail On tb_transfer_detail.id_transfer = tb_transfer.id_transfer 
                             Inner Join tb_gudang On tb_transfer_detail.id_gudang = tb_gudang.id_gudang 
                             SET tb_stok_toko.jumlah = tb_stok_toko.jumlah - '$jumlah[$i]' 
                             WHERE id_stok_toko='$data1[id_stok_toko]'");
            }
            // jika tidak ada maka insert dan update
            else{   
                // cek id toko
                $data = $con->query("
                SELECT
                id_stok_toko
                FROM tb_stok_toko
                WHERE id_toko= '$id_toko_asal[$i]' AND id_gudang= '$id_gudang[$i]' LIMIT 1
                ")->fetch(PDO::FETCH_ASSOC);
                // insert stok toko tujuan (tambah)
                $con->query("INSERT INTO tb_stok_toko(id_toko, id_gudang, jumlah, id_ukuran, tanggal) 
                            VALUES ('$id_toko_tujuan[$i]','$id_gudang[$i]','$jumlah[$i]','$id_ukuran[$i]','$tgl')");
                // update stok toko asal (kurangi)
                $con->query("UPDATE tb_stok_toko 
                             Inner Join tb_transfer_detail On tb_transfer_detail.id_transfer = tb_transfer.id_transfer 
                             Inner Join tb_transfer On tb_transfer.id_toko = tb_stok_toko.id_toko 
                             Inner Join tb_gudang On tb_transfer_detail.id_gudang = tb_gudang.id_gudang 
                             SET tb_stok_toko.jumlah = tb_stok_toko.jumlah - '$jumlah[$i]' 
                             WHERE id_stok_toko='$data[id_stok_toko]'");
            }
        }
    }
    $cek = $con->query("SELECT * FROM tb_transfer_detail WHERE id_transfer = '$id_transfer'");
    foreach($cek as $isi)
    {
        if($isi['status']==0)
        {
            $con->query("UPDATE tb_transfer SET acc_owner='4' WHERE id_transfer='$id_transfer'");
        }

    }
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

    $('#isi').load('inc/terima/data_transfer.php');
</script>
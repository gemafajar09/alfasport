<?php
if (isset($_POST['simpanT'])) {

    $transfer_barang_id = $_POST['transfer_barang_id'];
    $transfer_ket = $_POST['transfer_ket'];
    $transfer_barang_detail_jml = $_POST['transfer_barang_detail_jml'];
    $barang_detail_id = $_POST['barang_detail_id'];
    $ukuran_id = $_POST['ukuran_id'];
    $id_toko_asal = $_POST['id_toko_asal'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];
    $tgl = date("Y-m-d");

    // var_dump($_POST);
    // exit;

    // update status di tb_transfer_barang
    $con->query("UPDATE tb_transfer_barang SET transfer_barang_acc_owner = '3', transfer_barang_ket = '$transfer_ket' WHERE transfer_barang_id = '$transfer_barang_id'");


    // kemudian cek apakah di tb_transfer_barang_detail statusnya sudah satu semua
    $cek_status_tb_transfer_barang_detail = $con->query("SELECT transfer_barang_detail_status FROM tb_transfer_barang_detail WHERE transfer_barang_id = '$transfer_barang_id'")->fetchAll(PDO::FETCH_ASSOC);
    // var_dump($transfer_barang_detail_jml);
    // var_dump($cek_status_tb_transfer_barang_detail);
    // exit;

    foreach ($cek_status_tb_transfer_barang_detail as $i => $a) {
        // dahulukan baris baru kolom
        // var_dump($cek_status_tb_transfer_barang_detail[$i]['transfer_barang_detail_status'] == 1);
        // exit;
        if ($a['transfer_barang_detail_status'] == 1) {
            // var_dump('rk');
            // exit;
            // cek apakah pengirim dari gudang
            if ($id_toko_asal[$i] == 0 && $id_toko_tujuan[$i] != 0) {
                // cek barang_toko_id
                $data = $con->query("SELECT
                                        barang_toko_id,
                                        barang_toko_jml
                                    FROM tb_barang_toko
                                    WHERE id_toko = '$id_toko_tujuan[$i]' 
                                    AND barang_detail_id = '$barang_detail_id[$i]' 
                                    AND ukuran_id = '$ukuran_id[$i]' 
                                    LIMIT 1
                                    ")->fetch(PDO::FETCH_ASSOC);

                if ($data['barang_toko_id'] != null) {
                    // update stok tb_barang_toko (tambah)
                    $con->query("UPDATE tb_barang_toko SET barang_toko_jml = barang_toko_jml + '$transfer_barang_detail_jml[$i]' WHERE barang_toko_id = '$data[barang_toko_id]'");
                } else {
                    // insert ke tb_barang_toko terlebih dahulu
                    $con->insert(
                        'tb_barang_toko',
                        array(
                            'id_toko' => $id_toko_tujuan[$i],
                            'barang_detail_id' => $barang_detail_id[$i],
                            'ukuran_id' => $ukuran_id[$i],
                            'barang_toko_jml' => $transfer_barang_detail_jml[$i],
                            'barang_toko_tgl' => $tgl
                        )
                    );
                }

                // update stok tb_barang_detail (kurangi)
                $con->query("UPDATE tb_barang_detail SET barang_detail_jml = barang_detail_jml - '$transfer_barang_detail_jml[$i]' WHERE barang_detail_id = '$barang_detail_id[$i]'");
            }
            // cek apakah tujuannya ke gudang
            else if ($id_toko_asal[$i] != 0 && $id_toko_tujuan[$i] == 0) {
                // update stok gudang (tambah)
                $con->query("UPDATE tb_barang_detail SET barang_detail_jml = barang_detail_jml + '$transfer_barang_detail_jml[$i]' WHERE barang_detail_id = '$barang_detail_id[$i]'");

                // cek id toko
                $data = $con->query("SELECT
                                        barang_toko_id,
                                        barang_toko_jml
                                    FROM tb_barang_toko
                                    WHERE id_toko = '$id_toko_asal[$i]' 
                                    AND barang_detail_id = '$barang_detail_id[$i]' 
                                    AND ukuran_id = '$ukuran_id[$i]' 
                                    LIMIT 1
                                ")->fetch(PDO::FETCH_ASSOC);
                // update stok toko (kurangi)
                $con->query("UPDATE tb_barang_toko SET barang_toko_jml = barang_toko_jml - '$transfer_barang_detail_jml[$i]' WHERE barang_toko_id = '$data[barang_toko_id]'");
            }
            // cek apakah tujuan/asal tidak dari gudang
            else if ($id_toko_asal[$i] != 0 && $id_toko_tujuan[$i] != 0) {
                // cek data di stok toko tujuan apakah barang ada atau tidak
                $cek_stok_toko = $con->query("SELECT
                                                tb_barang_toko.barang_toko_id,
                                                tb_barang_toko.barang_toko_jml
                                            FROM tb_barang_toko
                                            WHERE tb_barang_toko.id_toko = '$id_toko_tujuan[$i]' 
                                            AND tb_barang_toko.barang_detail_id = '$barang_detail_id[$i]' 
                                            AND tb_barang_toko.ukuran_id = '$ukuran_id[$i]' 
                                            ")->fetch();

                // jika ada maka tinggal update stok toko
                if (!empty($cek_stok_toko)) {
                    // update stok toko tujuan (tambah)
                    $con->query("UPDATE tb_barang_toko 
                                SET tb_barang_toko.barang_toko_jml = tb_barang_toko.barang_toko_jml + '$transfer_barang_detail_jml[$i]' 
                                WHERE barang_toko_id = '$cek_stok_toko[barang_toko_id]'");
                    $data1 = $con->query("SELECT
                                                tb_barang_toko.barang_toko_id,
                                                tb_barang_toko.barang_toko_jml
                                            FROM tb_barang_toko
                                            WHERE tb_barang_toko.id_toko = '$id_toko_asal[$i]' 
                                            AND tb_barang_toko.barang_detail_id = '$barang_detail_id[$i]' 
                                            AND tb_barang_toko.ukuran_id = '$ukuran_id[$i]'
                                        ")->fetch(PDO::FETCH_ASSOC);
                    // update stok toko asal (kurang) 
                    $con->query("UPDATE tb_barang_toko 
                                SET tb_barang_toko.barang_toko_jml = tb_barang_toko.barang_toko_jml - '$transfer_barang_detail_jml[$i]' 
                                WHERE barang_toko_id = '$data1[barang_toko_id]'");
                }
                // jika tidak ada maka insert dan update
                else {
                    // cek id toko
                    $data1 = $con->query("SELECT
                                                tb_barang_toko.barang_toko_id,
                                                tb_barang_toko.barang_toko_jml
                                            FROM tb_barang_toko
                                            WHERE tb_barang_toko.id_toko = '$id_toko_asal[$i]' 
                                            AND tb_barang_toko.barang_detail_id = '$barang_detail_id[$i]' 
                                            AND tb_barang_toko.ukuran_id = '$ukuran_id[$i]'
                                        ")->fetch(PDO::FETCH_ASSOC);
                    // var_dump($data1);
                    // exit;
                    // update stok toko asal (kurang) 
                    $con->query("UPDATE tb_barang_toko 
                                SET barang_toko_jml = barang_toko_jml - '$transfer_barang_detail_jml[$i]' 
                                WHERE barang_toko_id = '$data1[barang_toko_id]'");
                    // insert stok toko tujuan (tambah)
                    $con->insert(
                        "tb_barang_toko",
                        array(
                            "id_toko" => $id_toko_tujuan[$i],
                            "barang_detail_id" => $barang_detail_id[$i],
                            "ukuran_id" => $ukuran_id[$i],
                            "barang_toko_jml" => $transfer_barang_detail_jml[$i],
                            "barang_toko_tgl" => $tgl
                        )
                    );
                }
            }
        } else {
            // var_dump('re');
            // exit;
            $con->query("UPDATE tb_transfer_barang SET transfer_barang_acc_owner='4' WHERE transfer_barang_id='$transfer_barang_id'");
        }
    }
    // exit;
    echo "<script>
        window.location.href = 'terima_transfer.html';
    </script>";
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>Data Terima Transfer</h3>
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
                    <th>Kode Transfer</th>
                    <th>Pengirim</th>
                    <th>Penerima</th>
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
    <div class="modal-dialog modal-xl">
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

<script>
    function cekBarang(transfer_barang_id) {
        var transfer_barang_id = transfer_barang_id;
        axios.post('inc/terima/tampil_tabel_cek_barang.php', {
            'transfer_barang_id': transfer_barang_id,
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
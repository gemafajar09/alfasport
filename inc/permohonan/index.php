<div class="page-title">
    <div class="title_left">
        <h3>Permohonan Transfer Barang</h3>
    </div>
    <div class="title_right">
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5" style="padding-left:26px">
                </div>
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
    <div class="x_content">
        <div class="row">
            <?php
            $data = $con->query("SELECT
                                    tb_transfer_barang.transfer_barang_id,
                                    tb_transfer_barang.transfer_barang_kode,
                                    tb_transfer_barang.transfer_barang_tgl,
                                    tb_transfer_barang.transfer_barang_acc_owner,
                                    toko.nama_toko as nama_toko,
                                    toko1.nama_toko As nama_toko_tujuan
                                From
                                    tb_transfer_barang Inner Join
                                    toko On toko.id_toko = tb_transfer_barang.id_toko Inner Join
                                    toko toko1 On toko1.id_toko = tb_transfer_barang.id_toko_tujuan
                                    ORDER BY tb_transfer_barang.transfer_barang_id DESC
                                    ")->fetchAll();
            foreach ($data as $a) {
            ?>
                <div class="col-md-4 py-2">
                    <div class="card">
                        <div class="card-header">
                            <p><i><?= $a['nama_toko'] ?>&nbsp;&nbsp;&nbsp;<?= $a['transfer_barang_kode'] ?>&nbsp;&nbsp;&nbsp;<?= tgl_indo($a['transfer_barang_tgl']) ?></i></p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <i><?= $a['nama_toko'] ?></i>
                                </div>
                                <div class="col-md-6">
                                    <i><?= $a['nama_toko_tujuan'] ?></i>
                                </div>
                            </div>
                            <br>
                            <div align="right">
                                <?php if ($a['transfer_barang_acc_owner'] == 0) { ?>
                                    <button type="button" onclick="tampil('<?= $a['transfer_barang_id'] ?>')" class="btn btn-primary btn-block btn-sm">View</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 1 or $a['transfer_barang_acc_owner'] == 3) { ?>
                                    <button type="button" class="btn btn-success btn-block btn-sm">SUCCESS</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 4) { ?>
                                    <button type="button" onclick="showKomentar('<?= $a['transfer_barang_id'] ?>')" class="btn btn-info btn-block btn-sm">Tidak Cukup</button>
                                <?php } elseif ($a['transfer_barang_acc_owner'] == 2) { ?>
                                    <button type="button" class="btn btn-warning btn-block btn-sm">Ditolak</button>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<input type="hidden" id="idTrans">

<!-- tampilkan modal untuk view detail barang yg ditransfer -->
<div class="modal" id="Acc">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h6 class="modal-title">Acc Transfer Barang</h6>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="continer" id="tampilkan">

                </div>
            </div>

        </div>
    </div>
</div>

<!--  -->
<div class="modal" id="Show">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <form action="" method="POST">
                <div class="modal-body">
                    <div class="container" id="pesan">

                    </div>
                </div>
                <div class="modal-footer">
                    <div class="row">
                        <div class="col-md-10"></div>
                        <div class="col-md-2">
                            <button type="submit" id="klik" name="simpanAcc" class="btn btn-warning btn-sm">Update</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

if (isset($_POST['simpanAcc'])) {
    // var_dump($_POST);
    $transfer_barang_id = $_POST['transfer_barang_id'];
    $transfer_ket = $_POST['transfer_ket'];
    $transfer_barang_detail_jml = $_POST['transfer_barang_detail_jml'];
    $barang_detail_id = $_POST['barang_detail_id'];
    $ukuran_id = $_POST['ukuran_id'];
    $id_toko_asal = $_POST['id_toko_asal'];
    $id_toko_tujuan = $_POST['id_toko_tujuan'];

    // update status di tb_transfer_barang
    $con->query("UPDATE tb_transfer_barang SET transfer_barang_acc_owner = '3', transfer_barang_ket = '$transfer_ket' WHERE transfer_barang_id = '$transfer_barang_id'");

    $cek_status_tb_transfer_barang_detail = $con->query("SELECT transfer_barang_detail_id ,transfer_barang_detail_status FROM tb_transfer_barang_detail WHERE transfer_barang_id = '$transfer_barang_id'")->fetchAll(PDO::FETCH_ASSOC);

    foreach ($cek_status_tb_transfer_barang_detail as $i => $a) {
        // dahulukan baris baru kolom
        // var_dump($cek_status_tb_transfer_barang_detail[$i]['transfer_barang_detail_status'] == 1);
        // exit;
        if ($a['transfer_barang_detail_status'] == 2) {
            // var_dump('rk');
            // exit;
            // cek apakah pengirim dari gudang
            if ($id_toko_asal == 0 && $id_toko_tujuan != 0) {
                // cek barang_toko_id
                $data = $con->query("SELECT
                                        barang_toko_id,
                                        barang_toko_jml
                                    FROM tb_barang_toko
                                    WHERE id_toko = '$id_toko_tujuan' 
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
                            'id_toko' => $id_toko_tujuan,
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
            else if ($id_toko_asal != 0 && $id_toko_tujuan == 0) {
                // update stok gudang (tambah)
                $con->query("UPDATE tb_barang_detail SET barang_detail_jml = barang_detail_jml + '$transfer_barang_detail_jml[$i]' WHERE barang_detail_id = '$barang_detail_id[$i]'");

                // cek id toko
                $data = $con->query("SELECT
                                        barang_toko_id,
                                        barang_toko_jml
                                    FROM tb_barang_toko
                                    WHERE id_toko = '$id_toko_asal' 
                                    AND barang_detail_id = '$barang_detail_id[$i]' 
                                    AND ukuran_id = '$ukuran_id[$i]' 
                                    LIMIT 1
                                ")->fetch(PDO::FETCH_ASSOC);
                // update stok toko (kurangi)
                $con->query("UPDATE tb_barang_toko SET barang_toko_jml = barang_toko_jml - '$transfer_barang_detail_jml[$i]' WHERE barang_toko_id = '$data[barang_toko_id]'");
            }
            // cek apakah tujuan/asal tidak dari gudang
            else if ($id_toko_asal != 0 && $id_toko_tujuan != 0) {
                // cek data di stok toko tujuan apakah barang ada atau tidak
                $cek_stok_toko = $con->query("SELECT
                                                tb_barang_toko.barang_toko_id,
                                                tb_barang_toko.barang_toko_jml
                                            FROM tb_barang_toko
                                            WHERE tb_barang_toko.id_toko = '$id_toko_tujuan' 
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
                                            WHERE tb_barang_toko.id_toko = '$id_toko_asal' 
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
                                            WHERE tb_barang_toko.id_toko = '$id_toko_asal' 
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
                            "id_toko" => $id_toko_tujuan,
                            "barang_detail_id" => $barang_detail_id[$i],
                            "ukuran_id" => $ukuran_id[$i],
                            "barang_toko_jml" => $transfer_barang_detail_jml[$i],
                            "barang_toko_tgl" => $tgl
                        )
                    );
                }
            }
        }
    }
    echo "<script>
        window.location.href = 'permohonan.html';
    </script>";
}

?>



<script>
    function showKomentar(id) {
        axios.post('inc/permohonan/cekKomentarTransfer.php', {
            'transfer_barang_id': id
        }).then(function(res) {
            var data = res.data
            $('#pesan').html(data)
            $('#Show').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function tampil(id) {
        axios.post('inc/permohonan/detail.php', {
            'transfer_barang_id': id
        }).then(function(res) {
            var data = res.data
            $('#idTrans').val(id)
            $('#tampilkan').html(data)
            $('#Acc').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>
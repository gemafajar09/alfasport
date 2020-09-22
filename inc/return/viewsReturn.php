<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json,true);
$id_return = $_POST['id_return'];
$data = $con->query("
SELECT
a.id_return,
a.tanggal,
b.nama_toko
FROM tb_return a
LEFT JOIN toko b
ON a.id_toko=b.id_toko
WHERE a.id_return='$id_return'
")->fetch(PDO::FETCH_ASSOC);
?>
<div class="x_title">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
            <div class="form-group">
                <div class="input-group-content">
                    <label for="vid">ID</label>
                    <input type="text" readonly class="form-control" id="id" value="<?= $data['id_return'] ?>">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal" readonly class="form-control" name="tanggal" value="<?= $data['tanggal'] ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <label>Toko</label>
                        <input type="text" id="nama_toko" readonly name="nama_toko" value="<?= $data['nama_toko'] ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <div class="container-fluid">
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Artikel</th>
                    <th>Ukuran</th>
                    <th>Stok Awal</th>
                    <th>Return</th>
                    <th>Stok Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $con->query("
                SELECT 
                * 
                FROM tb_return a 
                LEFT JOIN tb_detail_return b 
                ON a.id_return=b.id_return 
                LEFT JOIN tb_stok_toko c
                ON b.id_stok_toko=c.id_stok_toko
                LEFT JOIN tb_gudang_detail d 
                ON d.id_detail=c.id_gudang
                LEFT JOIN tb_gudang e
                ON e.id=d.id
                LEFT JOIN tb_all_ukuran f
                ON f.id_ukuran=d.id_ukuran
                WHERE a.id_return='$data[id_return]'
                ")->fetchAll(PDO::FETCH_ASSOC);
                foreach($data as $i => $a):
                ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a['artikel'] ?></td>
                    <td><?= $a['ue'] ?>/<?= $a['uk'] ?>/<?= $a['us'] ?>/<?= $a['cm'] ?></td>
                    <td><?= $a['stok_awal'] ?></td>
                    <td><?= $a['penyesuaian'] ?></td>
                    <td><?= $a['stok_akhir'] ?></td>
                    <!-- <td></td> -->
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
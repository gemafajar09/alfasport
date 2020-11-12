<?php
include "../../config/koneksi.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$return_barang_id = $_POST['return_barang_id'];

$data = $con->query("SELECT
                        tb_return_barang.return_barang_kode,
                        tb_return_barang.return_barang_id,
                        tb_return_barang.return_barang_tgl,
                        toko.nama_toko
                    From
                        tb_return_barang Inner Join
                        toko On toko.id_toko = tb_return_barang.id_toko
                    WHERE tb_return_barang.return_barang_id = '$return_barang_id'
                    ")->fetch(PDO::FETCH_ASSOC);
?>
<div class="x_title">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-2">
            <div class="form-group">
                <div class="input-group-content">
                    <label for="vid">ID</label>
                    <input type="text" readonly class="form-control" id="id" value="<?= $data['return_barang_kode'] ?>">
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-content">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal" readonly class="form-control" name="tanggal" value="<?= $data['return_barang_tgl'] ?>">
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
                    <th>Jenis</th>
                    <th>Artikel</th>
                    <th>Ukuran</th>
                    <th>Stok Awal</th>
                    <th>Return</th>
                    <th>Stok Akhir</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $data = $con->query("SELECT
                                        tb_barang.barang_kode,
                                        tb_barang.barang_kategori,
                                        tb_barang.barang_artikel,
                                        tb_barang.barang_nama,
                                        tb_ukuran.sepatu_ue,
                                        tb_ukuran.sepatu_uk,
                                        tb_ukuran.sepatu_us,
                                        tb_ukuran.sepatu_cm,
                                        tb_ukuran.kaos_kaki_eu,
                                        tb_ukuran.kaos_kaki_size,
                                        tb_ukuran.barang_lainnya_nama_ukuran,
                                        tb_return_barang_detail.return_barang_detail_id,
                                        tb_return_barang_detail.return_barang_detail_stok_awal,
                                        tb_return_barang_detail.return_barang_detail_stok_awal,
                                        tb_return_barang_detail.return_barang_detail_stok_tambah,
                                        tb_return_barang_detail.return_barang_detail_stok_akhir
                                    From
                                        tb_return_barang Inner Join
                                        tb_return_barang_detail On tb_return_barang_detail.return_barang_id =
                                                tb_return_barang.return_barang_id Inner Join
                                        tb_barang_toko On
                                                tb_barang_toko.barang_toko_id = tb_return_barang_detail.barang_toko_id Inner Join
                                        tb_barang_detail On tb_barang_toko.barang_detail_id =
                                                tb_barang_detail.barang_detail_id Inner Join
                                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id Inner Join
                                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id
                                    WHERE tb_return_barang.return_barang_id='$data[return_barang_id]'
                                    ")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($data as $i => $a) :
                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $a['barang_kategori'] ?></td>
                        <td><?= $a['barang_artikel'] ?></td>
                        <?php
                        if ($a['barang_kategori'] == 'Sepatu') {
                        ?>
                            <td>EU : <?= $a['sepatu_ue'] ?> / UK : <?= $a['sepatu_uk'] ?> / US : <?= $a['sepatu_us'] ?> / CM : <?= $a['sepatu_cm'] ?></td>
                        <?php
                        } elseif ($a['barang_kategori'] == 'Kaos Kaki') {
                        ?>
                            <td>EU : <?= $a['kaos_kaki_eu'] ?> / Size : <?= $a['kaos_kaki_size'] ?></td>
                        <?php
                        } elseif ($a['barang_kategori'] == 'Barang Lainnya') {
                        ?>
                            <td>Nama Ukuran : <?= $a['barang_lainnya_nama_ukuran'] ?></td>
                        <?php
                        }
                        ?>
                        <td><?= $a['return_barang_detail_stok_awal'] ?></td>
                        <td><?= $a['return_barang_detail_stok_tambah'] ?></td>
                        <td><?= $a['return_barang_detail_stok_akhir'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
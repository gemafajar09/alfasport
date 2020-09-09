<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$edit = $con->query("SELECT * FROM tb_flash_diskon WHERE id_diskon='$_POST[id_diskon]'")->fetch();
?>

<div class="row">
    <div class="col-md-12">
        <table>
            <tr>
                <td>
                    <h6>Judul</h6>
                </td>
                <td>
                    <h6>:</h6>
                </td>
                <td>
                    <h6><?= $edit['judul'] ?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Kategori</h6>
                </td>
                <td>
                    <h6>:</h6>
                </td>
                <td>
                    <h6><?= $edit['kategori'] ?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Tanggal Mulai</h6>
                </td>
                <td>
                    <h6>:</h6>
                </td>
                <td>
                    <h6><?= $edit['tgl_mulai'] ?></h6>
                </td>
            </tr>
            <tr>
                <td>
                    <h6>Tanggal Berakhir</h6>
                </td>
                <td>
                    <h6>:</h6>
                </td>
                <td>
                    <h6><?= $edit['tgl_berakhir'] ?></h6>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-md-8 mx-auto py-4">
        <table class="table">
            <thead style="background-color:grey">
                <tr>
                    <th>No</th>
                    <th>Artikel</th>
                    <th>Barcode</th>
                    <th>Persen</th>
                    <th>Potongan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $isi = $con->query("SELECT * FROM tb_flash_diskon_persen WHERE id_diskon='$_POST[id_diskon]'")->fetchAll();
                foreach ($isi as $i => $a) {
                ?>
                    <tr>
                        <td><?= $i + 1 ?></td>
                        <td><?= $a['artikel'] ?></td>
                        <td><?= $a['barcode'] ?></td>
                        <td><?= $a['persen'] . '%' ?></td>
                        <td><?= 'Rp.' . number_format($a['potongan']) ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
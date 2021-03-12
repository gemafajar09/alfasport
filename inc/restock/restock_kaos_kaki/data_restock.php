<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_barang_detail.barang_detail_id,
                        tb_barang_detail.barang_detail_barcode,
                        tb_barang_detail.barang_detail_jml,
                        tb_barang_detail.barang_detail_tgl,
                        tb_barang_detail.ukuran_id,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_kode,
                        tb_barang.barang_id,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size
                    FROM
                    tb_barang
                    INNER JOIN tb_barang_detail ON
                    tb_barang.barang_id = tb_barang_detail.barang_id
                    INNER JOIN tb_ukuran ON
                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                    WHERE tb_barang.barang_kategori = 'Kaos Kaki'
                    ORDER BY tb_barang_detail.barang_detail_tgl DESC
                    ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="barang_detail_id[]" value="<?= $a['barang_detail_id'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $i + 1 ?></td>
        <td><?= $a['barang_nama'] ?></td>
        <td><?= $a['barang_artikel'] ?></td>
        <td><?= $a['barang_detail_barcode'] ?></td>
        <td><?= $a['kaos_kaki_eu'] ?></td>
        <td><?= $a['kaos_kaki_size'] ?></td>
        <td><?= $a['barang_detail_jml'] ?></td>
        <td><?= $a['barang_detail_tgl'] ?></td>
        <td class="text-center">
            <button type="button" onclick="edit('<?= $a['barang_detail_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-plus"></i></button>
            <button type="button" onclick="detail('<?= $a['barang_detail_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
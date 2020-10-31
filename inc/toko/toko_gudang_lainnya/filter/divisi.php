<?php
include "../../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$data = $con->query("SELECT
                    tb_stok_toko.id_stok_toko,
                    tb_stok_toko.jumlah,
                    toko.nama_toko,
                    tb_gudang.id,
                    tb_gudang.artikel,
                    tb_gudang.nama,
                    tb_gudang_detail.barcode,
                    tb_merk.merk_nama,
                    tb_kategori.kategori_nama,
                    tb_divisi.divisi_nama,
                    tb_subdivisi.subdivisi_nama,
                    tb_gender.gender_nama,
                    tb_gudang.modal,
                    tb_gudang.jual
                    From
                    tb_stok_toko Inner Join
                    toko On toko.id_toko = tb_stok_toko.id_toko Inner Join
                    tb_gudang On tb_gudang.id_gudang = tb_stok_toko.id_gudang Inner Join
                    tb_gudang_detail On tb_gudang_detail.id_ukuran = tb_stok_toko.id_ukuran Inner Join
                    tb_merk On tb_gudang.id_merek = tb_merk.merk_id Inner Join
                    tb_kategori On tb_gudang.id_kategori = tb_kategori.kategori_id Inner Join
                    tb_divisi On tb_gudang.id_divisi = tb_divisi.divisi_id Inner Join
                    tb_subdivisi On tb_gudang.id_sub_divisi = tb_subdivisi.subdivisi_id Inner Join
                    tb_gender On tb_gudang.id_gender = tb_gender.gender_id
                    WHERE tb_gudang.id_divisi = '$_POST[divisi]'
                ")->fetchAll();
foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['id'] ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['barcode'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $a['jumlah'] ?></td>
        <td><?= $a['modal'] ?></td>
        <td><?= $a['jual'] ?></td>
        <td class="text-center">
            <!-- <button type="button" onclick="edit('<?= $a['id_stok_toko'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button> -->
            <button type="button" id="hapus" onclick="hapus('<?= $a['id_stok_toko'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['id_stok_toko'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
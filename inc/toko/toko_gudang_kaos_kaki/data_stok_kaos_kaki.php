<?php
include "../../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_id,
                        tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_jumlah,
                        toko.nama_toko,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_barcode,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_gender.gender_nama,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size
                    FROM
                        tb_stok_toko_kaos_kaki
                        INNER JOIN toko ON
                        toko.id_toko = tb_stok_toko_kaos_kaki.id_toko
                        INNER JOIN tb_gudang_kaos_kaki_detail ON
                        tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id = tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id
                        INNER JOIN tb_gudang_kaos_kaki ON
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode = tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode
                        INNER JOIN tb_merk ON
                        tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek
                        INNER JOIN tb_kategori ON
                        tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori
                        INNER JOIN tb_divisi ON
                        tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi
                        INNER JOIN tb_subdivisi ON
                        tb_subdivisi.subdivisi_id = tb_gudang_kaos_kaki.id_subdivisi
                        INNER JOIN tb_gender ON
                        tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender
                        INNER JOIN tb_ukuran_kaos_kaki ON
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id = tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id
                    ")->fetchAll();


foreach ($data as $i => $a) {
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['nama_toko'] ?></td>
        <td><?= $a['gudang_kaos_kaki_detail_barcode'] ?></td>
        <td><?= $a['gudang_kaos_kaki_artikel'] ?></td>
        <td><?= $a['gudang_kaos_kaki_nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['ukuran_kaos_kaki_ue'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $a['stok_toko_kaos_kaki_jumlah'] ?></td>
        <td><?= $a['gudang_kaos_kaki_modal'] ?></td>
        <td><?= $a['gudang_kaos_kaki_jual'] ?></td>
        <td class="text-center">
            <!-- <button type="button" onclick="edit('<?= $a['stok_toko_kaos_kaki_id'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button> -->
            <button type="button" id="hapus" onclick="hapus('<?= $a['stok_toko_kaos_kaki_id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['stok_toko_kaos_kaki_id'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
<?php } ?>
<?php
include "../../config/koneksi.php";
$data = $con->query("
SELECT a.id,
       a.artikel,
       a.nama,
       a.id_gudang,
       a.modal,
       a.jual,
       b.merk_nama,
       c.gender_nama,
       d.kategori_nama,
       e.divisi_nama,
       f.subdivisi_nama,
       g.menipis_status
FROM tb_gudang a
JOIN tb_merk b ON a.id_merek=b.merk_id
JOIN tb_gender c ON a.id_gender=c.gender_id
JOIN tb_kategori d ON a.id_kategori=d.kategori_id
JOIN tb_divisi e ON a.id_divisi=e.divisi_id
JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id
LEFT JOIN tb_cek_stok_menipis g ON a.id_gudang = g.id_gudang
")->fetchAll();
foreach ($data as $i => $a) {
    $modal = 'Rp' . number_format($a['modal']);
    $jual = 'Rp' . number_format($a['jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
        <td><?= $a['id'] ?></td>
        <td><?= $a['artikel'] ?></td>
        <td><?= $a['nama'] ?></td>
        <td><?= $a['merk_nama'] ?></td>
        <td><?= $a['kategori_nama'] ?></td>
        <td><?= $a['divisi_nama'] ?></td>
        <td><?= $a['subdivisi_nama'] ?></td>
        <td><?= $a['gender_nama'] ?></td>
        <td><?= $modal ?></td>
        <td><?= $jual ?></td>
        <!-- <td></td> -->
        <td class="text-center">
            <label class="switch">
                <?php $cek = $a['menipis_status'] ?>
                <input type="checkbox" class="cek_menipis" id="cek_menipis<?= $a['id_gudang'] ?>" value="<?= $a['id_gudang'] ?>" <?php echo ($cek == '1') ? "checked" : "" ?>>
                <span class="slider round"></span>
            </label>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
            <button type="button" onclick="show('<?= $a['id_gudang'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
        </td>
    </tr>
    <script>
        $('#cek_menipis<?= $a['id_gudang'] ?>').click(function(e) {
            var id_gudang = e.currentTarget.value;
            if ($('#cek_menipis<?= $a['id_gudang'] ?>').prop('checked')) {
                axios.post('inc/gudang/cek_stok_menipis/aksi_update_cek_stok_tidak_laku.php', {
                    'id_gudang': id_gudang
                }).then(function(res) {
                    var id = res.data
                    toastr.info('Sukses.. Barang Di Set Tidak Laku')
                    // $(".cek_menipis").prop("checked", true);
                }).catch(function(err) {
                    console.log(err)
                    toastr.warning('ERROR..')
                    // $(".cek_menipis").prop("checked", false);
                })
            } else {
                axios.post('inc/gudang/cek_stok_menipis/aksi_update_cek_stok_laku.php', {
                    'id_gudang': id_gudang
                }).then(function(res) {
                    var data = res.data
                    toastr.info('Sukses.. Barang Di Set Laku')
                }).catch(function(err) {
                    toastr.warning('ERROR..')
                })
            }
        });
    </script>
<?php } ?>
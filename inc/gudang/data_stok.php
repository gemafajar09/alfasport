<?php
include "../../config/koneksi.php";
$data = $con->query("SELECT
                        tb_gudang.id_gudang,
                        tb_gudang.id,
                        tb_gudang.artikel,
                        tb_gudang.nama,
                        tb_gudang.modal,
                        tb_gudang.jual,
                        tb_merk.merk_nama,
                        tb_gender.gender_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_cek_stok_menipis.menipis_status
                    From
                        tb_gudang  Join
                        tb_merk On tb_merk.merk_id = tb_gudang.id_merek  Join
                        tb_gender On tb_gender.gender_id = tb_gudang.id_gender  Join
                        tb_kategori On tb_kategori.kategori_id = tb_gudang.id_kategori  Join
                        tb_divisi On tb_divisi.divisi_id = tb_gudang.id_divisi  Join
                        tb_subdivisi On tb_subdivisi.subdivisi_id = tb_gudang.id_sub_divisi  Join
                        tb_cek_stok_menipis On tb_cek_stok_menipis.id_gudang = tb_gudang.id_gudang")->fetchAll();

foreach ($data as $i => $a) {
    $modal = 'Rp' . number_format($a['modal']);
    $jual = 'Rp' . number_format($a['jual']);
?>
    <tr>
        <td><?= $i + 1 ?></td>
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
                <input type="checkbox" class="cek_menipis" id="cek_menipis<?= $a['id_gudang'] ?>" value="<?= $a['id_gudang'] ?>" onchange="cekMenipis(<?= $a['id_gudang'] ?>, this)" <?php echo ($cek == '1') ? "checked" : "" ?>>
                <span class="slider round"></span>
            </label>
            <button type="button" id="edit" onclick="edit('<?= $a['id_gudang'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="show('<?= $a['id_gudang'] ?>')" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></button>
            <button type="button" id="hapus" onclick="hapus('<?= $a['id'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>

<script>
    function cekMenipis(id_gudang, stok_checked) {
        if (stok_checked.checked) {
            axios.post('inc/gudang/cek_stok_menipis/aksi_update_cek_stok_tidak_laku.php', {
                'id_gudang': id_gudang
            }).then(function(res) {
                var id = res.data
                toastr.info('On')
                // toastr.info('Sukses.. Barang Di Set Tidak Laku')
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
                toastr.warning('Off')
                // toastr.info('Sukses.. Barang Di Set Laku')
            }).catch(function(err) {
                toastr.warning('ERROR..')
            })
        }
    }
</script>
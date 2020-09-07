<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
?>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Artikel</th>
            <th>Nama Barang</th>
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
            <th>Cek</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $id_transfer = $_POST['id_transfer'];
        $data_table = $con->query("
        SELECT
        a.tanggal,
        a.id_toko,
        a.id_toko_tujuan,
        b.status,
        b.transfer_detail_id,
        e.nama,
        e.id,
        e.artikel,
        b.jumlah,
        d.ue,
        d.uk,
        d.us,
        d.cm,
        e.id_gudang
        FROM tb_transfer a 
        JOIN tb_transfer_detail b ON a.id_transfer = b.id_transfer 
        JOIN tb_gudang_detail c ON c.id_detail = b.id_gudang 
        JOIN tb_all_ukuran d ON d.id_ukuran = c.id_ukuran
        JOIN tb_gudang e ON e.artikel=c.id
        WHERE a.id_transfer='$_POST[id_transfer]'
        ")->fetchAll();
        foreach ($data_table as $i => $data) {
        ?>
            <tr>
                <td><?= $data['id'] ?></td>
                <td><?= $data['artikel'] ?></td>
                <td><?= $data['nama'] ?></td>
                <td><?= $data['jumlah'] ?></td>
                <input type="hidden" name="jumlah[]" value="<?= $data['jumlah'] ?>">
                <input type="hidden" name="id_toko_asal[]" value="<?= $data['id_toko'] ?>">
                <input type="hidden" name="id_toko_tujuan[]" value="<?= $data['id_toko_tujuan'] ?>">
                <input type="hidden" name="id_gudang[]" value="<?= $data['id_gudang'] ?>">
                <td><?= $data['ue'] . "-" . $data['uk'] . "-" . $data['us'] . "-" . $data['cm']; ?></td>
                <td><?= tgl_indo($data['tanggal']) ?></td>
                <td>
                    <label class="switch">
                        <?php $cek = $data['status'] ?>
                        <input type="checkbox" class="cek_status" id="cek_status<?= $data['transfer_detail_id'] ?>" value="<?= $data['transfer_detail_id'] ?>" onchange="cekStatus(<?= $data['transfer_detail_id'] ?>, this)" <?php echo ($cek == '1') ? "checked" : "" ?>>
                        <span class="slider round"></span>
                    </label>
                </td>
            </tr>
        <?php
        }
        ?>
    </tbody>
</table>
<div class="form-group">
    <label for="">Keterangan</label>
    <input type="hidden" id="id_transfer" name="id_transfer" value="<?php echo $id_transfer ?>">
    <textarea name="transfer_ket" id="transfer_ket" class="form-control" id="" cols="30" rows="2"></textarea>
</div>

<script>
    function cekStatus(transfer_detail_id, status_checked) {
        if (status_checked.checked) {
            axios.post('inc/terima/aksi_update_status_barang_benar.php', {
                'transfer_detail_id': transfer_detail_id
            }).then(function(res) {
                var id = res.data
                toastr.info('Sukses.. ')
                // $(".cek_menipis").prop("checked", true);
            }).catch(function(err) {
                console.log(err)
                toastr.warning('ERROR..')
                // $(".cek_menipis").prop("checked", false);
            })
        } else {
            axios.post('inc/terima/aksi_update_status_barang_salah.php', {
                'transfer_detail_id': transfer_detail_id
            }).then(function(res) {
                var data = res.data
                toastr.info('Sukses.. ')
            }).catch(function(err) {
                toastr.warning('ERROR..')
            })
        }
    }
</script>
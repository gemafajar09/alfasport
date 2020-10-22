<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
?>
<style>
    input:checked + .slider2 {
        background-color: green;
    }
    .slider2.round2 {
        border-radius: 34px;
    }
    .slider2 {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }
</style>
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
            d.id_ukuran,
            d.ue,
            d.uk,
            d.us,
            d.cm,
            a.transfer_ket as keterangan,
            c.id_detail as id_gudang
            FROM tb_transfer a 
            JOIN tb_transfer_detail b ON a.id_transfer = b.id_transfer 
            JOIN tb_gudang_detail c ON c.id_detail = b.id_gudang 
            JOIN tb_all_ukuran d ON d.id_ukuran = c.id_ukuran
            JOIN tb_gudang e ON e.id=c.id
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
                <input type="hidden" name="id_ukuran[]" value="<?= $data['id_ukuran'] ?>">
                <td><?= $data['ue'] . "-" . $data['uk'] . "-" . $data['us'] . "-" . $data['cm']; ?></td>
                <td><?= tgl_indo($data['tanggal']) ?></td>
                <td>
                    <label class="switch">
                        <?php if($cek = $data['status'] == 2){ ?>
                            <input type="checkbox" class="cek_status" id="cek_status<?= $data['transfer_detail_id'] ?>" value="<?= $data['transfer_detail_id'] ?>" onchange="cekStatus(<?= $data['transfer_detail_id'] ?>, this)" <?php echo ($cek == '2') ? "checked" : "" ?>>
                            <span class="slider2 round2"></span>
                        <?php }else{ ?>
                            <input type="checkbox" class="cek_status" id="cek_status<?= $data['transfer_detail_id'] ?>" value="<?= $data['transfer_detail_id'] ?>" onchange="cekStatus(<?= $data['transfer_detail_id'] ?>, this)" <?php echo ($cek == '1') ? "" : "" ?>>
                            <span class="slider round"></span>
                        <?php } ?>
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
    <textarea name="transfer_ket" id="transfer_ket" class="form-control" id="" cols="30" rows="2"><?= $data['keterangan'] ?></textarea>
</div> 
<script>
    function cekStatus(transfer_detail_id, status_checked) {
        if (status_checked.checked) {
            axios.post('inc/permohonan/aksi_update_gudang.php', {
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
            axios.post('inc/permohonan/aksi_update_kembali.php', {
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
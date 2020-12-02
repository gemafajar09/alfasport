<?php
include "../../../config/koneksi.php";
include "../../../App/MY_url_helper.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$kode = $con->query("SELECT
                        b.voucher_detail_id_ongkir,
                        b.voucher_id_ongkir,
                        b.voucher_detail_token,
                        b.voucher_detail_status,
                        tb_member.member_nama
                    FROM tb_voucher_detail_ongkir b 
                    LEFT JOIN tb_member On b.member_id = tb_member.member_id 
                    WHERE b.voucher_id_ongkir = '$_POST[voucher_id]'")->fetchAll();
foreach ($kode as $i => $data) {
?>
    <tr>
        <td><?php echo $i + 1 ?></td>
        <td><?php echo $data['voucher_detail_token'] ?>
            <input type="hidden" id="kodeVoucher<?= $i ?>" value="<?php echo $data['voucher_detail_token'] ?>" style=" position: absolute;left: -9999px;">
        </td>
        <td>
            <?php
            if ($data['voucher_detail_status'] == 0) {
                echo "<p style='color: red'>Belum Dipakai</p>";
            } else if ($data['voucher_detail_status'] == 1) {
                echo "<p style='color: blue'>Sudah Diklaim</p>";
            } else if ($data['voucher_detail_status'] == 2) {
                echo "<p style='color: green'>Sedang Digunakan</p>";
            } else if ($data['voucher_detail_status'] == 3) {
                echo "<p style='color: black'>Sudah Dipakai</p>";
            }
            ?>
        </td>
        <td>
            <?php
            if ($data['member_nama'] == "") {
                echo "-";
            } else {
                echo $data['member_nama'];
            }
            ?>
        </td>
        <td>
            <?php if ($data['voucher_detail_status'] == 0 or $data['voucher_detail_status'] == 2) {
                echo "";
            } else {
            ?>
                <label class="switch">
                    <?php $cek = $data['voucher_detail_status'] ?>
                    <input type="checkbox" class="cek_menipis" id="cek_menipis<?= $data['voucher_detail_id_ongkir'] ?>" value="<?= $data['voucher_detail_id_ongkir'] ?>" onchange="cekMenipis(<?= $data['voucher_detail_id_ongkir'] ?>,this)" <?php echo ($cek == '3') ? "checked" : "" ?>>
                    <span class="slider round"></span>
                </label>
                <button type="button" class="btn btn-warning btn-sm" onclick="copyToClipboard('<?php echo $_POST['nama'] . " = " . $data['voucher_detail_token']  ?>')" id="copy">Copy</button>
            <?php
            } ?>
        </td>
    </tr>
<?php
}
?>

<script>
    function cekMenipis(voucher_detail_id, stok_checked) {
        if (stok_checked.checked) {
            axios.post('inc/diskon/ongkir/aksi_update_status_dipakai.php', {
                'voucher_detail_id': voucher_detail_id
            }).then(function(res) {
                var id = res.data
                toastr.info('Voucher sudah dipakai')
                reload()
                // toastr.info('Sukses.. Barang Di Set Tidak Laku')
                // $(".cek_menipis").prop("checked", true);
            }).catch(function(err) {
                console.log(err)
                toastr.warning('ERROR..')
                // $(".cek_menipis").prop("checked", false);
            })
        } else {
            axios.post('inc/diskon/ongkir/aksi_update_status_belum_dipakai.php', {
                'voucher_detail_id': voucher_detail_id
            }).then(function(res) {
                var data = res.data
                toastr.warning('Voucher sudah diklaim')
                reload()
                // toastr.info('Sukses.. Barang Di Set Laku')
            }).catch(function(err) {
                toastr.warning('ERROR..')
            })
        }
    }
</script>
<?php
include "../../config/koneksi.php";
include "../../App/MY_url_helper.php";
$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
?>
<style>
    input:checked+.slider2 {
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
        background-color: green;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider3 {
        background-color: red;
    }

    .slider3.round3 {
        border-radius: 34px;
    }

    .slider3 {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: red;
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
            <th>Barcode</th>
            <th>Jumlah</th>
            <th>Ukuran</th>
            <th>Tanggal</th>
            <th>Cek</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $data_table = $con->query("SELECT
                                    tb_transfer_barang.transfer_barang_tgl,
                                    tb_transfer_barang.id_toko,
                                    tb_transfer_barang.id_toko_tujuan,
                                    tb_transfer_barang.transfer_barang_ket,
                                    tb_transfer_barang_detail.transfer_barang_detail_status,
                                    tb_transfer_barang_detail.transfer_barang_detail_id,
                                    tb_transfer_barang_detail.transfer_barang_detail_jml,
                                    tb_barang_detail.barang_detail_id,
                                    tb_barang_detail.barang_detail_barcode,
                                    tb_barang_detail.ukuran_id,
                                    tb_ukuran.sepatu_ue,
                                    tb_ukuran.sepatu_uk,
                                    tb_ukuran.sepatu_us,
                                    tb_ukuran.sepatu_cm,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_ukuran.barang_lainnya_nama_ukuran,
                                    tb_barang.barang_kode,
                                    tb_barang.barang_kategori,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama
                                FROM
                                    tb_transfer_barang
                                INNER JOIN tb_transfer_barang_detail ON
                                    tb_transfer_barang_detail.transfer_barang_id = tb_transfer_barang.transfer_barang_id
                                INNER JOIN tb_barang_detail ON
                                    tb_barang_detail.barang_detail_id = tb_transfer_barang_detail.barang_detail_id
                                INNER JOIN tb_ukuran ON
                                    tb_ukuran.ukuran_id = tb_barang_detail.ukuran_id
                                INNER JOIN tb_barang ON
                                    tb_barang.barang_id = tb_barang_detail.barang_id
                                WHERE tb_transfer_barang.transfer_barang_id='$_POST[transfer_barang_id]'
                            ")->fetchAll();
        foreach ($data_table as $i => $data) {
            $keterangan = $data['transfer_barang_ket'];
            $id_toko_asal = $data['id_toko'];
            $id_toko_tujuan = $data['id_toko_tujuan'];
        ?>
            <tr>
                <td><?= $data['barang_kode'] ?></td>
                <td><?= $data['barang_artikel'] ?></td>
                <td><?= $data['barang_nama'] ?></td>
                <td><?= $data['barang_detail_barcode'] ?></td>
                <td><?= $data['transfer_barang_detail_jml'] ?></td>
                <input type="hidden" name="barang_detail_id[]" value="<?= $data['barang_detail_id'] ?>">
                <input type="hidden" name="ukuran_id[]" value="<?= $data['ukuran_id'] ?>">
                <input type="hidden" name="transfer_barang_detail_jml[]" value="<?= $data['transfer_barang_detail_jml'] ?>">
                <?php
                if ($data['barang_kategori'] == 'Sepatu') {
                ?>
                    <td><?= "EU : " . $data['sepatu_ue'] . " / UK : " . $data['sepatu_uk'] . " / US : " . $data['sepatu_us'] . " / CM : " . $data['sepatu_cm']; ?></td>
                <?php
                } elseif ($data['barang_kategori'] == 'Kaos Kaki') {
                ?>
                    <td><?= "EU : " . $data['kaos_kaki_eu'] . " / Size : " . $data['kaos_kaki_size'] ?></td>
                <?php
                } elseif ($data['barang_kategori'] == 'Barang Lainnya') {
                ?>
                    <td><?= "Ukuran : " . $data['barang_lainnya_nama_ukuran']  ?></td>
                <?php
                }
                ?>
                <td><?= tgl_indo($data['transfer_barang_tgl']) ?></td>
                <td>
                    <label class="switch">
                        <?php
                        $cek = $data['transfer_barang_detail_status'];
                        if ($cek == 1) { ?>
                            <input type="checkbox" class="cek_status" id="cek_status<?= $data['transfer_barang_detail_id'] ?>" value="<?= $data['transfer_barang_detail_id'] ?>" <?php echo ($cek == '1') ? "checked" : "" ?>>
                            <span class="slider2 round2"></span>
                        <?php } else { ?>
                            <input type="checkbox" class="cek_status" id="cek_status<?= $data['transfer_barang_detail_id'] ?>" value="<?= $data['transfer_barang_detail_id'] ?>" onchange="cekStatus(<?= $data['transfer_barang_detail_id'] ?>, this)" <?php echo ($cek == '0') ? "" : "" ?>>
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
    <input type="hidden" id="transfer_barang_id" name="transfer_barang_id" value="<?php echo $_POST['transfer_barang_id'] ?>">
    <input type="hidden" id="id_toko_asal" name="id_toko_asal" value="<?php echo $id_toko_asal ?>">
    <input type="hidden" id="id_toko_tujuan" name="id_toko_tujuan" value="<?php echo $id_toko_tujuan ?>">
    <textarea name="transfer_ket" id="transfer_ket" class="form-control" id="" cols="30" rows="2"><?= $keterangan ?></textarea>
</div>




<script>
    // $('#klik').on('click', function() {
    //     var transfer_barang_id = $('#transfer_barang_id').val()
    //     var transfer_ket = $('#transfer_ket').val()
    //     axios.post('inc/permohonan/acc_transfer_kurang.php', {
    //         'transfer_barang_id': transfer_barang_id,
    //         'transfer_ket': transfer_ket
    //     }).then(function(res) {
    //         $('#Acc').modal('hide');
    //         window.location = "permohonan.html"
    //     }).catch(function(err) {
    //         console.log(err)
    //     })
    // })


    function cekStatus(transfer_barang_detail_id, status_checked) {
        if (status_checked.checked) {
            axios.post('inc/permohonan/aksi_update_gudang.php', {
                'transfer_barang_detail_id': transfer_barang_detail_id
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
                'transfer_barang_detail_id': transfer_barang_detail_id
            }).then(function(res) {
                var data = res.data
                toastr.info('Sukses.. ')
            }).catch(function(err) {
                toastr.warning('ERROR..')
            })
        }
    }
</script>
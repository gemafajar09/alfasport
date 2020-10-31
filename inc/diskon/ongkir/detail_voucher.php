<?php
$data_voucher_detail = $con->query("SELECT a.*, b.* 
FROM tb_voucher_ongkir a 
LEFT JOIN toko b ON a.id_toko = b.id_toko
WHERE voucher_id_ongkir = '$_GET[id_voucher]'")->fetch();

$id = $data_voucher_detail['voucher_id_ongkir'];
?>

<div class="page-title">
    <div class="title_left">
        <a href="voucher.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        </div>
    </div>
</div>
<div class="x_panel">
    <div class="x_title">
        <div class="alert alert-warning">
            <table>
                <tr>
                    <td>
                        <h6>Data Voucher Detail</h6>
                    </td>
                    <td>
                        <h6>:</h6>
                    </td>
                    <th>
                        <h6><?= $data_voucher_detail['voucher_nama']; ?></h6>
                        <input type="hidden" id="namaVoucher" value="<?= $data_voucher_detail['voucher_nama']; ?>" style=" position: absolute;left: -9999px;">
                    </th>
                </tr>
                <tr>
                    <td>
                        <h6>Tanggal Mulai</h6>
                    </td>
                    <td>
                        <h6>:</h6>
                    </td>
                    <th>
                        <h6><?= tgl_indo($data_voucher_detail['voucher_tgl_mulai']) ?></h6>
                    </th>
                </tr>
                <tr>
                    <td>
                        <h6>Tanggal Selesai</h6>
                    </td>
                    <td>
                        <h6>:</h6>
                    </td>
                    <th>
                        <h6><?= tgl_indo($data_voucher_detail['voucher_tgl_akhir']) ?></h6>
                    </th>
                </tr>
                <tr>
                    <td>
                        <h6>Potongan Voucher</h6>
                    </td>
                    <td>
                        <h6>:</h6>
                    </td>
                    <th>
                        <h6>
                            <?php
                            if ($data_voucher_detail['voucher_jenis'] == 'harga') {
                                echo "Rp." . number_format($data_voucher_detail['voucher_harga']);
                            } else {
                                echo  $data_voucher_detail['voucher_harga'] . "%";
                            }
                            ?>
                        </h6>
                    </th>
                </tr>
            </table>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Token</th>
                    <th>Status</th>
                    <th>Member Pengklaim</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
        <input type="hidden" value="<?= $id ?>" id="idKo">
    </div>
</div>
<script>
    $(document).ready(function() {
        reload()
    })

    function copyToClipboard(text) {
        var dummy = document.createElement("textarea");
        // to avoid breaking orgain page when copying more words
        // cant copy when adding below this code
        // dummy.style.display = 'none'
        document.body.appendChild(dummy);
        //Be careful if you use texarea. setAttribute('value', value), which works with "input" does not work with "textarea". – Eduard
        dummy.value = text;
        dummy.select();
        document.execCommand("copy");
        document.body.removeChild(dummy);
    }

    function reload() {
        var id = $('#idKo').val()
        var nama = $('#namaVoucher').val()
        axios.post('inc/diskon/ongkir/data_detail_voucher.php', {
            'voucher_id': id,
            'nama': nama
        }).then(function(res) {
            $("#datatable-responsive").DataTable().destroy();
            $('#isi').html(res.data);
            $("#datatable-responsive").DataTable();
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>
<?php
$data_voucher_detail = $con->query("SELECT a.*, b.* 
FROM tb_voucher a 
LEFT JOIN toko b ON a.id_toko = b.id_toko
WHERE voucher_id = '$_GET[id_voucher]'")->fetch();
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
                </tr>
            </thead>
            <tbody>
                <?php
                $kode = $con->query(
                    "SELECT
                        tb_voucher_detail.voucher_id,
                        tb_voucher_detail.voucher_detail_id,
                        tb_voucher_detail.voucher_detail_token,
                        tb_voucher_detail.voucher_detail_status,
                        tb_member.member_nama
                    FROM tb_voucher_detail 
                    LEFT JOIN tb_member On tb_voucher_detail.member_id = tb_member.member_id 
                    WHERE tb_voucher_detail.voucher_id = :voucher_id",
                    array("voucher_id" => $data_voucher_detail['voucher_id'])
                )->fetchAll();
                foreach ($kode as $i => $data) {
                ?>
                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $data['voucher_detail_token'] ?></td>
                        <td>
                            <?php
                            if ($data['voucher_detail_status'] == 0) {
                                echo "<p style='color: red'>Belum Dipakai</p>";
                            } else {
                                echo "<p style='color: blue'>Sudah Dipakai</p>";
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
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
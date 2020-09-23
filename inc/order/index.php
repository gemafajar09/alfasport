<div class="page-title">
    <div class="title_left">
        <h3>Order Pembelian</h3>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <!-- <a href="buatreturn.html" class="btn btn-success btn-round"><i class="fa fa-plus"></i></a> -->
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content">
        <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID Order</th>
                    <th>Tanggal Order</th>
                    <th>Nama Pelanggan</th>
                    <th>Kurir</th>
                    <th>Layanan</th>
                    <th>Alamat</th>
                    <th>Nama Penerima</th>
                    <th>Nama Toko</th>
                    <th>Status Order</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $data = $con->query("SELECT * FROM `tb_orders` a LEFT JOIN tb_member b ON a.member_id=b.member_id LEFT JOIN toko c ON c.id_toko=a.id_toko");
                    foreach($data as $i => $a){
                ?>
                    <tr>
                        <td><?= $i+1 ?></td>
                        <td><?= $a['id_order'] ?></td>
                        <td><?= $a['tgl_order'] ?></td>
                        <td><?= $a['member_nama'] ?></td>
                        <td><?= $a['kurir'] ?></td>
                        <td><?= $a['service'] ?></td>
                        <td><?= $a['alamat'] ?></td>
                        <td><?= $a['nama_penerima'] ?></td>
                        <td><?= $a['nama_toko'] ?></td>
                        <td><?= $a['status_order'] ?></td>
                        <td>
                            <button class="btn btn-outline-danger btn-round btn-sm" onclick="hapus('<?= $a['id_order'] ?>')"><i class="fa fa-trash"></i></button>
                            <a href="orderDetail-<?= $a['id_order'] ?>.html" class="btn btn-outline-danger btn-round btn-sm"><i class="fa fa-eye"></i></a>
                        </td>
                    </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</div>

<div class="modal" id="detailOrder">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div id="isi"></div>
        </div>
    </div>
</div>

<script>
    
    function hapus(id)
    {
        $.ajax({
            url: 'inc/order/hapusOrders.php',
            type: 'POST',
            data: {'id_order':id},
            dataType: 'JSON',
            success: function(res){
                toastr.success('Berhasil Dihapus')
                location.reload()
            }
        })
    }

    function detail(id)
    {
        $('#isi').load('inc/order/detailOrders.php')
        $('#detailOrder').modal()
    }
</script>
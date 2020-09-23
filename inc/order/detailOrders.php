<?php
$id_order = $_GET['id_order'];
$data = $con->query("SELECT * FROM `tb_orders` a LEFT JOIN tb_member b ON a.member_id=b.member_id LEFT JOIN toko c ON c.id_toko=a.id_toko")->fetch(PDO::FETCH_ASSOC);
?>
<div class="card">
    <div class="card-body">
    <div class="x_content">
    <section class="content invoice">
        <!-- title row -->
        <div class="row">
        <div class="  invoice-header">
            <h1>
                <i class="fa fa-globe"></i> Invoice. &nbsp;
                <small class="pull-right">Date: <?= $data['tgl_order'] ?></small>
            </h1>
        </div>
        </div>
        <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
            From
            <address>
                <strong><?= $data['nama_toko'] ?>.</strong>
                <br><?= $data['alamat_toko'] ?>
                <br>Phone: <?= $data['telpon_toko'] ?>
                <br>Email: <?= $data['email'] ?>
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            To
            <address>
                <strong><?= $data['member_nama'] ?></strong>
                <br><?= $data['alamat'] ?>
                <br>Kode Pos, <?= $data['kode_pos'] ?>
                <br>Phone: <?= $data['member_notelp'] ?>
                <br>Email: <?= $data['member_email'] ?>
            </address>
        </div>
        <div class="col-sm-4 invoice-col">
            <b>Invoice #</b>
            <br>
            <br>
            <b>Order ID:</b> <?= $data['id_order'] ?>
            <br>
            <b>Tanggal Pembayaran:</b> <?= $data['tgl_order'] ?>
            <br>
        </div>
        </div>
        <div class="row">
        <div class="  table">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Product</th>
                    <th>Artikel</th>
                    <th>jumlah</th>
                    <th>harga</th>
                </tr>
            </thead>
            <tbody>
            <?php
                $detail = $con->query("
                SELECT 
                b.qty,
                b.harga,
                e.nama,
                e.artikel
                FROM tb_orders a
                LEFT JOIN tb_orders_detail b
                ON a.id_order=b.id_order 
                LEFT JOIN tb_stok_toko c
                ON b.id_Stok_toko=c.id_stok_toko
                LEFT JOIN tb_gudang_Detail d
                ON c.id_gudang=d.id_detail 
                LEFT JOIN tb_gudang e
                ON e.id=b.id
                WHERE a.id_order= '$id_order'
                ");
                
                $harga = 0;
                foreach($detail as $i => $a):
                    $harga += $a['harga'];
            ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $a['nama'] ?></td>
                    <td><?= $a['artikel'] ?></td>
                    <td><?= $a['qty'] ?></td>
                    <td>Rp.<?= number_format($a['harga']) ?></td>
                </tr>
            <?php endforeach ?>
            </tbody>
            </table>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row">
        <!-- accepted payments column -->
        <div class="col-md-6">
            
            <div class="row card">
                    <div class="col-md-12 card-body">
                        <p class="lead">Status Pembayaran:</p>
                        <hr>
                        <div id="smartwizard">
                            <ul class="nav">
                                <li>
                                    <a class="nav-link" href="">
                                        Menunggu Pembayaran
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="">
                                        Pesanan Diproses
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="">
                                        Barang Telah Dikirim
                                    </a>
                                </li>
                                <li>
                                    <a class="nav-link" href="">
                                        Barang Telah Diterima
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <!-- /.col -->
        <?php
            $riancian = $con->query("SELECT * FROM `tb_orders` WHERE id_order ='$id_order'")->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="col-md-3">
            <p class="lead">Rincian Pembayaran</p>
            <div class="table-responsive">
            <table class="table">
                <tbody>
                <tr>
                    <th style="width:50%">Subtotal:</th>
                    <td>Rp.<?= number_format($harga) ?> </td>
                </tr>
                <tr>
                    <th>Ongkir:</th>
                    <td>Rp.<?= number_format($riancian['ongkir']) ?></td>
                </tr>
                <tr>
                    <th>Potongan:</th>
                    <td>Rp.<?= number_format($riancian['potongan']) ?></td>
                </tr>
                <tr>
                    <th>Total:</th>
                    <td>Rp.<?= number_format($riancian['total']) ?></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>
        <input type="hidden" id="statusSekarang" value="<?= $riancian['status_order'] ?>">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <?php
                        $images = $con->query("SELECT * FROM `tb_konfirmasi_bayar` WHERE id_order = '$id_order' ")->fetch(PDO::FETCH_ASSOC);
                        if($images != NULL){
                    ?>
                        <img src="<?= $base_url ?>img/bukti/<?= $images['bukti'] ?>" class="img-fluid" alt="">
                        <br>
                            <div align="center">
                                <input type="hidden" id="statusUp" value="Pesanan Diproses">
                                <button type="button" id="updates" onclick="update('<?= $id_order ?>')" class="btn btn-outline-primary">Diterima</button>
                                <div class="form-inline">
                                    <input type="text" required class="form-control mb-2 mr-sm-2" placeholder="Enter Resi" id="resi">
                                    <button type="button" id="simpanResi" onclick="simpanResi('<?= $id_order ?>')" class="btn btn-outline-primary mb-2">Submit</button>
                                </div>
                            </div>
                        <?php }else{ ?>
                            <img src="<?= $base_url ?>img/noimage.png" class="img-fluid" alt="">
                            <p class="text-center">Belum Ada Bukti Pembayaran</p>
                            
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->

        <!-- this row will not appear when printing -->
        <div class="row no-print">

        </div>
    </section>
</div>
    </div>
</div>

<script>
    function update(id)
    {
        var status = $('#statusUp').val()
        axios.post('inc/order/updateStatus.php',{
            'status_order':status,
            'id_order':id
        }).then(function(res){
            var data = res.data 
            location.reload()
        }).catch(function(err){
            console.log(err)
        })
    }

    function simpanResi(id)
    {
        var resi = $('#resi').val()
        axios.post('inc/order/updateResi.php',{
            'id_order':id,
            'resi':resi
        }).then(function(res){
            location.reload()
        })
    }
    
</script>
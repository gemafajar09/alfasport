<?php
if (@$_COOKIE['member_id'] == '') {
	echo "<script>window.location='index.php?page=login';</script>";
}
?>
<!-- BREADCRUMB
          	================================================== -->
<div class="breadcrumb full-width">
	<div class="background-breadcrumb"></div>
	<div class="background">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">
				<div class="clearfix">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">History Order</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MAIN CONTENT
          ================================================== -->
<div class="main-content full-width inner-page">
	<div class="background-content"></div>
	<div class="background">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">
				<div class="row">
					<div class="col-md-9 center-column">
						<ul class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#belumbayar" aria-controls="belumbayar" role="tab" data-toggle="tab">Belum bayar</a></li>
							<li role="presentation"><a href="#pesanandiproses" aria-controls="pesanandiproses" role="tab" data-toggle="tab">Pesanan diproses</a></li>
							<li role="presentation"><a href="#dikirim" aria-controls="dikirim" role="tab" data-toggle="tab">Sedang dikirim</a></li>
							<li role="presentation"><a href="#selesai" aria-controls="selesai" role="tab" data-toggle="tab">Selesai</a></li>
						</ul>

						<!-- Tab panes -->
						<div class="tab-content">
							<div role="tabpanel" class="tab-pane active" id="belumbayar">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<td>No</td>
												<td>Tgl Order</td>
												<td>Customer</td>
												<td>Total Bayar</td>
												<td>Konfirmasi Pembayaran</td>
												<td>Detail</td>
											</tr>
										</thead>
										<?php
										$sql = $con->query("SELECT o.*,m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.member_id='$_COOKIE[member_id]' AND o.status_order='Menunggu Pembayaran'")->fetchAll();
										$no = 0;
										foreach ($sql as $r) {
											$idorder = $r['id_order'];
											$no++;
										?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
												<td><?= $r['member_nama'] ?></td>
												<td class="text-right"><?= "Rp. " . number_format($r['total']) ?></td>
												<td><a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>"><i class="fa fa-sticky-note"></i> Konfirmasi Pembayaran</a>
												</td>
												<td><a href="index.php?page=detail_order&id=<?php echo $r['id_order'] ?>"><i class="fa fa-search"></i> Detail Order</a></td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="pesanandiproses">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<td>No</td>
												<td>Tgl Order</td>
												<td>Customer</td>
												<td>Total Bayar</td>
												<td>Faktur</td>
												<td>Konfirmasi Pembayaran</td>
												<td>Detail</td>
											</tr>
										</thead>
										<?php
										$sql = $con->query("SELECT o.*,m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.member_id='$_COOKIE[member_id]' AND o.status_order='Pesanan Diproses'")->fetchAll();
										$no = 0;
										foreach ($sql as $r) {
											$idorder = $r['id_order'];
											$no++;
										?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
												<td><?= $r['member_nama'] ?></td>
												<td class="text-right"><?= "Rp. " . number_format($r['total']) ?></td>
												<td>
													<a href="javascript:void(0);" onclick="window.open('report.php?id=<?php echo $idorder; ?>', 'nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')"><i class="fa fa-download"></i> Print PDF</a>
												</td>
												<td><a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>"><i class="fa fa-sticky-note"></i> Konfirmasi Pembayaran</a>
												</td>
												<td><a href="index.php?page=detail_order&id=<?php echo $r['id_order'] ?>"><i class="fa fa-search"></i> Detail Order</a></td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="dikirim">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<td>No</td>
												<td>Tgl Order</td>
												<td>Customer</td>
												<td>Total Bayar</td>
												<td>Faktur</td>
												<td>Konfirmasi Pembayaran</td>
												<td>No Resi</td>
												<td>Detail</td>
												<td>Aksi</td>
											</tr>
										</thead>
										<?php
										$sql = $con->query("SELECT o.*,m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.member_id='$_COOKIE[member_id]' AND o.status_order='Barang Telah Dikirim'")->fetchAll();
										$no = 0;
										foreach ($sql as $r) {
											$idorder = $r['id_order'];
											$no++;
										?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
												<td><?= $r['member_nama'] ?></td>
												<td class="text-right"><?= "Rp. " . number_format($r['total']) ?></td>
												<td>
													<a href="javascript:void(0);" onclick="window.open('report.php?id=<?php echo $idorder; ?>', 'nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')"><i class="fa fa-download"></i> Print PDF</a>
												</td>
												<td><a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>"><i class="fa fa-sticky-note"></i> Konfirmasi Pembayaran</a>
												</td>
												<td><?= $data['resi'] ?></td>
												<td><a href="index.php?page=detail_order&id=<?php echo $r['id_order'] ?>"><i class="fa fa-search"></i> Detail Order</a></td>
												<td>
													<a href="<?= $base_url ?>frontend/update_status.php?id=<?= $idorder ?>" onclick="return confirm('Selesaikan Pesanan ?')" class="btn btn-default">Selesai</a>
												</td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
							<div role="tabpanel" class="tab-pane" id="selesai">
								<div class="table-responsive">
									<table class="table table-bordered table-hover">
										<thead>
											<tr>
												<td>No</td>
												<td>Tgl Order</td>
												<td>Customer</td>
												<td>Total Bayar</td>
												<td>Faktur</td>
												<td>Konfirmasi Pembayaran</td>
												<td>No Resi</td>
												<td>Detail</td>
											</tr>
										</thead>
										<?php
										$sql = $con->query("SELECT o.*,m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.member_id='$_COOKIE[member_id]' AND o.status_order='Barang Telah Diterima'")->fetchAll();
										$no = 0;
										foreach ($sql as $r) {
											$idorder = $r['id_order'];
											$no++;
										?>
											<tr>
												<td class="text-center"><?php echo $no; ?></td>
												<td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
												<td><?= $r['member_nama'] ?></td>
												<td class="text-right"><?= "Rp. " . number_format($r['total']) ?></td>
												<td>
													<a href="javascript:void(0);" onclick="window.open('report.php?id=<?php echo $idorder; ?>', 'nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')"><i class="fa fa-download"></i> Print PDF</a>
												</td>
												<td><a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>"><i class="fa fa-sticky-note"></i> Konfirmasi Pembayaran</a>
												</td>
												<td><?= $r['resi'] ?></td>
												<td><a href="index.php?page=detail_order&id=<?php echo $r['id_order'] ?>"><i class="fa fa-search"></i> Detail Order</a></td>
											</tr>
										<?php } ?>
									</table>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<?php include "sidebar_account.php " ?>
					</div>
				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- // .pattern -->
	</div><!-- // .background -->
</div><!-- // .main-content -->
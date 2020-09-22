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
						<div class="table-responsive">
							<table class="table table-bordered table-hover">
								<thead>
									<tr>
										<td>No</td>
										<td>Tgl Order</td>
										<td>Customer</td>
										<td>Total Bayar</td>
										<td>Status</td>
										<td>Faktur</td>
										<td>Konfirmasi Pembayaran</td>
										<td>Detail</td>
									</tr>
								</thead>
								<?php
								$sql = $con->query("SELECT o.*,m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.member_id='$_COOKIE[member_id]'")->fetchAll();
								$no = 0;
								foreach ($sql as $r) {
									$idorder = $r['id_order'];
									$no++;
									if ($r['status_order'] == 'Menunggu Pembayaran') {
										$status = "<span style='color: #fff; background-color: #5163de; padding: 5px;'>Menunggu Pembayaran</span>";
									} else if ($r['status_order'] == 'Pembayaran Diterima') {
										$status = "<span style='color: #fff; background-color: #0ebdbb; padding: 5px;'>Pembayaran Diterima</span>";
									} else if ($r['status_order'] == 'Barang Tengah Disiapkan') {
										$status = "<span style='color: #fff; background-color: #3e64d4; padding: 5px;'>Barang Tengah Disiapkan</span>";
									} else if ($r['status_order'] == 'Terkirim') {
										$status = "<span style='color: #fff; background-color: #59b159; padding: 5px;'>Terkirim</span>";
									} else if ($r['status_order'] == 'Barang Telah Diterima') {
										$status = "<span style='color: #fff; background-color: #177d42; padding: 5px;'>Barang Telah Diterima</span>";
									} else if ($r['status_order'] == 'Dibatalkan') {
										$status = "<span style='color: #fff; background-color: #c42c2c; padding: 5px;'>Dibatalkan</span>";
									}
								?>
									<tr>
										<td class="text-center"><?php echo $no; ?></td>
										<td><?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
										<td><?= $r['member_nama'] ?></td>
										<td class="text-right"><?= "Rp. " . number_format($r['total']) ?></td>
										<td><?= $status ?></td>
										<td>
											<?php
											if ($r['status_order'] == 'Menunggu Pembayaran' || $r['status_order'] == 'Dibatalkan') {
												echo "-";
											} else {
											?>
												<a href="javascript:void(0);" onclick="window.open('report.php?id=<?php echo $idorder; ?>', 'nama_window_pop_up','size=800,height=800,scrollbars=yes,resizeable=no')"><i class="fa fa-download"></i> Print PDF</a>
											<?php } ?>
										</td>
										<td><a href="index.php?page=konfirmasi_pembayaran&id=<?php echo $r['id_order'] ?>"><i class="fa fa-sticky-note"></i> Konfirmasi Pembayaran</a>
										</td>
										<td><a href="index.php?page=detail_order&id=<?php echo $r['id_order'] ?>"><i class="fa fa-search"></i> Detail Order</a></td>
									</tr>
								<?php } ?>
							</table>
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
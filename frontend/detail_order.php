<?php
if (@$_COOKIE['member_id'] == '') {
	echo "<script>window.location='index.php?page=login';</script>";
}

if (isset($_GET['id'])) {
	$r = $con->query("SELECT o.*, m.*,p.*,k.*,t.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id LEFT JOIN tb_provinsi p ON o.id_prov=p.id_prov LEFT JOIN tb_kota k ON o.id_kota=k.id_kota LEFT JOIN toko t ON o.id_toko=t.id_toko WHERE o.id_order='$_GET[id]'")->fetch();
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
						<div class="contact_form">
							<div class="container">
								<div class="row">
									<div class="col-lg-10 offset-lg-1">
										<div class="contact_form_container">
											<h3>Detail Order</h3>
											Detail Transaksi Untuk No Order <b><?= $_GET['id'] ?></b>
										</div>
										<br>
										<table class="table table-bordered">
											<tr style="background-color:#ececec;">
												<td colspan="2">Detail Order</td>
											</tr>
											<tr>
												<td>Tanggal Order : <?= tgl_indo($r['tgl_order']) . " " . $r['jam_order'] ?></td>
											</tr>
										</table>
										<br>
										<table class="table table-bordered">
											<tr style="background-color:#ececec;">
												<td colspan="2">Alamat Pengiriman</td>
											</tr>
											<tr>
												<td>Nama Penerima <span class="ml-3 mr-3">:</span> <?= $r['nama_penerima'] ?><br>
													Provinsi <span class="ml-3 mr-3">:</span> <?= $r['nama_prov'] ?><br>
													Kota <span class="ml-3 mr-3">:</span> <?= $r['nama_kota'] ?><br>
													Alamat <span class="ml-3 mr-3">:</span> <?= $r['alamat'] ?><br>
													Kode Pos <span class="ml-3 mr-3">:</span> <?= $r['kode_pos'] ?><br></td>
											</tr>
										</table>

										<table class="table table-bordered">
											<tr style="background-color:#ececec;">
												<td colspan="2">Jenis Pengiriman</td>
											</tr>
											<tr>
												<td>Kurir <span class="ml-2 mr-2">:</span> <?= strtoupper($r['kurir']) ?><br>
													Service <span class="ml-2 mr-2">:</span> <?= $r['service'] ?><br>
											</tr>
										</table>

										<table class="table table-bordered">
											<tr style="background-color:#ececec;">
												<td colspan="2">Toko</td>
											</tr>
											<tr>
												<td><?= strtoupper($r['nama_toko']) ?><br>
											</tr>
										</table>

										<br>
										<div class="table-responsive">
											<table class="table table-striped table-bordered">
												<thead>
													<tr>
														<td>No</td>
														<td>Gambar</td>
														<td>Nama Produk</td>
														<td>Model</td>
														<td>Ukuran</td>
														<td>Berat</td>
														<td>Jumlah</td>
														<td>Harga</td>
														<td>Total</td>
													</tr>
												</thead>

												<tbody>
													<?php
													$query = $con->query("SELECT o.*, d.*, g.*, m.*, s.*, u.* FROM tb_orders o LEFT JOIN tb_orders_detail d ON o.id_order=d.id_order LEFT JOIN tb_gudang g ON d.id=g.id LEFT JOIN tb_merk m ON m.merk_id = g.id_merek LEFT JOIN tb_stok_toko s ON s.id_stok_toko = d.id_stok_toko LEFT JOIN tb_all_ukuran u ON u.id_ukuran = s.id_ukuran WHERE o.id_order='$_GET[id]'")->fetchAll();
													$no = 0;
													foreach ($query as $data) {
														$no++;
														$total = $data['harga'] * $data['qty'];
														$subtotal += $total;

													?>
														<tr>
															<td><?= $no; ?></td>
															<td><img src="<?= $data['thumbnail'] ?>" style="width: 90px; height: 90px;"></td>
															<td><?= $data['nama'] ?></td>
															<td><?= $data['merk_nama'] ?></td>
															<td>
																<b>EU</b> : <?= $data['ue'] ?><br>
																<b>UK</b> : <?= $data['uk'] ?><br>
																<b>US</b> : <?= $data['us'] ?><br>
																<b>CM</b> : <?= $data['cm'] ?>
															</td>
															<td><?= $data['berat'] ?> gram</td>
															<td><?= $data['qty'] ?></td>
															<td>Rp. <?= number_format($data['harga'], 0, ",", ".") ?></td>
															<td>Rp. <?= number_format($total, 0, ",", ".") ?></td>
														</tr>
													<?php } ?>
												</tbody>
											</table>
										</div>
										<hr>
										<div style="float: right; text-align: right;">
											<h6 style="font-size: 16px;"><strong>Sub Total</strong> : <?php echo "Rp. " . number_format($subtotal) ?></h6>
											<h6 style="font-size: 16px;"><strong>Berat</strong> : <?php echo $data['jmlberat'] ?> gram</h6>
											<h6 style="font-size: 16px;"><strong>Potongan</strong> : <?php echo "Rp. " . number_format($data['potongan']) ?></h6>
											<h6 style="font-size: 16px;"><strong>Ongkos Kirim</strong> : <?php echo "Rp. " . number_format($data['ongkir']) ?></h6>
											<h4 style="font-size: 18px;"><strong>Total Bayar</strong> : <?php echo "Rp. " . number_format($data['total']) ?></h4><br>
										</div>
										<br>

										<table class="table table-bordered">
											<tr style="background-color:#ececec;">
												<td colspan="2">Riwayat Pesanan</td>
											</tr>
											<?php
											$status =  $con->query("SELECT o.*, s.* FROM tb_orders o LEFT JOIN tb_status_orders s ON o.id_order=s.id_order WHERE o.id_order='$_GET[id]'")->fetchAll();
											foreach ($status as $stat) {
												$jam = substr($stat['tgl_status'], 11, 8);
											?>
												<tr>
													<td><?= tgl_indo($stat['tgl_status']) . " " . $jam ?></td>
													<td><?= $stat['status_order'] ?></td>
												</tr>
											<?php } ?>
										</table>
										<br><br>
									</div>
								</div>
							</div>
						</div>
						<div class="panel"></div>
					</div>

					<div class="col-md-3">
						<?php include "sidebar_account.php " ?>
					</div>
				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- // .pattern -->
	</div><!-- // .background -->
</div><!-- // .main-content -->
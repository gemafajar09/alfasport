<?php
if (@$_COOKIE['member_id'] == '') {
	echo "<script>window.location='index.php?page=login';</script>";
}
if (isset($_POST['kirim'])) {
	$namabank = $_POST['namabank'];
	$norek = $_POST['norek'];
	$atasnama = $_POST['atasnama'];
	$jml = $_POST['jml'];
	$tglskrg = date('Y-m-d H:i:s');

	$nmbukti = $_FILES["bukti"]["name"];
	$lokbukti = $_FILES["bukti"]["tmp_name"];
	$newbukti = date("YmdHis") . $nmbukti;
	if (!empty($lokbukti)) {
		move_uploaded_file($lokbukti, "../img/bukti/$newbukti");
	}
	$insert = mysqli_query($con, "INSERT INTO tbl_konfirmasi_bayar VALUES ('', '$_GET[id]','$_POST[id_bank]','$namabank','$norek','$atasnama','$jml','$newbukti','$tglskrg')");

	$insert = $con->insert(
		"tb_konfirmasi_bayar",
		array(
			"id_order" => $_GET["id"],
			"id_bank" => $_POST["id_bank"],
			"namabanks" => $namabank,
			"noreks" => $norek,
			"atasnamas" => $atasnama,
			"total_bayars" => $jml,
			"bukti" => $newbukti,
			"tgl_bayar" => $tglskrg
		)
	);

	if ($insert) {
		echo "<script>alert('Konfirmasi Pembayaran sudah diterima, Pesanan Anda akan segera diproses');
									window.location.href='index.php?page=order_history';</script>";
	}
}
?>
<div class="breadcrumb full-width">
	<div class="background-breadcrumb"></div>
	<div class="background">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">
				<div class="clearfix">
					<ul>
						<li><a href="#">Home</a></li>
						<li><a href="#">Konfirmasi Pembayaran</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="main-content full-width inner-page">
	<div class="background-content"></div>
	<div class="background">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">
				<div class="row">
					<div class="col-md-9 center-column">
						<?php
						$r = $con->query("SELECT o.*, m.* FROM tb_orders o LEFT JOIN tb_member m ON o.member_id=m.member_id WHERE o.id_order='$_GET[id]'")->fetch();

						$cek = $con->count('tb_konfirmasi_bayar', '*', ['id_order' => $_GET["id"]]);

						if ($cek <= 0) {
						?>
							<div class="contact_form">
								<div class="container">
									<div class="row">
										<div class="col-lg-10 offset-lg-1">

											<div class="contact_form_container">
												<form action="" method="POST" enctype="multipart/form-data">
													<table cellpadding="5" cellspacing="0">
														<tr>
															<td><span style="font-size: 18px; font-weight: bold;">Detail Customer</span></td>
														</tr>
														<tr>
															<td>No Order</td>
															<td>&nbsp;</td>
															<td><b><?= $r['id_order'] ?></b></td>
														</tr>
													</table>
													<br>
													<table cellpadding="5" cellspacing="0">
														<tr>
															<td><span style="font-size: 18px; font-weight: bold;">Detail Pembayaran</span></td>
														</tr>
														<tr>
															<td>Bank Tujuan</td>
															<td>&nbsp;</td>
															<td>
																<select class="form-control" name="id_bank" required>
																	<option value="">Pilih Bank Tujuan</option>
																	<?php
																	$sql = $con->query("SELECT * FROM tb_bank")->fetchAll();
																	foreach ($sql as $data) {
																	?>
																		<option value="<?= $data['id_bank'] ?>"><?php echo $data['bank'] . " - " . $data['no_rek'] . " - " . $data['atas_nama'] ?></option>
																	<?php
																	}
																	?>
																</select>
															</td>
														</tr>
													</table>
													<br>
													<table cellpadding="5" cellspacing="0">
														<tr>
															<td><span style="font-size: 18px; font-weight: bold;">Detail Bank Konsumen</span></td>
														</tr>
														<tr>
															<td>Nama Bank</td>
															<td>&nbsp;</td>
															<td>
																<input type="text" name="namabank" id="namabank" class="form-control">
															</td>
														</tr>
														<tr>
															<td>No Rekening Pengirim</td>
															<td>&nbsp;</td>
															<td>
																<input type="text" name="norek" id="norek" class="form-control" onkeypress="return hanyaAngka(event)">
															</td>
														</tr>
														<tr>
															<td>Atas Nama Pengirim</td>
															<td>&nbsp;</td>
															<td>
																<input type="text" name="atasnama" id="atasnama" class="form-control">
															</td>
														</tr>
														<tr>
															<td>Jumlah Transfer</td>
															<td>&nbsp;</td>
															<td>
																<input type="text" name="jml" id="jml" class="form-control mb-1" onkeypress="return hanyaAngka(event)"> *) Harap Masukkan Sebesar Total Bayar
															</td>
														</tr>
														<tr>
															<td>Upload Bukti Transfer</td>
															<td>&nbsp;</td>
															<td>
																<input type="file" name="bukti" id="bukti">
															</td>
														</tr>
														<tr>
															<td><button type="submit" name="kirim" class="btn btn-primary" style="cursor: pointer;">Kirim</button></td>
															<td>&nbsp;</td>
														</tr>
													</table>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="panel"></div>
							<br><br><br>
						<?php
						} else { ?>
							<div class="contact_form">
								<div class="container">
									<div class="row">
										<div class="col-lg-10 offset-lg-1">

											<div class="contact_form_container">
												<h3>Konfirmasi Pembayaran</h3>
												Histori Pembayaran Untuk No Order <?= $_GET['id'] ?>
											</div>
											<br>
											<table class="table table-bordered">
												<tr>
													<td>Tanggal Bayar</td>
													<td>Bukti</td>
													<td>Metode Pembayaran</td>
													<td>Total Bayar</td>
												</tr>
												<?php
												$query = $con->query("SELECT * FROM tb_konfirmasi_bayar WHERE id_order='$_GET[id]'")->fetchAll();
												foreach ($query as $data) {
													$jam = substr($data['tgl_bayar'], 11, 8);
												?>
													<tr>
														<td><?= tgl_indo($data['tgl_bayar']) . " " . $jam ?></td>
														<td><a href="<?= $base_url ?>img/bukti/<?= $data['bukti'] ?>" target="_blank"><img src="<?= $base_url ?>img/bukti/<?= $data['bukti'] ?>" style="width: 150px; height: 150px;"></a></td>
														<td>Nama Bank : <?= $data['namabanks'] ?><br>
															No Rekening : <?= $data['noreks'] ?><br>
															Atas Nama : <?= $data['atasnamas'] ?></td>
														<td><?= "Rp. " . number_format($data['total_bayars']) ?></td>
													</tr>
												<?php } ?>
											</table>

										</div>
									</div>
								</div>
							</div>
							<div class="panel"></div>
						<?php
						}
						?>
					</div>

					<div class="col-md-3">
						<?php include "sidebar_account.php " ?>
					</div>
				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- // .pattern -->
	</div><!-- // .background -->
</div><!-- // .main-content -->
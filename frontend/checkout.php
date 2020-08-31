<?php
$list_voucher = array();


if (!empty($_SESSION["voucher_id"])) {
	$list_voucher = json_decode($_SESSION['voucher_id']);
}
$member = $con->query("SELECT id_prov, id_kota, member_alamat FROM tb_member WHERE member_id='$_COOKIE[member_id]'")->fetch();
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
						<li><a href="#">Checkout</a></li>
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
					<div class="col-md-7 center-column">
						<div class="row">
							<div class="col-md-12">
								<form>
									<input type="hidden" name="page" value="checkout">
									<div class="row">
										<?php
										$tgl_sekarang = date("Y-m-d");

										$data_voucher = $con->query("SELECT
									tb_voucher.voucher_id,
									tb_voucher.voucher_nama,
									tb_voucher.voucher_harga,
									tb_voucher.voucher_jenis,
									IFNULL((SELECT member_id FROM tb_voucher_detail WHERE tb_voucher_detail.voucher_id = tb_voucher.voucher_id AND tb_voucher_detail.member_id = '$_COOKIE[member_id]' LIMIT 1), 0) AS status_klaim 
									From
									tb_voucher Inner Join
									tb_voucher_detail WHERE tb_voucher.voucher_tgl_akhir >= '$tgl_sekarang'
									AND tb_voucher.voucher_tgl_mulai <= '$tgl_sekarang' AND tb_voucher_detail.voucher_detail_status = 0 GROUP BY tb_voucher.voucher_id;")->fetchAll();
										foreach ($data_voucher as $i => $a) {

										?>
											<div class="col-md-4">
												<div class="panel panel-default">
													<div class="panel-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); background-color: #00c853">
														<p style="font-size: 14px; color: #FFF;"><?= $a['voucher_nama'] ?></p>
														<span style="font-size: 16px; color: #FFF;"><b><?= $a['voucher_jenis'] == 'harga' ? 'Rp. ' : ''; ?><?= number_format($a['voucher_harga'], 0, ',', '.') ?><?= $a['voucher_jenis'] == 'persen' ? '%' : ''; ?></b></span>
														<br><br>
														<?php
														if ($a['status_klaim'] == '0') {
														?>
															<button id="voucher_<?= $a['voucher_id'] ?>" type="button" onclick="claimVoucher(<?= $a['voucher_id'] ?>)" style="background-color: #FFF; color: #00c853 !important; cursor: pointer;" class="btn" type="submit">Claim</button>
															<?php
														} else {
															// voucher sudah dipakai dan sudah diklaim
															if (in_array($a['voucher_id'], $list_voucher)) {
															?>
																<button id="voucher_<?= $a['voucher_id'] ?>" style="background-color: #FFF; color: #00c853 !important; cursor: pointer;" class="btn" disabled>Sudah Digunakan </button>
															<?php
															} else // voucher sudah diklaim tapi belum digunakan
															{
															?>
																<button type="button" onclick="gunakanVoucher(<?= $a['voucher_id'] ?>)" style="background-color: #FFF; color: #00c853 !important; cursor: pointer;" class="btn" type="submit">Gunakan</button>
														<?php
															}
														}
														?>
													</div>
												</div>
											</div>
										<?php
										} ?>
									</div>
								</form>
								<div class="panel-group checkout" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading heading-iconed">
											<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">Step 1: Detail Pengiriman</a></h4>
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
												<form>
													<div class="row">
														<div class="col-md-6">
															<div class="form-group">
																<label>Nama Lengkap</label>
																<input type="text" class="form-control" placeholder="Masukkan Nama Lengkap">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>No Telepon</label>
																<input type="text" class="form-control" placeholder="Masukkan No Telepon">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Pilih Provinsi</label>
																<select class="form-control" name="id_prov" id="provinsi">
																	<option>Pilih Provinsi</option>
																	<?php
																	$curl = curl_init();
																	curl_setopt_array($curl, array(
																		CURLOPT_URL => "http://api.rajaongkir.com/starter/province",
																		CURLOPT_RETURNTRANSFER => true,
																		CURLOPT_ENCODING => "",
																		CURLOPT_MAXREDIRS => 10,
																		CURLOPT_TIMEOUT => 30,
																		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
																		CURLOPT_CUSTOMREQUEST => "GET",
																		CURLOPT_HTTPHEADER => array(
																			"key: 80ebd4a124cc35bd4322a8105e34c20f"
																		),
																	));
																	$response = curl_exec($curl);
																	$err = curl_error($curl);

																	$data = json_decode($response, true);
																	for ($i = 0; $i < count($data['rajaongkir']['results']); $i++) {
																	?>
																		<option value="<?php echo $data['rajaongkir']['results'][$i]['province_id'] ?>"><?php echo $data['rajaongkir']['results'][$i]['province'] ?></option>
																	<?php } ?>
																</select>

																<script>
																	document.getElementsByName("id_prov")[0].value = <?= $member['id_prov'] ?>
																</script>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Pilih Kota</label>
																<select class="form-control" id="kota" name="id_kota">
																	<option>Pilih Kota</option>
																	<?php
																	$data = $con->query("SELECT * FROM tb_kota WHERE id_prov='$member[id_prov]'");
																	foreach ($data as $i => $a) {
																		echo "<option value=" . $a['id_kota'] . ">" . $a['nama_kota'] . "</option>";
																	}
																	?>
																</select>
																<script>
																	document.getElementsByName('id_kota')[0].value = "<?= $member['id_kota'] ?>"
																</script>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Alamat</label>
																<textarea name="member_alamat" class="form-control"><?= $member['member_alamat'] ?></textarea>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<label>Kode Pos</label>
																<input type="text" class="form-control" placeholder="Masukkan Kode Pos">
															</div>
														</div>
													</div>

													<div class="form-group">
														<div id="formongkir">
															<h3>Jenis Pengiriman</h3>
															<div style="border: 1px solid #ccc; border-radius: 5px; padding: 25px;">
																<div class="form-group">
																	<?php
																	$kurir = [
																		[
																			'label' => 'jne',
																			'value' => 'jne'
																		],
																		[
																			'label' => 'j&t',
																			'value' => 'jnt'
																		],
																		[
																			'label' => 'tiki',
																			'value' => 'tiki'
																		]
																	];
																	foreach ($kurir as $rkurir) {
																	?>
																		<label class="radio-inline">
																			<input type="radio" name="kurir" class="kurir" value="<?php echo $rkurir['value']; ?>" /> <?php echo strtoupper($rkurir['label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
																		</label>
																	<?php
																	}
																	?>
																</div>
																<div id="kuririnfo" style="display: none;">
																	<div class="form-group">
																		<div class="col-md-12">
																			<div class='alert alert-info' style='padding:5px; border-radius:0px; margin-bottom:0px'>Service</div>
																		</div>
																	</div>
																	<div class="row">
																		<div id="kurirserviceinfo"></div>
																	</div>
																</div>
															</div>
														</div>
													</div>

												</form>
											</div>
										</div><!-- End .panel-collapse -->
									</div>

								</div>
							</div>
						</div><!-- End .row -->
					</div>
					<div class="col-md-5 center-column">
						<div class="row">
							<div class="col-md-12">
								<p style="font-size: 19px;"><b>Ringkasan Pesanan</b></p>
								<div class="panel-body">
									<div class="mini-cart-info">
										<table id="isiHeaderCart">
											<?php
											$carts = $con->query("
											SELECT SUM(c.qty) AS jumlah, SUM(c.harga*c.qty) AS total,
											SUM(g.berat*c.qty) AS jumberat,
											c.harga,
											c.id,
											g.id_gudang,
											c.qty,
											g.thumbnail,
											g.nama,
											m.merk_nama
								FROM cart c
								LEFT JOIN tb_gudang g ON c.id=g.id
								LEFT JOIN tb_merk m ON g.id_merek=m.merk_id WHERE id_user='$_COOKIE[member_id]' GROUP BY g.id")->fetchAll();

											$subtotal = 0;
											foreach ($carts as $i => $cart) {
												$id = $cart['id'];
												$subtotal += $cart['total'];
												$berat += $cart['jumberat'];

											?>
												<tr>
													<td class="image"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><img src="<?= $cart['thumbnail'] ?>" alt="Product" title="Product" width="50" /></a></td>
													<td class="name"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><?= $cart['nama'] ?></a></td>
													<td class="quantity">x&nbsp;<?= $cart['jumlah'] ?></td>
													<td class="total">Rp. <?= number_format($cart['harga'], 0, ",", ".") ?></td>
												</tr>
											<?php } ?>
										</table>
									</div>
									<div class="mini-cart-total">
										<table>
											<tr>
												<td class="right"><b>Sub-Total:</b></td>
												<td class="text-right right">Rp. <?= number_format($subtotal, 0, ",", ".") ?></td>
											</tr>

											<tr>
												<td class="right"><b>Berat:</b></td>
												<td class="text-right right"><?= $berat ?> gram</td>
											</tr>

											<?php
											$total_potongan = 0;
											$besar_potongan = 0;
											$sub_potongan = 0;
											foreach ($data_voucher as $i => $potongan) {
												if ($potongan['status_klaim'] != 0) {
													if ($potongan['voucher_jenis'] == "harga") {
														$besar_potongan = $potongan['voucher_harga'];
														$sub_potongan = $potongan['voucher_harga'];
													} else {
														$besar_potongan = ($subtotal * $potongan['voucher_harga'] / 100);
														$sub_potongan = $subtotal - ($subtotal - $besar_potongan);
													}
													$subtotal -= $sub_potongan;
													$total_potongan += $sub_potongan;
											?>
													<tr>
														<td class="right"><b>Potongan Voucher (<?= $potongan['voucher_nama'] ?>):</b></td>
														<td class="text-right right"><span id="potonganvoucher">Rp. <?= number_format($besar_potongan, '0', ',', '.') ?></span></td>
													</tr>
											<?php
												}
											}
											?>

											<tr>
												<td class="right"><b>Ongkos Kirim:</b></td>
												<td class="text-right right"><span id="ongkoskirim">0</span></td>
											</tr>

											<tr>
												<td class="right"><b>Total:</b></td>
												<td class="text-right right" style="width: 100px;"><span id="totalbayarr">Rp. <?= number_format($subtotal, 0, ",", ".") ?></span></td>
											</tr>

											<tr>
												<td>
													<input type="hidden" name="total" id="total" value="<?php echo $subtotal; ?>" />
													<input type="hidden" name="berat" id="berat" value="<?php echo $berat; ?>" />
													<input type="hidden" name="potongan" id="potongan" value="<?php echo $total_potongan; ?>" />
													<input type="hidden" name="ongkir" id="ongkir" value="0" />
													<input type="hidden" name="totalbayar" id="totalbayar" />
												</td>
											</tr>

											<tr>
												<td><button class="btn btn-default" id="oksimpan" style="display: none;">checkout</button></td>
											</tr>

										</table>
									</div>
								</div>
							</div>
						</div><!-- End .row -->
					</div>
				</div><!-- // .row -->
			</div><!-- // .container -->
		</div><!-- // .pattern -->
	</div><!-- // .background -->
</div><!-- // .main-content -->


<div class="container">
	<div class="help-columns" style="padding-top: 15px;padding-bottom:  15px;">
		<div class="row">

			<div class="col-md-4 ">
				<div class="table-display" style="padding: 25px 0px; height: 104px;">
					<div class="table-cell-display" style="width: 130px; text-align: center">
						<img src="img/icon-track.png" alt="Free shipping">
					</div>
					<div class="table-cell-display">
						<div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Free shipping &amp;
							return</div>
						<div style="font-size: 14px; color: #000; font-weight: 300">For all orders over $1000&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="table-display" style="padding: 25px 0px; height: 104px;">
					<div class="table-cell-display" style="width: 130px; text-align: center">
						<img src="img/icon-wallet.png" alt="Safe &amp; Secure">
					</div>
					<div class="table-cell-display">
						<div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Safe &amp; Secure
						</div>
						<div style="font-size: 14px; color: #000; font-weight: 300">100% money back guarantee&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="table-display" style="padding: 25px 0px; height: 104px;">
					<div class="table-cell-display" style="width: 130px; text-align: center">
						<img src="img/icon-buoy.png" alt="Support 24 / 7">
					</div>
					<div class="table-cell-display">
						<div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Support 24 / 7</div>
						<div style="font-size: 14px; color: #000; font-weight: 300">Online and phone support&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
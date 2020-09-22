<?php
$list_voucher = array();


if (!empty($_SESSION["voucher_id"])) {
	$list_voucher = json_decode($_SESSION['voucher_id']);
}

$member = $con->query("SELECT id_prov, id_kota, alamat, kode_pos, keterangan, nama_penerima, tb_member.alamat_id FROM tb_member, tb_daftar_alamat WHERE tb_member.alamat_id=tb_daftar_alamat.alamat_id AND tb_member.member_id='$_COOKIE[member_id]'")->fetch();
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

										$data_voucher = $con->query("SELECT * FROM tb_voucher_detail d LEFT JOIN tb_voucher v ON d.voucher_id=v.voucher_id WHERE d.member_id='$_COOKIE[member_id]'")->fetchAll();
										foreach ($data_voucher as $i => $a) {
											if ($a['voucher_detail_status'] < 3 && $a['member_id'] == $_COOKIE['member_id']) {
										?>
												<div class="col-md-6">
													<div class="panel panel-default">
														<div class="panel-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin: 0px; padding: 0px; min-height: 140px;">
															<div class="col-md-5" style="background-color: #00c853; min-height: 140px;">

																<p style="font-size: 16px; color: #FFF; margin-top: 15px;"><b><?= $a['voucher_jenis'] == 'harga' ? 'Rp. ' : ''; ?><?= number_format($a['voucher_harga'], 0, ',', '.') ?><?= $a['voucher_jenis'] == 'persen' ? '%' : ''; ?></b></p>
															</div>
															<div class="col-md-7">
																<p style="font-size: 12px; margin-top: 15px; font-weight: 600;"><?= $a['voucher_nama'] ?></p>

																<?= $a['voucher_detail_token'] ?>
																<br><br>
																<?php
																if ($a['voucher_detail_status'] == 1 && $a['member_id'] == $_COOKIE['member_id']) {

																?>
																	<button onclick="gunakanVoucher(<?= $a['voucher_detail_id'] ?>)" type="button" style="background-color: #00c853; color: #FFF !important; cursor: pointer;" class="btn" type="submit">Gunakan</button>
																<?php } else if ($a['voucher_detail_status'] == 2 && $a['member_id'] == $_COOKIE['member_id']) { ?>
																	Sedang digunakan
																<?php } ?>
															</div>
														</div>
													</div>
												</div>

										<?php
											}
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
												<form method="POST" action="simpantrans.php">
													<div class="row">
														<?php
														$data = $con->query("SELECT tb_provinsi.nama_prov,
														tb_kota.nama_kota,
														tb_daftar_alamat.alamat,
														tb_daftar_alamat.keterangan,
														tb_daftar_alamat.alamat_id,
														tb_daftar_alamat.no_telp_penerima,
														tb_daftar_alamat.nama_penerima,
														tb_daftar_alamat.kode_pos
														tb_daftar_alamat FROM tb_member LEFT JOIN tb_daftar_alamat ON tb_member.alamat_id=tb_daftar_alamat.alamat_id
														 LEFT JOIN tb_provinsi ON tb_daftar_alamat.id_prov=tb_provinsi.id_prov LEFT JOIN tb_kota ON tb_daftar_alamat.id_kota=tb_kota.id_kota WHERE tb_member.member_id='$_COOKIE[member_id]'")->fetch();

														?>
														<div class="col-md-12">
															<p><b>Alamat Pengiriman</b></p>
															<div class="panel panel-default">
																<div class="panel-body">
																	<b><?= $data['nama_penerima'] ?></b> (<span style="color: black;"><?= $data['keterangan'] ?></span>) &nbsp;&nbsp;&nbsp;&nbsp;
																	<?php
																	if ($data['alamat_id'] == $member['alamat_id']) {
																		echo "<small style='background-color: #f2f2f2; padding: 3px;'><b>Alamat Aktif</b></small>";
																	}
																	?>
																	<p style="color: black;"><?= $data['no_telp_penerima'] ?></p>
																	<?= $data['alamat'] ?> <br>
																	<?= $data['nama_kota'] ?>, <?= $data['nama_prov'] ?>, <?= $data['kode_pos'] ?>
																	<hr>
																	<a href="index.php?page=alamat" class="btn btn-default">Pilih Alamat Lain</a>
																</div>
															</div>
														</div>


														<div class="col-md-6">
															<div class="form-group">
																<select class="form-control" name="id_prov" id="provinsi" style="display: none;">
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
																<select class="form-control" id="kota" name="id_kota" style="display: none;">
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
																<textarea class="form-control" name="alamat" style="display: none;"><?= $member['alamat'] ?></textarea>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<textarea class="form-control" name="kode_pos" style="display: none;"><?= $member['kode_pos'] ?></textarea>
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<input type="text" class="form-control" name="keterangan" value="<?= $member['keterangan'] ?>" style="display: none;">
															</div>
														</div>

														<div class="col-md-6">
															<div class="form-group">
																<input type="text" class="form-control" name="namapenerima" value="<?= $member['nama_penerima'] ?>" style="display: none;">
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
																			<input type="radio" name="kurir" class="kurir" value="<?php echo $rkurir['value']; ?>" required /> <?php echo strtoupper($rkurir['label']); ?>&nbsp;&nbsp;&nbsp;&nbsp;
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
											SELECT
											c.harga,
											c.id,
											g.id_gudang,
											g.berat,
											c.qty,
											g.thumbnail,
											g.nama,
											m.merk_nama,
											u.ue,
              				u.uk,
              				u.us,
              				u.cm
								FROM cart c
								LEFT JOIN tb_gudang g ON c.id=g.id
								LEFT JOIN tb_merk m ON g.id_merek=m.merk_id
								LEFT JOIN tb_stok_toko st ON c.id_stok_toko=st.id_stok_toko
								LEFT JOIN tb_all_ukuran u ON st.id_ukuran=u.id_ukuran
								WHERE id_user='$_COOKIE[member_id]'")->fetchAll();

											$subtotal = 0;
											foreach ($carts as $i => $cart) {
												$id = $cart['id'];
												$total = $cart['harga'] * $cart['qty'];
												$subtotal += $total;
												$beratsub = $cart['berat'] * $cart['qty'];
												$berat += $beratsub;

											?>
												<tr>
													<td class="image"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><img src="<?= $cart['thumbnail'] ?>" alt="Product" title="Product" width="50" /></a></td>
													<td class="name"><a href="index.php?page=product&id=<?= $cart['id_gudang'] ?>"><?= $cart['nama'] ?></a></td>
													<td class="quantity">x&nbsp;<?= $cart['qty'] ?></td>
													<td>
														<b>EU</b> : <?= $cart['ue'] ?><br>
														<b>UK</b> : <?= $cart['uk'] ?><br>
														<b>US</b> : <?= $cart['us'] ?><br>
														<b>CM</b> : <?= $cart['cm'] ?>
													</td>
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

											<tr>
												<td class="right"><b>Potongan:</b></td>
												<td class="text-right right">
													<?php
													$tot = $con->query("SELECT *, c.id_toko AS idtoko FROM cart c LEFT JOIN tb_voucher_detail vd ON c.voucher_detail_id=vd.voucher_detail_id LEFT JOIN tb_voucher v ON vd.voucher_id=v.voucher_id")->fetch();

													if ($tot['voucher_jenis'] == 'harga') {
														$besar_potongan = $tot['voucher_harga'];
														$sub_potongan = $tot['voucher_harga'];
													} else {
														$besar_potongan = ($subtotal * $tot['voucher_harga'] / 100);
														$sub_potongan = $subtotal - ($subtotal - $besar_potongan);
													}
													$subtotal -= $sub_potongan;
													$total_potongan += $sub_potongan;
													?>

													Rp. <?= number_format($besar_potongan, '0', ',', '.') ?>
												</td>
											</tr>

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
													<input type="hidden" name="id_toko" value="<?= $tot['idtoko'] ?>" />
												</td>
											</tr>

											<tr>
												<td><button type="submit" name="oksimpan" class="btn btn-default" id="oksimpan" style="display: none;">checkout</button></td>
											</tr>
											</form>

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
<script>
	var _list_voucher = <?= json_encode($data_voucher) ?>;
	var _voucher_terpakai = <?= json_encode($list_voucher) ?>;
</script>
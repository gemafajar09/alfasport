<?php
if (@$_COOKIE['member_id'] == '') {
	echo "<script>window.location='index.php?page=login';</script>";
}
$account = $con->query("
	SELECT * FROM tb_member WHERE member_id = '$_COOKIE[member_id]'
")->fetch();

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
						<li><a href="#">Daftar Alamat</a></li>
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
						<button type="button" class="btn btn-default" data-toggle="modal" data-target="#myModal">
							Tambah Alamat
						</button>
						<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="myModalLabel">Tambah Alamat</h4>
									</div>
									<div class="modal-body">
										<form method="POST" action="tambah_alamat.php">
											<div class="form-group">
												<label>Keterangan (contoh: alamat rumah, alamat kantor)</label>
												<input type="text" name="keterangan" class="form-control">
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Nama Penerima</label>
														<input type="text" name="nama_penerima" class="form-control">
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Nomor Telepon</label>
														<input type="text" name="no_telp_penerima" class="form-control">
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Pilih Provinsi</label>
														<select class="form-control" name="id_prov" id="id_prov">
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
													</div>
												</div>
												<div class="col-md-6">
													<div class="form-group">
														<label>Pilih Kota</label>
														<select class="form-control" id="id_kota" name="id_kota">
															<option>Pilih Kota</option>
															<?php
															$data = $con->query("SELECT * FROM tb_kota WHERE id_prov='$member[id_prov]'");
															foreach ($data as $i => $a) {
																echo "<option value=" . $a['id_kota'] . ">" . $a['nama_kota'] . "</option>";
															}
															?>
														</select>
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label>Alamat</label>
														<br>
														<textarea name="alamat" id="alamat" cols="94" rows="3"></textarea>
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label>Kode Pos</label>
														<input type="text" name="kode_pos" class="form-control">
													</div>
												</div>
											</div>

									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary">Simpan</button>
										</form>
									</div>
								</div>
							</div>
						</div>

						<br><br>
						<div class="row">
							<?php
							$datas = $con->select(
								"tb_daftar_alamat",
								[
									"[>]tb_provinsi" => ["id_prov" => "id_prov"],
									"[>]tb_kota" => ["id_kota" => "id_kota"]
								],
								[
									"tb_provinsi.nama_prov",
									"tb_kota.nama_kota",
									"tb_daftar_alamat.alamat",
									"tb_daftar_alamat.keterangan",
									"tb_daftar_alamat.alamat_id",
									"tb_daftar_alamat.no_telp_penerima",
									"tb_daftar_alamat.nama_penerima",
									"tb_daftar_alamat.kode_pos"
								],
								[
									"member_id" => $_COOKIE['member_id']
								]
							);
							foreach ($datas as $key => $data) {
							?>
								<div class="col-md-5">
									<div class="panel panel-default">
										<div class="panel-body">
											<b><?= $data['nama_penerima'] ?></b> (<span style="color: black;"><?= $data['keterangan'] ?></span>) &nbsp;&nbsp;&nbsp;&nbsp;
											<?php
											if ($data['alamat_id'] == $account['alamat_id']) {
												echo "<small style='background-color: #f2f2f2; padding: 3px;'><b>Alamat Aktif</b></small>";
											} else { ?>

												<a href="aksi_alamat_aktif.php?alamat_id=<?= $data['alamat_id'] ?>" onclick="return confirm('Jadikan sebagai alamat aktif ?')" style="color: #00c853">Jadikan alamat aktif</a>

											<?php
											}
											?>
											<p style="color: black;"><?= $data['no_telp_penerima'] ?></p>
											<?= $data['alamat'] ?> <br>
											<?= $data['nama_kota'] ?>, <?= $data['nama_prov'] ?>, <?= $data['kode_pos'] ?>
										</div>
									</div>
								</div>
							<?php } ?>
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
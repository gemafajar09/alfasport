<?php
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
						<li><a href="#">Informasi Pribadi</a></li>
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
						<form action="aksi_update_account.php" method="POST" enctype="multipart/form-data">
							<div class="form-group">
								<label>Member Kode</label>
								<input type="hidden" class="form-control" name="member_id" value="<?= $account['member_id'] ?>">
								<input type="text" class="form-control" name="member_kode" value="<?= $account['member_kode'] ?>" readonly>
							</div>
							<div class="form-group">
								<label>Nama</label>
								<input type="text" class="form-control" name="member_nama" value="<?= $account['member_nama'] ?>">
							</div>
							<div class="form-group">
								<label>No Telp</label>
								<input type="text" class="form-control" name="member_notelp" value="<?= $account['member_notelp'] ?>">
							</div>
							<div class="form-group">
								<label>Tanggal Lahir</label>
								<input type="date" class="form-control" name="member_tgl_lahir" value="<?= $account['member_tgl_lahir'] ?>">
							</div>
							<div class="form-group">
								<label>Jenis Kelamin</label>
								<?php
								if ($account['member_gender'] == 'Pria') {
								?>
									<input type="radio" value="Pria" name="member_gender" checked>Pria
									<input type="radio" value="Wanita" name="member_gender">Wanita
								<?php } else { ?>
									<input type="radio" value="Pria" name="member_gender">Pria
									<input type="radio" value="Wanita" name="member_gender" checked>Wanita
								<?php } ?>
							</div>

							<div class="form-group">
								<label>Pilih Profesi</label>
								<select class="form-control" name="member_profesi">
									<option>Pilih Profesi</option>
									<option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
									<option value="Karyawan">Karyawan</option>
									<option value="Lainnya">Lainnya</option>
								</select>
							</div>

							<script>
								document.getElementsByName('member_profesi')[0].value = "<?= $account['member_profesi'] ?>"
							</script>

							<div class="form-group">
								<label>Email</label>
								<input type="email" name="member_email" class="form-control" value="<?= $account['member_email'] ?>">
							</div>

							<div class="form-group">
								<label>Pilih Provinsi</label>
								<select class="form-control" name="id_prov" id="id_prov">
									<option>Pilih Provinsi</option>
									<?php
									$data = $con->query("SELECT * FROM tb_provinsi");
									foreach ($data as $i => $a) {
										echo "<option value=" . $a['id_prov'] . ">" . $a['nama_prov'] . "</option>";
									}
									?>
								</select>
							</div>
							<script>
								document.getElementsByName('id_prov')[0].value = "<?= $account['id_prov'] ?>"
							</script>

							<div class="form-group">
								<label>Pilih Kota</label>
								<select class="form-control" id="id_kota" name="id_kota">
									<option>Pilih Kota</option>
									<?php
									$data = $con->query("SELECT * FROM tb_kota WHERE id_prov='$account[id_prov]'");
									foreach ($data as $i => $a) {
										echo "<option value=" . $a['id_kota'] . ">" . $a['nama_kota'] . "</option>";
									}
									?>
								</select>
							</div>
							<script>
								document.getElementsByName('id_kota')[0].value = "<?= $account['id_kota'] ?>"
							</script>

							<div class="form-group">
								<label>Alamat</label>
								<textarea name="member_alamat" cols="30" rows="5" class="form-control"><?= $account['member_alamat'] ?></textarea>
							</div>

							<button type="submit" class="btn btn-default" name="simpan">simpan</button>
						</form>
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
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
						<li><a href="#">Voucher</a></li>
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
						<h6>Voucher Saya</h6>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<?php
									$tgl_sekarang = date("Y-m-d");

									$data_voucher = $con->query("SELECT * FROM tb_voucher_detail d LEFT JOIN tb_voucher v ON d.voucher_id=v.voucher_id WHERE d.member_id='$_COOKIE[member_id]'")->fetchAll();
									foreach ($data_voucher as $i => $a) {
									?>
										<div class="col-md-4">
											<div class="panel panel-default">
												<div class="panel-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin: 0px; padding: 0px; min-height: 100px;">
													<div class="col-md-5" style="background-color: #00c853; min-height: 100px;">

														<p style="font-size: 16px; color: #FFF; margin-top: 15px;"><b><?= $a['voucher_jenis'] == 'harga' ? 'Rp. ' : ''; ?><?= number_format($a['voucher_harga'], 0, ',', '.') ?><?= $a['voucher_jenis'] == 'persen' ? '%' : ''; ?></b></p>
													</div>
													<div class="col-md-7">
														<p style="font-size: 12px; margin-top: 15px; font-weight: 600;"><?= $a['voucher_nama'] ?></p>

														<?= $a['voucher_detail_token'] ?>
													</div>
												</div>
											</div>
										</div>

									<?php } ?>
								</div>
							</div>
						</div>

						<h6>Klaim Voucher</h6>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="row">
									<?php
									$tgl_sekarang = date("Y-m-d");

									$data_voucher = $con->query("SELECT
									tb_voucher.voucher_id,
									tb_voucher.voucher_nama,
									tb_voucher.voucher_harga,
									tb_voucher.voucher_jenis,
									IFNULL((SELECT member_id FROM tb_voucher_detail WHERE tb_voucher_detail.voucher_id = tb_voucher.voucher_id AND 
									tb_voucher_detail.member_id = '$_COOKIE[member_id]' LIMIT 1), 0) AS status_klaim 
									From tb_voucher Inner Join
									tb_voucher_detail WHERE tb_voucher.voucher_tgl_akhir >= '$tgl_sekarang'
									AND tb_voucher.voucher_tgl_mulai <= '$tgl_sekarang' AND tb_voucher_detail.voucher_detail_status = 0 GROUP BY tb_voucher.voucher_id
									")->fetchAll();
									foreach ($data_voucher as $i => $a) {
										$list_voucher_bisa_diklaim[] = $a['voucher_id'];

										if ($a['status_klaim'] == '0') {
									?>
											<div class="col-md-4">
												<div class="panel panel-default">
													<div class="panel-body" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); margin: 0px; padding: 0px; min-height: 120px;">
														<div class="col-md-5" style="background-color: #00c853; min-height: 120px;">

															<p style="font-size: 16px; color: #FFF; margin-top: 15px;"><b><?= $a['voucher_jenis'] == 'harga' ? 'Rp. ' : ''; ?><?= number_format($a['voucher_harga'], 0, ',', '.') ?><?= $a['voucher_jenis'] == 'persen' ? '%' : ''; ?></b></p>
														</div>
														<div class="col-md-7">
															<p style="font-size: 12px; margin-top: 15px; font-weight: 600;"><?= $a['voucher_nama'] ?></p>
															<?php
															if ($a['status_klaim'] == '0') {
															?>
																<button onclick="claimVoucher(<?= $a['voucher_id'] ?>)" type="button" style="background-color: #00c853; color: #FFF !important; cursor: pointer;" class="btn" type="submit">Claim</button>
															<?php
															} else {
																echo "<small>Sudah diklaim</small>";
															}
															?>
														</div>
													</div>
												</div>
											</div>

									<?php }
									} ?>
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
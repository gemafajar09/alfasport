<?php
if (@$_COOKIE['member_id'] != '') {
	echo "<script>window.location='index.php';</script>";
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
						<li><a href="#">Login</a></li>
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
					<div class="col-md-6 center-column">
						<div class="row">
							<div class="col-md-12">
								<div class="panel-group checkout" id="accordion">
									<div class="panel panel-default">
										<div class="panel-heading heading-iconed">
										</div>
										<div id="collapseOne" class="panel-collapse collapse in">
											<div class="panel-body">
												<div class="row">
													<div class="col-md-12">
														<h3>Sign In</h3>
														<form action="aksi-login.php" method="POST">
															<div class="form-group">
																<label>Email</label>
																<input type="email" name="email" class="form-control" placeholder="Masukkan email">
															</div>

															<div class="form-group">
																<label>Password</label>
																<input type="password" name="password" class="form-control" placeholder="password">
															</div>

															<button type="submit" name="login" class="btn btn-default">sign in</button>
														</form>
													</div>
												</div><!-- End .row -->
											</div>
										</div><!-- End .panel-collapse -->
									</div><!-- End .panel -->

								</div>
							</div>
						</div><!-- End .row -->
					</div><!-- End .center-column -->
					<div class="col-md-6">
						<div class="row">
							<div class="col-md-12">
								<br>
								<img src="../img/login.png">
							</div>
						</div>
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

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
if (isset($_COOKIE['error'])) {
?>
	<script>
		Swal.fire({
			icon: 'error',
			text: '<?= $_COOKIE['error'] ?>',
		})
	</script>
<?php } elseif (isset($_COOKIE['success'])) {
?>
	<script>
		Swal.fire({
			icon: 'success',
			text: '<?= $_COOKIE['success'] ?>',
		})
	</script>

<?php } ?>
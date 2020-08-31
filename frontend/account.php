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
						<li><a href="#">My Account</a></li>
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
						<h1 style="font-size: 35px;">Hallo, <?= $_COOKIE['member_nama'] ?></h1>
						<p style="font-size: 20px;">Selamat Datang</p>
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
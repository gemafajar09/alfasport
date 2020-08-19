<body>

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
							<li><a href="#">Shopping Cart</a></li>
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
						<div class="col-md-12 center-column">
							<form action="" method="post" enctype="multipart/form-data">
								<div class="table-responsive cart-info">
									<table class="table table-bordered">
										<thead>
											<tr>
												<td class="text-center">Gambar</td>
												<td class="text-center hidden-xs">Nama Produk</td>
												<td class="text-center hidden-xs">Model</td>
												<td class="text-center">Quantity</td>
												<td class="text-right hidden-xs">Unit Price</td>
												<td class="text-right">Total</td>
											</tr>
										</thead>
										<tbody id="isiCart">

										</tbody>
									</table>
								</div>
							</form>

							<h2>What would you like to do next?</h2>
							<p style="padding-bottom: 10px">Choose if you have a discount code or reward points you want to use or
								would like to estimate your delivery cost.</p>
							<div class="panel-group" id="accordion">
								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#collapse-coupon" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Use Coupon Code <i class="fa fa-caret-down"></i></a></h4>
									</div>

									<div id="collapse-coupon" class="panel-collapse collapse">
										<div class="panel-body">
											<label class="col-sm-2 control-label" for="input-coupon" style="padding-top: 10px;padding-left: 0px">Enter your coupon here</label>
											<div class="input-group">
												<input type="text" name="coupon" value="" placeholder="Enter your coupon here" id="input-coupon" class="form-control" />
												<span class="input-group-btn">
													<input type="button" value="Apply Coupon" id="button-coupon" data-loading-text="Loading..." class="btn btn-primary" />
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#collapse-voucher" data-toggle="collapse" data-parent="#accordion" class="accordion-toggle">Use Gift Voucher <i class="fa fa-caret-down"></i></a></h4>
									</div>

									<div id="collapse-voucher" class="panel-collapse collapse">
										<div class="panel-body">
											<label class="col-sm-2 control-label" for="input-voucher" style="padding-left: 0px">Enter your
												gift voucher code here</label>

											<div class="input-group">
												<input type="text" name="voucher" value="" placeholder="Enter your gift voucher code here" id="input-voucher" class="form-control" />
												<span class="input-group-btn">
													<input type="submit" value="Apply Voucher" id="button-voucher" data-loading-text="Loading..." class="btn btn-primary" />
												</span>
											</div>
										</div>
									</div>
								</div>

								<div class="panel panel-default">
									<div class="panel-heading">
										<h4 class="panel-title"><a href="#collapse-shipping" class="accordion-toggle" data-toggle="collapse" data-parent="#accordion">Estimate Shipping &amp; Taxes <i class="fa fa-caret-down"></i></a></h4>
									</div>

									<div id="collapse-shipping" class="panel-collapse collapse">
										<div class="panel-body">
											<p>Enter your destination to get a shipping estimate.</p>
											<form class="form-horizontal">
												<div class="form-group required">
													<label class="col-sm-2 control-label" for="input-country">Country</label>
													<div class="col-sm-10">
														<select name="country_id" id="input-country" class="form-control">
															<option value=""> --- Please Select --- </option>
														</select>
													</div>
												</div>

												<div class="form-group required">
													<label class="col-sm-2 control-label" for="input-zone">Region / State</label>
													<div class="col-sm-10">
														<select name="zone_id" id="input-zone" class="form-control"></select>
													</div>
												</div>

												<div class="form-group required">
													<label class="col-sm-2 control-label" for="input-postcode">Post Code</label>
													<div class="col-sm-10"><input type="text" name="postcode" value="" placeholder="Post Code" id="input-postcode" class="form-control" /></div>
												</div>

												<input type="button" value="Get Quotes" id="button-quote" data-loading-text="Loading..." class="btn btn-primary" />
											</form>
										</div>
									</div>
								</div>
							</div>

							<div class="cart-total">
								<table>
									<tr>
										<td class="text-right"><strong>Sub-Total:</strong></td>
										<td class="text-right">$100.00</td>
									</tr>
									<tr>
										<td class="text-right"><strong>Eco Tax (-2.00):</strong></td>
										<td class="text-right">$2.00</td>
									</tr>
									<tr>
										<td class="text-right"><strong>VAT (20%):</strong></td>
										<td class="text-right">$20.00</td>
									</tr>
									<tr>
										<td class="text-right"><strong>Total:</strong></td>
										<td class="text-right">$122.00</td>
									</tr>
								</table>
							</div>

							<div class="buttons">
								<div class="pull-left"><a href="#" class="btn btn-default">Continue Shopping</a></div>
								<div class="pull-right"><a href="#" class="btn btn-primary">Checkout</a></div>
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
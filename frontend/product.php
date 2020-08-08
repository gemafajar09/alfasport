<?php
include "../config/koneksi.php";

$product = $con->query("
SELECT a.id_stok_toko,
			a.jumlah,
			b.id,
			b.artikel,
			b.nama,
			b.modal,
			b.jual,
			c.nama_toko,
			d.merk_nama,
			e.kategori_nama,
			f.divisi_nama,
			g.subdivisi_nama,
			h.gender_nama
FROM tb_stok_toko a
JOIN tb_gudang b ON a.id_gudang=b.id_gudang
JOIN toko c ON a.id_toko=c.id_toko
JOIN tb_merk d ON b.id_merek=d.merk_id
JOIN tb_kategori e ON b.id_kategori=e.kategori_id
JOIN tb_divisi f ON b.id_divisi=f.divisi_id
JOIN tb_subdivisi g ON b.id_sub_divisi=g.subdivisi_id
JOIN tb_gender h ON b.id_gender=h.gender_id WHERE id_stok_toko = '$_GET[id]'
")->fetch();
?>

<!DOCTYPE html>

<html lang="en" class="responsive">

<head>
	<title>Your Store</title>
	<base #href="" />

	<!-- Meta -->
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="My Store" />

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Work+Sans:400,300,500,600,700,800&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,500,700,300&amp;subset=latin,latin-ext' rel='stylesheet' type='text/css'>
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
	<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:800,700,600,500,400,300" rel="stylesheet" type="text/css">

	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="css/stylesheet.css" />
	<link rel="stylesheet" type="text/css" href="css/responsive.css" />
	<link rel="stylesheet" type="text/css" href="css/menu.css" />
	<link rel="stylesheet" type="text/css" href="css/owl.carousel.css" />
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css" />
	<link rel="stylesheet" type="text/css" href="css/wide-grid.css" />
	<link rel="stylesheet" type="text/css" href="css/magnific-popup.css" />
	<link rel="stylesheet" type="text/css" href="css/sport.css" />

	<!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
          <script src="js/respond.min.js"></script>
     <![endif]-->
</head>

<body>

	<div class="standard-body">
		<div id="main" class="">
			<!-- HEADER
     	================================================== -->
			<header>
				<div class="background-header"></div>
				<div class="slider-header">
					<!-- Top Bar -->
					<div id="top-bar" class="full-width">
						<div class="background-top-bar"></div>
						<div class="background">
							<div class="shadow"></div>
							<div class="pattern">
								<div class="container">
									<div class="row">
										<!-- Top Bar Left -->
										<div class="col-xs-12 col-md-6">
											<div class="overflow">
												<!-- Currency -->
												<form action="" method="post" enctype="multipart/form-data" id="currency_form">
													<div class="dropdown">
														Currency:
														<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">US
															Dollar</a>
														<ul class="dropdown-menu">
															<li><a href="javascript:;">Euro</a></li>
															<li><a href="javascript:;">Pound Sterling</a></li>
															<li><a href="javascript:;">US Dollar</a></li>
														</ul>
													</div>
												</form>

												<!-- Language -->
												<form action="" method="post" enctype="multipart/form-data" id="language_form">
													<div class="dropdown">
														Language:
														<a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown"><img src="img/flags/gb.png" alt="English" title="English"> English</a>
														<ul class="dropdown-menu">
															<li><a href="javascript:;"><img src="img/flags/gb.png" alt="English" title="English">
																	English</a></li>
															<li><a href="javascript:;"><img src="img/flags/pl.png" alt="Polski" title="Polski">
																	Polski</a></li>
														</ul>
													</div>
												</form>
											</div>
										</div>

										<!-- Top Bar Right -->
										<div class="col-xs-12 col-md-6" id="top-bar-right">
											<!-- Links -->
											<ul class="top-links">
												<li><a href="wish_list.html" id="wishlist-total">Wish List (1)</a></li>
												<li><a href="my_account.html">My Account</a></li>
												<li><a href="shopping_cart.html">Shopping Cart</a></li>
												<li><a href="checkout.html">Checkout</a></li>
											</ul>
										</div>
									</div><!-- // .row -->
								</div><!-- // .container -->
							</div><!-- // .pattern -->
						</div><!-- // .background -->
					</div><!-- // #top-bar -->

					<!-- Top of pages -->
					<div id="top" class="full-width">
						<div class="background-top"></div>
						<div class="background">
							<div class="shadow"></div>
							<div class="pattern">
								<div class="container">
									<div class="row">
										<!-- Header Left -->
										<div class="col-sm-3" id="header-left">
											<!-- Logo -->
											<div class="logo"><a href="index-2.html"><img src="img/logo.png" title="Your Store" alt="Your Store" /></a></div>
										</div>

										<div class="col-sm-9" id="header-right">
											<div class="help-msg">
												Need Help? Call <span style="color: #00c853; font-weight: 600">897 415 789</span>
											</div>

											<div class="header-items">
												<div class="header-item">
													<div class="search_form">
														<div class="button-search"></div>
														<div class="input-wrap">
															<span role="status" aria-live="polite" class="ui-helper-hidden-accessible"></span><input type="text" class="input-block-level search-query ui-autocomplete-input" name="search" placeholder="Search..." id="search_query" value="" autocomplete="off">
														</div>
													</div>
												</div>

												<div class="header-item">
													<a href="http://ninethemes.net/xpresso/opencart/default/index.php?route=account/wishlist" id="wishlist-total"><i class="fa fa-heart"></i><span class="value">0</span></a>
												</div>

												<div class="header-item">
													<a href="http://ninethemes.net/xpresso/opencart/default/index.php?route=product/compare" id="compare-total"><i class="fa fa-sync-alt"></i> <span class="value">0</span></a>
												</div>

												<div class="header-item">
													<!-- Cart block -->
													<div id="cart_block" class="dropdown">
														<div class="cart-heading dropdown-toogle" data-toggle="dropdown">
															<i class="cart-icon"><img src="img/icon-cart.png" alt=""></i>
															<span id="cart_count_ajax"><span id="cart-total">0</span></span>
															<strong id="total_price_ajax"><span id="total_price">$0.00</span></strong>
														</div>

														<div class="dropdown-menu" id="cart_content">
															<div class="mini-cart-info">
																<table>
																	<tr>
																		<td class="image"><a href="#"><img src="img/product-47x47.png" alt="Product" title="Product" /></a></td>
																		<td class="name"><a href="#">Product 1</a></td>
																		<td class="quantity">x&nbsp;2</td>
																		<td class="total">$246.40</td>
																		<td class="text-right remove"><a href="javascript:;" title="Remove">x</a></td>
																	</tr>
																	<tr>
																		<td class="image"><a href="#"><img src="img/product-47x47.png" alt="Product" title="Product" /></a></td>
																		<td class="name"><a href="#">Product 2</a></td>
																		<td class="quantity">x&nbsp;2</td>
																		<td class="total">$246.40</td>
																		<td class="text-right remove"><a href="javascript:;" title="Remove">x</a></td>
																	</tr>
																</table>
															</div>

															<div class="mini-cart-total">
																<table>
																	<tr>
																		<td class="right"><b>Sub-Total:</b></td>
																		<td class="text-right right">$402.00</td>
																	</tr>
																	<tr>
																		<td class="right"><b>Eco Tax (-2.00):</b></td>
																		<td class="text-right right">$8.00</td>
																	</tr>
																	<tr>
																		<td class="right"><b>VAT (20%):</b></td>
																		<td class="text-right right">$80.40</td>
																	</tr>
																	<tr>
																		<td class="right"><b>Total:</b></td>
																		<td class="text-right right">$490.40</td>
																	</tr>
																</table>
															</div>

															<div class="checkout"><a href="shopping_cart.html" class="button button-secondary btn-view-cart">View Cart</a> <a href="checkout.html" class="button btn-checkout">Checkout</a></div>
														</div><!-- // .dropdown-menu -->
													</div><!-- // .dropdown -->
												</div>
											</div>
										</div><!-- // #header-right -->
									</div><!-- // .row -->
								</div><!-- // .container -->

								<nav id="custommegamenu" class="container-megamenu horizontal">
									<div class="megaMenuToggle">
										<div class="megamenuToogle-wrapper">
											<div class="megamenuToogle-pattern">
												<div class="container">
													<div><span></span><span></span><span></span></div>Categories
												</div>
											</div>
										</div>
									</div>

									<div class="megamenu-wrapper">
										<div class="megamenu-pattern">
											<div class="container">
												<ul class="megamenu shift-up">
													<li class=' with-sub-menu hover'>
														<p class='close-menu'></p>
														<p class='open-menu'></p>
														<a href="category.html" class='clearfix'><span><strong>Men</strong></span></a>
														<div class="sub-menu" style="width:100%">
															<div class="content">
																<p class="arrow"></p>
																<div class="row">
																	<div class="col-sm-3  mobile-enabled">
																		<div style="font-weight: 600; font-size: 22px; line-height: 32px; margin-bottom: 50px;  letter-spacing: -1px; color: #000">
																			Meet xpresso!<br>Responsive HTML Template for you!
																		</div>

																		<div style="font-size: 13px; margin-bottom: 25px">XPRESSO is a premium html template
																			with advanced admin module. It's extremely customizable and fully responsive. Can
																			be used for every type of store.</div>

																		<a href="#" class="btn btn-tertiary">READ MORE</a>
																	</div>

																	<div class="col-sm-3  mobile-enabled">
																		<div class="text-center"><img class="img-responsive" alt="" src="img/megamenu_cat_1.jpg" /></div>

																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">Desktops</a></li>
																							<li><a href="category.html">MP3 Players</a></li>
																							<li><a href="category.html">Software</a></li>
																							<li><a href="category.html">Monitors</a></li>
																							<li><a href="category.html">Web Cameras</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">Phones</a></li>
																							<li><a href="category.html">Desktops</a></li>
																							<li><a href="category.html">Printers</a></li>
																							<li><a href="category.html">Scanners</a></li>
																							<li><a href="category.html">Laptops</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<a href="#" class="btn btn-tertiary" style="margin-top: 18px">READ MORE</a>
																	</div>

																	<div class="col-sm-3  mobile-enabled">
																		<div class="text-center">
																			<img class="img-responsive" alt="" src="img/megamenu_cat_2.jpg" />
																		</div>

																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">MP3 Players</a></li>
																							<li><a href="category.html">Web Cameras</a></li>
																							<li><a href="category.html">Software</a></li>
																							<li><a href="category.html">Monitors</a></li>
																							<li><a href="category.html">Desktops</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">Printers</a></li>
																							<li><a href="category.html">Phones</a></li>
																							<li><a href="category.html">Desktops</a></li>
																							<li><a href="category.html">Laptops</a></li>
																							<li><a href="category.html">Scanners</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<a href="#" class="btn btn-tertiary" style="margin-top: 18px">READ MORE</a>
																	</div>

																	<div class="col-sm-3  mobile-enabled">
																		<div class="text-center"><img class="img-responsive" alt="" src="img/megamenu_cat_2.jpg" /></div>
																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">Desktops</a></li>
																							<li><a href="category.html">Printers</a></li>
																							<li><a href="category.html">Phones</a></li>
																							<li><a href="category.html">Laptops</a></li>
																							<li><a href="category.html">Scanners</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<div class="col-sm-6 static-menu" style="padding: 0; margin: 0">
																			<div class="menu">
																				<ul style="padding: 0; margin: 0">
																					<li>
																						<ul>
																							<li><a href="category.html">Web Cameras</a></li>
																							<li><a href="category.html">Software</a></li>
																							<li><a href="category.html">Monitors</a></li>
																							<li><a href="category.html">Desktops</a></li>
																							<li><a href="category.html">MP3 Players</a></li>
																						</ul>
																					</li>
																				</ul>
																			</div>
																		</div>

																		<a href="#" class="btn btn-tertiary" style="margin-top: 18px">READ MORE</a>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class=' with-sub-menu hover'>
														<p class='close-menu'></p>
														<p class='open-menu'></p>
														<a href="category.html" class='clearfix'><span><strong>Women</strong></span></a>
														<div class="sub-menu" style="width:100%">
															<div class="content">
																<p class="arrow"></p>
																<div class="row">
																	<div class="col-sm-9  mobile-enabled">
																		<div class="row">
																			<div class="col-sm-3 static-menu">
																				<div class="menu">
																					<ul>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Mice and
																								Trackballs</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li>
																									<a href="category.html">Printers</a>
																								</li>
																								<li><a href="category.html">Phones &amp; PDAs</a></li>
																								<li><a href="category.html">PC</a></li>
																								<li><a href="category.html">Cameras</a></li>
																							</ul>
																						</li>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Components</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Monitors</a></li>
																								<li><a href="category.html">Printers</a></li>
																								<li><a href="category.html">Scanners</a></li>
																								<li><a href="category.html">Monitors</a></li>
																							</ul>
																						</li>
																					</ul>
																				</div>
																			</div>

																			<div class="col-sm-3 static-menu">
																				<div class="menu">
																					<ul>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Software</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Desktops</a></li>
																								<li><a href="category.html">Macs</a></li>
																								<li><a href="category.html">Monitors</a></li>
																								<li><a href="category.html">MP3 Players</a></li>
																							</ul>
																						</li>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">MP3 Players</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Scanners</a></li>
																								<li><a href="category.html">Mac</a></li>
																								<li><a href="category.html">Desktops</a></li>
																								<li><a href="category.html">Windows</a></li>
																							</ul>
																						</li>
																					</ul>
																				</div>
																			</div>

																			<div class="col-sm-3 static-menu">
																				<div class="menu">
																					<ul>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Phones &amp;
																								PDAs</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Software</a></li>
																								<li><a href="category.html">PC</a></li>
																								<li><a href="category.html">Scanners</a></li>
																								<li><a href="category.html">Desktops</a></li>
																							</ul>
																						</li>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Desktops</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Mice and Trackballs</a></li>
																								<li><a href="category.html">Software</a></li>
																								<li><a href="category.html">Windows</a></li>
																								<li><a href="category.html">Web Cameras</a></li>
																							</ul>
																						</li>
																					</ul>
																				</div>
																			</div>

																			<div class="col-sm-3 static-menu">
																				<div class="menu">
																					<ul>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Monitors</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Components</a></li>
																								<li><a href="category.html">Web Cameras</a></li>
																								<li><a href="category.html">Scanners</a></li>
																								<li><a href="category.html">Macs</a></li>
																							</ul>
																						</li>
																						<li>
																							<a href="category.html" class="main-menu with-submenu">Cameras</a>
																							<div class="open-categories"></div>
																							<div class="close-categories"></div>
																							<ul>
																								<li><a href="category.html">Monitors</a></li>
																								<li><a href="category.html">Components</a></li>
																								<li><a href="category.html">MP3 Players</a></li>
																								<li><a href="category.html">Monitors</a></li>
																							</ul>
																						</li>
																					</ul>
																				</div>
																			</div>
																		</div>
																	</div>

																	<div class="col-sm-3  mobile-disabled">
																		<div class="text-center"><img class="img-responsive" alt="" src="img/megamenu_woman.jpg"></div>
																	</div>
																</div>
															</div>
														</div>
													</li>
													<li class=''>
														<p class='close-menu'></p>
														<p class='open-menu'></p><a href='#' class='clearfix'><span><strong>Blog</strong></span></a>
													</li>

													<li class=' with-sub-menu hover pull-right megamenu-all-cats'>
														<p class='close-menu'></p>
														<p class='open-menu'></p>
														<a href="category.html" class='clearfix'><span><strong><img src="img/menu_white.png" alt="">Semua Kategori</strong></span></a>
														<div class="sub-menu" style="width:100%">
															<div class="content">
																<p class="arrow"></p>
																<div class="row">
																	<div class="col-sm-12 mobile-enabled">
																		<div class="row">

																			<?php
																			$data = $con->select("tb_kategori", "*", ["ORDER" => ["kategori_id" => "ASC"], "LIMIT" => 5]);
																			foreach ($data as $i => $a) {
																			?>
																				<div class="col-sm-25 static-menu">
																					<div class="menu">
																						<ul>
																							<li>
																								<a href="category.html" class="main-menu with-submenu"><?= $a['kategori_nama'] ?></a>
																								<div class="open-categories"></div>
																								<div class="close-categories"></div>
																								<ul>
																									<?php
																									$edit = $con->select("tb_divisi", "*", [
																										"kategori_id" => $a["kategori_id"],
																										"ORDER" => ["divisi_id" => "ASC"],
																										"LIMIT" => 8
																									]);
																									foreach ($edit as $i => $b) {
																									?>
																										<li><a href="category.html"><?= $b['divisi_nama'] ?></a></li>
																									<?php } ?>
																								</ul>
																							</li>
																						</ul>
																					</div>
																				</div>
																			<?php } ?>
																		</div>
																	</div>
																	<br>
																	<div class="col-sm-12 text-center">
																		<hr>
																		<a href="">View All</a>
																	</div>
																</div>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</div>
									</div><!-- // .megamenu-wrapper -->
								</nav><!-- // #megamenu -->
							</div><!-- // .pattern -->
						</div><!-- // .background -->
					</div><!-- // #top -->
				</div><!-- // .slider-header -->

				<!-- Slider -->
				<div id="slider" class="full-width">
					<div class="background-slider"></div>
					<div class="background">
						<div class="shadow"></div>
						<div class="pattern">
							<!-- START REVOLUTION SLIDER  fullwidth mode -->

							<div id="rev_slider_14_1_wrapper" class="rev_slider_wrapper fullwidthbanner-container" style="margin:0px auto;background-color:#E9E9E9;padding:0px;margin-top:0px;margin-bottom:0px;max-height:680px;">
								<div id="rev_slider_14_1" class="rev_slider fullwidthabanner" style="display:none;max-height:680px;height:680px;">
									<ul>
										<!-- SLIDE  -->
										<li data-transition="random" data-slotamount="7" data-masterspeed="300" data-fstransition="fade" data-fsmasterspeed="300" data-fsslotamount="7" data-saveperformance="off">
											<!-- MAIN IMAGE -->
											<img src="img/bg_1_sport.jpg" alt="bg_1_sport" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
											<!-- LAYERS -->

											<!-- LAYER NR. 1 -->
											<div class="tp-caption lfb" data-x="444" data-y="-14" data-speed="500" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 2;"><img src="img/img_1_sport.png" alt="">
											</div>

											<!-- LAYER NR. 2 -->
											<div class="tp-caption revslider-big-text sft tp-resizeme" data-x="39" data-y="120" data-speed="500" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><span style="font-size: 104px;font-weight: bold; color: #b0bec5;">BOXING</span>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption revslider-big-text tp-fade tp-resizeme" data-x="47" data-y="210" data-speed="300" data-start="1100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><span style="background: #00c853; color: #fff; line-height: 30px; display: block; padding: 5px  30px ; letter-spacing: 15px; font-size: 30px;">EQUIPMENT</span>
											</div>

											<!-- LAYER NR. 4 -->
											<div class="tp-caption revslider-excerpt-lower tp-fade tp-resizeme" data-x="47" data-y="306" data-speed="500" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;">Introducing the Yoga
												3 Pro, an intelligent <br> laptop tablet that adapts to you...
											</div>

											<!-- LAYER NR. 5 -->
											<div class="tp-caption revslider-excerpt-lower lfb tp-resizeme" data-x="48" data-y="409" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-secondary text-center btn-huge' style="padding-left: 60px; padding-right: 60px">Read more</a>
											</div>
										</li>
										<!-- SLIDE  -->
										<li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
											<!-- MAIN IMAGE -->
											<img src="img/bg_2_sport.html" alt="bg_2_sport" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
											<!-- LAYERS -->

											<!-- LAYER NR. 1 -->
											<div class="tp-caption sfb" data-x="556" data-y="54" data-speed="500" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 2;"><img src="img/img_2_sport.png" alt="">
											</div>

											<!-- LAYER NR. 2 -->
											<div class="tp-caption revslider-big-text sft tp-resizeme" data-x="11" data-y="147" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><span style="font-size: 104px;font-weight: bold; color: #fff;">ENDURO</span>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption revslider-big-text tp-fade tp-resizeme" data-x="16" data-y="233" data-speed="300" data-start="1100" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><span style="background: #1c2242; background: rgba(28,34,66, .8); color: #fff; line-height: 30px; display: block; padding: 5px  30px ; letter-spacing: 15px; font-size: 30px;">TRAILBIKES</span>
											</div>

											<!-- LAYER NR. 4 -->
											<div class="tp-caption revslider-excerpt-lower tp-fade tp-resizeme" data-x="20" data-y="322" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><span style="color:#fff">Introducing the Yoga 3 Pro, an intelligent <br> laptop tablet that adapts
													to you...</span>
											</div>

											<!-- LAYER NR. 5 -->
											<div class="tp-caption revslider-excerpt-lower sfb tp-resizeme" data-x="20" data-y="428" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 6; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-secondary text-center btn-huge' style="padding-left: 60px; padding-right: 60px">Read more</a>
											</div>
										</li>
										<!-- SLIDE  -->
										<li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
											<!-- MAIN IMAGE -->
											<img src="img/bg_3_sport.jpg" alt="bg_3_sport" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
											<!-- LAYERS -->

											<!-- LAYER NR. 1 -->
											<div class="tp-caption sfb" data-x="544" data-y="76" data-speed="500" data-start="700" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 2;"><img src="img/img_3_sport.png" alt="">
											</div>

											<!-- LAYER NR. 2 -->
											<div class="tp-caption revslider-big-text sft tp-resizeme" data-x="17" data-y="138" data-speed="300" data-start="1000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 3; max-width: auto; max-height: auto; white-space: nowrap;"><span style="font-size: 75px;font-weight: bold; color: #fff;">NIKE TENNIS</span>
											</div>

											<!-- LAYER NR. 3 -->
											<div class="tp-caption revslider-excerpt-lower sfb tp-resizeme" data-x="23" data-y="262" data-speed="300" data-start="1500" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 4; max-width: auto; max-height: auto; white-space: nowrap;"><span style="color: #fff">Introducing the Yoga 3 Pro, an intelligent <br> laptop tablet that adapts
													to you...</span>
											</div>

											<!-- LAYER NR. 4 -->
											<div class="tp-caption revslider-excerpt-lower sfb tp-resizeme" data-x="25" data-y="374" data-speed="300" data-start="2000" data-easing="Power3.easeInOut" data-splitin="none" data-splitout="none" data-elementdelay="0.1" data-endelementdelay="0.1" data-endspeed="300" style="z-index: 5; max-width: auto; max-height: auto; white-space: nowrap;"><a href='#' class='btn btn-secondary text-center btn-huge' style="padding-left: 60px; padding-right: 60px">Read more</a>
											</div>
										</li>
									</ul>
									<div class="tp-bannertimer"></div>
								</div>
							</div><!-- END REVOLUTION SLIDER -->
						</div><!-- // .pattern -->
					</div><!-- // .background -->
				</div><!-- // #slider -->
			</header>

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
									<li><a href="#"><?= $product['merk_nama'] ?></a></li>
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
									<div itemscope itemtype="http://data-vocabulary.org/Product">
										<span itemprop="name" class="hidden"><?= $product['merk_nama'] ?></span>
										<div class="product-info">
											<div class="row">
												<div class="col-sm-12">
													<div class="row">
														<div class="col-sm-6 popup-gallery">
															<div class="row">
																<div class="col-sm-12">
																	<div class="product-image inner-cloud-zoom">
																		<a href="img/product-500x500.png" title="Name of product" id="ex1"><img src="img/product-500x500.png" title="Name of product" alt="Name of product" id="image" itemprop="image" data-zoom-image="img/product-500x500.png" /></a>
																	</div>
																</div>

																<div class="col-sm-12">
																	<div class="overflow-thumbnails-carousel">
																		<div class="thumbnails-carousel owl-carousel">
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																			<div class="item"><a href="img/product-500x500.png" data-image="img/product-500x500.png" data-zoom-image="img/product-500x500.png"><img src="img/product-100x100.png" title="Name of product" alt="Name of product" /></a></div>
																		</div>
																	</div>
																</div>
															</div>
														</div><!-- End .popup-gallery -->

														<div class="col-sm-6 product-center clearfix">
															<div itemprop="offerDetails" itemscope itemtype="http://data-vocabulary.org/Offer">

																<div class="review">
																	<div class="rating"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>&nbsp;&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');">0
																			reviews</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a onclick="$('a[href=\'#tab-review\']').trigger('click');">Write a review</a></div>
																</div>

																<div class="description">
																	<span>Product Code:</span> SAM1<br />
																	<span>Reward Points:</span> 1000<br />
																	<span>Availability:</span> Pre-Order
																</div>

																<div class="price">
																	<span class="price-new"><span itemprop="price">Rp. <?= number_format($product['jual']) ?></span></span><br />
																	<span class="price-tax">Ex Tax: $199.99</span><br />
																</div>
															</div>

															<div id="product">
																<div class="cart">
																	<div class="add-to-cart clearfix">
																		<p>Qty</p>
																		<div class="quantity">
																			<input type="text" name="quantity" id="quantity_wanted" size="2" value="1" />
																			<a href="#" id="q_up"><i class="fa fa-plus"></i></a>
																			<a href="#" id="q_down"><i class="fa fa-minus"></i></a>
																		</div>
																		<input type="button" value="Add to Cart" id="button-cart" class="button" />
																	</div>

																	<div class="links">
																		<a onclick="">Add to Wish List</a>
																		<a onclick="">Compare this Product</a>
																	</div>
																</div>
															</div><!-- End #product -->
														</div><!-- End .product-center -->
													</div>
												</div><!-- End .col-sm-9 -->
											</div>
										</div><!-- End .product-info -->

										<div id="tabs" class="htabs">
											<a href="#tab-description">Description</a>
											<a href="#tab-review">Reviews (0)</a>
										</div>

										<div id="tab-description" class="tab-content" itemprop="description">
											<p>On the other hand, we denounce with righteous indignation and dislike men who are so beguiled
												and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot
												foresee the pain and trouble that are bound to ensue; and equal blame belongs to those who fail
												in their duty through weakness of will, which is the same as saying through shrinking from toil
												and pain. These cases are perfectly simple and easy to distinguish. In a free hour, when our
												power of choice is untrammelled and when nothing prevents our being able to do what we like
												best, every pleasure is to be welcomed and every pain avoided. But in certain circumstances and
												owing to the claims of duty or the obligations of business it will frequently occur that
												pleasures have to be repudiated and annoyances accepted. The wise man therefore always holds in
												these matters to this principle of selection: he rejects pleasures to secure other greater
												pleasures, or else he endures pains to avoid worse pains.</p>
										</div>

										<div id="tab-review" class="tab-content">
											<form class="form-horizontal">
												<div id="review"></div>
												<h2>Write a review</h2>
												<div class="form-group required">
													<div class="col-sm-12">
														<label class="control-label" for="input-name">Your Name</label>
														<input type="text" name="name" value="" id="input-name" class="form-control" />
													</div>
												</div>

												<div class="form-group required">
													<div class="col-sm-12">
														<label class="control-label" for="input-review">Your Review</label>
														<textarea name="text" rows="5" id="input-review" class="form-control"></textarea>
														<div class="help-block"><span class="text-danger">Note:</span> HTML is not translated!</div>
													</div>
												</div>

												<div class="form-group required">
													<div class="col-sm-12">
														<label class="control-label">Rating</label>
														&nbsp;&nbsp;&nbsp; Bad&nbsp;
														<input type="radio" name="rating" value="1" />
														&nbsp;
														<input type="radio" name="rating" value="2" />
														&nbsp;
														<input type="radio" name="rating" value="3" />
														&nbsp;
														<input type="radio" name="rating" value="4" />
														&nbsp;
														<input type="radio" name="rating" value="5" />
														&nbsp;Good
													</div>
												</div>

												<div class="buttons" style="margin-bottom: 0px">
													<div class="pull-right"><button type="button" id="button-review" data-loading-text="Loading..." class="btn btn-primary">Continue</button></div>
												</div>
											</form>
										</div>
									</div><!-- End http://data-vocabulary.org/Product -->

									<!-- Related products -->
									<div class="box clearfix box-with-products">
										<!-- Carousel nav -->
										<a class="next" href="#myCarousel" id="myCarousel_next"><span></span></a>
										<a class="prev" href="#myCarousel" id="myCarousel_prev"><span></span></a>

										<div class="box-heading">Related products</div>
										<div class="strip-line"></div>

										<div class="box-content products">
											<div class="box-product">
												<div id="myCarousel" class="owl-carousel">
													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-01.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-02.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price"><span class="price-old">$122.00</span> <span class="price-new">$110.00</span></div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-03.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-04.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-05.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-06.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-01.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>

													<div class="item">
														<div class="product-grid">
															<!-- Product -->
															<div class="product clearfix product-hover">
																<div class="left">
																	<div class="image">
																		<a href="product.html"><img src="img/product-03.png" alt="Product" class="" /></a>
																	</div>
																</div>

																<div class="right">
																	<div class="name"><a href="product.html">Name of product</a></div>
																	<div class="price">$242.00</div>
																	<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
																	<div class="only-hover">
																		<ul>
																			<li><a onclick=""><span>+</span> Add to compare</a></li>
																			<li><a onclick=""><span>+</span> Add to wishlist</a></li>
																		</ul>

																		<a onclick="" class="button">Add to Cart</a>
																	</div>
																</div>
															</div><!-- End Product -->
														</div>
													</div>
												</div>
											</div>
										</div>
									</div><!-- // Related products -->
								</div><!-- // .center-column -->
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

			<!-- FOOTER
     	 ================================================== -->
			<footer class="footer full-width">
				<div class="background-footer"></div>
				<div class="background">
					<div class="shadow"></div>
					<div class="pattern">
						<div class="container">
							<div class="row">
								<!-- Information -->
								<div class="col-sm-2">
									<h4>Information</h4>
									<div class="strip-line"></div>
									<ul>
										<li><a href="#">About Us</a></li>
										<li><a href="#">Delivery Information</a></li>
										<li><a href="#">Privacy Policy</a></li>
										<li><a href="#">Terms &amp; Conditions</a></li>
										<li><a href="#">Bestsellers</a></li>
										<li><a href="#">About us</a></li>
										<li><a href="#">Envato project</a></li>
									</ul>
								</div>
								<!-- Customer Service -->
								<div class="col-sm-2">
									<h4>Customer Service</h4>
									<div class="strip-line"></div>
									<ul>
										<li><a href="#">Contact Us</a></li>
										<li><a href="#">Returns</a></li>
										<li><a href="#">Site Map</a></li>
										<li><a href="#">RSS</a></li>
										<li><a href="#">Help & faq</a></li>
										<li><a href="#">Advanced search</a></li>
										<li><a href="#">Last minute</a></li>
									</ul>
								</div>
								<!-- Extras -->
								<div class="col-sm-2">
									<h4>Extras</h4>
									<div class="strip-line"></div>
									<ul>
										<li><a href="#">Brands</a></li>
										<li><a href="#">Gift Vouchers</a></li>
										<li><a href="#">Affiliates</a></li>
										<li><a href="#">Specials </a></li>
										<li><a href="#">Customer service </a></li>
										<li><a href="#">New collection </a></li>
										<li><a href="#">Privacy policy </a></li>
									</ul>
								</div>
								<!-- My Account -->
								<div class="col-sm-4">
									<h4>Stay connected</h4>
									<div class="strip-line"></div>
									<div class="clearfix" style="clear:both">
										<div class="social-icons">
											<ul>
												<li><a href="#"><i class="fab fa-google-plus"></i><span class="show-on-hover">Like us on
															Google</span></a></li>
												<li><a href="#"><i class="fab fa-instagram"></i><span class="show-on-hover">Like us on
															Instagram</span></a></li>
												<li><a href="#"><i class="fab fa-pinterest"></i><span class="show-on-hover">Like us on
															Pin</span></a></li>
												<li><a href="#"><i class="fab fa-twitter"></i><span class="show-on-hover">Like us on
															Twitter</span></a></li>
												<li><a href="#"><i class="fab fa-facebook"></i><span class="show-on-hover">Like us on
															Facebook</span></a></li>
											</ul>
										</div>
									</div>
									<div class="newsletter">
										<h4>Newsletter</h4>
										<div class="strip-line"></div>
										<div class="clearfix" style="clear: both" id="newsletter96614276">
											<input type="text" class="email" placeholder="enter your e-mail" style="margin: 5px 0px 5px 0px; padding: 0 15px;height: 45px;vertical-align: top">
											<a class="button subscribe" style="margin: 5px 0px">Subscribe</a>
										</div>
									</div>
								</div>
							</div><!-- // .row -->
						</div><!-- // .container -->
					</div><!-- // .pattern -->
				</div><!-- // .background -->
			</footer><!-- // .footer -->

			<!-- COPYRIGHT
          ================================================== -->
			<div class="copyright full-width">
				<div class="background-copyright"></div>
				<div class="background">
					<div class="shadow"></div>
					<div class="pattern">
						<div class="container">
							<div class="line"></div>

							<ul>
								<li><a href="#"><img src="img/payment-01.html" alt="" /></a></li>
								<li><a href="#"><img src="img/payment-02.html" alt="" /></a></li>
								<li><a href="#"><img src="img/payment-03.html" alt="" /></a></li>
								<li><a href="#"><img src="img/payment-04.html" alt="" /></a></li>
								<li><a href="#"><img src="img/payment-05.html" alt="" /></a></li>
							</ul>

							<p>Powered By <a href="#">HTML</a></p>
						</div><!-- // .container -->
					</div><!-- // .pattern -->
				</div><!-- // .background -->
			</div><!-- // .copyright -->
		</div><!-- // #main -->

		<a href="#" class="scrollup"><i class="fa fa-chevron-up"></i></a>
	</div>

	<!-- JS -->
	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.js"></script>
	<script type="text/javascript" src="js/tweetfeed.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script type="text/javascript" src="js/common.js"></script>


	<!-- Magnific Popup -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

	<script type="text/javascript">
		< !--
		$(document).ready(function() {
			$('.popup-gallery').magnificPopup({
				delegate: 'a',
				type: 'image',
				tLoading: 'Loading image #%curr%...',
				mainClass: 'mfp-img-mobile',
				gallery: {
					enabled: true,
					navigateByImgClick: true,
					preload: [0, 1] // Will preload 0 - before current, and 1 after the current image
				},
				image: {
					tError: '<a href="%url%">The image #%curr%</a> could not be loaded.',
					titleSrc: function(item) {
						return item.el.attr('title');
					}
				}
			});
		});
		//-->
	</script>

	<!-- Tabs -->
	<script type="text/javascript">
		$.fn.tabs = function() {
			var selector = this;

			this.each(function() {
				var obj = $(this);

				$(obj.attr('href')).hide();

				$(obj).click(function() {
					$(selector).removeClass('selected');

					$(selector).each(function(i, element) {
						$($(element).attr('href')).hide();
					});

					$(this).addClass('selected');

					$($(this).attr('href')).show();

					return false;
				});
			});

			$(this).show();

			$(this).first().click();
		};
	</script>

	<script type="text/javascript">
		< !--
		$('#tabs a').tabs();
		//-->
	</script>

	<!-- Elevate Zoom -->
	<script type="text/javascript" src="js/jquery.elevateZoom-3.0.3.min.js"></script>

	<script>
		$(document).ready(function() {
			if ($(window).width() > 992) {
				$('#image').elevateZoom({
					zoomType: "inner",
					cursor: "pointer",
					zoomWindowFadeIn: 500,
					zoomWindowFadeOut: 750
				});

				$('.thumbnails a, .thumbnails-carousel a').click(function() {
					var smallImage = $(this).attr('data-image');
					var largeImage = $(this).attr('data-zoom-image');
					var ez = $('#image').data('elevateZoom');
					$('#ex1').attr('href', largeImage);
					ez.swaptheimage(smallImage, largeImage);
					return false;
				});
			}
		});
	</script>

	<script type="text/javascript">
		$(document).ready(function() {
			$(".thumbnails-carousel").owlCarousel({
				autoPlay: 6000, //Set AutoPlay to 3 seconds
				navigation: true,
				navigationText: ['', ''],
				itemsCustom: [
					[0, 4],
					[450, 5],
					[550, 6],
					[768, 3],
					[1200, 4]
				],
			});
		});
	</script>

</body>

</html>
<?php
$toko = $con->query("SELECT id_toko, nama_toko FROM toko WHERE id_toko='$_GET[id]'")->fetch();
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
						<li><a href="#"><?= $toko['nama_toko'] ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- MAIN CONTENT
          ================================================== -->
<div class="main-content full-width">
	<div class="background-content"></div>
	<div class="background">
		<div class="shadow"></div>
		<div class="pattern">
			<div class="container">

				<!-- Featured products -->
				<div class="box clearfix box-with-products">
					<!-- Carousel nav -->
					<a class="next" href="#myCarousel" id="myCarousel_next"><span></span></a>
					<a class="prev" href="#myCarousel" id="myCarousel_prev"><span></span></a>

					<div class="box-heading">Produk</div>
					<div class="strip-line"></div>

					<div class="box-content products">
						<div class="box-product">
							<div id="myCarousel" class="owl-carousel">

								<?php
								$products = $con->query("
												SELECT g.id_gudang,
												g.thumbnail,
												g.nama,
												g.jual
												FROM tb_gudang g LEFT JOIN tb_stok_toko s ON g.id_gudang=s.id_gudang WHERE s.id_toko='$_GET[id]'
										")->fetchAll();

								$cek = count($products);
								if ($cek < 1) {
									echo "<p>Produk Masih Kosong</p>";
								} else {
									foreach ($products as $i => $product) {
								?>
										<div class="item">
											<div class="product-grid">
												<!-- Product -->
												<div class="product clearfix product-hover">
													<div class="left">
														<div class="image">
															<a href="<?= $base_url ?>frontend/index.php?page=product&id=<?= $product['id_gudang'] ?>"><img src="<?= $product['thumbnail'] ?>" alt="Product" class="" /></a>
														</div>
													</div>

													<div class="right">
														<div class="name"><a href="<?= $base_url ?>frontend/index.php?page=product&id=<?= $product['id_gudang'] ?>"><?= $product['nama'] ?></a></div>
														<div class="price">Rp. <?= number_format($product['jual']) ?></div>
														<div class="rating"><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i><i class="fa fa-star active"></i></div>
													</div>
												</div><!-- // Product -->
											</div>
										</div>
								<?php }
								} ?>

							</div>
						</div>
					</div>
				</div><!-- // .box -->
			</div><!-- // .container -->
		</div><!-- // .pattern -->
	</div><!-- // .background -->
</div>

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
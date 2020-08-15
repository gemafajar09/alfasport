<?php

$product = $con->query("
SELECT a.id,
       a.artikel,
       a.tanggal,
       a.nama,
       a.id_gudang,
       a.modal,
			 a.jual,
			 a.thumbnail,
			 a.foto1,
			 a.foto2,
			 a.foto3,
			 a.foto4,
			 a.foto5,
       b.merk_id,
       c.gender_id,
       d.kategori_id,
       e.divisi_id,
       f.subdivisi_id
FROM tb_gudang a
JOIN tb_merk b ON a.id_merek=b.merk_id
JOIN tb_gender c ON a.id_gender=c.gender_id
JOIN tb_kategori d ON a.id_kategori=d.kategori_id
JOIN tb_divisi e ON a.id_divisi=e.divisi_id
JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id
WHERE id_gudang = '$_GET[id]'
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
						<li><a href="#"><?= $product['nama'] ?></a></li>
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
							<span itemprop="name" class="hidden"><?= $product['nama'] ?></span>
							<div class="product-info">
								<div class="row">
									<div class="col-sm-12">
										<div class="row">
											<div class="col-sm-6 popup-gallery">
												<div class="row">
													<div class="col-sm-12">
														<div class="product-image inner-cloud-zoom">
															<a href="<?= $product['thumbnail'] ?>" title="<?= $product['nama'] ?>" id="ex1"><img src="<?= $product['thumbnail'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" id="image" itemprop="image" data-zoom-image="<?= $product['thumbnail'] ?>" /></a>
														</div>
													</div>

													<div class="col-sm-12">
														<div class="overflow-thumbnails-carousel">
															<div class="thumbnails-carousel owl-carousel">

																<div class="item"><a href="<?= $product['thumbnail'] ?>" data-image="<?= $product['thumbnail'] ?>" data-zoom-image="<?= $product['thumbnail'] ?>"><img src="<?= $product['thumbnail'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

																<div class="item"><a href="<?= $product['foto1'] ?>" data-image="<?= $product['foto1'] ?>" data-zoom-image="<?= $product['foto1'] ?>"><img src="<?= $product['foto1'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

																<div class="item"><a href="<?= $product['foto2'] ?>" data-image="<?= $product['foto2'] ?>" data-zoom-image="<?= $product['foto2'] ?>"><img src="<?= $product['foto2'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

																<div class="item"><a href="<?= $product['foto3'] ?>" data-image="<?= $product['foto3'] ?>" data-zoom-image="<?= $product['foto3'] ?>"><img src="<?= $product['foto3'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

																<div class="item"><a href="<?= $product['foto4'] ?>" data-image="<?= $product['foto4'] ?>" data-zoom-image="<?= $product['foto4'] ?>"><img src="<?= $product['foto4'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

																<div class="item"><a href="<?= $product['foto5'] ?>" data-image="<?= $product['foto5'] ?>" data-zoom-image="<?= $product['foto5'] ?>"><img src="<?= $product['foto5'] ?>" title="<?= $product['nama'] ?>" alt="<?= $product['nama'] ?>" /></a></div>

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
														<span>Product ID:</span> <?= $product['id'] ?><br />
														<input type="hidden" id="product_id" value="<?= $product['id'] ?>">
														<input type="hidden" id="harga" value="<?= $product['jual'] ?>">
													</div>

													<div class="price">
														<span class="price-new"><span itemprop="price">Rp. <?= number_format($product['jual']) ?></span></span><br />
													</div>

													<div class="description">
														Pilih Toko :
														<select name="toko" id="toko">
															<option value="">Pilih Toko</option>
															<?php
															$data = $con->select("toko", "*");
															foreach ($data as $i => $a) {
															?>
																<option value="<?= $a['id_toko'] ?>"><?= $a['nama_toko'] ?> </option>
															<?php } ?>
														</select>
														<br />
														<br />
														<div id="boxukuran">
															Pilih Ukuran :
															<br>
															<select name="kodeukuran" onchange="setUkuran()" id="kodeukuran">
																<option value=""></option>
																<option value="us">US</option>
																<option value="uk">UK</option>
																<option value="ue">EUROPE</option>
																<option value="cm">CM</option>
															</select>
															<span>
																<select name="ukuran" id="ukuran">

																</select>
															</span>
															<!-- <input type="text" readonly id="stok" class="form-control" style="width:80px"> -->
														</div>

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
															<button type="button" id="button-cart" class="button" onclick="addToCart()">Add to Cart</button>
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
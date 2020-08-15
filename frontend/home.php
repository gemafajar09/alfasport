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
												SELECT a.id,
												a.artikel,
												a.nama,
												a.id_gudang,
												a.modal,
												a.jual,
												a.thumbnail,
												b.merk_nama,
												c.gender_nama,
												d.kategori_nama,
												e.divisi_nama,
												f.subdivisi_nama,
												g.menipis_status
								FROM tb_gudang a
								JOIN tb_merk b ON a.id_merek=b.merk_id
								JOIN tb_gender c ON a.id_gender=c.gender_id
								JOIN tb_kategori d ON a.id_kategori=d.kategori_id
								JOIN tb_divisi e ON a.id_divisi=e.divisi_id
								JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id
								LEFT JOIN tb_cek_stok_menipis g ON a.id_gudang = g.id_gudang
										")->fetchAll();
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
                <?php } ?>

              </div>
            </div>
          </div>
        </div><!-- // .box -->


        <!-- Featured products -->
        <div class="box clearfix box-with-products">
          <!-- Carousel nav -->
          <a class="next" href="#myCarousel1" id="myCarousel1_next"><span></span></a>
          <a class="prev" href="#myCarousel1" id="myCarousel1_prev"><span></span></a>

          <div class="box-heading">Latest products</div>
          <div class="strip-line"></div>

          <div class="box-content products">
            <div class="box-product">
              <div id="myCarousel1" class="owl-carousel">
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
                    </div><!-- // Product -->
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
                    </div><!-- // Product -->
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
                    </div><!-- // Product -->
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
                    </div><!-- // Product -->
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
                    </div><!-- // Product -->
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
                            <li><a href="#"><i class="fa fa-sync-alt"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                          </ul>

                          <a onclick="" class="button">Add to Cart</a>
                        </div>
                      </div>
                    </div><!-- // Product -->
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
                            <li><a href="#"><i class="fa fa-sync-alt"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                          </ul>

                          <a onclick="" class="button">Add to Cart</a>
                        </div>
                      </div>
                    </div><!-- // Product -->
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
                            <li><a href="#"><i class="fa fa-sync-alt"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i></a></li>
                          </ul>

                          <a onclick="" class="button">Add to Cart</a>
                        </div>
                      </div>
                    </div><!-- // Product -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!-- // .box -->

        <div style="margin-top: 30px;margin-bottom: 30px;background-image: url(img/banner_home_bg.png);background-position: top left;background-repeat: no-repeat;background-attachment: scroll;">
          <div class="row">
            <div class="col-lg-4 col-md-5 col-sm-hidden col-xs-hidden hidden-sm hidden-xs">
              <div style="margin: 0 -140px 0 0;"><img class="banner-image img-responsive" alt="" src="img/banner_home_item.png" style=" position: relative;  left: 55px;"></div>
            </div>

            <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
              <div style="min-height: 380px;  text-align: left; color: #fff">
                <div style="text-align: center;   padding: 127px 0 0 0;">
                  <div style="font-family: 'Montserrat'; font-size: 65px; line-height: 70px">Buy five products
                  </div>
                  <div style="font-size: 22px; letter-spacing: 4px;line-height: 32px; margin-bottom: 20px; margin-top: 10px">
                    GET 50% DISCOUNT!</div>
                  <a href="#" class="btn btn-banner" style="width: 200px; padding:11px 18px 10px 18px; font-size: 16px">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="feature-columns">
          <div class="row">

            <div class="col-md-4 ">
              <div class="table-display" style="padding: 25px 0px; height: 104px;">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-track.png" alt="Free shipping">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Free shipping
                    &amp; return</div>
                  <div style="font-size: 14px; color: #000; font-weight: 300">For all orders over
                    $1000&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="table-display" style="padding: 25px 0px; height: 104px;">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-wallet.png" alt="Safe &amp; Secure">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Safe &amp;
                    Secure</div>
                  <div style="font-size: 14px; color: #000; font-weight: 300">100% money back
                    guarantee&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="table-display" style="padding: 25px 0px; height: 104px;">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-buoy.png" alt="Support 24 / 7">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px; color: #000; font-weight: 600; line-height: 18px;">Support 24 / 7
                  </div>
                  <div style="font-size: 14px; color: #000; font-weight: 300">Online and phone
                    support&nbsp;&nbsp;<i class="fa fa-angle-right"></i></div>
                </div>
              </div>
            </div>

          </div>
        </div>

        <div class="box blog-module box-no-advanced">
          <div class="box-heading">From our blog</div>
          <div class="strip-line"></div>
          <div class="box-content">
            <div class="blog-list-grid">
              <div class="col-sm-6 col-xs-12">
                <div class="media clearfix">
                  <div class="thumb-holder"><a href="#"><img alt="" src="img/sample_01-265x180.jpg"></a></div>

                  <div class="media-body">
                    <h5><a href="#">Donec ut nunc sit amet urna aliquet</a></h5>
                    <div class="date-published">16.09.2015</div>
                    <div class="post-decription">Shop Laptop feature only the best laptop deals on the market. By
                      comparing laptop deals from the likes of PC World, Comet, Dixons, The Link and Carphone
                      Warehouse.</div>
                  </div>
                </div>
              </div>

              <div class="col-sm-6 col-xs-12">
                <div class="media clearfix">
                  <div class="thumb-holder"><a href="#"><img alt="" src="img/sample_02-265x180.jpg"></a></div>

                  <div class="media-body">
                    <h5><a href="#">Nulla dictum consequat lorem ac vehicula</a></h5>
                    <div class="date-published">16.09.2015</div>
                    <div class="post-decription">Shop Laptop feature only the best laptop deals on the market. By
                      comparing laptop deals from the likes of PC World, Comet, Dixons, The Link and Carphone
                      Warehouse</div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div id="carouselbrands" class="owl-carousel carousel-brands">
          <div class="item text-center">
            <img src="img/nfl-130x100.png" alt="NFL" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/redbull-130x100.png" alt="RedBull" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/sony-130x100.png" alt="Sony" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/cocacola-130x100.png" alt="Coca Cola" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/burgerking-130x100.png" alt="Burger King" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/canon-130x100.png" alt="Canon" class="img-responsive" />
          </div>

          <div class="item text-center">
            <img src="img/harley-130x100.png" alt="Harley Davidson" class="img-responsive" />
          </div>
          <div class="item text-center">
            <img src="img/dell-130x100.png" alt="Dell" class="img-responsive" />
          </div>
          <div class="item text-center">
            <img src="img/disney-130x100.png" alt="Disney" class="img-responsive" />
          </div>
          <div class="item text-center">
            <img src="img/starbucks-130x100.png" alt="Starbucks" class="img-responsive" />
          </div>
          <div class="item text-center">
            <img src="img/nintendo-130x100.png" alt="Nintendo" class="img-responsive" />
          </div>
        </div>

        <div class="help-columns" style="padding-top: 25px">
          <div class="row">

            <div class="col-md-4 ">
              <div class="table-display" style="padding: 25px 0">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-help.png" alt="Need help?">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px;; line-height: 22px; line-height: 18px;">Need help?</div>
                  <div style="color: #00c853; font-size: 22px;  line-height: 22px;  font-weight: 700">Use our
                    chat!</div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="table-display" style="padding: 25px 0">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-phone.png" alt="Quick question?">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px;; line-height: 22px; line-height: 18px;">Quick question?</div>
                  <div style="color: #ff0054; font-size: 22px;  line-height: 22px;  font-weight: 700">Call - 897
                    415 789!</div>
                </div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="table-display" style="padding: 25px 0">
                <div class="table-cell-display" style="width: 130px; text-align: center">
                  <img src="img/icon-envelope.png" alt="...or send us e-mail">
                </div>
                <div class="table-cell-display">
                  <div style="font-size: 18px;; line-height: 22px; line-height: 18px;">...or send us e-mail</div>
                  <div style="color: #48569e; font-size: 22px;  line-height: 22px;  font-weight: 700">
                    info@xpresso.com</div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div><!-- // .container -->
    </div><!-- // .pattern -->
  </div><!-- // .background -->
</div>
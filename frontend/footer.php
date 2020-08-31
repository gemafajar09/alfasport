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
							<h4>Informasi</h4>
							<div class="strip-line"></div>
							<ul>
								<li><a href="#">Tentang Kami</a></li>
								<li><a href="#">Kebijakan Alfasport</a></li>
								<li><a href="#">Informasi Pengiriman</a></li>
							</ul>
						</div>
						<!-- Customer Service -->
						<div class="col-sm-2">
							<h4>Layanan</h4>
							<div class="strip-line"></div>
							<ul>
								<li><a href="#">Hubungi Kami</a></li>
								<li><a href="#">Pengembalian</a></li>
								<li><a href="#">Pembayaran</a></li>
								<li><a href="#">Bantuan</a></li>
							</ul>
						</div>
						<!-- Extras -->
						<div class="col-sm-2">
							<h4>Toko</h4>
							<div class="strip-line"></div>
							<ul>
								<?php
								$tokos = $con->select("toko", ["id_toko", "nama_toko"]);
								foreach ($tokos as $i => $toko) {
								?>
									<li><a href="index.php?page=product_toko&id=<?= $toko['id_toko'] ?>"><?= $toko['nama_toko'] ?></a></li>
								<?php } ?>
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
					</div>
				</div>
			</div>
		</div>
	</footer>

	<div class="copyright full-width">
		<div class="background-copyright"></div>
		<div class="background">
			<div class="shadow"></div>
			<div class="pattern">
				<div class="container">
					<div class="line"></div>

					<ul>
						<li><a href="#"><img src="img/payment-01.png" alt="" /></a></li>
						<li><a href="#"><img src="img/payment-02.png" alt="" /></a></li>
						<li><a href="#"><img src="img/payment-03.png" alt="" /></a></li>
						<li><a href="#"><img src="img/payment-04.png" alt="" /></a></li>
						<li><a href="#"><img src="img/payment-05.png" alt="" /></a></li>
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

	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/twitter-bootstrap-hover-dropdown.js"></script>
	<script type="text/javascript" src="js/tweetfeed.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/megamenu.js"></script>
	<script type="text/javascript" src="js/common.js"></script>

	<!-- Revolution slider -->
	<link rel="stylesheet" type="text/css" href="revolution-slider/settings.css" property='stylesheet' />
	<link rel="stylesheet" type="text/css" href="revolution-slider/static-captions.css" property='stylesheet' />
	<link rel="stylesheet" type="text/css" href="revolution-slider/dynamic-captions.css" property='stylesheet' />
	<link rel="stylesheet" type="text/css" href="revolution-slider/captions.css" property='stylesheet' />
	<link rel="stylesheet" type="text/css" href="revolution-slider/slider.css" property='stylesheet' />
	<script type="text/javascript" src="revolution-slider/jquery.themepunch.tools.min.js"></script>
	<script type="text/javascript" src="revolution-slider/jquery.themepunch.revolution.min.js"></script>
	<script type="text/javascript" src="revolution-slider/start.js"></script>

	<!-- Magnific Popup -->
	<script type="text/javascript" src="js/jquery.magnific-popup.min.js"></script>

	<!-- Toast -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

	<script type="text/javascript">
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

	<script>
		$("#id_prov").change(function() {
			var id_prov = $('#id_prov option:selected').val();
			$.ajax({
				type: "GET",
				url: "../auth/data_kota.php",
				data: {
					'id_prov': id_prov
				},
				success: function(response) {
					$('#id_kota').html(response);
				}
			});
		})

		$('#provinsi').change(function() {
			//Mengambil value dari option select provinsi kemudian parameternya dikirim menggunakan ajax
			var prov = $('#provinsi').val();

			$.ajax({
				type: 'GET',
				url: 'cek_kabupaten.php',
				data: 'prov_id=' + prov,
				success: function(data) {

					//jika data berhasil didapatkan, tampilkan ke dalam option select kabupaten
					$("#kota").html(data);
				}
			});
		});

		// $('#formongkir').hide();
		$('#kota').change(function() {
			var kab = $("#kota").val();
			if (kab == '') {
				$('#formongkir').hide();
			} else {
				$('#formongkir').show();
			}
		});

		$(".kurir").each(function(o_index, o_val) {
			$(this).on("change", function() {
				var did = $(this).val();
				var kab = $('#kota').val();
				var berat = $('#berat').val();

				$.ajax({
						type: 'POST',
						dataType: "html",
						url: 'cek_ongkir.php',
						data: {
							'tujuan': kab,
							'kurir': did,
							'berat': berat
						},
						beforeSend: function() {
							$("#oksimpan").hide();
						}
					})
					.done(function(x) {
						$("#kurirserviceinfo").html(x);
						$("#kuririnfo").show();
					})
					.fail(function() {
						$("#kurirserviceinfo").html("");
						$("#kuririnfo").hide();
					});
			});
		});
	</script>

	<script>
		function formatRupiah(angka, prefix) {
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
				split = number_string.split(','),
				sisa = split[0].length % 3,
				rupiah = split[0].substr(0, sisa),
				ribuan = split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if (ribuan) {
				separator = sisa ? '.' : '';
				rupiah += separator + ribuan.join('.');
			}

			rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
			return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
		}
	</script>

	<script>
		$('#cart_content').load('cart-header.php');
		$('#isiCart').load('shop-cart.php');
		$('#isiWhistlist').load('data-whistlist.php');


		var stok_barang = 0;
		$("#boxukuran").hide();
		$("#product").hide();
		$("#toko").change(function() {
			// variabel dari nilai combo box toko
			var toko = $("#toko").val();

			if (toko == '') {
				$("#boxukuran").hide();
				$("#product").hide();
			} else {
				$("#boxukuran").show();
				$("#product").show();
			}
		});

		function setUkuran() {
			// variabel dari nilai combo box toko
			let toko = $("#toko").val();
			var kodeukuran = $("#kodeukuran").val();

			$.ajax({
				type: "POST",
				dataType: "html",
				url: "ambil-data-ukuran.php",
				data: {
					'toko': toko,
					'kodeukuran': kodeukuran
				},
				success: function(data) {
					$("#ukuran").html(data);
				}
			});
		}

		$('#ukuran').change(function() {
			var id_stok = $(this).val()
			$.ajax({
				type: "POST",
				dataType: "JSON",
				url: "ambil-data-stok.php",
				data: {
					'id_stok': id_stok
				},
				success: function(res) {
					stok_barang = res.jumlah;
					$("#stok").val(stok_barang);
					if (stok_barang < 1) {
						toastr.warning('Stok Tidak Tersedia...');
						$("#button-cart").prop("disabled", true);
					} else {
						$("#button-cart").prop("enabled", false);
					}

				}
			})
		})

		var up = document.getElementById('q_up');
		if (up) {
			up.addEventListener("click", function(e) {
				e.preventDefault();
				var cur_val = document.getElementById("quantity_wanted").value;
				cur_val++;
				document.getElementById("quantity_wanted").value = cur_val;

				if (parseInt(cur_val) > parseInt(stok_barang)) {
					document.getElementById("quantity_wanted").value = stok_barang;
				}
				return false;
			})
		}

		var down = document.getElementById('q_down');
		if (down) {
			down.addEventListener("click", function(e) {
				e.preventDefault();
				var min_val = 1;
				var cur_val = document.getElementById("quantity_wanted").value;
				if (parseInt(cur_val) == min_val) {
					document.getElementById("quantity_wanted").value = min_val;
				} else {
					cur_val--;
					document.getElementById("quantity_wanted").value = cur_val;
				}
				return false;
			})
		}

		function addToCart() {
			var product_id = $('#product_id').val()
			var harga = $('#harga').val()
			var toko = $('#toko').val()
			var id_stok_toko = $('#ukuran').val()
			var quantity_wanted = $('#quantity_wanted').val()

			axios.post('aksi-simpan-cart.php', {
				'product_id': product_id,
				'harga': harga,
				'toko': toko,
				'id_stok_toko': id_stok_toko,
				'quantity_wanted': quantity_wanted,
			}).then(function(res) {
				toastr.success('Barang ditambah ke keranjang');
			}).catch(function(err) {
				toastr.warning('Gagal tambah ke keranjang');
			})
		}


		setInterval(function() {
			cart();
			whistlist();
		}, 2000);

		function cart() {
			axios.post('cart-total.php', {
				'id': <?= $_COOKIE['member_id'] ?>
			}).then(function(res) {
				var data = res.data;
				document.getElementById('cart-total').innerHTML = data.jumlah ? data.jumlah : "0";
				document.getElementById('total_price').innerHTML = formatRupiah(data.total, 'Rp. ');
			});
		}

		function whistlist() {
			axios.post('whistlist-total.php', {
				'id': <?= @$_COOKIE['member_id'] ?>
			}).then(function(res) {
				var data = res.data
				document.getElementById('whist_list').innerHTML = data.jumlah
			})
		}

		function hapusCartItem(id) {
			axios.post('aksi-hapus-cart.php', {
				'product_id': id
			}).then(function(res) {
				var hapus = res.data
				$('#isiCart').load('shop-cart.php');
			}).catch(function(err) {
				console.log(err)
			})
		}

		function hapusWishlistItem(id) {
			axios.post('aksi-hapus-whistlist.php', {
				'id': id
			}).then(function(res) {
				var hapus = res.data
				$('#isiWhistlist').load('data-whistlist.php');
			}).catch(function(err) {
				console.log(err)
			})
		}

		function updateCartItem(id) {
			var qty = $('#qty_cart').val()
			axios.post('aksi-edit-cart.php', {
				'id_cart': id,
				'qty': qty
			}).then(function(res) {
				var edit = res.data
				$('#isiCart').load('shop-cart.php');
			}).catch(function(err) {
				console.log(err)
			})
		}

		function addToWhistList(id) {
			axios.post('aksi-simpan-whistlist.php', {
				'id': id,
				'id_user': <?= $_COOKIE['member_id'] ?>
			}).then(function(res) {
				toastr.success('Barang ditambah ke whistlist');
				$("#tomboladdwhistlist").hide();
				$("#tombolunwhistlist").show();
			}).catch(function(err) {
				toastr.warning('Gagal tambah ke whistlist');
			})
		}

		function unWhistList(id) {
			axios.post('aksi-un-whistlist.php', {
				'id': id,
			}).then(function(res) {
				toastr.success('Barang dihapus dari whistlist');
				$("#tomboladdwhistlist").show();
				$("#tombolunwhistlist").hide();
			}).catch(function(err) {
				toastr.warning('Gagal hapus dari whistlist');
			})
		}

		function gunakanVoucher(voucher) {
			var form = new FormData();
			form.append('voucher', voucher);
			axios.post("gunakan_voucher.php", form)
				.then(function(res) {
					if (res.data.status == true) {
						document.getElementById("voucher_" + voucher).innerHTML = "Sudah Diclaim";
						document.getElementById("voucher_" + voucher).disabled = true;
						alert("Voucher berhasil digunakan!");
						window.location.reload();
					}
				})
				.catch(function(err) {
					alert("Voucher gagal digunakan!");
					console.log(err);
				})
		}

		function claimVoucher(voucher) {
			var form = new FormData();
			form.append('voucher', voucher);
			form.append('error', voucher);
			axios.post('claim_voucher.php', form).then(function(res) {
					if (res.data.status == true) {
						return axios.post("gunakan_voucher.php", form);
					} else {
						alert("Voucher gagal diklaim karena " + res.data.error);
					}
				})
				.then(function(res) {
					if (res.data.status == true) {
						document.getElementById("voucher_" + voucher).innerHTML = "Sudah Digunakan";
						document.getElementById("voucher_" + voucher).disabled = true;
						alert("Voucher berhasil diklaim!");
						window.location.reload();
					} else {
						alert("Voucher gagal diklaim karena " + res.data.error);
					}
				})
				.catch(function(err) {
					console.log(err);
				})
		}
	</script>

	</body>

	</html>
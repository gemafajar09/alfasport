<?php
include "../config/koneksi.php";
?>

<!DOCTYPE html>
<html lang="en" class="responsive">

<head>
	<title>Alfa Sport</title>
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
	<link rel="stylesheet" type="text/css" href="css/sport.css" />

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

</head>

<body>

	<div class="standard-body">
		<div id="main" class="">
			<?php
			include "header.php";
			?>
			<!-- MAIN CONTENT
					================================================== -->
			<?php
			include "content.php";
			?>
			<!-- // .main-content -->

			<?php
			include "footer.php";
			?>

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
	<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

	<script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
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
					if (stok_barang < 1) {
						toastr.warning('Stok Tidak Tersedia...');
						$("#button-cart").prop("disabled", true);
					} else {
						$("#button-cart").prop("enabled", false);
					}

				}
			})
		})

		document.getElementById("q_up").addEventListener("click", function(e) {
			e.preventDefault();
			var cur_val = document.getElementById("quantity_wanted").value;
			cur_val++;
			document.getElementById("quantity_wanted").value = cur_val;

			if (parseInt(cur_val) > parseInt(stok_barang)) {
				document.getElementById("quantity_wanted").value = stok_barang;
			}
			return false;
		})

		document.getElementById("q_down").addEventListener("click", function(e) {
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
				'id': 1
			}).then(function(res) {
				var data = res.data
				document.getElementById('cart-total').innerHTML = data.jumlah
				document.getElementById('total_price').innerHTML = formatRupiah(data.total, 'Rp. ');
			})
		}

		function whistlist() {
			axios.post('whistlist-total.php', {
				'id': 1
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
	</script>

</body>

</html>
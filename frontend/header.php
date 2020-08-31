<!DOCTYPE html>
<html lang="en" class="responsive">

<head>
  <title>Alfa Sport</title>
  <base #href="" />

  <meta charset="utf-8">
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

  <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

  <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>

</head>

<body>

  <div class="standard-body">
    <div id="main" class="">

      <header>
        <div class="background-header"></div>
        <div class="slider-header">

          <?php include "menu_atas.php"; ?>

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
                      <div class="logo"><a href="./"><img src="img/logo.png" title="Your Store" alt="Your Store" /></a></div>
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

                        <?php
                        if (isset($_COOKIE['member_id'])) {
                        ?>
                          <div class="header-item">
                            <a href="index.php?page=whistlist" id="wishlist-total"><i class="fa fa-heart"></i><span class="value" id="whist_list">0</span></a>
                          </div>

                          <a href="index.php?page=cart">
                            <div class="header-item">
                              <div id="cart_block">
                                <div class="cart-heading">
                                  <i class="cart-icon"><img src="img/icon-cart.png" alt=""></i>
                                  <span id="cart_count_ajax"><span id="cart-total">0</span></span>
                                  <strong id="total_price_ajax"><span id="total_price">$0.00</span></strong>
                                </div>
                              </div>
                            </div>
                          </a>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                </div>

                <?php include "mega_menu.php"; ?>

              </div>
            </div>
          </div>
        </div>

        <?php
        if (isset($_GET['page'])) {
          if ($_GET['page'] == '' || $_GET['page'] == 'home') {
            include "slider.php";
          }
        } else {
          include "slider.php";
        }
        ?>
      </header>
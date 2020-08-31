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
              <?php
              if (isset($_COOKIE['member_id'])) {
              ?>
                <li><a href="index.php?page=account">My Account</a></li>
                <li><a href="index.php?page=cart">Shopping Cart</a></li>
                <li class="dropdown">

                  <a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdowsn"><img src="img/flags/gb.png" alt="English" title="English"> <?= $_COOKIE['member_nama'] ?></a>
                  <ul class="dropdown-menu">
                    <li><a href="logout.php">Logout</a></li>
                  </ul>
                </li>
              <?php } else { ?>
                <li><a href="index.php?page=daftar">Daftar</a></li>
                <li><a href="index.php?page=login">Login</a></li>
              <?php } ?>
            </ul>
          </div>
        </div><!-- // .row -->
      </div><!-- // .container -->
    </div><!-- // .pattern -->
  </div><!-- // .background -->
</div>
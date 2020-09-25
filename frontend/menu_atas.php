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
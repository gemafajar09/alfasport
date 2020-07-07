        <!-- footer content -->
        <footer>
          <div class="pull-right">
            Cv. Mediatama Web Indonesia, <a href="https://www.instagram.com/gemafajarrr">Gema fajar</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <?php
      if(isset($_COOKIE['success'])){
    ?>
    <script>
     Swal.fire({
        icon: 'success',
        text: '<?= $_COOKIE['success'] ?>',
      })

    </script>
    
    <?php } ?>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?= $base_url ?>vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- FastClick -->
    <script src="<?= $base_url ?>vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="<?= $base_url ?>vendors/nprogress/nprogress.js"></script>
    <!-- Chart.js -->
    <script src="<?= $base_url ?>vendors/Chart.js/dist/Chart.min.js"></script>
    <!-- jQuery Sparklines -->
    <script src="<?= $base_url ?>vendors/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
    <!-- Flot -->
    <script src="<?= $base_url ?>vendors/Flot/jquery.flot.js"></script>
    <script src="<?= $base_url ?>vendors/Flot/jquery.flot.pie.js"></script>
    <script src="<?= $base_url ?>vendors/Flot/jquery.flot.time.js"></script>
    <script src="<?= $base_url ?>vendors/Flot/jquery.flot.stack.js"></script>
    <script src="<?= $base_url ?>vendors/Flot/jquery.flot.resize.js"></script>
    <!-- Flot plugins -->
    <script src="<?= $base_url ?>vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="<?= $base_url ?>vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="<?= $base_url ?>vendors/flot.curvedlines/curvedLines.js"></script>
    <!-- DateJS -->
    <script src="<?= $base_url ?>vendors/DateJS/build/date.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="<?= $base_url ?>vendors/moment/min/moment.min.js"></script>
    <script src="<?= $base_url ?>vendors/bootstrap-daterangepicker/daterangepicker.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="<?= $base_url ?>build/js/custom.min.js"></script>
    <script src="<?= $base_url ?>App/content.js"></script>
  </body>
</html>
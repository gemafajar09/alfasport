<!-- footer content -->
<footer>
  <div class="pull-right">
    Cv. Mediatama Web Indonesia, <a href="https://www.instagram.com/gemafajarrr"></a>
  </div>
  <div class="clearfix"></div>
</footer>
<!-- /footer content -->
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<?php
if (isset($_COOKIE['success'])) {
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
<script src="<?= $base_url ?>vendors/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<script src="<?= $base_url ?>vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
<script src="<?= $base_url ?>vendors/jszip/dist/jszip.min.js"></script>
<script src="<?= $base_url ?>vendors/pdfmake/build/pdfmake.min.js"></script>
<script src="<?= $base_url ?>vendors/pdfmake/build/vfs_fonts.js"></script>

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
<script src="<?= $base_url ?>vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
<!-- Custom Theme Scripts -->
<script src="<?= $base_url ?>build/js/custom.min.js"></script>
<!-- notifikasi -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="<?= $base_url ?>vendors/ckeditor/ckeditor.js"></script>

<script>
  $('.select2').select2({
    dropdownAutoWidth: true
  });
</script>
<script src="<?= $base_url ?>App/content.js"></script>
</body>

</html>
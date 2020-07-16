<?php
include "../config/koneksi.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Meta, title, CSS, favicons, etc. -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Alfasport</title>

  <!-- Bootstrap -->
  <link href="<?= $base_url ?>vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="<?= $base_url ?>vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <!-- NProgress -->
  <link href="<?= $base_url ?>vendors/nprogress/nprogress.css" rel="stylesheet">
  <!-- Animate.css -->
  <link href="<?= $base_url ?>vendors/animate.css/animate.min.css" rel="stylesheet">

  <!-- Custom Theme Style -->
  <link href="<?= $base_url ?>build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="login_content">
          <form action="aksiLogin.html" method="POST" enctype="multipart/form-data">
            <h1>Register</h1>

            <div class="field item form-group">
              <input type="text" class="form-control" data-validate-length-range="5" name="nik" placeholder="NIK" required="required" />
            </div>

            <div class="field item form-group">
              <input type="text" class="form-control" data-validate-length-range="3" name="nama" placeholder="Nama" required="required" />
            </div>

            <div class="field item form-group">
              <input type="text" class="form-control" data-validate-length-range="5" name="no_telpon" placeholder="No Telpon" required="required" />
            </div>

            <div class="field item form-group">
              <input type="email" class="form-control" data-validate-length-range="5" name="email_karyawan" placeholder="Email" required="required" />
            </div>

            <div class="field item form-group">
              <input type="text" class="form-control" data-validate-length-range="3" name="username" placeholder="Username" required="required" />
            </div>

            <div class="field item form-group">
              <input type="password" name="password" class="form-control" data-validate-length-range="5" placeholder="Password" required="required" />
            </div>

            <div class="field item form-group">
              <input type="password" name="password_repeat" class="form-control" data-validate-length-range="5" placeholder="Ulangi Password" required="required" />
            </div>

            <div class="field item form-group">
              <input type="file" name="foto" class="form-control" data-validate-length-range="5" placeholder="" required="required" />
            </div>

            <div class="field item form-group">
              <input type="file" name="foto_ktp" class="form-control" data-validate-length-range="5" placeholder="" required="required" />
            </div>

            <div class="field item form-group">
              <textarea name="alamat" required="required" class="form-control" cols="30" rows="3" data-validate-length-range="5" placeholder="Alamat"></textarea>
            </div>

            <div class="field item form-group">
              <select class="form-control" name="id_toko" id="id_toko" required>
                <option selected disabled>Pilih Toko</option>
                <?php
                $data = $con->select("toko", "*");
                foreach ($data as $i => $a) {
                  echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div>
              <button type="submit" name="regis" class="btn btn-success btn-block submit">Register</button>
            </div>

            <div class="clearfix"></div>
          </form>
        </section>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <?php
  if (isset($_COOKIE['error'])) {
  ?>
    <script>
      Swal.fire({
        icon: 'error',
        text: '<?= $_COOKIE['error'] ?>',
      })
    </script>
  <?php } ?>
  <script src="<?= $base_url ?>vendors/validator/multifield.js"></script>
  <script src="<?= $base_url ?>vendors/validator/validator.js"></script>

  <script>
    // initialize a validator instance from the "FormValidator" constructor.
    // A "<form>" element is optionally passed as an argument, but is not a must
    var validator = new FormValidator({
      "events": ['blur', 'input', 'change']
    }, document.forms[0]);
    // on form "submit" event
    document.forms[0].onsubmit = function(e) {
      var submit = true,
        validatorResult = validator.checkAll(this);
      console.log(validatorResult);
      return !!validatorResult.valid;
    };
    // on form "reset" event
    document.forms[0].onreset = function(e) {
      validator.reset();
    };
    // stuff related ONLY for this demo page:
    $('.toggleValidationTooltips').change(function() {
      validator.settings.alerts = !this.checked;
      if (this.checked)
        $('form .alert').remove();
    }).prop('checked', false);
  </script>

</body>

</html>
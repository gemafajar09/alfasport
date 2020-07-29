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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
</head>

<body class="login">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
  <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
      <div class="animate form login_form">
        <section class="">
          <form action="aksiDaftar.html" method="POST" enctype="multipart/form-data">
            <h1 class="text-center">Register Member</h1>

            <div class="field item form-group">
              <input type="text" class="form-control" name="member_nama" placeholder="Nama" required="required" />
            </div>
            <div class="field item form-group">
              <input type="text" class="form-control" name="member_notelp" placeholder="No Telpon" required="required" />
            </div>
            <div class="field item form-group">
              <input placeholder="Tanggal Lahir" class="form-control" type="text" name="member_tgl_lahir" onfocus="(this.type='date')">
            </div>
            <div class="field item form-group">
              <select class="form-control select2" name="member_gender" id="member_gender" required style="width: 100%;">
                <option selected disabled>Pilih Gender</option>
                <option value="Pria">Pria</option>
                <option value="Wanita">Wanita</option>
              </select>
            </div>
            <div class="field item form-group">
              <select class="form-control select2" name="member_profesi" id="member_profesi" required style="width: 100%;">
                <option selected disabled>Pilih Profesi</option>
                <option value="Pelajar/Mahasiswa">Pelajar/Mahasiswa</option>
                <option value="Karyawan">Karyawan</option>
                <option value="Lainnya">Lainnya</option>
              </select>
            </div>
            <div class="field item form-group">
              <input type="email" class="form-control" name="member_email" placeholder="Email" required="required" />
            </div>
            <div class="field item form-group">
              <input type="password" name="member_password" class="form-control" placeholder="Password" required="required" />
            </div>
            <div class="field item form-group">
              <input type="password" name="member_password_repeat" class="form-control" placeholder="Ulangi Password" required="required" />
            </div>
            <div class="field item form-group">
              <select class="form-control select2" name="id_prov" id="id_prov" required style="width: 100%;">
                <option selected disabled>Pilih Provinsi</option>
                <?php
                $data = $con->query("SELECT * FROM tb_provinsi");
                foreach ($data as $i => $a) {
                  echo "<option value=" . $a['id_prov'] . ">" . $a['nama_prov'] . "</option>";
                }
                ?>
              </select>
            </div>
            <script>
              $("#id_prov").change(function() {
                var id_prov = $('#id_prov option:selected').val();
                console.log(id_prov);
                $.ajax({
                  type: "GET",
                  url: "auth/data_kota.php",
                  data: {
                    'id_prov': id_prov
                  },
                  success: function(response) {
                    $('#id_kota').html(response);
                  }
                });
              })
            </script>
            <div class="form-group">
              <select class="form-control select2" name="id_kota" id="id_kota" required style="width: 100%;">
                <option selected disabled>Pilih Kota</option>
              </select>
            </div>
            <div class="field item form-group">
              <textarea name="member_alamat" required="required" class="form-control" cols="30" rows="3" placeholder="Alamat"></textarea>
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
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <script>
    $('.select2').select2({
      dropdownAutoWidth: true
    });
  </script>
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
  <?php } elseif (isset($_COOKIE['success'])) {
  ?>
    <script>
      Swal.fire({
        icon: 'success',
        text: '<?= $_COOKIE['success'] ?>',
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
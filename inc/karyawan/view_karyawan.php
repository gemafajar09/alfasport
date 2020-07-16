<div class="page-title">
    <div class="title_left">
        <h3>Data Karyawan</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            //
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-4">
                        <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="x_content table-responsive">
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No Telpon</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Foto</th>
                    <th>Foto Ktp</th>
                    <th>Jabatan</th>
                    <th>Toko</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="isi"></tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="dataKaryawan">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Data Karyawan</h4>
            </div>

            <form action="" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>ID</label>
                                    <input type="number" name="id" id="id" class="form-control" placeholder="ID..">
                                </div>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK..">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama..">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email_karyawan" id="email_karyawan" class="form-control" placeholder="Email..">
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" id="username" class="form-control" placeholder="Username..">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password..">
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>No Telpon</label>
                                    <input type="number" name="no_telpon" id="no_telpon" class="form-control" placeholder="No Telpon..">
                                </div>
                                <div class="form-group">
                                    <label>Foto Diri</label>
                                    <input type="file" name="foto" id="foto" class="form-control" placeholder="Foto..">
                                </div>
                                <div class="form-group">
                                    <label>Foto KTP</label>
                                    <input type="file" name="foto_ktp" id="foto_ktp" class="form-control" placeholder="Foto Ktp..">
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select class="form-control" name="jabatan_id" id="jabatan_id" required>
                                        <option selected disabled>Pilih Toko</option>
                                        <?php
                                        $data = $con->select("tb_jabatan", "*");
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['jabatan_id'] . ">" . $a['jabatan_nama'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <select class="form-control" name="id_toko" id="id_toko" required>
                                        <option selected disabled>Pilih Toko</option>
                                        <?php
                                        $data = $con->select("toko", "*");
                                        foreach ($data as $i => $a) {
                                            echo "<option value=" . $a['id_toko'] . ">" . $a['nama_toko'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                    <input type="hidden" id="id_karyawan" name="id_karyawan">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" style="height:100px" id="alamat" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <!-- <button type="button" onclick="simpan()" class="btn btn-primary" data-dismiss="modal">Simpan</button> -->
                    <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>

        </div>
    </div>
</div>

<?php

if (isset($_POST['simpan'])) {
    $id             = $_POST["id"];
    $nik            = $_POST["nik"];
    $nama           = $_POST["nama"];
    $no_telpon      = $_POST["no_telpon"];
    $alamat         = $_POST["alamat"];
    $email_karyawan = $_POST["email_karyawan"];
    $username       = $_POST["username"];
    $foto           = $_FILES["foto"];
    $foto_ktp       = $_FILES["foto_ktp"];
    $jabatan_id     = $_POST["jabatan_id"];;
    $id_toko        = $_POST["id_toko"];
    $password        = $_POST["password"];
    $id_karyawan    = $_POST["id_karyawan"];
    $pwd = password_hash($password, PASSWORD_DEFAULT);

    if ($id_karyawan == NULL) {
        $data['foto'] = fileUpload($_FILES['foto'], "././img/karyawan/");
        $data['foto_ktp'] = fileUpload($_FILES['foto_ktp'], "././img/karyawan/");

        $simpan = $con->insert(
            "tb_karyawan",
            array(
                "id" => $_POST["id"],
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password,
                "foto" => $data["foto"],
                "foto_ktp" => $data["foto_ktp"],
                "jabatan_id" => $_POST["jabatan_id"],
                "id_toko" => $_POST["id_toko"]
            )
        );
    } else if (!empty($id_karyawan) && $_FILES['foto']['size'] != 0 && $_FILES['foto_ktp']['size'] != 0) {

        $gambar = $con->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'")->fetch();

        if ($gambar['foto'] != 0 && $gambar['foto_ktp'] != 0) {
            unlink("././img/karyawan/" . $gambar['foto']);
            unlink("././img/karyawan/" . $gambar['foto_ktp']);
        }

        $data['foto'] = fileUpload($_FILES['foto'], "././img/karyawan/");
        $data['foto_ktp'] = fileUpload($_FILES['foto_ktp'], "././img/karyawan/");

        $simpan = $con->update(
            "tb_karyawan",
            array(
                "id" => $_POST["id"],
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password,
                "foto" => $data["foto"],
                "foto_ktp" => $data["foto_ktp"],
                "jabatan_id" => $_POST["jabatan_id"],
                "id_toko" => $_POST["id_toko"]
            ),
            array(
                "id_karyawan" => $_POST["id_karyawan"]
            )
        );
    } else if (!empty($id_karyawan) && $_FILES['foto']['size'] != 0 && $_FILES['foto_ktp']['size'] == 0) {
        $gambar = $con->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'")->fetch();

        if ($gambar['foto'] != 0) {
            unlink("././img/karyawan/" . $gambar['foto']);
        }

        $data['foto'] = fileUpload($_FILES['foto'], "././img/karyawan/");

        $simpan = $con->update(
            "tb_karyawan",
            array(
                "id" => $_POST["id"],
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password,
                "foto" => $data["foto"],
                "jabatan_id" => $_POST["jabatan_id"],
                "id_toko" => $_POST["id_toko"]
            ),
            array(
                "id_karyawan" => $_POST["id_karyawan"]
            )
        );
    } else if (!empty($id_karyawan) && $_FILES['foto']['size'] == 0 && $_FILES['foto_ktp']['size'] != 0) {

        $gambar = $con->query("SELECT * FROM tb_karyawan WHERE id_karyawan='$id_karyawan'")->fetch();

        unlink("././img/karyawan/" . $gambar['foto_ktp']);

        $data['foto_ktp'] = fileUpload($_FILES['foto_ktp'], "././img/karyawan/");

        $simpan = $con->update(
            "tb_karyawan",
            array(
                "id" => $_POST["id"],
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password,
                "foto_ktp" => $data["foto_ktp"],
                "jabatan_id" => $_POST["jabatan_id"],
                "id_toko" => $_POST["id_toko"]
            ),
            array(
                "id_karyawan" => $_POST["id_karyawan"]
            )
        );
    } else {

        $simpan = $con->update(
            "tb_karyawan",
            array(
                "id" => $_POST["id"],
                "nik" => $_POST["nik"],
                "nama" => $_POST["nama"],
                "no_telpon" => $_POST["no_telpon"],
                "alamat" => $_POST["alamat"],
                "email_karyawan" => $_POST["email_karyawan"],
                "username" => $_POST["username"],
                "password" => $pwd,
                "password_repeat" => $password,
                "jabatan_id" => $_POST["jabatan_id"],
                "id_toko" => $_POST["id_toko"]
            ),
            array(
                "id_karyawan" => $_POST["id_karyawan"]
            )
        );
    }
    if ($simpan) {
        echo "<script>
                    window.location='data_karyawan.html';   
            </script>";
    }
}

?>


<script>
    function tampil() {
        $('#dataKaryawan').modal()
    }

    function simpan() {
        var id = $('#id').val()
        var nik = $('#nik').val()
        var nama = $('#nama').val()
        var no_telpon = $('#no_telpon').val()
        var alamat = $('#alamat').val()
        var email_karyawan = $('#email_karyawan').val()
        var foto = $('#foto').val()
        var foto_ktp = $('#foto_ktp').val()
        var jabatan_id = $('#jabatan_id').val()
        var id_toko = $('#id_toko').val()
        var id_karyawan = $('#id_karyawan').val()

        let formData = new formData();
        formData.append('id', id);
        formData.append('nik', nik);
        formData.append('nama', nama);
        formData.append('no_telpon', no_telpon);
        formData.append('alamat', alamat);
        formData.append('email_karyawan', email_karyawan);
        formData.append('foto', foto);
        formData.append('foto_ktp', foto_ktp);
        formData.append('jabatan_id', jabatan_id);
        formData.append('id_toko', id_toko);
        formData.append('id_karyawan', id_karyawan);

        axios.post('inc/karyawan/aksi_simpan_karyawan.php', {
            data: formData,
            header: {
                'Content-Type': 'multipart/form-data',
                'contentType': false,
                'processData': false,
            },
        }).then(function(res) {
            kosong()
            $('#dataKaryawan').modal('hide')
            $('#isi').load('inc/karyawan/data_karyawan.php');
        }).catch(function(err) {
            console.log(err)
            kosong()
            $('#dataKaryawan').modal('hide')
            $('#isi').load('inc/karyawan/data_karyawan.php');
        })
    }

    function edit(id) {
        axios.post('inc/karyawan/aksi_edit_karyawan.php', {
            'id_karyawan': id
        }).then(function(res) {
            var data = res.data
            $('#id').val(data.id)
            $('#alamat').val(data.alamat)
            $('#nama').val(data.nama)
            $('#nik').val(data.nik)
            $('#no_telpon').val(data.no_telpon)
            $('#jabatan_id').val(data.jabatan_id)
            $('#id_toko').val(data.id_toko)
            $('#email_karyawan').val(data.email_karyawan)
            $('#username').val(data.username)
            $('#id_toko').val(data.id_toko)
            $('#id_toko').val(data.id_toko)
            $('#password').val(data.password_repeat)
            $('#id_karyawan').val(data.id_karyawan)
            $('#dataKaryawan').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }

    function hapus(id) {
        axios.post('inc/karyawan/aksi_hapus_karyawan.php', {
            'id_karyawan': id
        }).then(function(res) {
            var data = res.data
            $('#isi').load('inc/karyawan/data_karyawan.php');
        })
    }

    function kosong() {
        $('#id').val('')
        $('#alamat').val('')
        $('#nama').val('')
        $('#nik').val('')
        $('#no_telpon').val('')
        $('#jabatan_id').val('')
        $('#email_karyawan').val('')
        $('#foto').val('')
        $('#foto_ktp').val('')
        $('#id_toko').val('')
        $('#id_karyawan').val('')
    }
    $('#isi').load('inc/karyawan/data_karyawan.php');
</script>
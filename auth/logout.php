<?php
date_default_timezone_set("Asia/Jakarta");
setcookie('id_karyawan', "", time() + (86400 * 30), "/");
setcookie('nama', "", time() + (86400 * 30), "/");
setcookie('jabatan_id', "", time() + (86400 * 30), "/");
setcookie('id_toko', "", time() + (86400 * 30), "/");
setcookie('success', "Berhasil Keluar.", time() + 1, "/");
header('location:login.html');

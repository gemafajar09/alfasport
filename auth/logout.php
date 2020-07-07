<?php
date_default_timezone_set("Asia/Jakarta");
setcookie('id_admin', "", time() + (86400 * 30), "/");
setcookie('nama', "", time() + (86400 * 30), "/");
setcookie('level', "", time() + (86400 * 30), "/");
setcookie('success', "Berhasil Keluar.", time() + 1, "/");
header('location:login.html');
?>
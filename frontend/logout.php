<?php
session_start();
date_default_timezone_set("Asia/Jakarta");
unset($_SESSION['voucher_id']);
setcookie('member_id', "", time() + (86400 * 30), "/");
setcookie('member_kode', "", time() + (86400 * 30), "/");
setcookie('member_nama', "", time() + (86400 * 30), "/");
setcookie('success', "Berhasil Keluar.", time() + 1, "/");
header('location: ./');

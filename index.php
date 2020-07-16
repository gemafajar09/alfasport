<?php
include "config/koneksi.php";
include "App/MY_url_helper.php";
if (!empty($_COOKIE['id_karyawan'])) {
    $cookie = $_COOKIE['id_karyawan'];
} else {
    $cookie = 0;
}
if ($cookie == 0) {
    echo "
        <script>
            window.location='login.html'
        </script>
    ";
}
include "template/header.php";
include "template/menu.php";
?>
<div class="right_col" role="main">
    <div class="container">
        <?php
        if (!empty($_GET["page"])) {
            include_once($_GET["page"] . ".php");
        } else {
            include "home.php";
        }
        ?>
    </div>
</div>
<?php
include "template/footer.php";
?>
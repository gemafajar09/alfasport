<?php
include "../../config/koneksi.php";
if(isset($_POST['upload']))
{
    $kategori = $_POST['kategori'];
    $data = $con->query("SELECT nama FROM template_excel WHERE id_template= '$kategori'")->fetch();
    unlink('../../format/'.$data['nama']);

    $namaFile = $_FILES['template']['name'];
    $extension = $_FILES['template']['tmp_name'];
    move_uploaded_file($extension, '../../format/'. $namaFile);

    $simpan = $con->query("UPDATE template_excel SET nama = '$namaFile' WHERE id_template = '$kategori'");
    header('location:../../stok_barang_gudang.html');
}

?>
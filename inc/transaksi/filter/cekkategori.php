<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);

$id = $_POST['barang_id'];
$data = $con->query("SELECT * FROM tb_barang WHERE barang_id = '$id'")->fetch(PDO::FETCH_ASSOC);
if($data['barang_kategori'] = 'Sepatu')
{
?>
    <input type="radio" name="radio" id="radio" value="sepatu_ue">ue&nbsp;&nbsp;
    <input type="radio" name="radio" id="radio" value="sepatu_uk">uk&nbsp;&nbsp;
    <input type="radio" name="radio" id="radio" value="sepatu_us">us&nbsp;&nbsp;
    <input type="radio" name="radio" id="radio" value="sepatu_cm">cm
<?php
}
elseif($data['barang_kategori'] == 'Kaos Kaki')
{
?>
    <input type="radio" name="radio" id="radio" value="kaos_kaki_eu">ue&nbsp;&nbsp;
    <input type="radio" name="radio" id="radio" value="kaos_kaki_size">size
<?php
}
else
{

}
?>
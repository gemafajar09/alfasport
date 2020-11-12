<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);


$data = $con->query("SELECT
                        tb_barang_toko.barang_toko_id,
                        tb_barang_toko.barang_toko_jml,
                        tb_barang_toko.barang_toko_tgl,
                        tb_barang.barang_kode,
                        tb_barang.barang_kategori,
                        tb_barang.barang_artikel,
                        tb_barang.barang_nama,
                        tb_barang.barang_modal,
                        tb_barang.barang_jual,
                        toko.nama_toko,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_gender.gender_nama,
                        tb_divisi.divisi_nama,
                        tb_ukuran.sepatu_ue,
                        tb_ukuran.sepatu_uk,
                        tb_ukuran.sepatu_us,
                        tb_ukuran.sepatu_cm,
                        tb_ukuran.kaos_kaki_eu,
                        tb_ukuran.kaos_kaki_size,
                        tb_ukuran.barang_lainnya_nama_ukuran
                        From
                        tb_barang_toko Inner Join
                        tb_barang_detail On tb_barang_detail.barang_detail_id =
                                tb_barang_toko.barang_detail_id Inner Join
                        tb_barang On tb_barang.barang_id = tb_barang_detail.barang_id Inner Join
                        toko On toko.id_toko = tb_barang_toko.id_toko Inner Join
                        tb_merk On tb_merk.merk_id = tb_barang.merk_id Inner Join
                        tb_kategori On tb_kategori.kategori_id = tb_barang.kategori_id Inner Join
                        tb_divisi On tb_divisi.divisi_id = tb_barang.divisi_id Inner Join
                        tb_subdivisi On tb_subdivisi.subdivisi_id = tb_barang.subdivisi_id Inner Join
                        tb_gender On tb_gender.gender_id = tb_barang.gender_id Inner Join
                        tb_ukuran On tb_ukuran.ukuran_id = tb_barang_toko.ukuran_id
                        WHERE 
                        tb_barang_toko.barang_toko_id ='$_POST[barang_toko_id]'")->fetch();

?>

<b>Tanggal Masuk : <?php echo $data['barang_toko_tgl'] ?></i></b>
<table class="table table-striped">
        <thead>
                <tr>
                        <th>ID</th>
                        <th>Nama Toko</th>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>Merek</th>
                        <th>Kategori</th>
                        <th>Divisi</th>
                        <th>Sub Divisi</th>
                        <th>Gender</th>
                        <th>Jumlah</th>
                        <th colspan="2">
                                <center>Harga</center>
                        </th>
                </tr>
                <tr>
                        <th colspan="10"></th>
                        <th>Modal</th>
                        <th>Jual</th>
                </tr>
        </thead>
        <tbody>
                <tr>
                        <td><?php echo $data['barang_kode'] ?></td>
                        <td><?php echo $data['nama_toko'] ?></td>
                        <td><?php echo $data['barang_artikel'] ?></td>
                        <td><?php echo $data['barang_nama'] ?></td>
                        <td><?php echo $data['merk_nama'] ?></td>
                        <td><?php echo $data['kategori_nama'] ?></td>
                        <td><?php echo $data['divisi_nama'] ?></td>
                        <td><?php echo $data['subdivisi_nama'] ?></td>
                        <td><?php echo $data['gender_nama'] ?></td>
                        <td><?php echo $data['barang_toko_jml'] ?></td>
                        <td><?php echo $data['barang_modal'] ?></td>
                        <td><?php echo $data['barang_jual'] ?></td>
                </tr>
        </tbody>
</table>

<?php
if ($data['barang_kategori'] == 'Sepatu') {
?>
        <div class="row">
                <div class="col-md-4 mx-auto">
                        <center>Ukuran</center>
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th>EU</th>
                                                <th>UK</th>
                                                <th>US</th>
                                                <th>CM</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td><?php echo $data['sepatu_ue'] ?></td>
                                                <td><?php echo $data['sepatu_uk'] ?></td>
                                                <td><?php echo $data['sepatu_us'] ?></td>
                                                <td><?php echo $data['sepatu_cm'] ?></td>
                                        </tr>
                                </tbody>
                        </table>
                </div>
        </div>
<?php
} elseif ($data['barang_kategori'] == 'Kaos Kaki') {
?>
        <div class="row">
                <div class="col-md-4 mx-auto">
                        <center>Ukuran</center>
                        <table class="table">
                                <thead>
                                        <tr>
                                                <th>EU</th>
                                                <th>SIZE</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td><?php echo $data['kaos_kaki_eu'] ?></td>
                                                <td><?php echo $data['kaos_kaki_size'] ?></td>
                                        </tr>
                                </tbody>
                        </table>
                </div>
        </div>
<?php
} elseif ($data['barang_kategori'] == 'Barang Lainnya') {
?>
        <div class="row">
                <div class="col-md-2 mx-auto">
                        <center>Ukuran</center>
                        <table class="table text-center">
                                <thead>
                                        <tr>
                                                <th>Nama Ukuran</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        <tr>
                                                <td><?php echo $data['barang_lainnya_nama_ukuran'] ?></td>
                                        </tr>
                                </tbody>
                        </table>
                </div>
        </div>
<?php
}
?>
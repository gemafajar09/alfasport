<?php
include '../../config/koneksi.php';
$id = $_GET['id'];

//get records from database
$query = $con->query("SELECT b.nama_toko, c.nama, a.jumlah, d.ue, d.us ,d.uk ,d.cm,a.tanggal 
FROM tb_stok_toko a 
JOIN toko b ON a.id_toko = b.id_toko
JOIN tb_gudang c ON a.id_gudang = c.id_gudang
JOIN tb_all_ukuran d ON a.id_ukuran = d.id_ukuran
WHERE a.id_toko = '$id'");

$delimiter = ",";
$filename = "data-stok-" . date('Y-m-d') . ".csv";

//create a file pointer
$f = fopen('php://memory', 'w');

//set column headers
$fields = array('Nama Toko', 'Nama Barang', 'Jumlah', 'UE', 'US', 'UK', 'CM', 'Tanggal');
fputcsv($f, $fields, $delimiter);

//output each row of the data, format line as csv and write to file pointer
foreach ($query as $i => $row) {
    $lineData = array($row['nama_toko'], $row['nama'], $row['jumlah'], $row['ue'], $row['us'], $row['us'], $row['cm'], $row['tanggal']);
    fputcsv($f, $lineData, $delimiter);
}

//move back to beginning of file
fseek($f, 0);

//set headers to download file rather than displayed
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="' . $filename . '";');

//output all remaining data on a file pointer
fpassthru($f);

exit;

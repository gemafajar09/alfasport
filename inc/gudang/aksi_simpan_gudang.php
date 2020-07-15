<?php
// include "../../config/koneksi.php";
if(isset($_POST['simpan']))
{
    $data = array(
        'id' => $_POST['id'],
        'artikel' => $_POST['artikel'],
        'nama' => $_POST['nama'],
        'id_merek' => $_POST['merek'],
        'modal' => $_POST['modal'],
        'jual' => $_POST['jual'],
        'id_gender' => $_POST['gender'],
        'id_kategori' => $_POST['kategori'],
        'id_divisi' => $_POST['divisi'],
        'id_sub_divisi' => $_POST['sub_divisi'],
        'tanggal' => $_POST['tanggal']
    );
        $simpan = $con->insert('tb_gudang', $data);
        $ukuran = $_POST['ukuran'];
        $jumlah = $_POST['jumlah'];
        $barcode = $_POST['barcode'];
        foreach($ukuran as $i => $a)
        {
            // echo $ukuran[$i];
            $con->query("INSERT INTO tb_gudang_detail (id,id_ukuran,jumlah,barcode,tanggal) VALUES ('$_POST[id]','$ukuran[$i]','$jumlah[$i]','$barcode[$i]','$_POST[tanggal]')");
        }
    
        echo "
        <script>
            window.location='entry_gudang.html'
        </script>
        ";
}
    // $where = array('id_gudang' => $_POST['id_gudang']);
    // $simpan = $con->update('tb_gudang',$data,$where);


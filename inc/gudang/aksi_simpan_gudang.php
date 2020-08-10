<?php
// include "../../config/koneksi.php";
if (isset($_POST['simpan'])) {
    $data = array(
        'id' => $_POST['artikel'],
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

    // cek stok menipis
    $last_id = $con->id();
    $con->insert("tb_cek_stok_menipis", [
        "id_gudang" => $last_id,
        "id" => $_POST['id'],
        "menipis_status" => "0"
    ]);

    echo "
        <script>
            window.location='input_stok-".$_POST['artikel']."-".$_POST['merek']."-".$_POST['kategori'].".html'
        </script>
        ";
}
    // $where = array('id_gudang' => $_POST['id_gudang']);
    // $simpan = $con->update('tb_gudang',$data,$where);
 
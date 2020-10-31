<?php
// include "../../config/koneksi.php";
// var_dump($_POST);
// exit;
if (isset($_POST['simpan'])) {
    $data = array(
        'gudang_lainnya_kode' => $_POST['gudang_lainnya_kode'],
        'gudang_lainnya_artikel' => $_POST['gudang_lainnya_artikel'],
        'gudang_lainnya_nama' => $_POST['gudang_lainnya_nama'],
        'id_merek' => $_POST['id_merek'],
        'gudang_lainnya_modal' => $_POST['gudang_lainnya_modal'],
        'gudang_lainnya_jual' => $_POST['gudang_lainnya_jual'],
        'id_gender' => $_POST['id_gender'],
        'id_kategori' => $_POST['id_kategori'],
        'id_divisi' => $_POST['id_divisi'],
        'id_subdivisi' => $_POST['id_subdivisi'],
        'gudang_lainnya_tgl' => $_POST['gudang_lainnya_tgl'],
        'gudang_lainnya_thumbnail' => $_POST['gudang_lainnya_thumbnail'],
        'gudang_lainnya_foto1' => $_POST['gudang_lainnya_foto1'],
        'gudang_lainnya_foto2' => $_POST['gudang_lainnya_foto2'],
        'gudang_lainnya_foto3' => $_POST['gudang_lainnya_foto3'],
        'gudang_lainnya_foto4' => $_POST['gudang_lainnya_foto4'],
        'gudang_lainnya_foto5' => $_POST['gudang_lainnya_foto5'],
        'gudang_lainnya_berat' => $_POST['gudang_lainnya_berat']
    );
    $simpan = $con->insert('tb_gudang_lainnya', $data);

    // cek stok menipis
    $last_id = $con->id();
    // $con->insert("tb_cek_stok_menipis", [
    //     "id_gudang" => $last_id,
    //     "id" => $_POST['id'],
    //     "menipis_status" => "0"
    // ]);

    echo "
        <script>
            window.location='input-stok-lainnya-" . $_POST['gudang_lainnya_kode'] . "-" . $_POST['gudang_lainnya_artikel'] . "-" . $_POST['id_merek'] . "-" . $_POST['id_kategori'] . ".html'
        </script>
        ";
}
    // $where = array('id_gudang' => $_POST['id_gudang']);
    // $simpan = $con->update('tb_gudang',$data,$where);

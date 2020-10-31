<?php
// include "../../config/koneksi.php";
// var_dump($_POST);
// exit;
if (isset($_POST['simpan'])) {
    $data = array(
        'gudang_kaos_kaki_kode' => $_POST['gudang_kaos_kaki_kode'],
        'gudang_kaos_kaki_artikel' => $_POST['gudang_kaos_kaki_artikel'],
        'gudang_kaos_kaki_nama' => $_POST['gudang_kaos_kaki_nama'],
        'id_merek' => $_POST['id_merek'],
        'gudang_kaos_kaki_modal' => $_POST['gudang_kaos_kaki_modal'],
        'gudang_kaos_kaki_jual' => $_POST['gudang_kaos_kaki_jual'],
        'id_gender' => $_POST['id_gender'],
        'id_kategori' => $_POST['id_kategori'],
        'id_divisi' => $_POST['id_divisi'],
        'id_subdivisi' => $_POST['id_subdivisi'],
        'gudang_kaos_kaki_tgl' => $_POST['gudang_kaos_kaki_tgl'],
        'gudang_kaos_kaki_thumbnail' => $_POST['gudang_kaos_kaki_thumbnail'],
        'gudang_kaos_kaki_foto1' => $_POST['gudang_kaos_kaki_foto1'],
        'gudang_kaos_kaki_foto2' => $_POST['gudang_kaos_kaki_foto2'],
        'gudang_kaos_kaki_foto3' => $_POST['gudang_kaos_kaki_foto3'],
        'gudang_kaos_kaki_foto4' => $_POST['gudang_kaos_kaki_foto4'],
        'gudang_kaos_kaki_foto5' => $_POST['gudang_kaos_kaki_foto5'],
        'gudang_kaos_kaki_berat' => $_POST['gudang_kaos_kaki_berat']
    );
    $simpan = $con->insert('tb_gudang_kaos_kaki', $data);

    // cek stok menipis
    $last_id = $con->id();
    // $con->insert("tb_cek_stok_menipis", [
    //     "id_gudang" => $last_id,
    //     "id" => $_POST['id'],
    //     "menipis_status" => "0"
    // ]);

    echo "
        <script>
            window.location='input-stok-kaos-kaki-" . $_POST['gudang_kaos_kaki_kode'] . "-" . $_POST['gudang_kaos_kaki_artikel'] . "-" . $_POST['id_merek'] . "-" . $_POST['id_kategori'] . ".html'
        </script>
        ";
}
    // $where = array('id_gudang' => $_POST['id_gudang']);
    // $simpan = $con->update('tb_gudang',$data,$where);

<?php
// include "../../config/koneksi.php";
if (isset($_POST['simpan'])) {
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
        'tanggal' => $_POST['tanggal'],
        'thumbnail' => $_POST['thumbnail'],
        'foto1' => $_POST['foto1'],
        'foto2' => $_POST['foto2'],
        'foto3' => $_POST['foto3'],
        'foto4' => $_POST['foto4'],
        'foto5' => $_POST['foto5'],
        'berat' => $_POST['berat']
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
            window.location='input_stok-" . $_POST['id'] . "-" . $_POST['artikel'] . "-" . $_POST['merek'] . "-" . $_POST['kategori'] . ".html'
        </script>
        ";
}
    // $where = array('id_gudang' => $_POST['id_gudang']);
    // $simpan = $con->update('tb_gudang',$data,$where);

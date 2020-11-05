<?php
if (isset($_POST['simpan'])) {
    $data = array(
        'barang_kode' => $_POST['barang_kode'],
        'barang_kategori' => $_POST['barang_kategori'],
        'barang_artikel' => $_POST['barang_artikel'],
        'barang_nama' => $_POST['barang_nama'],
        'barang_modal' => $_POST['barang_modal'],
        'barang_jual' => $_POST['barang_jual'],
        'barang_berat' => $_POST['barang_berat'],
        'barang_tgl' => $_POST['barang_tgl'],
        'gender_id' => $_POST['id_gender'],
        'merk_id' => $_POST['id_merek'],
        'kategori_id' => $_POST['id_kategori'],
        'divisi_id' => $_POST['id_divisi'],
        'subdivisi_id' => $_POST['id_subdivisi'],
        'barang_thumbnail' => $_POST['barang_thumbnail'],
        'barang_foto1' => $_POST['barang_foto1'],
        'barang_foto2' => $_POST['barang_foto2'],
        'barang_foto3' => $_POST['barang_foto3'],
        'barang_foto4' => $_POST['barang_foto4'],
        'barang_foto5' => $_POST['barang_foto5'],
    );
    $simpan = $con->insert('tb_barang', $data);

    // cek stok menipis
    // $last_id = $con->id();
    // $con->insert("tb_cek_stok_menipis", [
    //     "id_gudang" => $last_id,
    //     "id" => $_POST['id'],
    //     "menipis_status" => "0"
    // ]);

    echo "
        <script>
            window.location='entry-stok-barang-gudang-" . $_POST['barang_kode'] . "-" . $_POST['id_merek'] . "-" . $_POST['id_subdivisi'] . ".html'
        </script>
        ";
}

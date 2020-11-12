<?php
include "../../../config/koneksi.php";
if (isset($_POST['csv_barang_lainnya_detail'])) {
    $file = fopen($_FILES['upload_barang_lainnya_detail']['tmp_name'], 'r');
    $no = 0;
    while (!feof($file)) {
        $isi_baris = fgetcsv($file);
        // var_dump($isi_baris);
        // exit;
        if ($no > 0) {
            if (!empty($isi_baris[2])) {
                // 1. cari pertama kali barang_id
                $barang = $con->query("SELECT barang_id FROM tb_barang WHERE barang_artikel = '$isi_baris[0]'")->fetch();
                $barang_id = $barang['barang_id'];

                // 2. cari ukuran_id, sebelumnya cari merk_id, subdivisi_id
                // cari merk_id
                $merek = $con->query("SELECT merk_id FROM `tb_merk` WHERE merk_nama='$isi_baris[1]'")->fetch();
                $merk_id = $merek['merk_id'];

                // cari subdivisi_id
                $sub = $con->query("SELECT subdivisi_id FROM `tb_subdivisi` WHERE subdivisi_nama='$isi_baris[2]'")->fetch();
                $subdivisi_id = $sub['subdivisi_id'];

                // cari ukuran_id
                $ukuran = $con->query("SELECT ukuran_id FROM tb_ukuran WHERE merk_id = '$merk_id' AND subdivisi_id = '$subdivisi_id' AND barang_lainnya_nama_ukuran = '$isi_baris[4]' AND ukuran_kategori = 'Barang Lainnya'")->fetch();
                $ukuran_id = $ukuran['ukuran_id'];

                // var_dump($barang_id);
                // var_dump($merk_id);
                // var_dump($subdivisi_id); 
                // var_dump($ukuran_id);
                // exit;

                // 3. insert ke tabel tb_barang_detail
                // cek apakah ukuran_id dan barang_id ada
                // jika ada maka lakukan step berikutnya
                if ($ukuran_id != null and $barang_id != null) {
                    // jika ternyata sukses, cek apakah barcode yag ia punya sudah ada atau tidak
                    // jika barcode ada, maka update
                    // jika barcode tidak ada, maka insert

                    // cari barcode barang
                    $brc = $con->query("SELECT barang_detail_id, barang_detail_jml 
                                        FROM tb_barang_detail 
                                        JOIN tb_barang ON tb_barang_detail.barang_id = tb_barang.barang_id
                                        WHERE 
                                        tb_barang_detail.barang_detail_barcode = '$isi_baris[3]'
                                        AND 
                                        tb_barang.barang_kategori = 'Barang Lainnya'
                                        AND 
                                        tb_barang_detail.ukuran_id = '$ukuran_id'
                                        ")->fetch();

                    $barang_detail_id = $brc['barang_detail_id'];

                    if (!empty($barang_detail_id)) {
                        $con->update(
                            "tb_barang_detail",
                            array(
                                'barang_id' => $barang_id,
                                'ukuran_id' => $ukuran_id,
                                'barang_detail_barcode' => $isi_baris[3],
                                'barang_detail_jml' => $brc['barang_detail_jml'] + $isi_baris[5],
                            ),
                            array(
                                'barang_detail_id' => $barang_detail_id
                            )
                        );
                    } else {
                        $con->insert(
                            "tb_barang_detail",
                            array(
                                'barang_id' => $barang_id,
                                'ukuran_id' => $ukuran_id,
                                'barang_detail_barcode' => $isi_baris[3],
                                'barang_detail_jml' => $isi_baris[5],
                                'barang_detail_tgl' => date('Y-m-d')
                            )
                        );
                    }
                }
                // exit;
            }
        }
        $no++;
    }
    fclose($file);
    header('location:../../../barang_gudang.html');
}

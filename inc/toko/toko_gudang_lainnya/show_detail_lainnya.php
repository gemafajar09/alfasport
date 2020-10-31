<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->query("SELECT
                        tb_stok_toko_lainnya.stok_toko_lainnya_id,
                        tb_stok_toko_lainnya.stok_toko_lainnya_jumlah,
                        tb_stok_toko_lainnya.stok_toko_lainnya_tgl,
                        tb_gudang_lainnya.gudang_lainnya_kode,
                        tb_gudang_lainnya.gudang_lainnya_artikel,
                        tb_gudang_lainnya.gudang_lainnya_nama,
                        tb_gudang_lainnya.gudang_lainnya_modal,
                        tb_gudang_lainnya.gudang_lainnya_jual,
                        toko.nama_toko,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_gender.gender_nama,
                        tb_ukuran_barang_detail.ukuran_barang_detail_nama
                    From
                    tb_stok_toko_lainnya Inner Join
                    tb_gudang_lainnya_detail On tb_gudang_lainnya_detail.gudang_lainnya_detail_id =
                            tb_stok_toko_lainnya.gudang_lainnya_detail_id Inner Join
                    tb_gudang_lainnya On tb_gudang_lainnya.gudang_lainnya_kode =
                            tb_gudang_lainnya_detail.gudang_lainnya_kode Inner Join
                    toko On toko.id_toko = tb_stok_toko_lainnya.id_toko Inner Join
                    tb_merk On tb_merk.merk_id = tb_gudang_lainnya.id_merek Inner Join
                    tb_kategori On tb_kategori.kategori_id = tb_gudang_lainnya.id_kategori Inner Join
                    tb_divisi On tb_divisi.divisi_id = tb_gudang_lainnya.id_divisi Inner Join
                    tb_subdivisi On tb_subdivisi.subdivisi_id = tb_gudang_lainnya.id_subdivisi
                    Inner Join
                    tb_gender On tb_gender.gender_id = tb_gudang_lainnya.id_gender Inner Join
                    tb_ukuran_barang_detail On tb_ukuran_barang_detail.ukuran_barang_detail_id =
                            tb_stok_toko_lainnya.ukuran_barang_detail_id
                    WHERE tb_stok_toko_lainnya.stok_toko_lainnya_id ='$_POST[stok_toko_lainnya_id]'")->fetch();
echo json_encode($edit);

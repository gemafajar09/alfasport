<?php
include "../../../config/koneksi.php";

$json = file_get_contents('php://input');
$_POST = json_decode($json, true);
$edit = $con->query("SELECT
                        tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_id,
                        tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_jumlah,
                        tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_tgl,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_modal,
                        tb_gudang_kaos_kaki.gudang_kaos_kaki_jual,
                        toko.nama_toko,
                        tb_merk.merk_nama,
                        tb_kategori.kategori_nama,
                        tb_divisi.divisi_nama,
                        tb_subdivisi.subdivisi_nama,
                        tb_gender.gender_nama,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                        tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size
                    From
                    tb_stok_toko_kaos_kaki Inner Join
                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id =
                            tb_stok_toko_kaos_kaki.gudang_kaos_kaki_detail_id Inner Join
                    tb_gudang_kaos_kaki On tb_gudang_kaos_kaki.gudang_kaos_kaki_kode =
                            tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode Inner Join
                    toko On toko.id_toko = tb_stok_toko_kaos_kaki.id_toko Inner Join
                    tb_merk On tb_merk.merk_id = tb_gudang_kaos_kaki.id_merek Inner Join
                    tb_kategori On tb_kategori.kategori_id = tb_gudang_kaos_kaki.id_kategori Inner Join
                    tb_divisi On tb_divisi.divisi_id = tb_gudang_kaos_kaki.id_divisi Inner Join
                    tb_subdivisi On tb_subdivisi.subdivisi_id = tb_gudang_kaos_kaki.id_subdivisi
                    Inner Join
                    tb_gender On tb_gender.gender_id = tb_gudang_kaos_kaki.id_gender Inner Join
                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                            tb_stok_toko_kaos_kaki.ukuran_kaos_kaki_id
                    WHERE tb_stok_toko_kaos_kaki.stok_toko_kaos_kaki_id ='$_POST[stok_toko_kaos_kaki_id]'")->fetch();
echo json_encode($edit);

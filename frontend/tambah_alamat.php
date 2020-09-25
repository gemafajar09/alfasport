<?php
if (@$_COOKIE['member_id'] == '') {
  echo "<script>window.location='index.php?page=login';</script>";
}

include "../config/koneksi.php";

$simpan = $con->insert(
  "tb_daftar_alamat",
  array(
    "member_id" => $_COOKIE['member_id'],
    "nama_penerima" => $_POST['nama_penerima'],
    "no_telp_penerima" => $_POST['no_telp_penerima'],
    "id_prov" => $_POST["id_prov"],
    "id_kota" => $_POST["id_kota"],
    "alamat" => $_POST["alamat"],
    "kode_pos" => $_POST["kode_pos"],
    "keterangan" => $_POST["keterangan"]
  )
);

$stmt = $con->query("SELECT LAST_INSERT_ID()");
$lastId = $stmt->fetchColumn();

$data = $con->count('tb_member', '*', ['member_id' => $_COOKIE['member_id'], 'alamat_id[<]' => 1]);
if ($data > 0) {
  $update = $con->update(
    "tb_member",
    array(
      "alamat_id" => $lastId
    ),
    array(
      "member_id" => $_COOKIE['member_id']
    )
  );
}

if ($simpan == TRUE) {
  echo "<script>alert('Data berhasil disimpan');
                window.location.href='index.php?page=alamat';</script>";
} else {
  echo "<script>alert('Data gagal disimpan');
                window.location.href='index.php?page=alamat';</script>";
}

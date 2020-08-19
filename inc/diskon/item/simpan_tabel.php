<!-- aksi simpan ke dalam tabel -->
<?php
if(isset($_POST['simpan']))
{
    $judul = $_POST['nama_promosi'];
    $kategori = $_POST['kategori'];
    $tgl_mulai = $_POST['mulai'];
    $tgl_berakhir = $_POST['selesai'];
    $data = $con->insert('tb_flash_diskon',[
        'judul' => $judul,
        'kategori' => $kategori,
        'tgl_mulai' => $tgl_mulai,
        'tgl_berakhir' => $tgl_berakhir,
        ]);
    
        $id_diskon = $con->id();
        foreach($_POST['id_item'] as $i => $a)
        {
            $con->insert('tb_flash_diskon_detail',[
                'id_diskon' => $id_diskon,
                'artikel' => $a
            ]);
        }
    
        $_SESSION['id_diskon'] = $id_diskon;
    
        echo "
        <script>
            window.location='item_diskon_set.html'
        </script>
        ";
}
?>
<!--  -->
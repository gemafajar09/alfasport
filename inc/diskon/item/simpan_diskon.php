<?php

if(isset($_POST['simpan']))
{
    $data_barang = json_decode($_POST['data_barang']);
    foreach($data_barang as $i => $barang)
    {
        foreach($barang->detail as $x => $detail)
        {
            if(!empty($_POST['ukuran_barang_'.$detail->barang_id.'_'.$x]))
            {
                // LAKUKAN INSERT
                $besar_diskon = $_POST['besar_diskon_'.$detail->barang_id.'_'.$x];
                $harga_selisih = $_POST['harga_selisih_'.$detail->barang_id.'_'.$x];
                $harga_diskon = $_POST['harga_diskon_'.$detail->barang_id.'_'.$x];
                $data = array(
                    'id_diskon' => $_POST['id_diskons'],
                    'artikel' => $_POST['artikel'][$x],
                    'barcode' => $_POST['barcode'][$x],
                    'persen' => $besar_diskon,
                    'potongan' => $harga_selisih
                );
                $con->insert('tb_flash_diskon_persen',$data);
                // var_dump($data); exit;
            }
        }
    }
    echo "
        <script>
            window.location='item.html'
        </script>
    ";
}
<?php
if(isset($_POST['simpan']))
{
    
    $id_umur = $_POST['id_umur'];
    $umur = $_POST['umur'];
    $diskon = $_POST['diskon'];
    if($id_umur != NULL)
    {
        $simpan = $con->query("UPDATE tb_diskon_umur SET umur='$umur',diskon='$diskon' WHERE id_umur = '$id_umur'");
    }else{
        $simpan = $con->query("INSERT INTO tb_diskon_umur VALUES ('','$umur','$diskon')");
    }
    if($simpan == TRUE)
    {
        echo"
            <script>
                window.location='diskon_umur.html'
            </script>
        ";
    }else{
        echo"
            <script>
                window.location='diskon_umur.html'
            </script>
        ";
    }
}
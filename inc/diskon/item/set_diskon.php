<?php
    $data_barang = array();
?>
<div class="page-title">
    <div class="title_left">
        <h3>Buat Diskon</h3>
    </div>
</div>
<?php
if($_SESSION['id_diskon'] != NULL)
{
    $session = $_SESSION['id_diskon'];
}else{
    $session = 0;
}
$cekD = $con->query("SELECT * FROM `tb_flash_diskon` WHERE id_diskon='$session'")->fetch();
?>

<form action="" method="POST">
    <div class="x_panel">
        <div class="x_title">
            <div class="alert alert-warning">
                    <p><h3><?= $cekD['judul'] ?></h3></p>
                    <p>Kategori Diskon : &nbsp;<i style="color:red"><?= $cekD['kategori'] ?></i></p>
                    <p>Masa Belaku : <b><?= $cekD['tgl_mulai'] ?></b> - <b><?= $cekD['tgl_berakhir'] ?></b></p>
            </div>
            <div class="card">
                <div class="card-body row">
                    <div class="col-md-6">
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                <input type="checkbox" id="SetAll"> Set All
                                </div>
                            </div>
                            <input type="text" id="diskon1" class="form-control" placeholder="%">
                            <div class="input-group-append">
                                <span class="input-group-text">%</span>
                            </div>
                        </div>
                        <button type="button" id="sets" class="btn btn-success btn-block btn-sm" onclick="setDiskon()">Set</button>
                    </div>
                    <div class="col-md-6">
                        <form action="" method="POST">
                            <div class="input-group mb-3">
                                <select name="" style="width: 80%;" class="select2" id="">
                                    <option value="">Cari</option>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <?php 
            $isi_disc = $con->query("SELECT * FROM tb_flash_diskon_detail WHERE id_diskon = '$session'")->fetchAll(PDO::FETCH_ASSOC);
                foreach($isi_disc as $i => $a): 
                    $data_barang[] = $a;
                    $data = $con->query("SELECT * FROM tb_gudang WHERE artikel = '$a[artikel]'")->fetch();
            ?>
            <div class="row">
                <div class="col-md-2">
                    <input type="checkbox" name="nama_barang[]" value="<?= $data['id_gudang']?>" class="nama_barang_<?= $data['id_gudang']?>" onclick="centangSemuaUkuran()">
                    <img src="<?= $data['thumbnail'] ?>" width="80px" alt="">
                    <i><?= $data['nama'] ?></i>
                </div>
                <div class="col-md-10">
                    <table class="table table-striped">
                        <?php
                            $detail = $con->query("SELECT * FROM tb_gudang_detail a LEFT JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran LEFT JOIN tb_gudang c ON a.id=c.id WHERE a.id='$a[artikel]'")->fetchAll(PDO::FETCH_ASSOC);
                            
                            $data_barang[$i]['detail'] = array();
                            foreach($detail as $ii => $isi):
                                $data_barang[$i]['detail'][] = $isi;
                        ?>
                        <tr>
                            <td>
                            <label class="switch">
                                <input type="checkbox" name="ukuran_barang_<?= $data['id_gudang']?>_<?= $ii?>">
                                <span class="slider round"></span>
                            </label>
                                <?= $isi['ue'] ?>
                            </td>
                            <td>
                                Rp.<?= number_format($isi['modal']) ?>
                                <input type="hidden" value="<?= $isi['jual'] ?>" id="jual<?= $ii+1 ?>">
                            </td>
                            <td>Rp.<?= number_format($isi['jual']) ?></td>
                            <td style="width: 140px;">
                                <div class="form-inline">
                                    <input type="text" name="besar_diskon_<?= $data['id_gudang']?>_<?= $ii?>" style="width: 70px;" class="form-control">
                                    <input type="text" value="%" readonly class="form-control" style="width:40px">
                                </div>    
                            </td>
                            <td style="width: 80px;"><input type="text" readonly style="width: 80px;" class="form-control"></td>
                            <td style="width: 80px;"><input type="text" id="totals_<?= $data['id_gudang']?>_<?= $ii?>" style="width: 80px;" class="form-control"></td>
                        </tr>
                        <script>
                            function disc<?= $ii+1 ?>(hasil)
                            {
                                var nilai = hasil.value
                                var jual = $('#jual<?= $ii+1 ?>').val()
                                var potongan = (parseInt(jual) * parseFloat(nilai)) / 100
                                $('#potongan<?= $ii+1 ?>').val(potongan)

                                var totals = parseInt(jual) - potongan
                                $('#totals<?= $ii+1 ?>').val(totals)
                            }

                            
                        </script>
                        <?php endforeach ?>
                    </table>
                </div>
            </div>
            <?php endforeach ?>
            
            <div align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    var data_barang = <?=json_encode($data_barang)?>;
    var banyak_barang = data_barang.length;
    
    function centangSemuaUkuran()
    {
        var barang_dicentang = document.getElementsByName("nama_barang[]");
        for(var x = 0; x < barang_dicentang.length; x++)
        {
            if(barang_dicentang[x].checked)
            {
                var data_detail = data_barang[x].detail;
                for(var y = 0; y < data_detail.length; y++)
                {
                    document.getElementsByName("ukuran_barang_" + data_detail[y].id_gudang + "_" + y)[0].checked = true;
                }
            }
        }
    }

    function setDiskon()
    {
        var diskon = document.getElementById("diskon1").value;
        var cek_diskon = document.getElementById("SetAll").checked;
        if(cek_diskon)
        {
            for(var x = 0; x < banyak_barang; x++)
            {
                var detail_barang = data_barang[x].detail;
                var banyak_detail_barang = detail_barang.length;
                for(var y = 0; y < banyak_detail_barang; y++)
                {
                    var detail = document.getElementsByName("ukuran_barang_" + data_barang[x].detail[y].id_gudang + "_" + y)[0];
                    if(detail.checked)
                    {
                        console.log("besar_diskon_"  + data_barang[x].detail[y].id_gudang + "_" + y);
                        document.getElementsByName("besar_diskon_"  + data_barang[x].detail[y].id_gudang + "_" + y)[0].value = diskon;
                    }
                }
            }
        }
    }

    // function cekAll()
    // {
    //     var cekAll = document.getElementById('SetAll').checked;
    //     {
    //         var nilai = $('#diskon1').val()
    //         if(cekAll)
    //         {
    //             for(i = 0; i <= 100; i++)
    //             {
    //                 var cek = document.getElementsByName("cek")[i].checked;
    //                 if(cek == true)
    //                 {   
    //                     for(no = 0; no <= 50; no++)
    //                     {
    //                         var cek = document.getElementsByName("aktif"+no)[no].checked = true;
    //                     }
    //                 }else{
    //                     alert('mati')
    //                 }
    //             }
    //         }else{
    //             alert('cek kembali')
    //         }
    //     }
    // }
    // $('#sets').click(cekAll);
</script>
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
                                <input type="checkbox"> Set All
                                </div>
                            </div>
                            <input type="text" class="form-control" placeholder="%">
                            <div class="input-group-append">
                            <span class="input-group-text">%</span>
                            </div>
                        </div>
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
            $isi_disc = $con->query("SELECT * FROM tb_flash_diskon_detail WHERE id_diskon = '$session'")->fetchAll();
                foreach($isi_disc as $i => $a): 
                    $data = $con->query("SELECT * FROM tb_gudang WHERE artikel = '$a[artikel]'")->fetch();
            ?>
            <div class="row">
                <div class="col-md-2">
                    <img src="<?= $data['thumbnail'] ?>" width="80px" alt="">
                </div>
                <div class="col-md-10">
                    <table class="table table-striped">
                        <?php
                            $detail = $con->query("SELECT * FROM tb_gudang_detail a LEFT JOIN tb_all_ukuran b ON a.id_ukuran=b.id_ukuran LEFT JOIN tb_gudang c ON a.id=c.id WHERE a.id='$a[artikel]'")->fetchAll();
                            
                            foreach($detail as $i => $isi):
                        ?>
                        <tr>
                            <td>
                            <label class="switch">
                                <input type="checkbox" class="cek_menipis">
                                <span class="slider round"></span>
                            </label>
                                <?= $isi['ue'] ?>
                            </td>
                            <td>
                                Rp.<?= number_format($isi['modal']) ?>
                                <input type="hidden" value="<?= $isi['jual'] ?>" id="jual<?= $i+1 ?>">
                            </td>
                            <td>Rp.<?= number_format($isi['jual']) ?></td>
                            <td style="width: 140px;">
                                <div class="form-inline">
                                    <input type="text" onkeyup="disc<?= $i+1 ?>(this)" style="width: 70px;" class="form-control">
                                    <input type="text" value="%" readonly class="form-control" style="width:40px">
                                </div>    
                            </td>
                            <td style="width: 80px;"><input type="text" readonly id="potongan<?= $i+1 ?>" style="width: 80px;" class="form-control"></td>
                            <td style="width: 80px;"><input type="text" id="totals<?= $i+1 ?>" style="width: 80px;" class="form-control"></td>
                        </tr>
                        <script>
                            function disc<?= $i+1 ?>(hasil)
                            {
                                var nilai = hasil.value
                                var jual = $('#jual<?= $i+1 ?>').val()
                                var potongan = (parseInt(jual) * parseFloat(nilai)) / 100
                                $('#potongan<?= $i+1 ?>').val(potongan)

                                var totals = parseInt(jual) - potongan
                                $('#totals<?= $i+1 ?>').val(totals)
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
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

<form action="simpanDiskonD.html" method="POST">
    <div class="x_panel">
        <div class="x_title">
            <div class="alert alert-warning">
                    <p><h3><?= $cekD['judul'] ?></h3></p>
                    <p>Kategori Diskon : &nbsp;<i style="color:red"><?= $cekD['kategori'] ?></i></p>
                    <p>Masa Belaku : <b><?= $cekD['tgl_mulai'] ?></b> - <b><?= $cekD['tgl_berakhir'] ?></b></p>
                    <input type="hidden" name="id_diskons" value="<?= $cekD['id_diskon'] ?>">
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
                            <div class="input-group mb-3">
                                <select name="" style="width: 80%;" class="select2" id="artikelBarangGudang">
                                    <option value="">Cari</option>
                                    <?php
                                        $gudangCari = $con->query("SELECT * FROM tb_barang")->fetchAll(PDO::FETCH_ASSOC);
                                        foreach($gudangCari as $dataGudang):
                                    ?>
                                        <option value="<?= $dataGudang['barang_id'] ?>"><?= $dataGudang['barang_nama'] ?> - <?= $dataGudang['barang_artikel'] ?></option>
                                    <?php endforeach ?>
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-success" onclick="simpanBarangGudang()" type="button">Go</button>
                                </div>
                            </div>
                        
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
                    $data = $con->query("SELECT * FROM tb_barang WHERE barang_id = '$a[artikel]'")->fetch();
            ?>
            <div class="row">
                <div class="col-md-2">
                    <input type="checkbox" name="nama_barang[]" value="<?= $data['barang_id']?>" class="nama_barang_<?= $data['barang_id']?>" onclick="centangSemuaUkuran()">
                    <img src="<?= $data['barang_thumbnail'] ?>" width="80px" alt="">
                    <i><?= $data['barang_nama'] ?></i>
                </div>
                <div class="col-md-10">
                    <table class="table table-striped">
                                                    
                        <?php
                            $detail = $con->query("SELECT * FROM tb_barang_detail a LEFT JOIN tb_ukuran b ON a.ukuran_id=b.ukuran_id LEFT JOIN tb_barang c ON a.barang_id=c.barang_id WHERE a.barang_id='$a[artikel]'");
                            
                            $data_barang[$i]['detail'] = array();
                            foreach($detail as $ii => $isi):
                                $data_barang[$i]['detail'][] = $isi;
                                $awal  = date_create($isi['barang_tgl']);
                                $akhir = date_create();
                                $diff  = date_diff($awal, $akhir);
                                // var_dump($diff);

                            if ($diff->y == 0 && $diff->m == 0) {
                                $umur = $diff->d;
                            } elseif ($diff->y == 0 && $diff->m != 0) {
                                $umur = ($diff->m * 30) + $diff->d;
                            } else if ($diff->y != 0) {
                                $umur = ($diff->y * 365) + ($diff->m * 30) + $diff->d;
                            }
                            // var_dump($umur);
                            $cariUmur = $con->query("SELECT IF( umur <= $umur, diskon, 0) as diskon FROM `tb_diskon_umur` ORDER BY diskon DESC LIMIT 1")->fetch(PDO::FETCH_ASSOC);
                            $hitungSelisih = $isi['barang_jual'] * $cariUmur['diskon'] / 100;
                            $hitungDiskon  = $isi['barang_jual'] - $hitungSelisih;
                        ?>
                        <tr>
                            <td>
                            <label class="switch">
                                <input type="checkbox" name="ukuran_barang_<?= $data['barang_id']?>_<?= $ii?>">
                                <span class="slider round"></span>
                            </label>
                                <!-- <?= $isi['sepatu_ue'] ?> -->
                            </td>
                            <td>
                                Rp.<?= number_format($isi['barang_modal']) ?>
                                <input type="hidden" value="<?= $isi['barang_jual'] ?>" id="jual<?= $data['barang_id']?>_<?= $ii?>">
                            </td>
                            <td>Rp.<?= number_format($isi['barang_jual']) ?></td>
                            <td style="width: 140px;">
                                <div class="form-inline">
                                    <input type="text" name="besar_diskon_<?= $data['barang_id']?>_<?= $ii?>" onkeyup="hitungDiskon(<?= $i ?>,<?= $ii ?>)" style="width: 70px;" value="<?= $cariUmur['diskon'] ?>"  class="form-control">
                                    <input type="text" value="%" readonly class="form-control" style="width:40px">
                                    <input type="hidden" name="barcode[]" value="<?= $isi['barang_detail_barcode'] ?>">
                                    <input type="hidden" name="artikel[]" value="<?= $isi['barang_artikel'] ?>">
                                </div>    
                            </td>
                            <td style="width: 80px;"><input type="text" name="harga_selisih_<?= $data['barang_id']?>_<?= $ii?>"  id="harga_selisih_<?= $data['barang_id']?>_<?= $ii?>" value="<?= number_format($hitungSelisih) ?>" readonly style="width: 80px;" class="form-control"></td>
                            <td style="width: 80px;"><input type="text" name="harga_diskon_<?= $data['barang_id']?>_<?= $ii?>" id="harga_diskon_<?= $data['barang_id']?>_<?= $ii?>" value="<?= number_format($hitungDiskon) ?>" style="width: 80px;" class="form-control"></td>
                        </tr>
                        <?php endforeach ?>
                    </table>
                    <input type="hidden" name="data_barang" value='<?=json_encode($data_barang)?>' />
                </div>
            </div>
            <?php endforeach ?>
            
            <div align="right">
                <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    var data_barang = <?= json_encode($data_barang)?>;
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
                    document.getElementsByName("ukuran_barang_" + data_detail[y].barang_id + "_" + y)[0].checked = true;
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
                    var detail = document.getElementsByName("ukuran_barang_" + data_barang[x].detail[y].barang_id + "_" + y)[0];
                    if(detail.checked)
                    {
                        console.log("besar_diskon_"  + data_barang[x].detail[y].barang_id + "_" + y);
                        var jual = $('#jual'  + data_barang[x].detail[y].barang_id + "_" + y).val()
                        document.getElementsByName("besar_diskon_"  + data_barang[x].detail[y].barang_id + "_" + y)[0].value = diskon;
                            var potongan = (parseInt(jual) * parseFloat(diskon)) / 100
                            $('#harga_selisih_' + data_barang[x].detail[y].barang_id + "_" + y).val(potongan)

                            var totals = parseInt(jual) - potongan
                            $('#harga_diskon_' + data_barang[x].detail[y].barang_id + "_" + y).val(totals)
                    }
                }
            }
        }
    }

    function hitungDiskon(row1 , row2)
    {        
        var barang = data_barang[row1];
        var diskon = parseFloat(document.getElementsByName("besar_diskon_" + barang.detail[row2].barang_id + "_" + row2)[0].value);
        var harga_barang = barang.detail[row2].barang_jual;
        var harga_diskon = harga_barang - (harga_barang * diskon / 100);
        var selisih_harga = harga_barang - harga_diskon;
        document.getElementsByName("harga_diskon_" + barang.detail[row2].barang_id + "_" + row2)[0].value = harga_diskon;
        document.getElementsByName("harga_selisih_" + barang.detail[row2].barang_id + "_" + row2)[0].value = selisih_harga;
    
    }

    function simpanBarangGudang()
    {
        var id_diskon = $('[name="id_diskons"]').val()
        var kode_barang = $('#artikelBarangGudang').val()
        axios.post('inc/diskon/item/tambahData.php',{
            'id_diskon':id_diskon,
            'artikel': kode_barang
        }).then(function(res){
            var data = res.data
            location.reload(); 
        })
    }

</script>
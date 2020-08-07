<div class="container">
    <div class="card">
        <form action="simpan_gudang.html" method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="stok_barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
                    <!-- <button type="button" onclick="showss()" data-toggle="tooltip" title="Upload Ukuran" class="btn btn-success btn-round"><i class="fa fa-upload"></i></button> -->
                </div>
                <div class="text-center">
                    Entry Barang Gudang
                </div> 
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" required name="tanggal" value="<?= date('Y-m-d') ?>" id="tanggal" class="form-control">
                        </div>
                    </div>
                    <!-- uniq id -->
                    <?php

                    $karakter = '1234567890';
                    $shuffle  = substr(str_shuffle($karakter), 0, 14);
                    $artikel  = substr(str_shuffle($karakter), 0, 8);

                    ?>
                    <input type="hidden" value="<?= $shuffle ?>" required name="id" id="id" class="form-control">

                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" required name="artikel" value="AS-<?= $artikel ?>" id="artikel" class="form-control" placeholder="Artikel">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required name="nama" id="nama" class="form-control" placeholder="Nama">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Merek</label>
                            <select name="merek" id="mereks" required class="form-control select2">
                                <option value="">-Merek-</option>
                                <?php
                                    $merek = $con->select('tb_merk','*');
                                    foreach($merek as $b){
                                ?>
                                <option value="<?= $b['merk_id'] ?>"><?= $b['merk_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kategori" required id="kategoris" class="form-control select2">
                                <option value="">-Kategori-</option>
                                <?php
                                    $kategori = $con->select('tb_kategori','*');
                                    foreach($kategori as $b){
                                ?>
                                <option value="<?= $b['kategori_id'] ?>"><?= $b['kategori_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Divisi</label>
                            <select required name="divisi" id="divisis" class="form-control select2">
                                <option value="">-Divisi-</option>
                                <?php
                                    $divisi = $con->select('tb_divisi','*');
                                    foreach($divisi as $b){
                                ?>
                                <option value="<?= $b['divisi_id'] ?>"><?= $b['divisi_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Sub Divisi</label>
                            <select name="sub_divisi" id="sub_divisis" class="form-control select2">
                                <option value="">-Sub Divisi-</option>
                                <?php
                                    $subdivisi = $con->select('tb_subdivisi','*');
                                    foreach($subdivisi as $b){
                                ?>
                                <option value="<?= $b['subdivisi_id'] ?>"><?= $b['subdivisi_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Gender</label>
                            <select required name="gender" id="genders" class="form-control select2">
                                <option value="">-Gender-</option>
                                <?php
                                    $gender = $con->select('tb_gender','*');
                                    foreach($gender as $b){
                                ?>
                                <option value="<?= $b['gender_id'] ?>"><?= $b['gender_nama'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Modal</label>
                            <input type="text" required name="modal" class="form-control" id="modal" placeholder="Harga Modal...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" required name="jual" class="form-control" id="jual" placeholder="Harga Jual...">
                        </div>
                    </div>
                    
                </div>
                <div class="text-right">
                    <button type="submit" name="simpan" class="btn btn-info">Simpan</button>
                </div>                                      
            </div>
        </form>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#tanggal').change(function()
    {
        $('#id').focus()
    })

    $('#kategoris').change(function(e){
        e.preventDefault();
        var kategori = $(this).val()
        var merek = $('#mereks').val()
        axios.post('inc/gudang/ukuran.php',{
            'id_merek': merek,
            'id_kategori': kategori
        }).then(function(res){
            $('[name ="ukuran[]"]').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    })
})

function kosong1()
{
    $('#ue').val('')
    $('#us').val('')
    $('#uk').val('')
    $('#cm').val('')
}

function kosong() 
{
    $('#id').val('')
    $('#artikel').val('')
    $('#nama').val('')
    $('#jumlah').val('')
    $('#modal').val('')
    $('#jual').val('')
    $('#mereks').val('')
    $('#genders').val('')
    $('#kategoris').val('')
    $('#divisis').val('')
    $('#sub_divisis').val('')
}
</script>
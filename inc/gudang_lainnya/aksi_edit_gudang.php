<?php
$edit = $con->query("
SELECT a.id,
       a.artikel,
       a.tanggal,
       a.nama,
       a.id_gudang,
       a.modal,
       a.jual,
       b.merk_id,
       c.gender_id,
       d.kategori_id,
       e.divisi_id,
       f.subdivisi_id
FROM tb_gudang a
JOIN tb_merk b ON a.id_merek=b.merk_id
JOIN tb_gender c ON a.id_gender=c.gender_id
JOIN tb_kategori d ON a.id_kategori=d.kategori_id
JOIN tb_divisi e ON a.id_divisi=e.divisi_id
JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id
WHERE id_gudang = '$_GET[id]'
")->fetch();
?>
<div class="container">
    <div class="card">
        <form action="simpan_gudang.html" method="POST">
            <div class="card-header">
                <div class="text-left">
                    <a href="stok_barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
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
                            <input type="date" required name="tanggal" value="<?= $edit['tanggal'] ?>" id="tanggal" class="form-control">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>ID</label>
                            <input type="text" required name="id" id="id" value="<?= $edit['id'] ?>" class="form-control" placeholder="ID">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" required name="artikel" value="<?= $edit['artikel'] ?>" id="artikel" class="form-control" placeholder="Artikel">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" required name="nama" id="nama" value="<?= $edit['nama'] ?>" class="form-control" placeholder="Nama">
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
                            <input type="text" value="<?= $edit['modal'] ?>" required name="modal" class="form-control" id="modal" placeholder="Harga Modal...">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                        <div class="form-group">
                            <label>Harga Jual</label>
                            <input type="text" value="<?= $edit['jual'] ?>" required name="jual" class="form-control" id="jual" placeholder="Harga Jual...">
                        </div>
                    </div>
                    <div class="col-md-6 mx-auto py-4">
                        <div class="card">
                        <div class="card-header">
                            Masukan Ukuran <i><marquee>Tetapkan Jumlah Kolum Ukuran/ Size Yang Akan Ditambahakan.</marquee></i>
                        </div>
                        <div class="card-body" id="formInput">
                            <div class="row">
                                <?php
                                $data = $con->select('tb_gudang_detail','*',['id' => $edit['id']]);
                                foreach($data as $no => $a){   
                                ?>
                                <div class="col-md-4">
                                    <label>Barcode</label><br>
                                    <input name="barcode[]" value="<?= $a['barcode'] ?>" class="form-control">
                                </div>
                                <div class="col-md-4">
                                    <label>Ukuran</label><br>
                                    <select name="ukuran[]" class="form-control select2">
                                        <option value="">-PILIH-</option>
                                        <?php
                                            $select = $con->query("SELECT * FROM tb_all_ukuran WHERE id_merek= '$edit[merk_id]' AND id_kategori = '$edit[kategori_id]'")->fetchAll();
                                            foreach($select as $b){
                                        ?>
                                            <option value="<?= $b['id_ukuran'] ?>"><?= $b['ue'] ?></option>
                                        <?php } ?>
                                    </select>
                                    <script>
                                        document.getElementsByName('ukuran[]')[<?=$no?>].value = '<?= $a['id_ukuran'] ?>';
                                        document.getElementsByName('ukuran[]')[<?=$no?>].dispatchEvent(new Event('change'));
                                    </script>
                                    </div>
                                <div class="col-md-4">
                                    <label>Jumlah</label>
                                    <input type="text" class="form-control" value="<?= $a['jumlah'] ?>" name="jumlah[]">
                                </div>
                                <?php } ?>
                                
                            </div>
                        </div>
                            <button type="button" id="addRow" class="btn btn-primary btn-block btn-sm">Add Row</button>
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
    $('#mereks').val('<?= $edit['merk_id'] ?>').trigger('change')
    $('#kategoris').val('<?= $edit['kategori_id'] ?>').trigger('change')
    $('#divisi').val('<?= $edit['divisi_id'] ?>').trigger('change')
    $('#sub_divisis').val('<?= $edit['subdivisi_id'] ?>').trigger('change')
    $('#genders').val('<?= $edit['gender_id'] ?>').trigger('change')

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

$('#addRow').on('click',function(e){
    e.preventDefault();
        var kategori = $('#kategoris').val()
        var merek = $('#mereks').val()
        axios.post('inc/gudang/ukuran.php',{
            'id_merek': merek,
            'id_kategori': kategori
        }).then(function(res){
            $('[name ="ukuran[]"]').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    var html_row = "<div class='row'>" + 
                    "<div class='col-md-4'>" + 
                        "<label>Barcode</label>" + 
                        "<input type='text' class='form-control' name='barcode[]'>" + 
                    "</div>" +
                    "<div class='col-md-4'>" + 
                        "<label>Ukuran</label><br>" + 
                        "<select name='ukuran[]' class='form-control select2'></select>" + 
                    "</div>" +
                    "<div class='col-md-4'>" + 
                        "<label>Jumlah</label>" + 
                        "<input type='text' class='form-control' name='jumlah[]'>" + 
                    "</div>" + 
                "</div>";
    $('#formInput').append(html_row)
    $('.select2').select2({dropdownAutoWidth : true});   
b })

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
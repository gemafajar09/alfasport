<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="text-left">
                <a href="stok_barang_gudang.html" class="btn btn-info btn-round"><i class="fa fa-arrow-circle-left"></i></a>
            </div>
            <div class="text-center">
                Entry Stok Gudang
            </div> 
        </div>
        <form action="?page=inc/gudang/simpan_stok" method="POST">
            <div class="card-body">
                <div class="col-md-12 mx-auto py-4">
                    <div class="card">
                        <div class="card-header">
                            Masukan Ukuran <i><marquee>Tetapkan Jumlah Kolum Ukuran/ Size Yang Akan Ditambahakan.</marquee></i>
                        </div>
                        <?php
                            $no = 1;
                            $no1 = 1;
                        ?>
                        <div class="card-body" id="formInput">
                            <div class="row">
                                    <input name="id" type="hidden" value="<?= $_GET['id'] ?>" class="form-control">
                                <div class="col-md-3">
                                    <label>Artikel</label><br>
                                    <input name="artikel[]" value="<?= $_GET['artikel'] ?>" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Barcode</label><br>
                                    <input name="barcode[]" value="" class="form-control">
                                </div>
                                <div class="col-md-3">
                                    <label>Ukuran</label><br>
                                    <select name="ukuran[]" class="form-control select2">
                                        <option value="">-PILIH-</option>
                                        <?php
                                        $data = $con->query("SELECT * FROM tb_all_ukuran WHERE id_merek='$_GET[merek]' AND id_kategori='$_GET[kategori]'")->fetchAll();
                                        foreach($data as $a){
                                        ?>
                                        <option value="<?= $a['id_ukuran'] ?>"><?= $a['ue'] ?></option>
                                        <?php } ?>
                                    </select>
                                    </div>
                                <div class="col-md-3">
                                    <label>Jumlah</label>
                                    <input type="text" class="form-control" name="jumlah[]">
                                    <!-- <input type="text" name="id_ukuran[]"> -->
                                </div>
                            </div>
                        </div>
                        <button type="button" id="addRow" class="btn btn-primary btn-block btn-sm">Add Row</button>
                        <button type="submit" name="simpan" class="btn btn-success btn-block btn-sm">Simpan</button>
                    </div> 
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    $('#addRow').on('click',function(e){
    e.preventDefault();
        var kategori = '<?= $_GET['kategori'] ?>'
        var merek = '<?= $_GET['merek'] ?>'  
        var html_row = "<div class='row'>" + 
                        "<div class='col-md-3'>" + 
                            "<label>Artikel</label>" + 
                            "<input type='text' value='<?= $_GET['artikel'] ?>' class='form-control' name='artikel[]'>" + 
                        "</div>" +
                        "<div class='col-md-3'>" + 
                            "<label>Barcode</label>" + 
                            "<input type='text' class='form-control' name='barcode[]'>" + 
                        "</div>" +
                        "<div class='col-md-3'>" + 
                            "<label>Ukuran</label><br>" + 
                            "<select name='ukuran[]' class='form-control select2'></select>" + 
                        "</div>" +
                        "<div class='col-md-3'>" + 
                            "<label>Jumlah</label>" + 
                            "<input type='text' class='form-control' name='jumlah[]'>" + 
                        "</div>" + 
                    "</div>";
        
        axios.post('inc/gudang/ukuran.php',{
            'id_merek': merek,
            'id_kategori': kategori
        }).then(function(res){
            $('[name ="ukuran[]"]').html(res.data)
        }).catch(function(err){
            console.log(err)
        })
    $('#formInput').append(html_row)
    $('.select2').select2({dropdownAutoWidth : true});   
})

</script>
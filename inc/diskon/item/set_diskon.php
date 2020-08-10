<div class="page-title">
    <div class="title_left">
        <h3>Buat Diskon</h3>
    </div>
</div>

<form action="" method="POST">
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <div class="alert alert-success">
                        <input type="checkbox" id="all"> All
                        <table>
                            <tr>
                                <td>
                                    <div class="form-inline">
                                        <label>Tanggal Mulai</label>
                                        <input type="date" id="mulai1" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-inline">
                                        <label>Tanggal Berakhir</label>
                                        <input type="date" id="habis1" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-inline">
                                        <label>Diskon Rp</label>&nbsp;
                                        <input type="text" id="rp1" style="width: 120px;" class="form-control">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-inline">
                                        <label>Diskon %</label>
                                        <input type="text" id="persen1" style="width: 80px;" class="form-control">
                                        <button type="button" id="setDiskon" class="btn btn-primary">Set</button>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-md-6">
                    <ul class="nav navbar-right panel_toolbox">
                        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                        </li>
                        <li><a class="close-link"><i class="fa fa-close"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-striped" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>Merek</th>
                        <th>Harga Jual</th>
                        <th>Ue</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Diskon Rp</th>
                        <th>Diskon %</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($_POST['id_item'] as $i => $data){
                        $a = $con->query("
                        SELECT 
                        a.id_detail,
                        b.jual, 
                        b.artikel ,
                        b.nama,
                        c.ue,
                        d.merk_nama
                        FROM tb_gudang_Detail a 
                        LEFT JOIN tb_gudang b ON a.id=b.id 
                        LEFT JOIN tb_all_ukuran c ON c.id_ukuran=a.id_ukuran
                        LEFT JOIN tb_merk d ON b.id_merek=d.merk_id
                        WHERE a.id_detail = '$data'
                        ")->fetch();
                        $jual = 'Rp'.number_format($a['jual']);
                    ?>
                    <tr>
                        <td><?= $a['artikel'] ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['merk_nama'] ?></td>
                        <td><?= $jual ?></td>
                        <td><?= $a['ue'] ?></td>
                        <th>
                            <input type="hidden" name="id[]" value="<?= $a['id_detail'] ?>" class="form-control">
                            <input type="date" name="mulai[]" class="form-control">
                        </th>
                        <th>
                            <input type="date" name="habis[]" class="form-control">
                        </th>
                        <th>
                            <input type="text" name="rp[]" class="form-control">
                        </th>
                        <th>
                            <input type="text" name="persen[]" class="form-control">
                        </th>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            
            <div align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>

<script>
    $(function() {
        $('.check_all').click(function() {
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });

    $('#setDiskon').on('click',function(){
        var mulai = $('#mulai1').val()
        var habis = $('#habis1').val()
        var rp = $('#rp1').val()
        var persen = $('#persen1').val()
        var all = document.getElementById('all').checked
        if(all)
        {
            $('[name="mulai"]').val(mulai)
            $('[name="habis"]').val(habis)
            $('[name="rp"]').val(rp)
            $('[name="persen"]').val(persen)
        }else{
            
        }
    })
</script>
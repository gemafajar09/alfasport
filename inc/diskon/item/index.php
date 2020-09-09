<div class="page-title">
    <div class="title_left">
        <h3>Data Diskon Per Item</h3>
    </div>

    <div class="title_right">
        <div class="col-md-12 col-sm-12 form-group pull-right top_search">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Merek</label>
                        <select name="merek" id="merek" class="form-control select2">
                            <option value="">-Merek-</option>
                            <?php
                            $merek = $con->select('tb_merk', '*');
                            foreach ($merek as $merk) {
                            ?>
                                <option value="<?= $merk['merk_id'] ?>"><?= $merk['merk_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Ketegori</label>
                        <select name="kategori" id="kategori" class="form-control select2">
                            <option value="">-Kategori-</option>
                            <?php
                            $kategori = $con->select('tb_kategori', '*');
                            foreach ($kategori as $kategori) {
                            ?>
                                <option value="<?= $kategori['kategori_id'] ?>"><?= $kategori['kategori_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Divisi</label>
                        <select name="divisi" id="divisi" class="form-control select2">
                            <option value="">-Divisi-</option>
                            <?php
                            $divisi = $con->select('tb_divisi', '*');
                            foreach ($divisi as $divisi) {
                            ?>
                                <option value="<?= $divisi['divisi_id'] ?>"><?= $divisi['divisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Sub Divisi</label>
                        <select name="tokos" id="tokos" class="form-control select2">
                            <option value="">-Sub Divisi-</option>
                            <?php
                            $subdivisi = $con->select('tb_subdivisi', '*');
                            foreach ($subdivisi as $subdivisi) {
                            ?>
                                <option value="<?= $subdivisi['subdivisi_id'] ?>"><?= $subdivisi['subdivisi_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-2 col-lg-2">
                    <div class="form-group">
                        <label>Gender</label>
                        <select name="gender" id="gender" class="form-control select2">
                            <option value="">-Gender-</option>
                            <?php
                            $gender = $con->select('tb_gender', '*');
                            foreach ($gender as $gender) {
                            ?>
                                <option value="<?= $gender['gender_id'] ?>"><?= $gender['gender_nama'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-md-12 col-sm-12  ">
    <div class="x_panel">
        <div class="x_title">
            <h2><i class="fa fa-bars"></i> Diskon <small>Item</small></h2>
            <ul class="nav navbar-right panel_toolbox">
                <li>
                    <button type="button" onclick="setDiskon()" class="btn btn-danger btn-sm">Tambah Diskon</button>
                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">

            <ul class="nav nav-tabs bar_tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Akan Datang</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Sedang Berjalan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Telah Habis</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <!-- akan datang -->
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:60px">No</th>
                                <th>Nama Diskon</th>
                                <th>Mulai</th>
                                <th>Berakhir</th>
                                <th>Kategori</th>
                                <!-- <th class="text-center" style="width:140px">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tanggal = date('Y-m-d');
                            $data1 = $con->query("SELECT * FROM tb_flash_diskon WHERE tgl_mulai > NOW()")->fetchAll(PDO::FETCH_ASSOC);
                            foreach ($data1 as $i1 => $a1) :
                            ?>
                                <tr>
                                    <td><?= $i1 + 1 ?></td>
                                    <td><a style="color: blue; cursor:pointer" onclick="DetailDiskon('<?= $a1['id_diskon'] ?>')"><?= $a1['judul'] ?></a></td>
                                    <td><?= $a1['tgl_mulai'] ?></td>
                                    <td><?= $a1['tgl_berakhir'] ?></td>
                                    <td><?= $a1['kategori'] ?></td>
                                    <!-- <td></td> -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- sedang berjalan -->
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:60px">No</th>
                                <th>Nama Diskon</th>
                                <th>Mulai</th>
                                <th>Berakhir</th>
                                <th>Kategori</th>
                                <!-- <th class="text-center" style="width:140px">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tanggal = date('Y-m-d');
                            $data1 = $con->query("SELECT * FROM tb_flash_diskon WHERE tgl_mulai <= NOW() AND tgl_berakhir >= NOW()")->fetchAll();
                            foreach ($data1 as $i1 => $a1) :
                            ?>
                                <tr>
                                    <td><?= $i1 + 1 ?></td>
                                    <td><a style="color: blue; cursor:pointer" onclick="DetailDiskon('<?= $a1['id_diskon'] ?>')"><?= $a1['judul'] ?></a></td>
                                    <td><?= $a1['tgl_mulai'] ?></td>
                                    <td><?= $a1['tgl_berakhir'] ?></td>
                                    <td><?= $a1['kategori'] ?></td>
                                    <!-- <td></td> -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
                <!-- sudah berlalu -->
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:60px">No</th>
                                <th>Nama Diskon</th>
                                <th>Mulai</th>
                                <th>Berakhir</th>
                                <th>Kategori</th>
                                <!-- <th class="text-center" style="width:140px">Action</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $tanggal = date('Y-m-d');
                            $data1 = $con->query("SELECT * FROM tb_flash_diskon WHERE tgl_berakhir < NOW()")->fetchAll();
                            foreach ($data1 as $i1 => $a1) :
                            ?>
                                <tr>
                                    <td><?= $i1 + 1 ?></td>
                                    <td><a style="color: blue; cursor:pointer" onclick="DetailDiskon('<?= $a1['id_diskon'] ?>')"><?= $a1['judul'] ?></a></td>
                                    <td><?= $a1['tgl_mulai'] ?></td>
                                    <td><?= $a1['tgl_berakhir'] ?></td>
                                    <td><?= $a1['kategori'] ?></td>
                                    <!-- <td></td> -->
                                </tr>
                            <?php endforeach ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>

<div class="modal" id="detailDiskon">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-body">
                <h4>Detail Flash Diskon</h4>
                <hr>
                <div id="detail"></div>
            </div>
        </div>
    </div>
</div>

<div id="sets" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <div class="modal-content">
            <form action="simpans.html" method="POST">
                <div class="modal-body">
                    <h4 class="modal-title">Buat Diskon Promo Baru</h4>
                    <p>Isi rincian dan atur harga produk untuk membuat diskon promosi.</p>
                    <br>
                    <table class="table border-0">
                        <thead>
                            <tr>
                                <td colspan="2">Rincian Promosi</td>
                            </tr>
                            <tr>
                                <td>Nama Promosi</td>
                                <td><input type="text" class="form-control" name="nama_promosi" style="width: 500px;"></td>
                            </tr>
                            <tr>
                                <td>Kategori</td>
                                <td>
                                    <select name="kategori" style="width:320px" class="select2" id="">
                                        <option value="">-SET KATEGORI-</option>
                                        <option value="All">All</option>
                                        <option value="Ritel">Ritel</option>
                                        <option value="Online">Online</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Masa Promosi</td>
                                <td>
                                    <div class="form-inline">
                                        <input type="datetime-local" id="datetimepicker1" name="mulai" class="form-control">
                                        <input type="datetime-local" id="datetimepicker2" name="selesai" class="form-control">
                                    </div>
                                </td>
                            </tr>
                        </thead>
                    </table>
                    <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
                        <thead>
                            <tr>
                                <th>
                                    <input type="checkbox" class="chk_boxes1" id="checkAll">
                                </th>
                                <th>Produk</th>
                                <th>Harga</th>
                                <th style="width: 50px;">Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $data = $con->query("SELECT tb_gudang.*, (SELECT SUM(jumlah) FROM tb_gudang_detail WHERE id = tb_gudang.id) as stok FROM tb_gudang")->fetchAll();
                            foreach ($data as $a) {
                            ?>
                                <tr>
                                    <td>
                                        <input type="checkbox" class="chk_boxes1" name="id_item[]" value="<?= $a['id'] ?>">
                                    </td>
                                    <td>
                                        <div class="form-inline">
                                            <img src="<?= $a['thumbnail'] ?>" style="width:40px" alt="">
                                            <?= $a['nama'] ?>
                                        </div>
                                    </td>
                                    <td>Rp.<?= number_format($a['jual']) ?></td>
                                    <td><?= $a['stok'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                    <div align="right">
                        <button type="submit" name="simpan" class="btn btn-primary">Lanjutkan</button>
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
    $('#checkAll').click(function(e) {
        e.preventDefault()
        $('.chk_boxes1').prop('checked', this.checked);
    });

    function setDiskon() {
        $('#sets').modal()
    }

    function DetailDiskon(id) {
        axios.post('inc/diskon/item/show_detail.php', {
            'id_diskon': id
        }).then(function(res) {
            var data = res.data
            $('#detail').html(data)
            $('#detailDiskon').modal()
        }).catch(function(err) {
            console.log(err)
        })
    }
</script>
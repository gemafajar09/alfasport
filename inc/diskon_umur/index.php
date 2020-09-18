<div class="page-title">
    <div class="title_left">
        <h3>Data Diskon Per Umur Barang</h3>
    </div>

    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
            //
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <button type="button" onclick="tampil()" class="btn btn-success btn-round"><i class="fa fa-plus"></i></button>
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
    <div class="x_content table-responsive">
        <table class="table table-striped" id="datatable-responsive">
            <thead>
                <tr>
                    <th style="width:60px">No</th>
                    <th>Umur</th>
                    <th>Diskon</th>
                    <th class="text-center" style="width:140px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $data = $con->query("SELECT * FROM tb_diskon_umur")->fetchAll();
                    foreach($data as $i => $a):
                        $bulan = $a['umur'] / 30;
                ?>
                <tr>
                    <td><?= $i+1 ?></td>
                    <td><?= $bulan ?>&nbsp;Bulan</td>
                    <td><?= $a['diskon'] ?></td>
                    <td class="text-center">
                        <button type="button" onclick="edit('<?= $a['id_umur'] ?>')" class="btn btn-warning"><i class="fa fa-edit"></i></button>
                    </td>
                </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<!-- The Modal -->
<div class="modal" id="umurDiskon">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Set Diskon Umur</h4>
            </div>
            <form action="simpanDiskonUmur.html" method="POST">
                <div class="modal-body">
                    <div class="container">
                        <div class="row" style="font-size:12px">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="number" name="umur" id="umur" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Diskon</label>
                                    <input type="text" name="diskon" id="diskon" required="required" placeholder="Diskon" class="form-control">
                                    <input type="hidden" name="id_umur" id="id_umur">
                                </div>
                                <div align="right">
                                    <button type="submit" name="simpan" class="btn btn-primary btn-sm">Simpan</button>
                                    <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
    function tampil()
    {
        $('#umurDiskon').modal()
    }

    function edit(id)
    {
        axios.post('inc/diskon_umur/ambilData.php',{
            'id_umur':id
        }).then(function(res){
            var data = res.data
            $('#umur').val(data.umur).trigger('change');
            $('#diskon').val(data.diskon)
            $('#id_umur').val(data.id_umur)
            $('#umurDiskon').modal()
        }).catch(function(err){
            console.log(err)
        })
    }
</script>
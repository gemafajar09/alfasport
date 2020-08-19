<?php


if (isset($_POST['update'])) {

    $id_detail = $_POST['id_detail'];

    $tgl = date('Y-m-d H:i:s');

    foreach ($id_detail as $i => $id) {
        $jumlah = $_POST['jumlah'][$i];
        $jumlah_restock = $_POST['jumlah_restock'][$i];
        $artikel = $_POST['artikel'][$i];

        $con->insert(
            "tb_restock",
            array(
                "id_detail" => $id,
                "id" => $artikel,
                "restock_tgl" => $tgl,
                "restock_jumlah_awal" => $jumlah,
                "restock_jumlah_tambah" => $jumlah_restock,
            )
        );

        $con->update(
            'tb_gudang_detail',
            array('jumlah' => $jumlah + $jumlah_restock),
            array('id_detail' => $id)
        );
    }

    echo "
    <script>
    window.location='restock_barang_gudang.html';
    </script>
    ";
    exit;
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>Restock Barang</h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5   form-group pull-right top_search">
        </div>
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
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

        <form method="POST">

            <?php
            $ambil = $con->query("SELECT * FROM tb_gudang_detail 
                    WHERE id_detail IN (" . implode(",", $_POST['id_detail']) . ")
                    ")->fetchAll();

            foreach ($ambil as $i => $data) {
            ?>
                <div class="row" style="font-size:12px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" name="artikel[]" id="artikel" value="<?php echo $data['id'] ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="text" name="jumlah[]" id="jumlah" value="<?php echo $data['jumlah'] ?>" required="required" placeholder="Diskon" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Restock Barang</label>
                            <input type="number" name="jumlah_restock[]" id="jumlah_restock" required="required" placeholder="" class="form-control">
                            <input type="hidden" name="id_detail[]" value="<?php echo $data['id_detail'] ?>">
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
            <button class="btn btn-primary" type="submit" name="update">SIMPAN</button>
        </form>
    </div>
</div>
<?php

if (isset($_POST['update'])) {

    $id_detail = $_POST['barang_detail_id'];

    $tgl = date('Y-m-d H:i:s');

    foreach ($id_detail as $i => $id) {
        $jumlah = $_POST['jumlah'][$i];
        $jumlah_restock = $_POST['jumlah_restock'][$i];
        $barang_kode = $_POST['barang_kode'][$i];

        $con->insert(
            "tb_barang_restock",
            array(
                "barang_detail_id" => $id,
                "barang_kode" => $barang_kode,
                "barang_restock_tgl" => $tgl,
                "barang_restock_jml_awal" => $jumlah,
                "barang_restock_jml_tambah" => $jumlah_restock,
            )
        );

        $con->update(
            'tb_barang_detail',
            array('barang_detail_jml' => $jumlah + $jumlah_restock),
            array('barang_detail_id' => $id)
        );
    }

    echo "
    <script>
    window.location='restock_kaos_kaki.html';
    </script>
    ";
    exit;
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>
            Restock Barang Gudang Sepatu
        </h3>
    </div>
    <div class="title_right">
        <div class="col-md-5 col-sm-5 form-group pull-right top_search">
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

            $ambil = $con->query("SELECT
                                    tb_barang.barang_kode,
                                    tb_barang.barang_artikel,
                                    tb_barang.barang_nama,
                                    tb_ukuran.kaos_kaki_eu,
                                    tb_ukuran.kaos_kaki_size,
                                    tb_barang_detail.barang_detail_jml,
                                    tb_barang_detail.barang_detail_id
                                From
                                    tb_barang Inner Join
                                    tb_barang_detail On tb_barang_detail.barang_id =
                                            tb_barang.barang_id Inner Join
                                    tb_ukuran On tb_ukuran.ukuran_id =
                                    tb_barang_detail.ukuran_id 
                                WHERE tb_barang_detail.barang_detail_id IN (" . implode(",", $_POST['barang_detail_id']) . ")")->fetchAll();

            foreach ($ambil as $i => $data) {
            ?>
                <div class="row" style="font-size:12px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" value="<?php echo $data['barang_kode'] . " - " . $data['barang_nama'] . " - " . "(" . $data['kaos_kaki_eu'] . "/" . $data['kaos_kaki_size'] . ")" ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                            <input type="hidden" name="barang_kode[]" id="barang_kode" value="<?php echo $data['barang_kode'] ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="text" name="jumlah[]" id="jumlah" value="<?php echo $data['barang_detail_jml'] ?>" required="required" placeholder="Diskon" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Restock Barang</label>
                            <input type="number" name="jumlah_restock[]" id="jumlah_restock" required="required" placeholder="" class="form-control">
                            <input type="hidden" name="barang_detail_id[]" value="<?php echo $data['barang_detail_id'] ?>">
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
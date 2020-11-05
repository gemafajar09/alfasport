<?php

if (isset($_POST['update'])) {

    $id_detail = $_POST['gudang_lainnya_detail_id'];

    $tgl = date('Y-m-d H:i:s');

    foreach ($id_detail as $i => $id) {
        $jumlah = $_POST['jumlah'][$i];
        $jumlah_restock = $_POST['jumlah_restock'][$i];
        $gudang_lainnya_kode = $_POST['gudang_lainnya_kode'][$i];

        $con->insert(
            "tb_restock_lainnya",
            array(
                "gudang_lainnya_detail_id" => $id,
                "gudang_lainnya_kode" => $gudang_lainnya_kode,
                "restock_lainnya_tgl" => $tgl,
                "restock_lainnya_jml_awal" => $jumlah,
                "restock_lainnya_jml_tambah" => $jumlah_restock,
            )
        );

        $con->update(
            'tb_gudang_lainnya_detail',
            array('gudang_lainnya_detail_jumlah' => $jumlah + $jumlah_restock),
            array('gudang_lainnya_detail_id' => $id)
        );
    }

    echo "
    <script>
    window.location='restock_barang_gudang_lainnya.html';
    </script>
    ";
    exit;
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>Restock Barang Kaos Kaki</h3>
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
            $ambil = $con->query("SELECT
                                    tb_gudang_lainnya.gudang_lainnya_kode,
                                    tb_gudang_lainnya.gudang_lainnya_artikel,
                                    tb_gudang_lainnya.gudang_lainnya_nama,
                                    tb_ukuran_barang_detail.ukuran_barang_detail_nama,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_jumlah,
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_id
                                FROM
                                    tb_gudang_lainnya
                                INNER JOIN tb_gudang_lainnya_detail ON tb_gudang_lainnya_detail.gudang_lainnya_kode = tb_gudang_lainnya.gudang_lainnya_kode
                                INNER JOIN tb_ukuran_barang_detail ON tb_ukuran_barang_detail.ukuran_barang_detail_id = tb_gudang_lainnya_detail.ukuran_barang_detail_id
                                WHERE
                                    tb_gudang_lainnya_detail.gudang_lainnya_detail_id IN (" . implode(",", $_POST['gudang_lainnya_detail_id']) . ")")->fetchAll();

            foreach ($ambil as $i => $data) {
            ?>
                <div class="row" style="font-size:12px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" value="<?php echo $data['gudang_lainnya_kode'] . " - " . $data['gudang_lainnya_nama'] . " - " . "(" . $data['ukuran_barang_detail_nama'] . ")" ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                            <input type="hidden" name="gudang_lainnya_kode[]" id="gudang_lainnya_kode" value="<?php echo $data['gudang_lainnya_kode'] ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="text" name="jumlah[]" id="jumlah" value="<?php echo $data['gudang_lainnya_detail_jumlah'] ?>" required="required" placeholder="Diskon" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Restock Barang</label>
                            <input type="number" name="jumlah_restock[]" id="jumlah_restock" required="required" placeholder="" class="form-control">
                            <input type="hidden" name="gudang_lainnya_detail_id[]" value="<?php echo $data['gudang_lainnya_detail_id'] ?>">
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
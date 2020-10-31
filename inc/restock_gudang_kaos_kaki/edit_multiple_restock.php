<?php

if (isset($_POST['update'])) {

    $id_detail = $_POST['gudang_kaos_kaki_detail_id'];

    $tgl = date('Y-m-d H:i:s');

    foreach ($id_detail as $i => $id) {
        $jumlah = $_POST['jumlah'][$i];
        $jumlah_restock = $_POST['jumlah_restock'][$i];
        $gudang_kaos_kaki_kode = $_POST['gudang_kaos_kaki_kode'][$i];

        $con->insert(
            "tb_restock_kaos_kaki",
            array(
                "gudang_kaos_kaki_detail_id" => $id,
                "gudang_kaos_kaki_kode" => $gudang_kaos_kaki_kode,
                "restock_kaos_kaki_tgl" => $tgl,
                "restock_kaos_kaki_jml_awal" => $jumlah,
                "restock_kaos_kaki_jml_tambah" => $jumlah_restock,
            )
        );

        $con->update(
            'tb_gudang_kaos_kaki_detail',
            array('gudang_kaos_kaki_detail_jumlah' => $jumlah + $jumlah_restock),
            array('gudang_kaos_kaki_detail_id' => $id)
        );
    }

    echo "
    <script>
    window.location='restock_barang_gudang_kaos_kaki.html';
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
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_kode,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_artikel,
                                    tb_gudang_kaos_kaki.gudang_kaos_kaki_nama,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_ue,
                                    tb_ukuran_kaos_kaki.ukuran_kaos_kaki_size,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_jumlah,
                                    tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id
                                From
                                    tb_gudang_kaos_kaki Inner Join
                                    tb_gudang_kaos_kaki_detail On tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_kode =
                                            tb_gudang_kaos_kaki.gudang_kaos_kaki_kode Inner Join
                                    tb_ukuran_kaos_kaki On tb_ukuran_kaos_kaki.ukuran_kaos_kaki_id =
                                    tb_gudang_kaos_kaki_detail.ukuran_kaos_kaki_id 
                                WHERE tb_gudang_kaos_kaki_detail.gudang_kaos_kaki_detail_id IN (" . implode(",", $_POST['gudang_kaos_kaki_detail_id']) . ")")->fetchAll();

            foreach ($ambil as $i => $data) {
            ?>
                <div class="row" style="font-size:12px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Artikel</label>
                            <input type="text" value="<?php echo $data['gudang_kaos_kaki_kode'] . " - " . $data['gudang_kaos_kaki_nama'] . " - " . "(" . $data['ukuran_kaos_kaki_ue'] . "/" . $data['ukuran_kaos_kaki_size'] . ")" ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                            <input type="hidden" name="gudang_kaos_kaki_kode[]" id="gudang_kaos_kaki_kode" value="<?php echo $data['gudang_kaos_kaki_kode'] ?>" required="required" placeholder="Nama Artikel" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Stok Awal</label>
                            <input type="text" name="jumlah[]" id="jumlah" value="<?php echo $data['gudang_kaos_kaki_detail_jumlah'] ?>" required="required" placeholder="Diskon" readonly class="form-control">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Restock Barang</label>
                            <input type="number" name="jumlah_restock[]" id="jumlah_restock" required="required" placeholder="" class="form-control">
                            <input type="hidden" name="gudang_kaos_kaki_detail_id[]" value="<?php echo $data['gudang_kaos_kaki_detail_id'] ?>">
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
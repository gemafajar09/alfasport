<?php


if (isset($_POST['update'])) {

    $id_diskon = $_POST['idDiskon'];
    $id_metode = $_POST['idMetode'];

    foreach ($id_diskon as $i => $id) {
        $diskon = $_POST['diskon'][$i];
        $con->update(
            'tb_diskon',
            array('diskon' => $diskon),
            array('id_diskon' => $id)
        );
    }

    echo "
    <script>
    window.location='detail-data-diskon-" . $id_metode[0] . ".html';
    </script>
    ";
    exit;
}
?>
<div class="page-title">
    <div class="title_left">
        <h3>Edit Diskon</h3>
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
                    tb_diskon.id_diskon,
                    tb_diskon.id_metode, 
                    tb_bank.bank, 
                    tb_diskon.diskon    
                    FROM tb_diskon 
                    JOIN tb_bank ON tb_diskon.id_bank = tb_bank.id_bank
                    WHERE id_diskon IN (" . implode(",", $_POST['id_diskon']) . ")
                    ")->fetchAll();

            foreach ($ambil as $i => $data) {
            ?>
                <div class="row" style="font-size:12px">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nama Bank</label>
                            <input type="text" name="bank" id="bank" value="<?php echo $data['bank'] ?>" required="required" placeholder="Nama Bank" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="text" name="diskon[]" id="diskon" value="<?php echo $data['diskon'] ?>" required="required" placeholder="Diskon" class="form-control">
                            <span style="color: red;">*Dalam % (persen)</span>
                            <input type="hidden" name="idDiskon[]" value="<?php echo $data['id_diskon'] ?>">
                            <input type="hidden" name="idMetode[]" value="<?php echo $data['id_metode'] ?>">
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
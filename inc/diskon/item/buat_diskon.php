<div class="page-title">
    <div class="title_left">
        <h3>Buat Diskon</h3>
    </div>
</div>

<form action="item_diskon_set.html" method="POST">
    <div class="x_panel">
        <div class="x_title">
            <div class="row">
                <div class="col-md-6">
                    <button type="submit" name="set" class="btn btn-primary">Set Diskon</button>
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
            <table class="table table-striped" id="datatable-responsive" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>
                            <input type="checkbox" class="check_all" id="checkAll">
                        </th>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>Merek</th>
                        <th>Harga Modal</th>
                        <th>Harga Jual</th>
                        <th>UE</th>
                        <th>UK</th>
                        <th>US</th>
                        <th>CM</th>
                        <th>Umur Barang</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $data = $con->query("
                    SELECT a.barang_id,
                        a.barang_artikel,
                        a.barang_nama,
                        a.barang_modal,
                        a.barang_jual,
                        a.barang_tgl,
                        b.merk_nama,
                        c.gender_nama,
                        d.kategori_nama,
                        e.divisi_nama,
                        f.subdivisi_nama,
                        g.barang_detail_id,
                        h.sepatu_ue,
                        h.sepatu_us,
                        h.sepatu_uk,
                        h.sepatu_cm
                    FROM   tb_barang a
                        JOIN tb_merk b
                            ON a.merk_id = b.merk_id
                        JOIN tb_gender c
                            ON a.gender_id = c.gender_id
                        JOIN tb_kategori d
                            ON a.kategori_id = d.kategori_id
                        JOIN tb_divisi e
                            ON a.divisi_id = e.divisi_id
                        JOIN tb_subdivisi f
                            ON a.subdivisi_id = f.subdivisi_id
                        JOIN tb_barang_detail g
                            ON a.barang_id = g.barang_id
                        JOIN tb_ukuran h
                            ON h.ukuran_id = g.ukuran_id
                    ")->fetchAll();
                    foreach ($data as $i => $a) {
                        $modal = 'Rp' . number_format($a['barang_modal']);
                        $jual = 'Rp' . number_format($a['barang_jual']);
                        $awal  = date_create($a['barang_tgl']);
                        $akhir = date_create();
                        $diff  = date_diff($awal, $akhir);
                    ?>
                        <tr>
                            <td>
                                <input type="checkbox" class="chk_boxes1" name="id_item[]" value="<?= $a['id_detail'] ?>">
                            </td>
                            <td><?= $a['barang_artikel'] ?></td>
                            <td><?= $a['barang_nama'] ?></td>
                            <td><?= $a['merk_nama'] ?></td>
                            <td><?= $modal ?></td>
                            <td><?= $jual ?></td>
                            <td><?= $a['sepatu_ue'] ?></td>
                            <td><?= $a['sepatu_uk'] ?></td>
                            <td><?= $a['sepatu_us'] ?></td>
                            <td><?= $a['sepatu_cm'] ?></td>
                            <td>
                                <?php
                                if ($diff->y == 0 && $diff->m == 0) {
                                    echo $diff->d . ' hari';
                                } elseif ($diff->y == 0 && $diff->m != 0) {
                                    echo $diff->m . ' bulan, ' . $diff->d . ' hari';
                                } else if ($diff->y != 0) {
                                    echo $diff->y . ' tahun, ' . $diff->m . ' bulan, ' . $diff->d . ' hari';
                                }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script>
    $(function() {
        $('.check_all').click(function() {
            $('.chk_boxes1').prop('checked', this.checked);
        });
    });
</script>
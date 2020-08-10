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
                    SELECT a.id,
                        a.artikel,
                        a.nama,
                        a.id_gudang,
                        a.modal,
                        a.jual,
                        a.tanggal,
                        b.merk_nama,
                        c.gender_nama,
                        d.kategori_nama,
                        e.divisi_nama,
                        f.subdivisi_nama,
                        g.id_detail,
                        h.ue,
                        h.uk,
                        h.us,
                        h.cm
                    FROM tb_gudang a
                    JOIN tb_merk b ON a.id_merek=b.merk_id
                    JOIN tb_gender c ON a.id_gender=c.gender_id
                    JOIN tb_kategori d ON a.id_kategori=d.kategori_id
                    JOIN tb_divisi e ON a.id_divisi=e.divisi_id
                    JOIN tb_subdivisi f ON a.id_sub_divisi=f.subdivisi_id
                    JOIN tb_gudang_detail g ON a.id=g.id
                    JOIN tb_all_ukuran h ON h.id_ukuran=g.id_ukuran
                    ")->fetchAll();
                    foreach($data as $i => $a){
                        $modal = 'Rp'.number_format($a['modal']);
                        $jual = 'Rp'.number_format($a['jual']);
                        $awal  = date_create($a['tanggal']);
                        $akhir = date_create();
                        $diff  = date_diff($awal, $akhir);
                    ?>
                    <tr>
                        <td>
                            <input type="checkbox" class="chk_boxes1" name="id_item[]" value="<?= $a['id_detail'] ?>">
                        </td>
                        <td><?= $a['artikel'] ?></td>
                        <td><?= $a['nama'] ?></td>
                        <td><?= $a['merk_nama'] ?></td>
                        <td><?= $modal ?></td>
                        <td><?= $jual ?></td>
                        <td><?= $a['ue'] ?></td>
                        <td><?= $a['uk'] ?></td>
                        <td><?= $a['us'] ?></td>
                        <td><?= $a['cm'] ?></td>
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
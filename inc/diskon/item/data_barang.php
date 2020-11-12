<?php
include "../../../config/koneksi.php";
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
foreach($data as $i => $a){
    $modal = 'Rp'.number_format($a['barang_modal']);
    $jual = 'Rp'.number_format($a['barang_jual']);
    $awal  = date_create($a['barang_tgl']);
    $akhir = date_create();
    $diff  = date_diff($awal, $akhir);
?>
<tr>
    <td><?= $i+1 ?></td>
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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

<script>
    function detail<?= $a['barang_detail_id'] ?>(nilai,id)
    {
        var diskon = nilai.value 
        var id_detail = id
        console.log(id_detail)
        axios.post('inc/diskon/item/edit_diskon.php',{
            'diskon':diskon,
            'id_detail':id_detail
        }).then(function(res){
            var data = res.data
            $('[name="diskon<?= $a['barang_detail_id'] ?>"]').val(data.diskon)
        })
    }

    function mulai(habis,id)
    {
        let tanggal_mulai = $('#mulai').val()
        let tanggal_berakhir = habis.value 
        let id = id 
        axios.post('',{
            'tanggal_mulai': tanggal_mulai,
            'tanggal_berakhir': tanggal_berakhir,
            'id': id
        }).then(function(res){

        }).catch(function(err){

        })
    }
</script>
<?php } ?>
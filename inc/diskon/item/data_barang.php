<?php
include "../../../config/koneksi.php";
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
    <td><?= $i+1 ?></td>
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
    <td></td>
    <td></td>
    <td></td>
    <td></td>
</tr>

<script>
    function detail<?= $a['id_detail'] ?>(nilai,id)
    {
        var diskon = nilai.value 
        var id_detail = id
        console.log(id_detail)
        axios.post('inc/diskon/item/edit_diskon.php',{
            'diskon':diskon,
            'id_detail':id_detail
        }).then(function(res){
            var data = res.data
            $('[name="diskon<?= $a['id_detail'] ?>"]').val(data.diskon)
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
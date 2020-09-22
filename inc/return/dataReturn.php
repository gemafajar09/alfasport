<?php
include "../../config/koneksi.php";
$tanggal = date('Y-m-d');
$data = $con->query("
SELECT 
* 
FROM tb_return a 
LEFT JOIN tb_detail_return b 
ON a.id_return=b.id_return 
LEFT JOIN tb_stok_toko c
ON b.id_stok_toko=c.id_stok_toko
LEFT JOIN tb_gudang_detail d 
ON d.id_detail=c.id_gudang
LEFT JOIN tb_gudang e
ON e.id=d.id
LEFT JOIN tb_all_ukuran f
ON f.id_ukuran=d.id_ukuran
WHERE a.tanggal LIKE '%$tanggal%'
")->fetchAll(PDO::FETCH_ASSOC);
foreach($data as $i => $a):
?>
<tr>
    <td><?= $i+1 ?></td>
    <td><?= $a['artikel'] ?></td>
    <td><?= $a['ue'] ?>/<?= $a['uk'] ?>/<?= $a['us'] ?>/<?= $a['cm'] ?></td>
    <td><?= $a['stok_awal'] ?></td>
    <td><?= $a['penyesuaian'] ?></td>
    <td><?= $a['stok_akhir'] ?></td>
    <td class="text-center">
        <button type="button" onclick="hapusData('<?= $a['id_detail_return'] ?>')" class="btn btn-outline-danger btn-round"><i class="fa fa-trash"></i></button>
    </td>
</tr>
<?php endforeach; ?>
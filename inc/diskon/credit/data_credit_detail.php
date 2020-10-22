<?php
include "../../../config/koneksi.php";
$data = $con->query("
                    SELECT 
                    tb_diskon.id_diskon, 
                    tb_metode.kategori, 
                    tb_bank.bank, 
                    tb_diskon.diskon ,
                    tb_diskon.tanggal_mulai, 
                    tb_diskon.tanggal_habis
                    FROM 
                    tb_diskon
                    JOIN 
                    tb_metode ON tb_metode.id_metode = tb_diskon.id_metode 
                    JOIN 
                    tb_bank ON tb_bank.id_bank = tb_diskon.id_bank 
                    WHERE 
                    tb_metode.id_metode = '$_GET[id_metode]' 
                    ")->fetchAll();

foreach ($data as $i => $a) {
?>
    <tr>
        <td>
            <input type="checkbox" class="chk_boxes1" name="id_diskon[]" value="<?= $a['id_diskon'] ?>" onchange="cekeditSekaligus()">
        </td>
        <td><?= $a['kategori'] ?></td>
        <td><?= $a['bank'] ?></td>
        <td><?= $a['diskon'] ?></td>
        <td><?= $a['tanggal_mulai'] ?></td>
        <td><?= $a['tanggal_habis'] ?></td>
        <td class="text-center">
            <button type="button" onclick="editDiskon('<?= $a['id_diskon'] ?>')" class="btn btn-warning btn-sm"><i class="fa fa-pencil"></i></button>
            <button type="button" onclick="hapus('<?= $a['id_diskon'] ?>')" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
        </td>
    </tr>
<?php } ?>
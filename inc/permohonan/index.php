<div class="page-title">
    <div class="title_left">
        <h3>Permohonan Transfer Barang</h3>
    </div>

    <div class="title_right">
    </div>
</div>

<div class="x_panel">
    <div class="x_title">
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-5" style="padding-left:26px">
                   
                </div>
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
       <div class="row">
        <?php
            $data = $con->query("SELECT 
            c.artikel,
            c.nama,
            a.tanggal,
            (SELECT nama_toko FROM toko WHERE id_toko= a.id_toko) as nama_toko, 
            (SELECT nama_toko FROM toko WHERE id_toko= a.id_toko_tujuan) as nama_toko_tujuan  
            FROM tb_transfer a 
            JOIN toko b 
            ON a.id_toko=b.id_toko
            JOIN tb_gudang c 
            ON a.id_gudang=c.id_gudang")->fetchAll();
            foreach($data as $a){
        ?>
           <div class="col-md-4">
               <div class="card">
                   <div class="card-header">
                       <p><i><?= $a['nama_toko'] ?></i></p>
                   </div>
                   <div class="card-body">
                       <div class="row">
                           <div class="col-md-6">
                               <i><?= $a['nama_toko_tujuan'] ?></i>
                           </div>
                           <div class="col-md-6">
                               <i><?= $a['nama_toko_tujuan'] ?></i>
                           </div>
                       </div>
                       <br>
                       <div align="right">
                           <button type="button" class="btn btn-primary btn-block btn-sm">View</button>
                       </div>
                   </div>
               </div>
           </div>
        <?php } ?>
       </div>
    </div>
</div>
<div class="page-title">
    <div class="title_left">
        <h3>Buat Diskon</h3>
    </div>
</div>

<form action="" method="POST">
    <div class="x_panel">
        <div class="x_title">
                <p><h3><?= $_POST['nama_promosi'] ?></h3></p>
                <p>Kategori Diskon : &nbsp;<i style="color:red"><?= $_POST['kategori'] ?></i></p>
                <p>Masa Belaku : <b><?= $_POST['mulai'] ?></b> - <b><?= $_POST['selesai'] ?></b></p>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <table class="table table-striped" style="font-size:11px;font: italic small-caps bold;">
                <thead>
                    <tr>
                        <th>Artikel</th>
                        <th>Nama</th>
                        <th>Merek</th>
                        <th>Harga Jual</th>
                        <th>Ue</th>
                    </tr>
                </thead>
            </table>
            
            <div align="right">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </div>
    </div>
</form>
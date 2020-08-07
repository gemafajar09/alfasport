<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="navbar nav_title" style="border: 0;">
            <a href="home.html" class="site_title"><img src="<?= $base_url ?>img/a4.png" style="width:50px" alt=""> <span>AlfaSport</span></a>
        </div>
        <div class="clearfix"></div>
        <br />
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section">
                <?php
                if ($_COOKIE['jabatan_id'] == 1) {
                ?>
                    <ul class="nav side-menu">
                        <li><a href="home.html"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a><i class="fa fa-database"></i> Master Data <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="data_toko.html">Data Toko</a></li>
                                <li><a href="data_karyawan.html">Data Karyawan</a></li>
                                <li><a href="data_jabatan.html">Data Jabatan</a></li>
                                <li><a href="data_umur_barang.html">Data Umur Barang</a></li>
                                <li><a href="data_member.html">Member</a></li>
                                <li><a href="point_member.html">Point Member</a></li>
                                <li><a href="data_supplier.html">Supplier</a></li>
                                <li><a href="data_distributor.html">Distributor</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-percent"></i> Event <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="credit.html">Diskon Debit / Kredit</a></li>
                                <li><a href="item.html">Diskon Item</a></li>
                                <li><a href="voucher.html">Diskon Voucher</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-archive"></i> Master Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="data_satuan.html">Satuan</a></li>
                                <li><a href="ukuran.html">Ukuran</a></li>
                                <li><a href="data_kategori.html">Kategori</a></li>
                                <li><a href="data_divisi.html">Divisi</a></li>
                                <li><a href="data_subdivisi.html">Sub Divisi</a></li>
                                <li><a href="data_gender.html">Gender</a></li>
                                <li><a href="data_merk.html">Merk</a></li>
                                <!-- <li><a href="data_detail_ukuran.html">Detail Ukuran</a></li> -->
                            </ul>
                        </li>
                        <li><a><i class="fa fa-cube"></i> Stok Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="stok_barang_gudang.html">Barang Gudang</a></li>
                                <li><a href="stok_barang_toko.html">Barang Toko</a></li>
                                <li><a href="penyesuaian_stok.html">Penyesuaian Barang</a></li>
                                <li><a href="cari_barang.html">Searching Barang</a></li>
                            </ul>
                        </li>
                        <!-- hitung jumlah permohonan -->
                        <?php
                        $acc = $con->query("SELECT COUNT(id_transfer) AS jumlah FROM tb_transfer WHERE acc_owner = 0")->fetch();
                        $terima = $con->query("SELECT COUNT(id_transfer) AS jumlah FROM tb_transfer WHERE acc_owner = 1 AND id_toko_tujuan='$_COOKIE[id_toko]'")->fetch();
                        ?>
                        <!-- tutup -->
                        <li><a><i class="fa fa-cubes"></i> Transfer Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="transfer.html">Transfer</a></li>
                                <li><a href="terima_transfer.html">Terima&nbsp;<span class="badge badge-info"><?= $terima['jumlah'] ?></span></a></li>
                                <li><a href="permohonan.html">Permohonan Transfer&nbsp;<span class="badge badge-info"><?= $acc['jumlah'] ?></span></a></li>
                            </ul>
                        </li>
                        <li><a href="pembelian.html"><i class="fa fa-shopping-bag "></i> Pembelian</a></li>
                        <li><a href="penjualan.html"><i class="fa fa-shopping-cart "></i> Penjualan</a></li>
                    </ul>
                <?php
                } elseif ($_COOKIE['jabatan_id'] == 2) {
                ?>
                    <ul class="nav side-menu">
                        <li><a href="home.html"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a><i class="fa fa-cube"></i> Stok Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="stok_barang_gudang.html">Barang Gudang</a></li>
                                <li><a href="stok_barang_toko.html">Barang Toko</a></li>
                                <li><a href="penyesuaian_stok.html">Penyesuaian Barang</a></li>
                            </ul>
                        </li>
                        <li><a><i class="fa fa-cubes"></i> Transfer Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="transfer.html">Transfer</a></li>
                                <li><a href="terima_transfer.html">Terima</a></li>
                            </ul>
                        </li>
                    </ul>
                <?php } elseif ($_COOKIE['jabatan_id'] == 3) {
                ?>
                    <ul class="nav side-menu">
                        <li><a href="home.html"><i class="fa fa-home"></i> Dashboard</a></li>
                        <li><a><i class="fa fa-archive"></i> Master Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="data_satuan.html">Satuan</a></li>
                                <li><a href="ukuran.html">Ukuran</a></li>
                                <li><a href="data_kategori.html">Kategori</a></li>
                                <li><a href="data_divisi.html">Divisi</a></li>
                                <li><a href="data_subdivisi.html">Sub Divisi</a></li>
                                <li><a href="data_gender.html">Gender</a></li>
                                <li><a href="data_merk.html">Merk</a></li>
                                <!-- <li><a href="data_detail_ukuran.html">Detail Ukuran</a></li> -->
                            </ul>
                        </li>
                        <li><a><i class="fa fa-cube"></i> Stok Barang <span class="fa fa-chevron-down"></span></a>
                            <ul class="nav child_menu">
                                <li><a href="stok_barang_gudang.html">Barang Gudang</a></li>
                                <li><a href="stok_barang_toko.html">Barang Toko</a></li>
                                <li><a href="penyesuaian_stok.html">Penyesuaian Barang</a></li>
                            </ul>
                        </li>
                        <li><a href="penjualan.html"><i class="fa fa-shopping-cart"></i> Penjualan</a></li>
                    </ul>
                <?php
                } else {
                    echo "ok";
                }
                ?>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>

<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <nav class="nav navbar-nav">
            <ul class=" navbar-right">
                <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                        <img src="<?= $base_url ?>build/images/3851259.jpg" alt=""><?= $_COOKIE['nama'] ?>
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="javascript:;"> Profile</a>
                        <a class="dropdown-item" href="keluar.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                    </div>
                </li>
            </ul>
        </nav>
    </div>
</div>
<!-- /top navigation -->
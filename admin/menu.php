<?php 

session_start();
$level= $_SESSION['level'];
if ($level=='admin'){

 ?>
    <div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                    </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header" align="center"><h5>MASTER</h5></li>
                        <li><a class="ajax-link" href="index2.php"><i class="glyphicon glyphicon-home "></i><span> Dashboard</span></a>
                        </li>
                        <li>
                            <a class="ajax-link" href="?page=modul/data_petugas/view_petugas"><i class="glyphicon glyphicon-user blue"></i><span> Data Petugas</span></a>
                        </li>
                        <li><a class="ajax-link" href="?page=modul/data_mobil/view_mobil"><i class="glyphicon glyphicon-list-alt"></i><span> Data Mobil</span></a>
                        </li>
                        <li><a class="ajax-link" href="?page=modul/data_sopir/view_sopir"><i class="glyphicon glyphicon-user yellow"></i><span> Data Sopir</span></a>
                        </li>
                        <li><a class="ajax-link" href="?page=modul/data_harga/view_harga"><i class="glyphicon glyphicon-list-alt green "></i><span> Data Harga</span></a>
                        </li>
                        
                        <li class="nav-header hidden-md" Align="center"><h5>TRANSAKSI</h5></li>
                        <li><a class="ajax-link" href="?page=modul/penjadwalan/calendar"><i class="glyphicon glyphicon-list-alt green "></i><span> Penjadwalan</span></a>
                        </li>
                        <li><a class="ajax-link" href="?page=modul/view_pemesanan"><i class="glyphicon glyphicon-pencil red"></i><span> Data Pemesanan</span></a>
                        </li>
                        <li><a class="ajax-link" href="?page=modul/konfirmasi"><i class="glyphicon glyphicon-pencil red"></i><span> Konfirmasi</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
<?php }else{ ?> 

<div class="ch-container">
    <div class="row">
        
        <!-- left menu starts -->
        <div class="col-sm-2 col-lg-2">
            <div class="sidebar-nav">
                <div class="nav-canvas">
                    <div class="nav-sm nav nav-stacked">

                     </div>
                    <ul class="nav nav-pills nav-stacked main-menu">
                        <li class="nav-header" align="center"><h5>LAPORAN</h5></li>
                        <li><a class="ajax-link" href="index2.php"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                        </li>
                        <li>
                            <a target="_blank" class="ajax-link" href="cetak/cetak_petugas.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Petugas</span></a>
                        </li>
                        <li><a target="_blank" class="ajax-link" href="cetak/cetak_mobil.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Mobil</span></a>
                        </li>
                        <li><a target="_blank" class="ajax-link" href="cetak/cetak_sopir.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Sopir</span></a>
                        </li>
                        <li><a target="_blank" class="ajax-link" href="cetak/cetak_harga.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Harga</span></a>
                        </li>
                        <li><a target="_blank" class="ajax-link" href="cetak/cetak_pemesan.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Pemesan</span></a>
                        </li>
                        <li><a target="_blank" class="ajax-link" href="cetak/cetak_pemesanan.php"><i class="glyphicon glyphicon-list-alt"></i><span> Laporan Pemesanan</span></a>
                        </li>
                    </ul>
                    <label id="for-is-ajax" for="is-ajax"><input id="is-ajax" type="checkbox"> Ajax on menu</label>
                </div>
            </div>
        </div>
        <!--/span-->
        <!-- left menu ends -->
<?php } ?>

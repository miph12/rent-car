<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TA | AMIKI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Charisma, a fully featured, responsive, HTML5, Bootstrap admin template.">
    <meta name="author" content="Muhammad Usman">

    <!-- The styles -->
    <link id="bs-css" href="css/bootstrap-cerulean.min.css" rel="stylesheet">

    <link href="css/charisma-app.css" rel="stylesheet">
    <link href='bower_components/fullcalendar/dist/fullcalendar.css' rel='stylesheet'>
    <link href='bower_components/fullcalendar/dist/fullcalendar.print.css' rel='stylesheet' media='print'>
    <link href='bower_components/chosen/chosen.min.css' rel='stylesheet'>
    <link href='bower_components/colorbox/example3/colorbox.css' rel='stylesheet'>
    <link href='bower_components/responsive-tables/responsive-tables.css' rel='stylesheet'>
    <link href='bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css' rel='stylesheet'>
    <link href='css/jquery.noty.css' rel='stylesheet'>
    <link href='css/noty_theme_default.css' rel='stylesheet'>
    <link href='css/elfinder.min.css' rel='stylesheet'>
    <link href='css/elfinder.theme.css' rel='stylesheet'>
    <link href='css/jquery.iphone.toggle.css' rel='stylesheet'>
    <link href='css/uploadify.css' rel='stylesheet'>
    <link href='css/animate.min.css' rel='stylesheet'>

    <!-- jQuery -->
    <script src="bower_components/jquery/jquery.min.js"></script>

    <!-- The HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- The fav icon -->
    <link rel="shortcut icon" href="img/favicon.ico">

</head>

<body>

    <div class="box-inner">
    <div class="box col-md-12">
    
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i>  View Pemesanan</h2>
    </div>

    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable ">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Pemesanan</th>
        <th>nama pemesan</th>
        <th>nama mobil</th>
        <th>Tanggal Pesan</th>
        <th>Lama Hari</th>
        <th>Keterangan</th>
    </tr>
    </thead>
    <tbody>
                          <!--sintak ngambil dari sql query-->
                                <?php 
                                include"koneksi.php";
                                $view=mysql_query("select 
                                    p.id_pemesanan,
                                    p.status,
                                    p.id_mobil,
                                    p.tgl_pesan,
                                    p.lama_hari,
                                    b.id_pembayaran,
                                    b.id_pemesanan,
                                    b.alamat,
                                    b.nama_pemesan
                                   
                                from tb_pemesanan as p,
                                     tb_pembayaran as b
                                where p.id_pemesanan= b.id_pemesanan and p.status='Y'")or die(mysql_error());
                                $no = 1;
                                while ($data=mysql_fetch_array($view))
                                {

                                 ?>
    <tr>
        <td><?php echo $no; ?></td>
            <td class="center"><?php echo $data['id_pemesanan']; ?></td>        
            <td class="center"><?php echo $data['nama_pemesan']; ?></td>
            <?php 

            $kode_mobil = $data['id_mobil'];
            $cari_mobil = mysql_query("select * from tb_mobil where id_mobil = '$kode_mobil' ")or die(mysql_error());
            $ambil_mobil = mysql_fetch_assoc($cari_mobil);
             ?>
            <td class="center"><?php echo $ambil_mobil['nama_mobil']; ?></td>
            <td class="center"><?php echo $data['tgl_pesan']; ?></td>
            <td class="center"><?php echo $data['lama_hari']; ?></td>
            <td class="center"><span class="label label-info">SUDAH DIKONFIRMASI</span></td>
            <!-- <td class="center"></td> -->
       <!--  <td class="center">
            <a class="btn btn-success" href="index2.php?page=modul/view_pemesanan&act=konfir&kode_pesan=<?php echo $data['id_pemesanan'];  ?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                konfirmasi
            </a> -->
           
        </td>
        
                                            
    </tr>
             <?php 
                 $no++;
                  }
              ?>  
    </tbody>
    </table>
    </div>
    </div>
    </div>
    <!--/span-->
    <!-- content ends -->
    </div><!--/#content.col-md-0-->
</div><!--/fluid-row-->

    <hr>

</div><!--/.fluid-container-->

<!-- external javascript -->

<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src='bower_components/moment/min/moment.min.js'></script>
<script src='bower_components/fullcalendar/dist/fullcalendar.min.js'></script>
<!-- data table plugin -->
<script src='js/jquery.dataTables.min.js'></script>

<!-- select or dropdown enhancer -->
<script src="bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="js/charisma.js"></script>


</body>
</html>

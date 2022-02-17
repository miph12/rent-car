<?php 
include"koneksi.php";
error_reporting();

session_start();
$kode_p = $_SESSION['id_pemesan'];


 ?>
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
    <div class="box col-md-12">
    <a class="btn btn-success" href="?page=pelanggan/data_pemesanan/form_pesan">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Tambah Pemesanan
            </a><br>
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> View Pemesanan</h2>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable ">
    <thead>
    <tr>
        <th>No</th>
        <th>Kode Pemesanan</th>
        <th>Kode Mobil</th>
        <th>Kode Sopir</th>
        <th>Kode Harga</th>
        <th>Tanggal Pesan</th>
        <th>Lama Hari</th>
        <th>Sub Total</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
                    <?php 
                        include"koneksi.php";
                    $view=mysql_query("select * from tb_pemesanan where id_pemesan = '$kode_p' and id_pemesanan not in (select id_pemesanan from tb_pembayaran ) ");
                    $no = 1;
                    while ($data=mysql_fetch_array($view))
                    {
                     ?>
    <tr>
        <td><?php echo $no; ?></td>

            <td class="center"><?php echo $data['id_pemesanan']; ?></td>
            <?php 
            $kode_mobil = $data['id_mobil'];
            $kode_sopir = $data['id_sopir']; 
            $id_harga =  $data['id_harga'];


            $a = mysql_query("select *  from tb_pemesanan where id_pemesan ='$kode_p' ");
            $b = mysql_fetch_array($a);

            $a = mysql_query("select *  from tb_mobil where id_mobil ='$kode_mobil' ");
            $b = mysql_fetch_array($a);

            $a2 = mysql_query("select *  from tb_sopir where id_sopir ='$kode_sopir' ");
            $b2 = mysql_fetch_array($a2);

            $a3 = mysql_query("select *  from tb_harga where id_harga ='$id_harga' ");
            $b3= mysql_fetch_array($a3);

            // $a = mysql_query("select *  from tb_mobil where id_mobil ='$kode_mobil' ");
            // $b = mysql_fetch_array($a);

             ?>
            <td class="center"><?php echo $b['nama_mobil']; ?></td>
            <td class="center"><?php echo $b2['nama_sopir']; ?></td>
            <td class="center"><?php echo $b3['type_harga']; ?></td>
            <td class="center"><?php echo $data['tgl_pesan'] ?></td>
            <td class="center"><?php echo $data['lama_hari'] ?></td>
            <?php 

            $sub = $data['lama_hari'] * $b3['harga'];
             ?>

            <td class="center"><?php echo $sub ?></td>
        <td class="center">
            <a class="btn btn-success" href="index_pelanggan.php?page=pelanggan/data_pemesanan/form_bayar&kode=<?php echo $data['id_pemesanan'];
             ?>">
                <i class="glyphicon glyphicon-zoom-in icon-white"></i>
                Bayar
            </a>
           
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

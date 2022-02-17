<?php 
include"koneksi.php";
error_reporting();

if($_GET['act']=='delete'){
    $jalan =mysql_query("delete from tb_mobil where id_mobil='$_GET[id_mobil]'");
    if ($jalan){
        echo "<script>alert ('data sudah terhapus!!');</script>";
    }
    else
    {
        echo "<script>alert ('data gagal dihapus!!');</script>";
    }

    echo '<meta http_equiv="refresh" content="0; url=?page=modul/data_mobil/view_mobil">';
}

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
    <div class="box-inner">
    <div class="box-header well" data-original-title="">
        <h2><i class="glyphicon glyphicon-user"></i> Datatable</h2>
    </div>
    <div class="box-content">
    <table class="table table-striped table-bordered bootstrap-datatable ">
    <thead>
    <tr>
    <th>No</th>
                                            <th>Kode Mobil</th>
                                            <th>Nama Mobil</th>
                                            <th>Jenis</th>
                                            <th>Merk</th>
                                            <th>Warna</th>
                                            <th>Tahun</th>
                                            <th>No Polisi</th>
                                            <th>No BPKB</th>
                                            <th>Tgl Berlaku STNK</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
    </tr>
    </thead>
    <tbody>
                    <?php 
                        include"koneksi.php";
                    $view=mysql_query("select * from tb_mobil");
                    $no = 1;
                    while ($data=mysql_fetch_array($view))
                    {
                     ?>
    <tr>
        <td><?php echo $no; ?></td>
                                            <td class="center"><?php echo $data['id_mobil']; ?></td>
                                            <td class="center"><?php echo $data['nama_mobil']; ?></td>
                                            <td class="center"><?php echo $data['jenis']; ?></td>
                                            <td class="center"><?php echo $data['merek']; ?></td>
                                            <td class="center"><?php echo $data['warna']; ?></td>
                                            <td class="center"><?php echo $data['tahun']; ?></td>
                                            <td class="center"><?php echo $data['no_polisi']; ?></td>
                                            <td class="center"><?php echo $data['no_bpkb']; ?></td>
                                            <td class="center"><?php echo $data['tgl_berlaku_stnk']; ?></td>
                                            <td class="center"><?php echo $data['keterangan']; ?></td>
        <td class="center">
            <a class="btn btn-info" href="?page=modul/data_Mobil/edit_mobil&act=edit&id_mobil=<?php echo $data['id_mobil'];?>">
                <i class="glyphicon glyphicon-edit icon-white"></i>
                Edit
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

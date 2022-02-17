<?php 
include ('koneksi.php');


//jika tombol update di click
if(isset($_POST['update'])){
    $kodemobil = $_POST['kodemobil'];
    $namamobil = $_POST['namamobil'];
    $tipejenis = $_POST['tipejenis'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $nopolisi = $_POST['nopolisi'];
    $nobpkb = $_POST['nobpkb'];
    $tglberlakustnk = $_POST['tglberlakustnk'];
    $keterangan = $_POST['keterangan'];


    $query =mysql_query("update tb_mobil set 
                            id_mobil='$kodemobil',
                            nama_mobil='$namamobil',
                            jenis='$tipejenis',
                            merek='$merk',
                            warna='$warna',
                            tahun='$tahun',
                            no_polisi='$nopolisi',
                            no_bpkb='$nobpkb',
                            tgl_berlaku_stnk='$tglberlakustnk',
                            keterangan='$keterangan'
                            
                            where id_mobil='$kodemobil'") or die(mysql_error());


if ($query){
        echo "<script>alert('data berhasil diperbaharui...!!');</script>";
    }else
    {
        echo "<script>alert('data gagal diperbaharui...!!');</script>";
    }

    echo '<meta http-equiv="refresh" content="0; url=?page=modul/data_mobil/view_mobil">';
}
    
$kodemobil = $_GET['id_mobil'];
        $query =mysql_query("select * from tb_mobil where id_mobil='$kodemobil'") or die (mysql_error());
        $data =mysql_fetch_array($query);
        //print_r($data);
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
    <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Mobil</h2>
                </div>
            </div>
            
            <div class="box-content">
                <div class="control-group">
                </div>
                <br>

                <form role="form" method="POST">
                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Kode Mobil</label>
                    <input type="text" class="form-control" name="kodemobil"  readonly="readonly" value="<?php echo $data['id_mobil']; ?>">
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Nama Mobil</label>
                    <input type="text" class="form-control" id="inputWarning1" name="namamobil" value="<?php echo $data['nama_mobil'] ?>" placeholder="" >
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-4">
                    <label class="control-label">Jenis</label>
                    <div class="form-control">
                        <select data-rel="chosen" name="kd_jenis">
                            <option value="">== Pilih Jenis ==</option>
                            <option value="Toyota">Toyota</option>
                            <option value="Mitsubishi">Mitsubishi</option>
                            <option value="Isuzu">Isuzu</option>
                            <option value="Nissan">Nissan</option>
                            <option value="Daihatsu">Daihatsu</option>
                            <option value="Suzuki">Suzuki</option>
                            <option value="Honda">Honda</option>
                        </select>
                    </div>
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Merk</label>
                    <input type="text" class="form-control" id="inputWarning1" name="merk" value="<?php echo $data['merek'];  ?>" placeholder="" >
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Warna</label>
                    <input type="text" class="form-control" id="inputWarning1" name="warna" value="<?php  echo $data['warna']; ?>" placeholder="" >
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Tahun</label>
                    <input type="text" class="form-control" id="inputWarning1" name="tahun" value="<?php  echo $data['tahun']; ?>" placeholder="" >
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">No Polisi</label>
                    <input type="text" class="form-control" id="inputWarning1" name="nopolisi" value="<?php  echo $data['no_polisi']; ?>" placeholder="" >
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">No BPKB</label>
                    <input type="text" class="form-control" id="inputWarning1" name="nobpkb" value="<?php  echo $data['no_bpkb']; ?>" placeholder="" >
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Tgl Berlaku STNK</label>
                    <input type="date" class="form-control" id="inputWarning1" name="tglberlakustnk" value="<?php echo $data['tgl_berlaku_stnk'] ?>" >
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="inputWarning1" name="keterangan" value="<?php echo $data['keterangan'] ?>"  >
                </div>
                </div>
                <br>
                <div class="form-actions"></div>
                <button type="submit" name="update" class="btn btn-success">Edit</button>
                <td>&nbsp</td>
                <a href=""><button type="reset" name="" class="btn btn-success">Cancel</button></a>
                <form role="form" method="POST">
            </div>
        </div>
    </div>
    <!--/span-->
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

<?php 
include "koneksi.php";

 if(isset($_POST['simpan'])){

    $kodemobil = $_POST['kodemobil'];
    $namamobil = $_POST['namamobil'];
    $kd_jenis = $_POST['kd_jenis'];
    $merk = $_POST['merk'];
    $warna = $_POST['warna'];
    $tahun = $_POST['tahun'];
    $nopolisi = $_POST['nopolisi'];
    $nobpkb = $_POST['nobpkb'];
    $tglberlakustnk = $_POST['tglberlakustnk'];
    $keterangan = $_POST['keterangan'];

    $cek=mysql_num_rows(mysql_query("select * from tb_mobil where id_mobil ='$kodemobil'"));
    if($cek>0){
        echo "<script>alert('maafdata sudah ada');</script>";
    }else{
        $insert=mysql_query("insert into tb_mobil(
                                                                id_mobil,
                                                                nama_mobil,
                                                                jenis,
                                                                merek,
                                                                warna,
                                                                tahun,
                                                                no_polisi,
                                                                no_bpkb,
                                                                tgl_berlaku_stnk,
                                                                keterangan
                                                                )
                                                                values(
                                                                    '$kodemobil',
                                                                    '$namamobil',
                                                                    '$kd_jenis',
                                                                    '$merk',
                                                                    '$warna',
                                                                    '$tahun',
                                                                    '$nopolisi',
                                                                    '$nobpkb',
                                                                    '$tglberlakustnk',
                                                                    '$keterangan')") or die(mysql_error());

        if($insert){
          echo "<script>alert('data berhasil disimpan');</script>";
            // header('location:terimakasih.php');
        }else{
            echo "<script>alert('data gagal disimpan');</script>";
        }
        {
            // echo '<meta http_equiv="refresh" content="0; url=?page=pelanggan/data_pemesanan/view_pemesanan">';
        }
    }       

 }

/*kode otomatis gaji*/
    $query = "select max(id_mobil) as maxkode from tb_mobil";
    $hasil = mysql_query($query);
    $cek = mysql_fetch_array($hasil);
    $kode_harga = $cek['maxkode'];
    $nourut = (int) substr($kode_harga,2,3);
    $nourut ++;
    $char = "KM";
    $newid = $char.sprintf("%03s",$nourut);

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
                    <input type="text" class="form-control" name="kodemobil" value="<?php echo "$newid"; ?>" readonly="readonly">
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Nama Mobil</label>
                    <input type="text" class="form-control" id="inputWarning1" name="namamobil" placeholder="" required only>
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
                    <input type="text" class="form-control" id="inputWarning1" name="merk" placeholder="" required only>
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Warna</label>
                    <input type="text" class="form-control" id="inputWarning1" name="warna" placeholder="" required only>
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Tahun</label>
                    <input type="text" class="form-control" id="inputWarning1" name="tahun" placeholder="" required only>
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">No Polisi</label>
                    <input type="text" class="form-control" id="inputWarning1" name="nopolisi" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">No BPKB</label>
                    <input type="text" class="form-control" id="inputWarning1" name="nobpkb" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Tgl Berlaku STNK</label>
                    <input type="date" class="form-control" id="inputWarning1" name="tglberlakustnk" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="inputWarning1" name="keterangan" placeholder=""  required>
                </div>
                </div>
                <br>
                <div class="form-actions"></div>
                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <td>&nbsp</td>
                <a href="?page=modul/data_mobil/form_mobil"><button type="reset" name="" class="btn btn-success">Cancel</button></a>
                <td>&nbsp</td>
                <a href="?page=modul/data_mobil/view_mobil" class="btn btn-success">Lihat Data</a>
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

<?php 
include "koneksi.php";

if (isset($_POST['simpan'])) {
	$kodeproduk=$_POST['kodeproduk'];
	$jenisproduk=$_POST['jenisproduk'];
	$mutu = $_POST['mutu'];
	$stok=$_POST['stok'];
	$hargajual=$_POST['hargajual'];
	

	$cek=mysql_num_rows(mysql_query("select * from tb_produk where kode_produk='$kodeproduk'"));

	if ($cek>0) {
		echo "<script>alert('maaf data sudah ada');</script>";
	}else
	{
		$insert=mysql_query("insert into tb_produk(
											 kode_produk,
											 jenis_produk,
											 mutu,
											 stok,
											 harga_jual
					
											 )
											values(
													'$kodeproduk',
													'$jenisproduk',
													'$mutu',
													'$stok',
													'$hargajual')") or die(mysql_error());
		if ($insert) {
			echo "<script>alert('data berhasil disimpan');</script>";
		}else
		{
			echo "<script>alert('maaf data gagal disimpan');</script>";
		}
	}
	echo '<meta http-equiv="refresh" content="0; url=?page=modul/produk/view_produk">';
}
// sintak otomatis produk
$query = "select max(kode_produk) as maxkode from tb_produk";
$hasil = mysql_query($query);
$cek = mysql_fetch_array($hasil);
$kode_produk = $cek['maxkode'];
$nourut = (int) substr($kode_produk,2,3);
$nourut ++;
$char = "KP";
$newid = $char.sprintf("%03s",$nourut);
?>
<html lang="en">
<head>
    <!-- Basic -->
    <title>TA | AMIKI</title>

    <!-- Define Charset -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="description" content="Margo - Responsive HTML5 Template">
    <meta name="author" content="iThemesLab">

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="asset/css/bootstrap.min.css" type="text/css" media="screen">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/style.css" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="css/animate.css" media="screen">

    <!-- Color CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="css/colors/red.css" title="red" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/jade.css" title="jade" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/green.css" title="green" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/blue.css" title="blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/beige.css" title="beige" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/cyan.css" title="cyan" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/orange.css" title="orange" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/peach.css" title="peach" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/pink.css" title="pink" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/purple.css" title="purple" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/sky-blue.css" title="sky-blue" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/colors/yellow.css" title="yellow" media="screen" />


    <!-- Margo JS  -->
    <script type="text/javascript" src="js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="js/jquery.migrate.js"></script>
    <script type="text/javascript" src="js/modernizrr.js"></script>
    <script type="text/javascript" src="asset/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="js/jquery.appear.js"></script>
    <script type="text/javascript" src="js/count-to.js"></script>
    <script type="text/javascript" src="js/jquery.textillate.js"></script>
    <script type="text/javascript" src="js/jquery.lettering.js"></script>
    <script type="text/javascript" src="js/jquery.easypiechart.min.js"></script>
    <script type="text/javascript" src="js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="js/jquery.parallax.js"></script>
    <script type="text/javascript" src="js/mediaelement-and-player.js"></script>
    <script type="text/javascript" src="js/script.js"></script>

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<body>
<a class="btn btn-success btn-setting" href="?page=modul/produk/fom_produk"><i class="icon-zoom-in icon-white"></i> Tambah Data</a>
			<div class="row-fluid sortable">		
				<div class="box span12">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-user"></i> View Produk</h2>
						<div class="box-icon">
							<a href="#" class="btn btn-setting btn-round"><i class="icon-cog"></i></a>
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							<a href="#" class="btn btn-close btn-round"><i class="icon-remove"></i></a>
						</div>
					</div>
					<div class="box-content">
						<table class="table table-striped table-bordered bootstrap-datatable datatable">
						  <thead>
							  <tr>
								  <th>No</th>
								  <th>Kode Produk</th>
								  <th>Jenis Produk</th>
								  <th>Jenis Mutu</th>
								  <th>Stok</th>
								  <th>Harga</th>
								  <th>Action</th>
							  </tr>
						  </thead>   
						  <tbody>
						  <!--sintak ngambil dari sql query-->
								<?php 
								include"koneksi.php";
								$view=mysql_query("select * from tb_produk");
								$no = 1;
								while ($data=mysql_fetch_array($view))
								{

								 ?>
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $data['kode_produk']; ?></td>
								<td><?php echo $data['jenis_produk']; ?></td>
								<td><?php echo $data['mutu']; ?></td>
								<td><?php echo $data['stok']; ?></td>
								<td><?php echo $data['harga_jual']; ?></td>
								<td>
								
								
								<a class="btn btn-info" href="?page=modul/produk/edit_produk&act=edit&kode_produk=<?php echo $data['kode_produk']; ?>"><i class="icon-edit icon-white"></i> Edit</a>	 

							 	
								</td>
							</tr>
							<?php 
								$no++;
							}
							 ?>
						  </tbody>
					  </table>            
					</div>
				</div><!--/span-->
			
			</div><!--/row-->

	</div><!--/.fluid-container-->
	<div class="modal hide fade" id="myModal">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3>Fom Produk</h3>
			</div>
			<div class="modal-body">
				
				<div class="box-content">
						<form class="form-horizontal" method="POST">
						  <fieldset>
							
							<div class="control-group">
							  <label class="control-label" for="typeahead">Kode Produk</label>
							  <div class="controls">
								<input type="text" class="span10 typeahead" id="typeahead" name="kodeproduk" value="<?php echo "$newid"; ?>"  readonly="readonly">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Jenis Produk</label>
							  <div class="controls">
								<input type="text" class="span10 typeahead" id="jenisproduk"  name="jenisproduk" placeholder="harap diisi" required autofocus>
							  </div>
							</div>
							
							<div class="control-group">
								<label class="control-label" for="selectError">Jenis Mutu</label>
								<div class="controls">
								  <select id="selectError" data-rel="chosen" name="mutu" placeholder="harap diisi" required>
									<option>==Pilih==</option>
									<option>A/WP-1X</option>
								
								  </select>
								</div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="typeahead">Stok</label>
							  <div class="controls">
								<input type="text" class="span10 typeahead" id="stok" name="stok" placeholder="harap diisi" required>
							  </div>
							</div>
						

							 <div class="control-group">
							  <label class="control-label" for="typeahead">Harga</label>
							  <div class="controls">
								<input type="text" class="span10 typeahead" id="harga" name="hargajual" placeholder="harap diisi" required>
							  </div>
							</div>

							<div class="modal-footer">
							<button type="submit" class="btn btn-primary" value="simpan" name="simpan">Simpan</button>
							<button type="reset" class="btn btn-danger">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
			</div>
		</div>
		
</body>
</html>

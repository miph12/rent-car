			<style type="text/css">
			.warna{
				background: white;
				color: black;
			}
			.warna2{
				color: black;
			}
			.total{
				color: black;
				font-size: 15px;

			}
			.alamat{
				color: black;
			}
			</style>

<?php 
session_start();
$kode = $_SESSION['id_pemesan'];
// echo $kode;
$a = mysql_query("select * from tb_pemesanan where status = 'Y' and id_pemesan='$kode' ")or die(mysql_error());
while($data = mysql_fetch_array($a)){

$kode_pemesanan = $data['id_pemesanan'];
$cari = mysql_query("select * from tb_pembayaran where id_pemesanan ='$kode_pemesanan' ")or die(mysql_error());
$ambil_pembayaran = mysql_fetch_assoc($cari);

$kode_mobil = $data['id_mobil'];
$cari4= mysql_query("select * from tb_mobil where id_mobil ='$kode_mobil' ")or die(mysql_error());
$ambil_mobil = mysql_fetch_assoc($cari4);

$kode_sopir = $data['id_sopir'];
$cari2= mysql_query("select * from tb_sopir where id_sopir ='$kode_sopir' ")or die(mysql_error());
$ambil_sopir = mysql_fetch_assoc($cari2);

$kode_harga = $data['id_harga'];
$cari3= mysql_query("select * from tb_harga where id_harga ='$kode_harga' ")or die(mysql_error());
$ambil_harga = mysql_fetch_assoc($cari3);




 ?>


<div class="box span10">
					<div class="box-header well" data-original-title>
						
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
						<div class="alert alert-success">
							<b><h3>Halo, <?php echo $ambil_pembayaran['nama_pemesan'];  ?></h3></b>
							<p>terima kasih, anda telah melakukan pemesanan sebagai berikut:</p>
							<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr class="warna">
								  <th>Jenis Mobil</th>
								  <th>Nama Sopir</th>
								  <th>Type Harga</th>
								  <th>Lama Hari</th>
								  <th>Sub Total</th>
								
								  
								
							  </tr>

						  <tbody>
						  <!--sintak ngambil dari sql query-->
								
							<tr class="warna2">
								<td><?php echo $ambil_mobil['nama_mobil']; ?></td>
								<td><?php echo $ambil_sopir['nama_sopir']; ?></td>
								<td><?php echo $ambil_harga['harga']; ?></td>
								<td><?php echo $data['lama_hari']; ?></td>
								<?php 

								$subtotal = $data['lama_hari'] * $ambil_harga['harga'];
								 ?>
								<td>Rp. <?php echo $subtotal; ?> </td>
								
								
							</tr>
							 <tr class="total">
							  	<td colspan="3" align="center" ><b> Total Pembayaran </b> </td>
							  	<td><b>Rp. <?php echo $subtotal;  ?></b></td>
							  </tr>
						  </thead>   

							
						  </tbody>
					  </table>            
					</div>

					<div class="alamat">
					<b><h3>Alamat Tujuan:</h3></b> <br>
					<b><?php echo $ambil_pembayaran['nama_pemesan']; ?></b> <br>
					<?php echo $ambil_pembayaran['alamat']; ?> <br>
					<?php echo $ambil_pembayaran['kecamatan']; ?>, kab. <?php echo $ambil_pembayaran['kota']; ?>, <?php echo $ambil_pembayaran['kode_pos']; ?><br>
					<?php echo $ambil_pembayaran['provinsi']; ?><br>
					Telp. <?php //echo $data['no_hp'];  ?>

					</div>

				</div>
					<form action="cetak/cetak_nota.php">
					<input type="hidden" name="kode_kirim" value="<?php echo $data['kode_pengiriman']; ?>">
					<input type="hidden" name="kode_bayar" value="<?php echo $data['kode_pembayaran']; ?>">
					<input type="hidden" name="kode_pesan" value="<?php echo $data['kode_pemesanan']; ?>">
					<button type="submit" name="cetak" class="btn btn-primary">Cetak Nota	</button>
					</form>	
					</div>	

				</div><!--/span-->

				<?php } ?>
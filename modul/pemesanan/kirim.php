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
$kode = $_SESSION['kode'];
$nama = $_SESSION['nama'];

 ?>

 <?php 
								include"koneksi.php";
								$view=mysql_query("select 
									p.kode_pemesanan,
									p.nama_barang,
									p.jumlah_beli,
									p.harga,
									p.tgl_pesan,
									p.subtotal,
									b.kode_pembayaran,
									b.alamat,
									b.nama_pemesan,
									b.alamat,
									b.kecamatan,
									b.kota,
									b.kode_pos,
									b.provinsi,
									b.no_hp,
									k.kode_pengiriman,
									k.kode_pemesanan,
									k.tgl_kirim,
									k.kode_pembayaran,
									k.kode_pemesanan,
									k.kode_register
								from tb_pemesanan as p,
									 tb_pembayaran as b,
									 tb_pengiriman as k
								where p.kode_pemesanan= k.kode_pemesanan and b.kode_pembayaran = k.kode_pembayaran and k.kode_register = '$kode' 
									


									")or die(mysql_error());
								$no = 1;

								$hitung =mysql_num_rows($view);

								if($hitung==0){


								
								 ?>

							<div class="alert alert-success" align="center">
							<b><h3>Maaf, Belum Ada Konfirmasi Transaksi pemesanan!.</h3></b>
							<h4>terima kasih</h4>
							
						            
					</div>

								 <?php 

								}else{


								while ($data=mysql_fetch_array($view))
								{

								  ?>

				<div class="box span10">
					<div class="box-header well" data-original-title>
						<h2><i class="icon-bell"></i> Pemesanan Tgl,<?php echo $data['tgl_pesan']; ?></h2>
						<div class="box-icon">
							
							<a href="#" class="btn btn-minimize btn-round"><i class="icon-chevron-up"></i></a>
							
						</div>
					</div>
					<div class="box-content">
						<div class="alert alert-success">
							<b><h3>Halo, <?php echo $data['nama_pemesan'];  ?></h3></b>
							<p>terima kasih, anda telah melakukan pemesanan sebagai berikut:</p>
							<div class="box-content">
						<table class="table ">
						  <thead>
							  <tr class="warna">
								  <th>Nama barang</th>
								  <th>jumlah</th>
								  <th>harga</th>
								  <th>Sub Total</th>
								
								  
								
							  </tr>

						  <tbody>
						  <!--sintak ngambil dari sql query-->
								
							<tr class="warna2">
								<td><?php echo $data['nama_barang']; ?></td>
								<td><?php echo $data['jumlah_beli']; ?></td>
								<td><?php echo $data['harga']; ?></td>
								<td>Rp. <?php echo $data['subtotal']; ?> </td>
								
								
							</tr>
							 <tr class="total">
							  	<td colspan="3" align="center" ><b> Total Pembayaran </b> </td>
							  	<td><b>Rp. <?php echo $data['subtotal']; ?></b></td>
							  </tr>
						  </thead>   

							
						  </tbody>
					  </table>            
					</div>

					<div class="alamat">
					<b><h3>Alamat Tujuan:</h3></b> <br>
					<b><?php echo $data['nama_pemesan']; ?></b> <br>
					<?php echo $data['alamat']; ?> <br>
					<?php echo $data['kecamatan']; ?>, kab. <?php echo $data['kota']; ?>, <?php echo $data['kode_pos']; ?><br>
					<?php echo $data['provinsi']; ?><br>
					Telp. <?php echo $data['no_hp'];  ?>

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
				<?php 
								
							}}
							 ?>
<?php 
$kode_pesan = $_GET['kode'];    
include "koneksi.php";
session_start();
$kode_p = $_SESSION['id_pemesan'];
if(isset($_POST['simpan'])) {

$kode_bayar               = $_POST['kodepembayaran'];
$kodepemesanan      = $_POST['kodepemesanan'];
//$kodepemesan        = $_POST['kodepemesan'];
$namapemesan        = $_POST['namapemesan'];
$alamat             = $_POST['alamat'];
$telepon            = $_POST['telepon'];
$kodepos            = $_POST['kodepos'];
$kecamatan          = $_POST['kecamatan'];
$kota               = $_POST['kota'];
$provinsi           = $_POST['provinsi'];
$bayar              = $_POST['bayar'];
$status             = $_POST['status'];

$simpan = mysql_query(" insert into tb_pembayaran(id_pembayaran,
                                                    id_pemesanan,
                                                    id_pemesan,
                                                    nama_pemesan,
                                                    alamat,
                                                    telepon,
                                                    kode_pos,
                                                    kecamatan,
                                                    kota,
                                                    provinsi,
                                                    bayar) values('$kode_bayar',
                                                        '$kode_pesan',
                                                        
                                                        '$kode_p',
                                                        '$namapemesan',
                                                        '$alamat',
                                                        '$telepon',
                                                        '$kodepos',
                                                        '$kecamatan',
                                                        '$kota',
                                                        '$provinsi',
                                                        '$bayar')")or die(mysql_error());
    
        if($simpan){
            echo "<script>alert('data berhasil disimpan');</script>";
        }else{
            echo "<script>alert('data gagal disimpan ');</script>";
        }

        echo '<meta http-equiv="refresh" content="0; url=index_pelanggan.php?page=pelanggan/data_pemesanan/view_pemesanan ">';    
}

/*kode otomatis gaji*/
    $query = "select max(id_pembayaran) as maxkode from tb_pembayaran";
    $hasil = mysql_query($query);
    $cek = mysql_fetch_array($hasil);
    $kode_harga = $cek['maxkode'];
    $nourut = (int) substr($kode_harga,2,3);
    $nourut ++;
    $char = "RR";
    $newid = $char.sprintf("%03s",$nourut);









 ?>
<body>
    <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Pembayaran</h2>
                </div>
            </div>
            
            <div class="box-content">
                <div class="control-group">
                </div>
                <br>

                <form role="form" method="POST">
                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Kode pembayaran</label>
                    <input type="text" class="form-control" name="kodepembayaran" value="<?php echo "$newid"; ?>" readonly="readonly">
                </div>
                </div>
                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Pilih  Pemesanan</label>
                 <input type="text" class="form-control" name="kodepemesanan" value="<?php echo $kode_pesan; ?>" readonly="readonly">
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Nama Pemesan</label>
                    <input type="text" class="form-control" id="inputWarning1" name="namapemesan" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">alamat</label>
                    <input type="text" class="form-control" id="inputWarning1" name="alamat" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Telepon</label>
                    <input type="text" class="form-control" id="inputWarning1" name="telepon" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Kode Pos</label>
                    <input type="text" class="form-control" id="inputWarning1" name="kodepos" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Kecamatan</label>
                    <input type="text" class="form-control" id="inputWarning1" name="kecamatan" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Kota</label>
                    <input type="text" class="form-control" id="inputWarning1" name="kota" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Provinsi</label>
                    <input type="text" class="form-control" id="inputWarning1" name="provinsi" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Nominal</label>
                    <input type="text" class="form-control" id="inputWarning1" name="bayar" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                
                </div>
                <br>
                <div class="form-actions"></div>
                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
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



</body>
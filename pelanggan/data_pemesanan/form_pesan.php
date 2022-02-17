<?php
include"koneksi.php";
session_start();
$kode_p = $_SESSION['id_pemesan'];
if(isset($_POST['simpan'])){

$kode               = $_POST['kode_pemesanan'];
$kodemobil          = $_POST['kodemobil'];
$kodesopir          = $_POST['kodesopir'];
$kodeharga          = $_POST['kodeharga'];
$tglpesan           = $_POST['tglpesan'];
$lamahari           = $_POST['lamahari'];
$newtglpesan =  strtotime("+$lamahari day", strtotime($tglpesan));
$tgl_akhir = date('Y/m/d', $newtglpesan);
$simpan = mysql_query(" insert into tb_pemesanan( id_pemesanan,
                                                    id_pemesan,
                                                    id_mobil,
                                                    id_sopir,
                                                    id_harga,
                                                    tgl_pesan,
                                                    lama_hari,
                                                    tgl_akhir,
                                                     ) values('$kode',
                                                        '$kode_p',
                                                        '$kodemobil',
                                                        '$kodesopir',
                                                        '$kodeharga',
                                                        '$tglpesan',
                                                        '$lamahari',
                                                        'tgl_akhir')")or die(mysql_error());

        if($simpan){
            echo "<script>alert('data berhasil disimpan. silahkan lakukan pembayaran');</script>";
        }else{
            echo "<script>alert('data gagal disimpan ');</script>";
        }

}

/*kode otomatis gaji*/
    $query = "select max(id_pemesanan) as maxkode from tb_pemesanan";
    $hasil = mysql_query($query);
    $cek = mysql_fetch_array($hasil);
    $kode_harga = $cek['maxkode'];
    $nourut = (int) substr($kode_harga,2,3);
    $nourut ++;
    $char = "KD";
    $newid = $char.sprintf("%03s",$nourut);



 ?>
 
<body>
    <div class="row">
    <div class="box col-md-12">
        <div class="box-inner">
            <div class="box-header well" data-original-title="">
                <h2><i class="glyphicon glyphicon-edit"></i> Form Pemesanan</h2>
                </div>
            </div>
            
            <div class="box-content">
                <div class="control-group">
                </div>
                <br>

                <form role="form" method="POST">
                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Kode pemesanan</label>
                    <input type="text" class="form-control" name="kode_pemesanan" value="<?php echo "$newid"; ?>" readonly="readonly">
                </div>
                </div>

                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Pilih  Mobil</label>
                <select class="form-control" name="kodemobil">
                    <option>- pilih mobil -</option>
                    <?php 
                    $c= mysql_query("select * from tb_mobil")or die(mysql_error());
                    while($d=mysql_fetch_array($c)){
                     ?>
                     <option value="<?php echo $d['id_mobil'] ?>"><?php echo $d['nama_mobil']; ?></option>
                    <?php } ?>
                </select>
                </div>
                </div>

                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Pilih  Sopir</label>
                <select class="form-control" name="kodesopir">
                    <option>- pilih Sopir -</option>
                    <?php 
                    $a= mysql_query("select * from tb_sopir")or die(mysql_error());
                    while($b=mysql_fetch_array($a)){
                     ?>
                     <option value="<?php echo $b['id_sopir'] ?>"><?php echo $b['nama_sopir']; ?></option>
                    <?php } ?>
                </select>
                </div>
                </div>
                <div class="row">  
                <div class="from-group col-md-4">
                    <label class="control-label">Pilih  Harga</label>
                <select class="form-control" name="kodeharga">
                    <option>- pilih Harga -</option>
                    <?php 
                    $e= mysql_query("select * from tb_harga")or die(mysql_error());
                    while($f=mysql_fetch_array($e)){
                     ?>
                     <option value="<?php echo $f['id_harga'] ?>"><?php echo $f['type_harga']; ?></option>
                    <?php } ?>
                </select>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Tanggal Pesan</label>
                    <input type="date" class="form-control" id="inputWarning1" name="tglpesan" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Lama Hari</label>
                    <input type="text" class="form-control" id="inputWarning1" name="lamahari" placeholder="" required only>
                </div>
                </div>
                <br>
                <div class="form-actions"></div>
                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <td>&nbsp</td>
                <a href=""><button type="reset" name="" class="btn btn-success">Cancel</button></a>
                </form>
            </div>
        </div>
    </div>
    <!--/span-->
    <hr>

</div><!--/.fluid-container-->

<!-- external javascript -->



</body>
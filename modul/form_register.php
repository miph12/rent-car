<?php 

if (isset($_POST['simpan'])){
    include ('koneksi');

    $kodepemesan  = $_POST ['kodepemesan'];
    $namapemesan  = $_POST ['namapemesan'];
    $alamat       = $_POST ['alamat'];
    $telepon      = $_POST ['telepon'];
    $username     = $_POST ['username'];
    $password     = $_POST ['password'];

    $input = mysql_query("INSERT INTO tb_pemesan (id_pemesan, nama_pemesan, alamat, telepon, username, password)

    Values ('$kodepemesan','$namapemesan','$alamat','$telepon','$username', '$password')")
            or die(mysql_error());


        if ($input){
            echo "<script>alert('data berhasil ditambah');</script>";
        }else
        {    echo "<script>alert('data gagal ditambah');</script>";
    }

    echo '<meta http-equiv="refresh" content="0; url=index.php?page=terimakasih">';
} 

 /*kode otomatis gaji*/
     $query = "select max(id_pemesan) as maxkode from tb_pemesan";
    $hasil = mysql_query($query);
    $cek = mysql_fetch_array($hasil);
    $kode_harga = $cek['maxkode'];
    $nourut = (int) substr($kode_harga,2,3);
    $nourut ++;
    $char = "KR";
    $newid = $char.sprintf("%03s",$nourut);

 ?>

 ?>        
 <!-- Start Services Section -->
        <div class="section service">
            <div class="container">
                <div class="row">
                <h3>Isi Data Anda Dengan Benar</h3>
                <form method="POST" action="">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Kode Pemesan</label>
                                <input type="text" class="form-control" name="kodepemesan" value="<?php echo $newid ?>" readonly="readonly">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Pemesan</label>
                                <input type="text" class="form-control" name="namapemesan" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" class="form-control" name="alamat" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon</label>
                                <input type="integer" class="form-control" name="telepon" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" class="form-control" name="username" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        

                        <button type="submit" class="btn btn-warning btn-lg" name="simpan">Register</button>
                        
                        </form>

                </div><!-- .row -->
            </div><!-- .container -->
        </div>
        <!-- End Services Section -->        
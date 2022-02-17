<?php 
include "koneksi.php";

 if(isset($_POST['simpan'])){

    $kodeharga = $_POST['kodeharga'];
    $tipeharga = $_POST['tipeharga'];
    $harga     = $_POST['harga'];
    $keterangan = $_POST['keterangan'];

    $cek=mysql_num_rows(mysql_query("select * from tb_harga where id_harga='$kodeharga'"));
    if($cek>0){
        echo "<script>alert('maafdata sudah ada');</script>";
    }else{
        $insert=mysql_query("insert into tb_harga(
                                                                id_harga,
                                                                type_harga,
                                                                harga,
                                                                keterangan
                                                                )
                                                                values(
                                                                    '$kodeharga',
                                                                    '$tipeharga',
                                                                    '$harga',
                                                                    '$keterangan')") or die(mysql_error());

        if($insert){
          echo "<script>alert('data berhasil disimpan');</script>";
            // header('location:view_harga.php');
        }else{
            echo "<script>alert('data gagal disimpan');</script>";
        }            
    }       
            // echo '<meta http_equiv="refresh" content="0; url=?page=modul/data_harga/view_harga">';   
    }

 /*kode otomatis gaji*/
    $query = "select max(id_harga) as maxkode from tb_harga";
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
                <h2><i class="glyphicon glyphicon-edit"></i> Form Harga</h2>
                </div>
            </div>
            
            <div class="box-content">
                <div class="control-group">
                </div>
                <br>

                <form role="form" method="POST">
                <div class="row">  
                <div class="from-group col-md-4">

                    <label class="control-label">Kode Harga</label>
                    <input type="text" class="form-control" name="kodeharga" value="<?php echo "$newid"; ?>" readonly="readonly">
                </div>
                </div>
                <div class="row">
                <div class="form-group col-md-4">
                    <label class="control-label" for="selecterror">Type Harga</label>
                    <div class="form-control" id="selecterror">
                        <select  data-rel="chosen" name="tipeharga">
                            <option value="">== Pilih Type Harga ==</option>
                            <option value="Full Day">Full Day</option>
                            <option value="Half Day">Half Day</option>
                        </select>
                    </div>
                </div>
                </div>               
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Harga</label>
                    <input type="text" class="form-control" id="inputWarning1" name="harga" placeholder="" required only>
                </div>
                </div>
                <div class="row">
                <div class="from-group col-md-4">
                    <label class="control-label">Keterangan</label>
                    <input type="text" class="form-control" id="inputWarning1" name="keterangan" placeholder="" required only>
                </div>
                </div>
                <br>
                <div class="form-actions"></div>
                <button type="submit" name="simpan" class="btn btn-success">Simpan</button>
                <td>&nbsp</td>
                <a href="?page=modul/data_harga/form_harga"><button type="reset" name="" class="btn btn-success">Cancel</button></a>
                <td>&nbsp</td>
                <a href="?page=modul/data_harga/view_harga" class="btn btn-success">Lihat Data</a>
                <form role="form" method="POST">
            </div>
        </div>
    </div>
    <!--/span-->
    <hr>

</div><!--/.fluid-container-->

<!-- external javascript -->
</body>

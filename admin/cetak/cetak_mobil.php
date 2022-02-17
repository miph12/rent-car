<style type="text/css">
    .gambar{
        position: absolute;
        margin-left: 100px;
    }
</style>
<html>
<title>Cetak Mobil</title>
    <link href="cetak.css" rel="stylesheet" type="text/css" />

<body onLoad="window.print();">
    <center><table width="1000">
        <tr>
            <td>
         <div class="gambar">   <img src="../cetak/img.png" width="105" hspace="1" align="left"> </div>
            
            <CENTER><h2 class="title">PT. JAYA TRANS NUSA</h2></CENTER>
            <CENTER><h2 class="title">RENTAL MOBIL</h2></CENTER>            
            <CENTER><h3>KABUPATEN SITUBONDO</h3></CENTER>
            <br>
            <hr>
            </td>
        </tr>
        </table></center>
        <CENTER><B>LAPORAN DATA MOBIL</B></CENTER>
        
        <?php
        include ("../koneksi.php");
        $query= mysql_query("select * from tb_mobil");
        //include('cek-login.php');

        ?>
        
        <P></P>
        <table id="table-zebra" width="1150" border="1" align="center" cellpadding="1" cellspacing="0">
            <tr class="">
            <th>No</th>
            <th>Nama Mobil</th>
            <th>Jenis</th>
            <th>Merk</th>
            <th>Warna</th>
            <th>Tahun</th>
            <th>No Polisi</th>
            <th>No BPKB</th>
            <th>Tgl Berlaku STNK</th>
            <th>Keterangan</th>
            </tr>
            
            
            <tbody>
                <?php
                        
                    //$query=mysql_query("select * FROM tbsurat_rujuk,tbpasien,tb_rekam_medik,tbpenyakit,tbpelayanan,tb_jalur_pelayanan where tbpasien.no_indeks=tbsurat_rujuk.no_indeks and tbpasien.no_indeks=tb_rekam_medik.no_indeks AND tb_rekam_medik.id_penyakit=tbpenyakit.id_penyakit and tb_rekam_medik.id_pelayanan=tbpelayanan.id_pelayanan and tb_rekam_medik.id_jalur=tb_jalur_pelayanan.id_jalur and tbpelayanan.id_pelayanan='01'");
                $no=1;
                
                while ($data=mysql_fetch_array($query)) {
                //$no++;
                    ?>
                    <tr class="">
                        <td align="center"><?php echo $no;?></td>
                        <td align="center"><?php echo $data ['nama_mobil'];?></td>
                        <td align="center"><?php echo $data ['jenis'];?></td>
                        <td align="center"><?php echo $data ['merek'];?></td>
                        <td align="center"><?php echo $data ['warna'];?></td>
                        <td align="center"><?php echo $data ['tahun'];?></td>
                        <td align="center"><?php echo $data ['no_polisi'];?></td>
                        <td align="center"><?php echo $data ['no_bpkb'];?></td>
                        <td align="center"><?php echo $data ['tgl_berlaku_stnk'];?></td>
                        <td align="center"><?php echo $data ['keterangan'];?></td>
                    </tr>
                <?php
                $no++;
                }
                ?>
            </tbody>
        </table>
<p style="margin-left: 990;px">Sukorejo,
            <? $tgl=gmdate("d-m-Y");
            echo "  "   .$tgl;?>
<br><style="margin-left: 990;px">Pimpinan</p>
<p></p>
<p></p>
<p style="margin-top: 60;px"></p>
<p style="margin-left: 990;px">___________________</p>
</body>
</html>
        

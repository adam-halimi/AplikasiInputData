<?php
  include "../koneksi.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Management Ekspor Impor</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
     
           
          
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">
                        <img src="assets/img/pelatihan.png" widht="68" height="68" />

                    </a>
                    
                </div>
              
                <span class="logout-spn" >
                  <a href="../logout.php" style="" class="btn btn-default">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 

                    <li>
                        <a href="home.php" ><i class="fa fa-desktop "></i>Home</a>
                    </li>
                   

                    <li>
                        <a href="datapetugas.php"><i class="fa fa-users "></i>Data Petugas  <span class="badge">Admin Only</span></a>
                    </li>
                    <li>
                        <a href="datapenerima.php"><i class="fa fa-table "></i>Data Penerima</a>
                    </li>


                    <li>
                        <a href="datapengirim.php"><i class="fa fa-table "></i>Data Pengirim</a>
                    </li>
                    <li class="active-link">
                        <a href="barangmasuk.php"><i class="fa fa-edit"></i>Barang Masuk</a>
                    </li>

                    <li>
                        <a href="barangklr.php"><i class="fa fa-edit "></i>Barang Keluar</a>
                    </li>
                    <li>
                        <a href="laporan.php"><i class="fa fa-clipboard"></i>Laporan <span class="badge">Admin Only</span></a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Input Data Barang Masuk</h2>

                    </div>
                                        
                </div>    
                    <?php
                    $carikode = mysql_query("select max(kode_masuk) from tb_barangmsk") or die (mysql_error());
                    $datakode = mysql_fetch_array($carikode);
                    if ($datakode) {
                            $nilaikode = substr($datakode[0], 1);
                            $kode = (int) $nilaikode;
                            $kode = $kode + 1;
                            $hasilkode = "M".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "M001";
                    }
                    ?>          
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                    <form action="" method="POST" enctype="multipart/from-data">
                      <fieldset>
                        <div class="form-group">
                                            <label>Kode Masuk</label>
                                            <input class="form-control" id="kode_masuk" name="kode_masuk" value="<?php echo $hasilkode;?>" placeholder="Kode Masuk" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" type="text">
                                        </div>
                                            <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input class="form-control" id="tgl_msk" name="tgl_msk" value="<?php echo date("Y-m-d");?>" placeholder="Tanggal Masuk" type="date">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Pengirim</label>
                                            <select class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama Pengirim" type="text">
                                            <option>Nama Pengirim</option>
                                            <?php
                                            $sql=mysql_query("SELECT * FROM tb_pengirim ORDER BY nama_pengirim ASC");
                                            if(mysql_num_rows($sql)!=0){
                                                while($data = mysql_fetch_assoc($sql )){
                                                    echo '<option>'.$data['nama_pengirim'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Petugas</label>
                                            <select class="form-control" id="petugas" name="petugas" placeholder="Petugas" type="text">
                                            <option>Petugas</option>
                                            <?php
                                            $sql=mysql_query("SELECT * FROM tb_user ORDER BY username ASC");
                                            if(mysql_num_rows($sql)!=0){
                                                while($data = mysql_fetch_assoc($sql)  ) {
                                                    echo '<option>'.$data['username'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="item form-group">
                                        <br>
                                       <label for="" class="control-label col-md-5">Tempat Barang</label>
                                       <div class="col-md-6 col-sm-4 col-xs-12">
                                       <br>
                                         <?php 
                                         $s1q=mysql_query("select * from tb_barangmsk where tempat='1'");
                                         $s1d=mysql_num_rows($s1q);
                                         $s2q=mysql_query("select * from tb_barangmsk where tempat='2'");
                                         $s2d=mysql_num_rows($s2q);
                                         $s3q=mysql_query("select * from tb_barangmsk where tempat='3'");
                                         $s3d=mysql_num_rows($s3q);
                                         $s4q=mysql_query("select * from tb_barangmsk where tempat='4'");
                                         $s4d=mysql_num_rows($s4q);
                                         $s5q=mysql_query("select * from tb_barangmsk where tempat='5'");
                                         $s5d=mysql_num_rows($s5q);
                                         $s6q=mysql_query("select * from tb_barangmsk where tempat='6'");
                                         $s6d=mysql_num_rows($s6q);
                                         $s7q=mysql_query("select * from tb_barangmsk where tempat='7'");
                                         $s7d=mysql_num_rows($s7q);
                                         $s8q=mysql_query("select * from tb_barangmsk where tempat='8'");
                                         $s8d=mysql_num_rows($s8q);
                                         $s9q=mysql_query("select * from tb_barangmsk where tempat='9'");
                                         $s9d=mysql_num_rows($s9q);
                                         $s10q=mysql_query("select * from tb_barangmsk where tempat='10'");
                                         $s10d=mysql_num_rows($s10q);
                                         $s11q=mysql_query("select * from tb_barangmsk where tempat='11'");
                                         $s11d=mysql_num_rows($s11q);
                                         $s12q=mysql_query("select * from tb_barangmsk where tempat='12'");
                                         $s12d=mysql_num_rows($s12q);
                                         $s13q=mysql_query("select * from tb_barangmsk where tempat='13'");
                                         $s13d=mysql_num_rows($s13q);
                                         $s14q=mysql_query("select * from tb_barangmsk where tempat='14'");
                                         $s14d=mysql_num_rows($s14q);
                                         $s15q=mysql_query("select * from tb_barangmsk where tempat='15'");
                                         $s15d=mysql_num_rows($s15q);
                                         

                                         if($s1d > 0){
                                            $s1="disabled";
                                            $s1c="checked";
                                         }
                                         else {
                                            $s1="";
                                            $s1c="";
                                         }
                                         if($s2d > 0){
                                            $s2="disabled";
                                             $s2c="checked";
                                         }
                                         else {
                                            $s2="";
                                            $s2c="";
                                         }
                                         if($s3d > 0){
                                            $s3="disabled";
                                            $s3c="checked";
                                         }
                                         else {
                                            $s3="";
                                            $s3c="";
                                         }
                                         if($s4d > 0){
                                            $s4="disabled";
                                            $s4c="checked";
                                         }
                                         else {
                                            $s4="";
                                            $s4c="";
                                         }
                                         if($s5d > 0){
                                            $s5="disabled";
                                            $s5c="checked";
                                         }
                                         else {
                                            $s5="";
                                            $s5c="";
                                         }
                                         if($s6d > 0){
                                            $s6="disabled";
                                            $s6c="checked";
                                         }
                                         else {
                                            $s6="";
                                            $s6c="";
                                         }
                                         if($s7d > 0){
                                            $s7="disabled";
                                            $s7c="checked";
                                         }
                                         else {
                                            $s7="";
                                            $s7c="";
                                         }
                                         if($s8d > 0){
                                            $s8="disabled";
                                            $s8c="checked";
                                         }
                                         else {
                                            $s8="";
                                            $s8c="";
                                         }
                                         if($s9d > 0){
                                            $s9="disabled";
                                            $s9c="checked";
                                         }
                                         else {
                                            $s9="";
                                            $s9c="";
                                         }
                                         if($s10d > 0){
                                            $s10="disabled";
                                            $s10c="checked";
                                         }
                                         else {
                                            $s10="";
                                            $s10c="";
                                         }
                                         if($s11d > 0){
                                            $s11="disabled";
                                            $s11c="checked";
                                         }
                                         else {
                                            $s11="";
                                            $s11c="";
                                         }
                                         if($s12d > 0){
                                            $s12="disabled";
                                            $s12c="checked";
                                         }
                                         else {
                                            $s12="";
                                            $s12c="";
                                         }
                                         if($s13d > 0){
                                            $s13="disabled";
                                            $s13c="checked";
                                         }
                                         else {
                                            $s13="";
                                            $s13c="";
                                         }
                                         if($s14d > 0){
                                            $s14="disabled";
                                            $s14c="checked";
                                         }
                                         else {
                                            $s14="";
                                            $s14c="";
                                         }
                                         if($s15d > 0){
                                            $s15="disabled";
                                            $s15c="checked";
                                         }
                                         else {
                                            $s15="";
                                            $s15c="";
                                         }



                                         ?>
                                         <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="1" <?php echo $s1; ?> <?php echo $s1c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">01</span>
                                        </label>
                                          <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="2" <?php echo $s2;?> <?php echo $s2c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">02</span>
                                        </label>
                                          <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="3" <?php echo $s3;?> <?php echo $s3c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">03</span>
                                        </label>
                                          <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="4" <?php echo $s4;?> <?php echo $s4c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">04</span>
                                        </label>
                                        
                                         <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="5" <?php echo $s5;?> <?php echo $s5c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">05</span>
                                        </label>
                                        <br>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="6" <?php echo $s6;?> <?php echo $s6c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">06</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="7" <?php echo $s7;?> <?php echo $s7c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">07</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="8" <?php echo $s8;?> <?php echo $s8c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">08</span>
                                        </label>
                                        
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="9" <?php echo $s9;?> <?php echo $s9c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">09</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="10" <?php echo $s10;?> <?php echo $s10c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">10</span>
                                        </label>
                                        <br>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="11" <?php echo $s11;?> <?php echo $s11c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">11</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="12" <?php echo $s12;?> <?php echo $s12c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">12</span>
                                        </label>
                                        
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="13" <?php echo $s13;?> <?php echo $s13c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">13</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="14" <?php echo $s14;?> <?php echo $s14c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">14</span>
                                        </label>
                                        <label class="custom-checkbox">
                                         <input type="checkbox" name="tempat[]" value="15" <?php echo $s15;?> <?php echo $s15c;?>/> 
                                         <span class="helping-el"></span>
                                         <span class="label-text">15</span>
                                        </label>
                                        
                                            </div>
                                            </div>
                                        
                                    </fieldset>
                        <div>
                          <input type="submit" name="input" value="Submit" class="btn btn-primary">
                          <input type="reset" value="Reset" class="btn btn-primary">
                          <a href="barangmasuk.php" class="btn btn-primary">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>
                        <?php
                        $kode_masuk = @$_POST['kode_masuk'];
                        $nama_barang = @$_POST['nama_barang'];
                        $tgl_msk = @$_POST['tgl_msk'];
                        $nama_pengirim = @$_POST['nama_pengirim'];
                        $petugas = @$_POST['petugas'];
                        
                        $input = @$_POST['input'];

                        if ($input) {
                            if ($kode_masuk == "" || $nama_barang == "" || $tgl_msk == "" || $nama_pengirim == "" || $petugas == "" ) {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                              foreach($_POST['tempat'] as $checkboxes) {
                                $tempat=$checkboxes;
                                $sql_insert = mysql_query("insert into tb_barangmsk(kode_masuk,nama_barang,tgl_msk,nama_pengirim,petugas,tempat) values ('$kode_masuk' ,'$nama_barang', '$tgl_msk', '$nama_pengirim', '$petugas', '$tempat')") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/barangmasuk.php.php';
                                </script>" ;
                                
                            }
                        }
                        }
                        $kode_masuk = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($kode_masuk<>"")){
                             mysql_query("delete from tb_barangmsk where kode_masuk='$kode_masuk'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/barangmasuk.php';
                                </script>" ;
                        }
                        ?>
                 <!-- /. ROW  -->           
              </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
        <div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                <center>
                    &copy;  Management Ekspor Impor Pelabuhan Belawan
                    </center>
                </div>
            </div>
        </div>
          

     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

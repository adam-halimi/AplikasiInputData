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


                    <li class="active-link">
                        <a href="datapengirim.php"><i class="fa fa-table "></i>Data Pengirim</a>
                    </li>
                    <li>
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
                     <h2>Input Data Pengirim</h2>

                    </div>
                                        
                </div>    
                    <?php
                    $carikode = mysql_query("select max(kode_pengirim) from tb_pengirim") or die (mysql_error());
                    $datakode = mysql_fetch_array($carikode);
                    if ($datakode) {
                            $nilaikode = substr($datakode[0], 1);
                            $kode = (int) $nilaikode;
                            $kode = $kode + 1;
                            $hasilkode = "K".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "K001";
                    }
                    ?>          
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                    <form action="" method="POST" enctype="multipart/from-data">
                      <fieldset>
                        <div class="form-group">
                            <label>Kode pengirim</label>
                            <input class="form-control" value="<?php echo $hasilkode;?>" id="kode_pengirim" name="kode_pengirim" placeholder="Kode pengirim" type="text">
                        </div>
                        <div class="form-group">
                            <label>Nama pengirim</label>
                            <input class="form-control" id="nama_pengirim" name="nama_pengirim" placeholder="Nama pengirim" type="text">
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <input class="form-control" id="alamat" name="alamat" placeholder="Alamat" type="text">
                        </div>
                        <div class="form-group">
                            <label>Tujuan</label>
                            <input class="form-control" id="tujuan" name="tujuan" placeholder="Tujuan" type="text">
                        </div>
                      </fieldset>
                        <div>
                          <input type="submit" name="input" value="Submit" class="btn btn-primary">
                          <input type="reset" value="Reset" class="btn btn-primary">
                          <a href="datapengirim.php" class="btn btn-primary">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>
                        <?php
                        $kode_pengirim = @$_POST['kode_pengirim'];
                        $nama_pengirim = @$_POST['nama_pengirim'];
                        $alamat = @$_POST['alamat'];
                        $tujuan = @$_POST['tujuan'];
                        
                        $input = @$_POST['input'];

                        if ($input) {
                            if ($kode_pengirim == "" || $nama_pengirim == "" || $alamat == "" || $tujuan == "") {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("insert into tb_pengirim values('$kode_pengirim', '$nama_pengirim', '$alamat', '$tujuan')") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapengirim.php';
                                </script>" ;
                            }
                        }
                        
                        $kode_pengirim = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($kode_pengirim<>"")){
                             mysql_query("delete from tb_pengirim where kode_pengirim='$kode_pengirim'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapengirim.php';
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

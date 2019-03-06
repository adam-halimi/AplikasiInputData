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
                    <li class="active-link">
                        <a href="datapenerima.php"><i class="fa fa-table "></i>Data Penerima</a>
                    </li>


                    <li>
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
                     <h2>Edit Data Penerima</h2>

                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />

                        <?php
                        include "../koneksi.php";
                        $kode_penerima = @$_POST['kode_penerima'];
                        $nama_penerima = @$_POST['nama_penerima'];
                        $alamat = @$_POST['alamat'];

                        $edit = @$_POST['edit'];

                        if ($edit) {
                            if ($kode_penerima == "" || $nama_penerima == "" || $alamat == "" ) {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("update tb_penerima set nama_penerima='$nama_penerima',alamat='$alamat' where kode_penerima='$kode_penerima'") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapenerima.php';
                                </script>" ;
                            }
                        }
                        ?>
                                  
                

                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                        <?php 
                           $sql = mysql_query("select * from tb_penerima where kode_penerima='$_GET[id]'") or die (mysql_error());
                           $data=mysql_fetch_array($sql);
                        ?>
                                <form action="" method="POST" enctype="multipart/from-data">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Kode Penerima</label>
                                            <input class="form-control" id="kode_penerima" value="<?php echo $data['kode_penerima']; ?>" name="kode_penerima" placeholder="Kode Penerima" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Penerima</label>
                                            <input class="form-control" id="nama_penerima" value="<?php echo $data['nama_penerima']; ?>" name="nama_penerima" placeholder="Nama Penerima" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <input class="form-control" id="alamat" value="<?php echo $data['alamat']; ?>" name="alamat" placeholder="Address" rows="2">
                                        </div>
                                    </fieldset>
                                    
                                    <div>
                                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                        <a href="datapenerima.php" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                        
                    </div>
                  </div>
                        
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

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
                    <li>
                        <a href="barangmasuk.php"><i class="fa fa-edit"></i>Barang Masuk</a>
                    </li>

                    <li class="active-link">
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
                     <h2>Edit Data Barang Keluar</h2>

                    </div>
                </div>
                 <!-- /. ROW  -->
                  <hr />

                        <?php
                        include "../koneksi.php";
                        $kode_keluar = @$_POST['kode_keluar'];
                        $nama_barang = @$_POST['nama_barang'];
                        $penerima = @$_POST['penerima'];
                        $tgl_klr = @$_POST['tgl_klr'];
                        $status_barang = @$_POST['status_barang'];
                        $petugas = @$_POST['petugas'];

                        $edit = @$_POST['edit'];

                        if ($edit) {
                            if ($kode_keluar == "" || $nama_barang == "" || $penerima == "" || $tgl_klr == "" || $status_barang == "" || $petugas == "" ) {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("update tb_barangklr set nama_barang='$nama_barang',penerima='$penerima',tgl_klr='$tgl_klr',status_barang='$status_barang',petugas='$petugas' where kode_keluar='$kode_keluar'") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/barangklr.php';
                                </script>" ;
                            }
                        }
                        ?>
                                  
                

                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                       <?php 
                        $ambil=$_GET['id'];
                           $sql = mysql_query("select * from tb_barangklr where kode_keluar='$ambil'") or die (mysql_error());
                           while($data=mysql_fetch_array($sql)){
                           //var_dump($data);

                        ?>
                                <form action="" method="POST" enctype="multipart/from-data">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Kode Keluar</label>
                                            <input class="form-control" id="kode_keluar" name="kode_keluar" value="<?php echo $data['kode_keluar'];?>" placeholder="Kode Keluar" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $data['nama_barang'];?>" placeholder="Nama Barang" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Penerima</label>
                                            <input class="form-control" id="penerima" name="penerima" value="<?php echo $data['penerima'];?>" placeholder="Penerima" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Keluar</label>
                                            <input class="form-control" id="tgl_klr" name="tgl_klr" value="<?php echo $data['tgl_klr'];?>" placeholder="Tanggal Keluar" type="date">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Barang</label>
                                            <input class="form-control" id="status_barang" name="status_barang" value="<?php echo $data['status_barang'];?>" placeholder="Status Barang" type="text">
                                        </div>                                        
                                        <div class="form-group">
                                            <label>Petugas</label>
                                            <input class="form-control" id="petugas" name="petugas" value="<?php echo $data['petugas'];?>" placeholder="Petugas" type="text">
                                        </div>
                                    </fieldset>
                                     <?php
                            }
                            ?>
                                    <div>
                                        <input type="submit" name="edit" value="Edit" class="btn btn-primary">
                                        <a href="barangklr.php" class="btn btn-primary">Cancel</a>
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

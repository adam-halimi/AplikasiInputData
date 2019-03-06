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
                     <h2>Input Data Barang Keluar</h2>

                    </div>
                                        
                </div>    
                    <?php
                    $carikode = mysql_query("select max(kode_keluar) from tb_barangklr") or die (mysql_error());
                    $datakode = mysql_fetch_array($carikode);
                    if ($datakode) {
                            $nilaikode = substr($datakode[0], 1);
                            $kode = (int) $nilaikode;
                            $kode = $kode + 1;
                            $hasilkode = "B".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "B001";
                    }
                    ?>        
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                    <form action="" method="POST" enctype="multipart/from-data">
                                    <fieldset>
                                        <div class="form-group">
                                            <label>Kode Keluar</label>
                                            <input class="form-control" id="kode_keluar" name="kode_keluar" value="<?php echo $hasilkode;?>" placeholder="Kode Keluar" type="text">
                                        </div>
                                        <div class="form-group">
                                            <h5><b>Nama Barang</b></h5>
                                            <select class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama_Barang" type="text">
                                            <option>-Nama Barang-</option>
                                            <?php
                                            $sql=mysql_query("SELECT * FROM tb_barangmsk ORDER BY nama_barang ASC");
                                            if(mysql_num_rows($sql)!=0){
                                                while($data = mysql_fetch_assoc($sql)  ) {
                                                    echo '<option>'.$data['nama_barang'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <h5><b>Penerima</b></h5>
                                            <select class="form-control" id="penerima" name="penerima" placeholder="Penerima" type="text">
                                            <option>-Penerima-</option>
                                            <?php
                                            $sql=mysql_query("SELECT * FROM tb_penerima ORDER BY nama_penerima ASC");
                                            if(mysql_num_rows($sql)!=0){
                                                while($data = mysql_fetch_assoc($sql)  ) {
                                                    echo '<option>'.$data['nama_penerima'].'</option>';
                                                }
                                            }
                                            ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Tanggal Keluar</label>
                                            <input class="form-control" id="tgl_klr" name="tgl_klr" value="<?php echo date("Y-m-d");?>" placeholder="Tanggal Keluar" type="date">
                                        </div>
                                        <div class="form-group">
                                            <label>Status Barang</label>
                                            <input class="form-control" id="status_barang" name="status_barang" Value="Barang Keluar" type="text">
                                        </div>
                                        <div class="form-group">
                                            <h5><b>Petugas</b></h5>
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
                                        
                                        
                                    </fieldset>
                                    
                                    <div>
                                        <input type="submit" name="input" value="Submit" class="btn btn-primary">
                                        <input type="reset" value="Reset" class="btn btn-primary">
                                        <a href="barangklr.php" class="btn btn-primary">Cancel</a>
                                    </div>
                                </form>
                    </div>
                  </div>
                       <?php
                        $kode_keluar = @$_POST['kode_keluar'];
                        $nama_barang = @$_POST['nama_barang'];
                        $penerima = @$_POST['penerima'];
                        $tgl_klr = @$_POST['tgl_klr'];
                        $status_barang = @$_POST['status_barang'];
                        $petugas = @$_POST['petugas'];
                        
                        $input = @$_POST['input'];

                        if ($input) {
                            if ($kode_keluar == "" || $nama_barang == "" || $penerima == "" || $tgl_klr == "" || $status_barang == "" || $petugas == "" ) {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("insert into tb_barangklr values('$kode_keluar', '$nama_barang', '$penerima', '$tgl_klr', '$status_barang', '$petugas')") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/barangklr.php';
                                </script>" ;
                            }
                        }
                        
                        $kode_keluar = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($kode_keluar<>"")){
                             mysql_query("delete from tb_barangklr where kode_keluar='$kode_keluar'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/barangklr.php';
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

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
                   

                    <li class="active-link">
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
                     <h2>Input Data Petugas</h2>

                    </div>
                                        
                </div>    
                    <?php
                    $carikode = mysql_query("select max(id_user) from tb_user") or die (mysql_error());
                    $datakode = mysql_fetch_array($carikode);
                    if ($datakode) {
                            $nilaikode = substr($datakode[0], 1);
                            $kode = (int) $nilaikode;
                            $kode = $kode + 1;
                            $hasilkode = "U".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "U001";
                    }
                    ?>          
                 <!-- /. ROW  -->
                  <hr />
                  <div class="row">
                    <div class="col-lg-7 col-md-7">
                    <form action="" method="POST" enctype="multipart/from-data">
                      <fieldset>
                        <div class="form-group">
                            <label>ID User</label>
                            <input class="form-control" id="id_user" name="id_user" value="<?php echo $hasilkode;?>" placeholder="ID" type="text"/>                            
                        </div>
                        <div class="form-group">
                            <label>First Name</label>
                            <input class="form-control" id="first_name" name="first_name" placeholder="First Name" type="text"/>
                            
                        </div>
                        <div class="form-group">
                            <label>Last Name</label>
                            <input class="form-control" id="last_name" name="last_name" placeholder="Last Name" type="text"/>
                            
                        </div>
                        <div class="form-group">
                            <label>No Hp</label>
                            <input class="form-control" id="no_hp" name="no_hp" placeholder="No HP" type="text"/>
                            
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" placeholder="Address" rows="2"></textarea>
                            
                        </div>
                        <div class="form-group">
                            <label>Username</label>
                            <input class="form-control" id="username" name="username" placeholder="Username" type="text"/>
                            
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input class="form-control" id="password" name="password" placeholder="Password" type="password" value="mypassword"/>
                            
                        </div>
                        <div class="form-group">
                            <h5><b>Pangkat</b></h5>
                            <select class="form-control" id="pangkat" name="pangkat" required="required">
                              <option>admin</option>
                              <option>Petugas Ekspor</option>
                              <option>Petugas Impor</option>
                            </select>
                            
                        </div>
                      </fieldset>
                        <div>
                          <input type="submit" name="input" value="Submit" class="btn btn-primary">
                          <input type="reset" value="Reset" class="btn btn-primary">
                          <a href="datapetugas.php" class="btn btn-primary">Cancel</a>
                        </div>
                      </form>
                    </div>
                  </div>
                        <?php
                        $id_user = @$_POST['id_user'];
                        $first_name = @$_POST['first_name'];
                        $last_name = @$_POST['last_name'];
                        $no_hp = @$_POST['no_hp'];
                        $alamat = @$_POST['alamat'];
                        $username = @$_POST['username'];
                        $password = @$_POST['password'];
                        $pangkat = @$_POST['pangkat'];

                        $input = @$_POST['input'];

                        if ($input) {
                            if ($id_user == "" || $first_name == "" || $last_name == "" || $no_hp == "" || $alamat == "" || $username == "" || $password == "" || $pangkat == "") {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("insert into tb_user values('$id_user', '$first_name', '$last_name', '$no_hp', '$alamat', '$username', '$password', '$pangkat')") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapetugas.php';
                                </script>" ;
                            }
                        }
                        
                        $id_user = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($id_user<>"")){
                             mysql_query("delete from tb_user where id_user='$id_user'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapetugas.php';
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

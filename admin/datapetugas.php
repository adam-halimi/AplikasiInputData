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
                     <h2>Daftar Data Petugas</h2>
                     <div align="center">
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a href="inputpetugas.php" value="Tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"> Tambah</i></a>
                    </div>
                    
                    <div class="col-md-12">
                    
                    </div>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                  <?php
                        $id_user = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($id_user<>"")){
                             mysql_query("delete from tb_user where id_user='$id_user'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/admin/datapetugas.php';
                                </script>" ;
                        }
                  ?>
                  <div class="col-lg-6 col-md-6">                        
                        <table class="table table-striped table-bordered table-hover">
                        <tr>
                          <th>Id User</th>
                          <th>First Name</th>
                          <th>Last Name</th>
                          <th>No Hp</th>
                          <th>Alamat</th>
                          <th>Username</th>
                          <th>Password</th>
                          <th>Pangkat</th>
                          <th>Tindakan</th>
                        </tr>
                        <?php
                              $sql = mysql_query("select * from tb_user") or die (mysql_error());
                              while($data = mysql_fetch_array($sql)) {        
                              ?>
                              <tr>
                                <td><?php echo $data['id_user']; ?></td>
                                <td><?php echo $data['first_name']; ?></td>
                                <td><?php echo $data['last_name']; ?></td>
                                <td><?php echo $data['no_hp']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td><?php echo $data['username']; ?></td>
                                <td><?php echo $data['password']; ?></td>
                                <td><?php echo $data['pangkat']; ?></td>
                                <td align="center"><a  href="editpetugas.php?id=<?php echo $data['id_user']; ?>" class="btn btn-xs btn-default" title="Edit" >
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data?');" href="datapetugas.php?id=<?php echo $data['id_user']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        </a>
                                        </td>
                                        </td>
                            </tr>
                            <?php
                            }
                            ?>
                        </table>
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

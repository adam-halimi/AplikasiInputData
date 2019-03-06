<?php
    include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Forms</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="../css/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

    <link href="../css/font-awesome.css" rel="stylesheet">
    <link href="../vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="../vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="../vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="../css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-5">
                  <!-- Logo -->
                  <div class="logo">
                     <h1><a href="home.php"><marquee behavior="alternate">Management Ekspor Impor</marquee></a></h1>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="row">
                    <div class="col-lg-12">
                      
                    </div>
                  </div>
               </div>
               <div class="col-md-2">
                  <div class="navbar navbar-inverse" role="banner">
                      <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
                        <ul class="nav navbar-nav">
                          <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
                            <ul class="dropdown-menu animated fadeInUp">
                              
                              <li><a href="../logout.php">Logout</a></li>
                            </ul>
                          </li>
                        </ul>
                      </nav>
                  </div>
               </div>
            </div>
         </div>
    </div>

    <div class="page-content">
        <div class="row">
          <div class="col-md-2">
            <div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    <li><a href="home.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="datapenerima.php"><i class="glyphicon glyphicon-tasks"></i> Data Penerima</a></li>
                    <li class="current"><a href="barang.php"><i class="glyphicon glyphicon-tasks"></i>Barang Keluar</a></li>
                </ul>
             </div>
          </div>
          <div class="col-md-10">

                <div class="row">
                    <div class="col-md-4">
                        <div class="content-box-large">
                            <div class="panel-heading">
                                <div class="panel-title"><b><h3>Input Data Barang</h3></b></div>
                              
                                <div class="panel-options">
                                  
                                </div>
                            </div>
                            <div class="panel-body">
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
                                            <option>Penerima</option>
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
                                            <input class="form-control" id="status_barang" name="status_barang" placeholder="Status Barang" value="Barang Keluar" type="text">
                                        </div>
                                        <div class="form-group">
                                            <h5>Petugas</h5>
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
                                    </div>
                                </form>
                            </div>
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
                                window.location.href='http://localhost/proyeksatu/petugas_ekspor/barang.php';
                                </script>" ;
                            }
                        }
                        
                        $kode_keluar = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($kode_keluar<>"")){
                             mysql_query("delete from tb_barangklr where kode_keluar='$kode_keluar'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/petugas_ekspor/barang.php';
                                </script>" ;
                        }
                        ?>
                <div class="col-md-8">
                    <div class="content-box-large">
                        <div class="panel-heading">
                            <div class="panel-title"><marquee><h3>Daftar Barang Keluar</h3></marquee></div>
                        </div>
                        <div class="panel-body">
                            <form action="" method="POST" role="form">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example"> 
                                <thead>
                                <tr>
                                  <th>Kode Keluar</th>
                                  <th>Nama Barang</th>
                                  <th>Penerima</th>
                                  <th>Tanggal Keluar</th>
                                  <th>Status Barang</th>
                                  <th>Petugas</th>
                                  <th>Tindakan</th>
                                </tr>
                                </thead>
                              <?php
                                $sql = mysql_query("select * from tb_barangklr") or die (mysql_error());
                                while($data = mysql_fetch_array($sql)) {        
                                ?>
                                <tbody>
                                <tr>
                                <td><?php echo $data['kode_keluar']; ?></td>
                                <td><?php echo $data['nama_barang']; ?></td>
                                <td><?php echo $data['penerima']; ?></td>
                                <td><?php echo $data['tgl_klr']; ?></td>
                                <td><?php echo $data['status_barang']; ?></td>
                                <td><?php echo $data['petugas']; ?></td>
                                <td align="center"><a  href="editbarang.php?id=<?php echo $data['kode_keluar']; ?>" class="btn btn-xs btn-default" title="Edit" >
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data?');" href="barang.php?id=<?php echo $data['kode_keluar']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        </a>
                                        </td>
                                        </td>
                            </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            <!--  Page content -->
          </div>
          

          
        </div>
    </div>
<br><br><br><br><br>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright Management Ekspor Impor
            </div>
            
         </div>
      </footer>
    <script src="../js/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="../js/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>

    <script src="../vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="../vendors/select/bootstrap-select.min.js"></script>

    <script src="../vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="../vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="../vendors/moment/moment.min.js"></script>

    <script src="../vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="../vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="../vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="../css/bootstrap-editable.css" rel="stylesheet"/>
  <script src="../js/bootstrap-editable.min.js"></script>

    <script src="../js/custom.js"></script>
    <script src="../js/forms.js"></script>
  </body>
</html>
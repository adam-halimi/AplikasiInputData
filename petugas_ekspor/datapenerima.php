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
                    <li class="current"><a href="datapenerima.php"><i class="glyphicon glyphicon-tasks"></i> Data Penerima</a></li>
                    <li><a href="barang.php"><i class="glyphicon glyphicon-tasks"></i>Barang Keluar</a></li>
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">

	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><b><h3>Input Data Penerima</h3></b></div>
					          
					            <div class="panel-options">
					              
					            </div>
					        </div>
			  				<div class="panel-body">
			  		<?php
                    $carikode = mysql_query("select max(kode_penerima) from tb_penerima") or die (mysql_error());
                    $datakode = mysql_fetch_array($carikode);
                    if ($datakode) {
                            $nilaikode = substr($datakode[0], 1);
                            $kode = (int) $nilaikode;
                            $kode = $kode + 1;
                            $hasilkode = "T".str_pad($kode, 3, "0", STR_PAD_LEFT);
                    } else {
                        $hasilkode = "T001";
                    }
                    ?>
			  					<form action="" method="POST" enctype="multipart/from-data">
									<fieldset>
										<div class="form-group">
											<label>Kode Penerima</label>
											<input class="form-control" value="<?php echo $hasilkode;?>" id="kode_penerima" name="kode_penerima" placeholder="Kode Penerima" type="text">
										</div>
										<div class="form-group">
											<label>Nama Penerima</label>
											<input class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Nama Penerima" type="text">
										</div>
										<div class="form-group">
											<label>Alamat</label>
											<input class="form-control" id="alamat" name="alamat" placeholder="Alamat" type="text">
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
                        $kode_penerima = @$_POST['kode_penerima'];
                        $nama_penerima = @$_POST['nama_penerima'];
                        $alamat = @$_POST['alamat'];
                        
                        $input = @$_POST['input'];

                        if ($input) {
                            if ($kode_penerima == "" || $nama_penerima == "" || $alamat == "" ) {
                                    ?> <script type="text/javascript">alert("Data Tidak Boleh Kosong !!");</script> <?php
                            } else {
                                mysql_query("insert into tb_penerima values('$kode_penerima', '$nama_penerima', '$alamat')") or die (mysql_error());
                                echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/petugas_ekspor/datapenerima.php';
                                </script>" ;
                            }
                        }
                        
                        $kode_penerima = @$_GET['id'];
                        $aksi = @$_GET['aksi'];
                        if(($aksi<>"") and ($kode_penerima<>"")){
                             mysql_query("delete from tb_penerima where kode_penerima='$kode_penerima'") or die (mysql_error());
                             echo "<script type=text/javascript>
                                window.location.href='http://localhost/proyeksatu/petugas_ekspor/datapenerima.php';
                                </script>" ;
                        }
                        ?>
	  			<div class="col-md-8">
  					<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title"><marquee><h3>Daftar Data Penerima</h3></marquee></div>
						</div>
		  				<div class="panel-body">
		  					<form action="" method="POST" role="form">
		  					<table class="table table-bordered"> 
				                <tr>
				                  <th>Kode Penerima</th>
				                  <th>Nama Penerima</th>
				                  <th>Alamat</th>
				                  <th>Tindakan</th>
				                </tr>
				              <?php
                            	$sql = mysql_query("select * from tb_penerima") or die (mysql_error());
                            	while($data = mysql_fetch_array($sql)) {        
                            	?>
                            	<tr>
                                <td><?php echo $data['kode_penerima']; ?></td>
                                <td><?php echo $data['nama_penerima']; ?></td>
                                <td><?php echo $data['alamat']; ?></td>
                                <td align="center"><a  href="editpenerima.php?id=<?php echo $data['kode_penerima']; ?>" class="btn btn-xs btn-default" title="Edit" >
                                        <i class="glyphicon glyphicon-edit"></i>
                                    </a>
                                    <a onclick="return confirm('Anda Yakin Akan Menghapus Data?');" href="datapenerima.php?id=<?php echo $data['kode_penerima']; ?>&aksi=hapus" class="btn btn-xs btn-default" title="Hapus">
                                        <i class="glyphicon glyphicon-ban-circle"></i>
                                        </a>
                                        </td>
                                        </td>
                            </tr>
                            <?php
                            }
                            ?>

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

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
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
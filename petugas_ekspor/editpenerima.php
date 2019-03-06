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
                                window.location.href='http://localhost/proyeksatu/petugas_ekspor/datapenerima.php';
                                </script>" ;
                            }
                        }
                        ?>
	  			<div class="row">
	  				<div class="col-md-4">
	  					<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><b><h3>Edit Data Penerima</h3></b></div>
					          
					            <div class="panel-options">
					              
					            </div>
					        </div>
			  				<div class="panel-body">
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
										<a href="datapenerima.php" value="Cancel" class="btn btn-primary"> Cancel </a>
									</div>
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
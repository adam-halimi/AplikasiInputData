<?php
@session_start();
include "../koneksi.php";

if (@$_SESSION['admin'] || @$_SESSION['petugas_impor'] || @$_SESSION['petugas_ekspor']) {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Management Ekspor Impor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="../css/styles.css" rel="stylesheet">

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
                    <li class="current"><a href="home.php"><i class="glyphicon glyphicon-home"></i> Dashboard</a></li>
                    <li><a href="datapenerima.php"><i class="glyphicon glyphicon-tasks"></i> Data Penerima</a></li>
                    <li><a href="barang.php"><i class="glyphicon glyphicon-tasks"></i>Barang Keluar</a></li>
                    
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-10">
		  			<div class="content-box-large">
		  				
							<div class="panel-title"><marquee>Selamat Datang Di Panel Petugas Ekspor</marquee></div>
		  				<div class="panel-body">
		  					<p >
		  					Ekspor adalah penjualan barang ke luar negeri dengan menggunakan sistem pembayaran, kualitas, kuantitas dan syarat penjualan lainnya yang telah disetujui oleh pihak eksportir dan importir. Proses ekspor pada umumnya adalah tindakan untuk mengeluarkan barang atau komoditas dari dalam negeri untuk memasukannya ke negara lain. Ekspor barang secara besar umumnya membutuhkan campur tangan dari bea cukai di negara pengirim maupun penerima.</p>
		  					<p>Ekspor adalah bagian penting dari perdagangan internasional. Penjualan barang oleh eksportir keluar negeri dikenai berbagai ketentuan dan pembatasan serta syarat-syarat khusus pada jenis komoditas tertentu termasuk cara penangan dan pengamanannya. Setiap negara memiliki peraturan dan ketentuan perdagangan yang berbeda-beda. Khusus ekspor komoditas pertanian dan perikanan di indonesia sebagaian besar tidak memiliki ketentuan dan syarat yang terlalu rumit bahkan pemerintah saat ini mempermudah setiap perusahaan untuk mengekspor hasil pertanian dan perikanannya ke luar negeri.</p>
				  			
				  			
							<br /><br />
		  				</div>
		  			</div>
		  		</div>

		  		
		  	</div>

		  	

		  	
		</div>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright Management Ekspor Impor
            </div>
            
         </div>
      </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="../js/custom.js"></script>
  </body>
</html>
<?php
} else {
    header("location:../index.php");
}
?>
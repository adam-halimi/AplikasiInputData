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
                    <li><a href="datapengirim.php"><i class="glyphicon glyphicon-tasks"></i> Data pengirim</a></li>
                    <li><a href="barangmasuk.php"><i class="glyphicon glyphicon-tasks"></i>Barang Masuk</a></li>
                   
                </ul>
             </div>
		  </div>
		  <div class="col-md-10">
		  	<div class="row">
		  		<div class="col-md-10">
		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Selamat Datang Di Panel Petugas Impor</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
		  					
				  			<p>
				  			Impor adalah proses pembelian barang atau jasa asing dari suatu negara ke negara lain. Impor barang secara besar umumnya membutuhkan campur tangan dari bea cukai di negara pengirim maupun penerima. Impor adalah bagian penting dari perdagangan internasional. Jika perusahaan menjual produknya secara lokal, mereka dapat manfaat karena harga lebih murah dan kualitas lebih tinggi dibandingkan pasokan dari dalam negeri.</p>
				  			<p>
				  			Impor juga sangat dipengaruhi 2 faktor yakni, pajak dan kuota. Tingkat impor dipengaruhi oleh hambatan peraturan perdagangan. Pemerintah mengenakan tarif (pajak) pada produk impor. Pajak itu biasanya dibayar langsung oleh importir, yang kemudian akan membebankan kepada konsumen berupa harga lebih tinggi dari produknya. Demikianlah sebuah produk mungkin berharga terlalu tinggi dibandingkan produk yang berasal dari dalam negeri. Ketika pemerintah asing menerapkan tarif, kemampuan perusahaan asing untuk bersaing di Negara-negara itu dibatasi. Pemerintah juga dapat menerapkan kuota pada produk impor, yang membatasi jumlah produk yang dapat dimpor. Jenis hambatan perdagangan seperti ini bahkan lebih membatasi dibandingkan tarif, karena secara eskpilit menetapkan batas jumlah yang dapat dimpor.
							</p>
		  				</div>
		  			</div>
		  		</div>

		  		
		  	</div>

		  	
		  	
		</div>
    </div>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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
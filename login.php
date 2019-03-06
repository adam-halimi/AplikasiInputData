<?php
@session_start();
include "koneksi.php";

if (@$_SESSION['admin']) {
	header("location: admin/home.php");
} elseif (@$_SESSION['petugas_impor']) {
	header("location: petugas_impor/home.php");
} elseif (@$_SESSION['petugas_ekspor']) {
	header("location: petugas_ekspor/home.php");
} else {
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-bg">
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-12">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Management Ekspor Impor</a></h1>
	              </div>
	           </div>
	        </div>
	     </div>
	</div>

	<div class="page-content container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="login-wrapper">
			        <div class="box">
			            <div class="content-wrap">
			                <h6>Sign In</h6>
			                <form action="" method="POST">
			                <input class="form-control" type="text" name="username" placeholder="Username" required>
			                <input class="form-control" type="password" name="password" placeholder="Password" required>
			                <div class="action">
			                    <input type="submit" name="login" value="Login" class="btn btn-primary signup">
			                </form>
			                </div>                
			            </div>
			        </div>
			    </div>
			</div>
			<?php
				$username = @$_POST['username'];
				$password = @$_POST['password'];
				$login = @$_POST['login'];

				if ($login) {
					if($username == "" || $password == "") {
						?> <script type="text/javascript">alert("Username atau Password tidak boleh kosong !!");</script> <?php
					} else {
						$sql = mysql_query("select * from tb_user where username = '$username' and password = '$password' ") or die (mysql_error());
						$data = mysql_fetch_array($sql);
						$cek = mysql_num_rows($sql);
						if ($cek >= 1) {
							if ($data['pangkat'] == "admin") {
								@$_SESSION['admin'] = $data['id_user'];
								header("location: admin/home.php");
							} else if($data['pangkat'] == "Petugas Impor") {
								@$_SESSION['petugas_impor'] = $data['id_user'];
								header("location: petugas_impor/home.php");
							} else if ($data['pangkat'] == "Petugas Ekspor") {
								@$_SESSION['petugas_ekspor'] = $data['id_user'];
								header("location: petugas_ekspor/home.php");
							}		
					} else {
						?> <script type="text/javascript">alert("Login Gagal!!");</script> <?php

					}
				}
			}
				?>
		</div>
	</div>



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="bootstrap/js/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
<?php
}
?>
<?php
    include "../koneksi.php";
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Management Ekspor Impor</title>
    <!--<script src="assets/js/jquery.js" type="text/JavaScript" language="javascript"></script>
<script src="assets/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>-->
<!--<script src="assets/js/jquery.min.js" type="text/javascript" ></script>
<script src="assets/js/jquery.printPage.js" type="text/javascript" ></script>-->
<script src="http://www.position-absolute.com/creation/print/jquery.min.js" type="text/javascript"></script>
 <script src="http://www.position-absolute.com/creation/print/jquery.printPage.js" type="text/javascript"></script>
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

                    <li>
                        <a href="barangklr.php"><i class="fa fa-edit "></i>Barang Keluar</a>
                    </li>
                    <li class="active-link">
                        <a href="laporan.php"><i class="fa fa-clipboard"></i>Laporan <span class="badge">Admin Only</span></a>
                    </li>
                    
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                    <center>
                     <h2>LAPORAN DATA MANAGEMENT EKSPOR IMPOR</h2>   
                    </center>
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
                            <div>
                                <div class="col-lg-6 col-md-6" align="center">
                                <h4>Laporan Data Penerima</h4>
                                </div>
                                
                                    <td height="140" colspan="5" align="right"><div id="apDiv1">
                                    <div class="col-lg-6 col-md-6" align="center">
                                      <!--<input type="submit" id="print" value="Cetak"/>-->
                                      <input type="submit" class="btnPrint1" id="btnPrint1" value="Print"/>
                                      <!--<a class="btnPrint" id="btnPrint" href='cetaklaporan.php'>Print!</a>-->
                                </div>
                                      <div id="apDiv5" class="wrapper">
                                   
                                        <table width="800" height="152" border="3" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                          
                                          <tr bgcolor="#999999" align="center">
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Kode Penerima</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Nama Penerima</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Alamat</font></th>
                                          </tr>
                                          <?php
                                             $host ="localhost";
                                             $user ="root";
                                             $paswd="";
                                             $db   ="proyeksatu";
                                             
                                             $idkoneksi=@mysql_connect($host,$user,$paswd) or
                                                die("Koneksi dengan <b>Server MySQL</b> tidak berhasil !");
                                             $iddatabase=@mysql_select_db($db); 
                                             $sqlstr="select * from tb_penerima";
                                             $hasil=@mysql_query($sqlstr,$idkoneksi);
                                             while($row=mysql_fetch_array($hasil)){
                                          ?>
                                          <tr bgcolor="#FFFFFF" align="center">
                                                      <td><?php echo $row["kode_penerima"]; ?></td>
                                                      <td><?php echo $row["nama_penerima"]; ?></td>
                                                      <td><?php echo $row["alamat"]; ?></td>
                                                      </tr>
                                          <?php
                                            }
                                            @mysql_close($idkoneksi);
                                        ?>
                                        </table>
                                        <script>
                                           $(document).ready(function() {
                                            $(".btnPrint").printPage();
                                          });

                                            $(".btnPrint1").printPage({
                                              url: "cetakdatapenerima.php",
                                              attr: "cetakdatapenerima.php",
                                              message:"Your document is being created"
                                            });

                                            $(document).ready(function(){
                                                $("#print").click(function(){
                                                    var mode = 'iframe'; // popup
                                                    var close = mode == "popup";
                                                    var options = { mode : mode, popClose : close};
                                                    $("div.wrapper").printArea( options );
                                                });
                                            });

                                          </script>
                                              </div>

                                         </div></td>               
                  
                            </div>
<br>
                            <div>
                                <div class="col-lg-6 col-md-6" align="center">
                                <h4>Laporan Data Pengirim</h4>
                                </div>
                                
                                    <td height="140" colspan="5" align="right"><div id="apDiv1">
                                    <div class="col-lg-6 col-md-6" align="center">
                                      <!--<input type="submit" id="print" value="Cetak"/>-->
                                      <input type="submit" class="btnPrint2" id="btnPrint2" value="Print"/>
                                      <!--<a class="btnPrint" id="btnPrint" href='cetaklaporan.php'>Print!</a>-->
                                </div>
                                      <div id="apDiv5" class="wrapper">
                                   
                                        <table width="800" height="152" border="3" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                          
                                          <tr bgcolor="#999999" align="center">
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Kode Pengirim</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Nama Pengirim</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Alamat</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Tujuan</font></th>
                                          </tr>
                                          <?php
                                             $host ="localhost";
                                             $user ="root";
                                             $paswd="";
                                             $db   ="proyeksatu";
                                             
                                             $idkoneksi=@mysql_connect($host,$user,$paswd) or
                                                die("Koneksi dengan <b>Server MySQL</b> tidak berhasil !");
                                             $iddatabase=@mysql_select_db($db); 
                                             $sqlstr="select * from tb_pengirim";
                                             $hasil=@mysql_query($sqlstr,$idkoneksi);
                                             while($row=mysql_fetch_array($hasil)){
                                          ?>
                                          <tr bgcolor="#FFFFFF" align="center">
                                                      <td><?php echo $row["kode_pengirim"]; ?></td>
                                                      <td><?php echo $row["nama_pengirim"]; ?></td>
                                                      <td><?php echo $row["alamat"]; ?></td>
                                                      <td><?php echo $row["tujuan"]; ?></td>
                                                      </tr>
                                          <?php
                                            }
                                            @mysql_close($idkoneksi);
                                        ?>
                                        </table>
                                        <script>
                                           $(document).ready(function() {
                                            $(".btnPrint").printPage();
                                          });

                                            $(".btnPrint2").printPage({
                                              url: "cetakpengirim.php",
                                              attr: "cetakpengirim.php",
                                              message:"Your document is being created"
                                            });

                                            $(document).ready(function(){
                                                $("#print").click(function(){
                                                    var mode = 'iframe'; // popup
                                                    var close = mode == "popup";
                                                    var options = { mode : mode, popClose : close};
                                                    $("div.wrapper").printArea( options );
                                                });
                                            });

                                          </script>
                                              </div>

                                         </div></td>               
                  
                            </div>
<br>
                            <div>
                                <div class="col-lg-6 col-md-6" align="center">
                                <h4>Laporan Data Barang Masuk</h4>
                                </div>
                                
                                    <td height="140" colspan="5" align="right"><div id="apDiv1">
                                    <div class="col-lg-6 col-md-6" align="center">
                                      <!--<input type="submit" id="print" value="Cetak"/>-->
                                      <input type="submit" class="btnPrint3" id="btnPrint3" value="Print"/>
                                      <!--<a class="btnPrint" id="btnPrint" href='cetaklaporan.php'>Print!</a>-->
                                </div>
                                      <div id="apDiv5" class="wrapper">
                                   
                                        <table width="800" height="152" border="3" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                          
                                          <tr bgcolor="#999999" align="center">
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Kode Masuk</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Nama Barang</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Tanggal Masuk</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Nama Pengirim</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Petugas</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Tempat</font></th>
                                          </tr>
                                          <?php
                                             $host ="localhost";
                                             $user ="root";
                                             $paswd="";
                                             $db   ="proyeksatu";
                                             
                                             $idkoneksi=@mysql_connect($host,$user,$paswd) or
                                                die("Koneksi dengan <b>Server MySQL</b> tidak berhasil !");
                                             $iddatabase=@mysql_select_db($db); 
                                             $sqlstr="select * from tb_barangmsk";
                                             $hasil=@mysql_query($sqlstr,$idkoneksi);
                                             while($row=mysql_fetch_array($hasil)){
                                          ?>
                                          <tr bgcolor="#FFFFFF" align="center">
                                                      <td><?php echo $row["kode_masuk"]; ?></td>
                                                      <td><?php echo $row["nama_barang"]; ?></td>
                                                      <td><?php echo $row["tgl_msk"]; ?></td>
                                                      <td><?php echo $row["nama_pengirim"]; ?></td>
                                                      <td><?php echo $row["petugas"]; ?></td>
                                                      <td><?php echo $row["tempat"]; ?></td>
                                                      </tr>
                                          <?php
                                            }
                                            @mysql_close($idkoneksi);
                                        ?>
                                        </table>
                                        <script>
                                           $(document).ready(function() {
                                            $(".btnPrint").printPage();
                                          });

                                            $(".btnPrint3").printPage({
                                              url: "cetakmasuk.php",
                                              attr: "cetakmasuk.php",
                                              message:"Your document is being created"
                                            });

                                            $(document).ready(function(){
                                                $("#print").click(function(){
                                                    var mode = 'iframe'; // popup
                                                    var close = mode == "popup";
                                                    var options = { mode : mode, popClose : close};
                                                    $("div.wrapper").printArea( options );
                                                });
                                            });

                                          </script>
                                              </div>

                                         </div></td>               
                  
                            </div>
                            <br>
                            <div>
                                <div class="col-lg-6 col-md-6" align="center">
                                <h4>Laporan Data Barang Keluar</h4>
                                </div>
                                
                                    <td height="140" colspan="5" align="right"><div id="apDiv1">
                                    <div class="col-lg-6 col-md-6" align="center">
                                      <!--<input type="submit" id="print" value="Cetak"/>-->
                                      <input type="submit" class="btnPrint4" id="btnPrint4" value="Print"/>
                                      <!--<a class="btnPrint" id="btnPrint" href='cetaklaporan.php'>Print!</a>-->
                                </div>
                                      <div id="apDiv5" class="wrapper">
                                   
                                        <table width="800" height="152" border="3" align="center" cellpadding="0" cellspacing="1" bgcolor="#CCCCCC">
                                          
                                          <tr bgcolor="#999999" align="center">
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Kode Keluar</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Nama Barang</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Penerima</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Tanggal Keluar</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Status Barang</font></th>
                                            <th width="214" bgcolor="#FF6600"><font color="#FFFFFF">Petugas</font></th>
                                          </tr>
                                          <?php
                                             $host ="localhost";
                                             $user ="root";
                                             $paswd="";
                                             $db   ="proyeksatu";
                                             
                                             $idkoneksi=@mysql_connect($host,$user,$paswd) or
                                                die("Koneksi dengan <b>Server MySQL</b> tidak berhasil !");
                                             $iddatabase=@mysql_select_db($db); 
                                             $sqlstr="select * from tb_barangklr";
                                             $hasil=@mysql_query($sqlstr,$idkoneksi);
                                             while($row=mysql_fetch_array($hasil)){
                                          ?>
                                          <tr bgcolor="#FFFFFF" align="center">
                                                      <td><?php echo $row["kode_keluar"]; ?></td>
                                                      <td><?php echo $row["nama_barang"]; ?></td>
                                                      <td><?php echo $row["penerima"]; ?></td>
                                                      <td><?php echo $row["tgl_klr"]; ?></td>
                                                      <td><?php echo $row["status_barang"]; ?></td>
                                                      <td><?php echo $row["petugas"]; ?></td>
                                                      </tr>
                                          <?php
                                            }
                                            @mysql_close($idkoneksi);
                                        ?>
                                        </table>
                                        <script>
                                           $(document).ready(function() {
                                            $(".btnPrint").printPage();
                                          });

                                            $(".btnPrint4").printPage({
                                              url: "cetakkeluar.php",
                                              attr: "cetakkeluar.php",
                                              message:"Your document is being created"
                                            });

                                            $(document).ready(function(){
                                                $("#print").click(function(){
                                                    var mode = 'iframe'; // popup
                                                    var close = mode == "popup";
                                                    var options = { mode : mode, popClose : close};
                                                    $("div.wrapper").printArea( options );
                                                });
                                            });

                                          </script>
                                              </div>

                                         </div></td>               
                  
                            </div>
                     
                     
                  </div>
              </div>
                 <!-- /. ROW  -->   
				  
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
    <script src="jquery.printPage.js" type="text/javascript"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>

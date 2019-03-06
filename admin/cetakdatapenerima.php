<?php
	include "../koneksi.php";
?>
<html>
<head>
<title>
Laporan Management Ekspor Impor
</title>
</head>
<body>
	<div align="center">
	
    <tr>
     <legend><h1><center>LAPORAN DATA MANAGEMENT EKSPOR IMPOR</center></h1></legend>
     <h2><center>LAPORAN DATA PENERIMA</center></h2>
    </tr>
  	<tr>
    <td height="50" colspan="3" align="center"><div id="apDiv1">
      <div id="apDiv5" class="wrapper">
        
        <table width="800" height="150" border="3" align="center" cellpadding="11" cellspacing="5">
          
          <tr bgcolor="#999999">
            <th width="214" bgcolor=""><font color="">Kode Penerima</font></th>
            <th width="151" bgcolor=""><font color="">Nama Penerima</font></th>
            <th width="214" bgcolor=""><font color="">Alamat Penerima</font></th>
            
            
            
            
          </tr>
					<?php
                    $sql = mysql_query("select * from tb_penerima") or die (mysql_error());
                    while($data = mysql_fetch_array($sql)) {        
                    ?>
                    <tr>
                    <td><?php echo $data['kode_penerima']; ?></td>
                    <td><?php echo $data['nama_penerima']; ?></td>
                    <td><?php echo $data['alamat']; ?></td>
                    </tr>
                    <?php
                    }
                    ?>
        </table>
        </div>
        </div>
        </td>
</body>
</html>


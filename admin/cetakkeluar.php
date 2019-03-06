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
     <h2><center>LAPORAN DATA BARANG KELUAR</center></h2>
    </tr>
  	<tr>
    <td height="50" colspan="3" align="center"><div id="apDiv1">
      <div id="apDiv5" class="wrapper">
        
        <table width="800" height="150" border="3" align="center" cellpadding="11" cellspacing="5">
          
          <tr bgcolor="#999999">
            <th width="214" bgcolor=""><font color="">Kode Keluar</font></th>
            <th width="151" bgcolor=""><font color="">Nama Barang</font></th>
            <th width="214" bgcolor=""><font color="">Penerima</font></th>
            <th width="214" bgcolor=""><font color="">Tanggal Keluar</font></th>
            <th width="214" bgcolor=""><font color="">Status Barang</font></th>
            <th width="214" bgcolor=""><font color="">Petugas</font></th>
               
            
          </tr>
					<?php
                    $sql = mysql_query("select * from tb_barangklr") or die (mysql_error());
                    while($data = mysql_fetch_array($sql)) {        
                    ?>
                    <tr>
                    <td><?php echo $data['kode_keluar']; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td><?php echo $data['penerima']; ?></td>
                    <td><?php echo $data['tgl_klr']; ?></td>
                    <td><?php echo $data['status_barang']; ?></td>
                    <td><?php echo $data['petugas']; ?></td>
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


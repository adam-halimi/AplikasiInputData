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
     <h2><center>LAPORAN DATA BARANG MASUK</center></h2>
    </tr>
  	<tr>
    <td height="50" colspan="3" align="center"><div id="apDiv1">
      <div id="apDiv5" class="wrapper">
        
        <table width="800" height="150" border="3" align="center" cellpadding="11" cellspacing="5">
          
          <tr bgcolor="#999999">
            <th width="214" bgcolor=""><font color="">Kode Masuk</font></th>
            <th width="151" bgcolor=""><font color="">Nama Barang</font></th>
            <th width="214" bgcolor=""><font color="">Tanggal Masuk</font></th>
            <th width="214" bgcolor=""><font color="">Nama Pengirim</font></th>
            <th width="214" bgcolor=""><font color="">Petugas</font></th>
            <th width="214" bgcolor=""><font color="">Tempat</font></th>
                        
            
          </tr>
					<?php
                    $sql = mysql_query("select * from tb_barangmsk") or die (mysql_error());
                    while($data = mysql_fetch_array($sql)) {        
                    ?>
                    <tr>
                    <td><?php echo $data['kode_masuk']; ?></td>
                    <td><?php echo $data['nama_barang']; ?></td>
                    <td><?php echo $data['tgl_msk']; ?></td>
                    <td><?php echo $data['nama_pengirim']; ?></td>
                    <td><?php echo $data['petugas']; ?></td>
                    <td><?php echo $data['tempat']; ?></td>
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


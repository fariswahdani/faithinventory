<style>
.pagin {
padding: 10px 0;
font:bold 11px/30px arial, serif;
}
.pagin * {
padding: 2px 6px;
color:#0A7EC5;
margin: 2px;
border-radius:3px;
}
.pagin a {
		border:solid 1px #8DC5E6;
		text-decoration:none;
		background:#F8FCFF;
		padding:6px 7px 5px;
}

.pagin span, a:hover, .pagin a:active,.pagin span.current {
		color:#FFFFFF;
		background:-moz-linear-gradient(top,#B4F6FF 1px,#63D0FE 1px,#58B0E7);
		    
}
.pagin span,.current{
	padding:8px 7px 7px;
}
.content{
	padding:10px;
	font:bold 12px/30px gegoria,arial,serif;
	border:1px dashed #0686A1;
	border-radius:5px;
	background:-moz-linear-gradient(top,#E2EEF0 1px,#CDE5EA 1px,#E2EEF0);
	margin-bottom:10px;
	text-align:left;
	line-height:20px;
}
.outer_div{
	margin:auto;
	width:600px;
}
#loader{
	position: absolute;
	text-align: center;
	top: 75px;
	width: 100%;
	display:none;
}

</style>
<h2>Data Barang</h2>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="?cat=gudang&page=barangview";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(table_barang.id_barang) AS numrows,table_barang.id_barang, table_barang.nama_barang, table_barang.id_jenis, table_stock.stock
FROM table_barang LEFT JOIN table_stock ON table_barang.id_barang = table_stock.id_barang");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);

	
	//jalankan query menampilkan data per blok $offset dan $per_hal
	$query = mysql_query("SELECT table_barang.id_barang, table_barang.nama_barang, table_barang.id_jenis, table_barang.harga, table_stock.stock AS stok
FROM table_barang LEFT JOIN table_stock ON table_barang.id_barang = table_stock.id_barang
GROUP BY table_barang.id_barang LIMIT $offset,$per_hal");

?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered">
<thead>

  <tr>
    <td>Kode Barang</td>
    <td>Nama Barang</td>
    <td>Jenis Barang</td> 
    <td>Stok Tersedia</td>
    <td>Harga</td>  
    <td>&nbsp;</td>
    </tr>
  </thead>
<?php
while($result = mysql_fetch_array($query)){
?>
<tr >
    <td><?php echo $result['id_barang']; ?></td>
    <td><?php echo $result['nama_barang']; ?></td> 
    <td><?php echo $result['id_jenis']; ?></td> 
    <td><?php echo $result['stok']; ?></td> 
    <td><div align="right"><?php echo number_format($result['harga'], '2', ',', '.'); ?></div></td> 
    <td><a href="?cat=gudang&page=barangedit&id=<?php echo $result['id_barang']; ?>">Edit</a> - <a href="?cat=gudang&page=barangdel&id=<?php echo $result['id_barang']; ?>">Hapus</a></td>   
  </tr>
<?php
}
?>
<html>
    <head>

    <title>Print</title>

    </head>
    <body>
    <button onClick="window.location='pages/gudang/cetak_barang.php'" formtarget="_blank">Print</button> 
    </body>
    </html>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>


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
<h2>Data Pengiriman</h2><br>
    <button onClick="window.location='pages/gudang/cetak_penerima.php'" formtarget="_blank">Print</button> 
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	
	//pagination variables
	$hal = (isset($_REQUEST['hal']) && !empty($_REQUEST['hal']))?$_REQUEST['hal']:1;
	$per_hal = 5; //berapa banyak blok
	$adjacents  = 5;
	$offset = ($hal - 1) * $per_hal;
	$reload="?cat=gudang&page=view_penerima";
	//Cari berapa banyak jumlah data*/
	
	$count_query   = mysql_query("SELECT COUNT(id_kirim) AS numrows FROM tabel_kirim");
	if($count_query === FALSE) {
    die(mysql_error()); 
	}
	$row     = mysql_fetch_array($count_query);
	$numrows = $row['numrows']; //dapatkan jumlah data
	
	$total_hals = ceil($numrows/$per_hal);
	
	$data = mysql_query("SELECT*FROM tabel_kirim LIMIT $offset,$per_hal");
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered" id="tblSample">
<thead>
	<tr>
        <td>ID KIRIM</td>
        <td>QTY</td>
        <td>TOTAL HARGA</td>
        <td>STATUS</td>
        <td>NO KTP</td>
        <td>TANGGAL KIRIM</td>
        <td>Action</td>
    </tr>
</thead>
<?php
$no = 0;
while($d = mysql_fetch_array($data)){
	$no++;
	echo"
	<tr>
		<td>$d[id_kirim]</td>
		<td>$d[qty]</td>
		<td><div align='right'>Rp. ".number_format($d['total_harga'], '2', ',', '.')."</div></td>
		<td>$d[status]</td>
		<td>$d[ktp]</td>
		<td>$d[tgl_kirim]</td>
		<td><div align='center'><a href='?cat=gudang&page=view_penerima_detail&id=$d[id_kirim]'>DETAIL</a></div></td>
	</tr>";
}

?>
</table>
<?php
echo paginate($reload, $hal, $total_hals, $adjacents);
?>

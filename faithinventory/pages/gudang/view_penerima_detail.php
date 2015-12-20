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
<h2>DETAIL PENGIRIMAN</h2><br>
<?php 
	$id_kirim = $_GET['id'];
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	$data = mysql_fetch_array(mysql_query("SELECT*FROM tabel_kirim WHERE id_kirim = '$id_kirim'"));
?>
<form>
<table width="40%" border="0">
    <tr>
    	<td>ID KIRIM</td>
        <td>:</td>
        <td><?=$data['id_kirim']?></td>
    </tr>
    <tr>
    	<td>STATUS</td>
        <td>:</td>
        <td><?=$data['status']?></td>
    </tr>
    <tr>
    	<td>NO KTP</td>
        <td>:</td>
        <td><?=$data['ktp']?></td>
    </tr>
    <tr>
    	<td>TANGGAL KIRIM</td>
        <td>:</td>
        <td><?=$data['tgl_kirim']?></td>
    </tr>
</table><br />

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered" id="tblSample">
<thead>
	<tr>
    	<td>No</td>
        <td>Kode Barang</td>
        <td>QTY</td>
        <td>HARGA</td>
        <td>SUBTOTAL</td>
    </tr>
</thead>
<?php
$detail = mysql_query("SELECT d.*, b.nama_barang
FROM tabel_kirim_detail d
INNER JOIN table_barang b ON b.id_barang = d.id_barang");

$no = 0;
$tqty = 0;
$tsub = 0;
while($d = mysql_fetch_array($detail)){
	$tqty += $d['qty'];
	$tsub += $d['subtotal'];
	$no++;
	echo"
	<tr>
		<td>$no</td>
		<td>$d[id_barang]</td>
		<td>$d[qty]</td>
		<td><div align='right'>Rp. ".number_format($d['harga'], '2', ',', '.')."</div></td>
		<td><div align='right'>Rp. ".number_format($d['subtotal'], '2', ',', '.')."</div></td>
	</tr>";
}
?>
	<tr>
    	<td colspan="2"><strong>TOTAL</strong></td>
        <td><?=$tqty?></td>
        <td></td>
        <td><div align="right"><strong>Rp. <?=number_format($tsub, '2', ',', '.')?></strong></div></td>
    </tr>
</table>
</form>
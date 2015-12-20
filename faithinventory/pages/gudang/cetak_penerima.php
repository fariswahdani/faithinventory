<style>
table{
	border-collapse:collapse;
}
</style>

<?php 
	/* Koneksi database*/
	include("../../_db.php");
	$data = mysql_query("SELECT*FROM tabel_kirim");
?>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<thead>
	<tr>
    	<td>No</td>
        <td>ID KIRIM</td>
        <td>QTY</td>
        <td>TOTAL HARGA</td>
        <td>STATUS</td>
        <td>NO KTP</td>
        <td>TANGGAL KIRIM</td>
    </tr>
</thead>
<?php
$no = 0;
while($d = mysql_fetch_array($data)){
	$no++;
	echo"
	<tr>
		<td>$no</td>
		<td>$d[id_kirim]</td>
		<td>$d[qty]</td>
		<td><div align='right'>Rp. ".number_format($d['total_harga'], '2', ',', '.')."</div></td>
		<td>$d[status]</td>
		<td>$d[ktp]</td>
		<td>$d[tgl_kirim]</td>
	</tr>";
}

?>
</table>

<script>
window.load = print_d();
function print_d(){
	window.print();
}
</script>
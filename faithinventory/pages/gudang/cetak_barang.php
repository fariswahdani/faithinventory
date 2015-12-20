<style>
table{
	border-collapse:collapse;
}
</style>
<table width="100%" border="1" cellspacing="2" cellpadding="2">
<tr>
    <td><div align="center"><strong>KODE BARANG</strong></div></td>
    <td><div align="center"><strong>NAMA BARANG</strong></div></td>
    <td><div align="center"><strong>JENIS BARANG</strong></div></td> 
    <td><div align="center"><strong>STOK TERSEDIA</strong></div></td>
    <td><div align="center"><strong>HARGA</strong></div></td>  
</tr>
<?php
include("../../_db.php");
$query = mysql_query("SELECT table_barang.id_barang, table_barang.nama_barang, table_barang.id_jenis, table_barang.harga, table_stock.stock AS stok
						FROM table_barang LEFT JOIN table_stock ON table_barang.id_barang = table_stock.id_barang");

while($result = mysql_fetch_array($query)){
?>
<tr >
    <td><?php echo $result['id_barang']; ?></td>
    <td><?php echo $result['nama_barang']; ?></td> 
    <td><?php echo $result['id_jenis']; ?></td> 
    <td><div align="center"><?php echo $result['stok']; ?></div></td> 
    <td><div align="right"><?php echo number_format($result['harga'], '2', ',', '.'); ?></div></td>    
</tr>
<?php
}
?>
</table>
<script>
window.load = print_d();
function print_d(){
	window.print();
}
</script>
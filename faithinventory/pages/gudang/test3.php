<?php
/*echo "<pre>";
echo print_r($_POST);
echo "</pre>";*/

$id = $_POST['id_barang'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$update = mysql_query("UPDATE table_barang SET nama_barang = '$nama', harga = '$harga' WHERE id_barang = '$id'");

if ($update){
	
	mysql_query("UPDATE table_stock SET stock = $stok WHERE id_barang = '$id'");
	
	echo "<script>
	alert('Data Berhasil disimpan!!');
	window.location = '?cat=gudang&page=barangview';
	</script>";
}else{
	echo "<script>
	alert('Data GAGAL disimpan!!');
	window.location = '?cat=gudang&page=barangview';
	</script>";
}
?>
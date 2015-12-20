<?php
/*echo "<pre>";
echo print_r($_POST);
echo "</pre>";*/

$id = $_POST['id_barang'];
$nama = $_POST['nama'];
$jenis = $_POST['jenis'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];

$simpan = mysql_query("INSERT INTO table_barang (id_barang, nama_barang, id_jenis, harga) VALUES('$id', '$nama', '$jenis', '$harga')");

if ($simpan){
	
	mysql_query("INSERT INTO table_stock VALUES ('$id', '$stok') ON DUPLICATE KEY UPDATE stock = '$stok'");
	
	echo "<script>
	alert('Data Berhasil disimpan!!');
	window.location = '?cat=gudang&page=barangview';
	</script>";
}else{
	echo "<script>
	alert('Data GAGAL disimpan!!');
	window.location = '?cat=gudang&page=barang';
	</script>";
}
?>
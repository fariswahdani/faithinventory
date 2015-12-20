<?php
	$id = $_GET['id'];
	$rs=mysql_query("DELETE FROM table_barang WHERE id_barang = '$id'");
	
	if($rs){
		echo"<script>
		alert('Data Berhasil Dihapus..');
		window.location='dashboard.php?cat=gudang&page=barangview';
		</script>";
	}else{
		echo"<script>
		alert('Perhatian! DATA GAGAL DIHAPUS!!!');
		window.location='dashboard.php?cat=gudang&page=barangview';
		</script>";
	}
?>
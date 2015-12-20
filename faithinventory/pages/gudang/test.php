<?php
/*echo "<pre>";
echo print_r($_POST);
echo "</pre>";*/

$id_kirim = $_POST['id_kirim'];
$status = $_POST['status'];
$ktp = $_POST['ktp'];
$tgl_kirim = $_POST['tgl_kirim'];
$count = $_POST['counter'];

$simpan = mysql_query("INSERT INTO tabel_kirim (id_kirim, status, ktp, tgl_kirim) VALUES('$id_kirim', '$status', '$ktp', '$tgl_kirim')");

if ($simpan){
	$tsub = 0;
	$tqty = 0;
	
	for($i=1; $i <= $count; $i++){
		$subtotal = $_POST['qty'.$i] * $_POST['harga'.$i];
		$tsub += $subtotal;
		$tqty += $_POST['qty'.$i];
	
		mysql_query("INSERT INTO tabel_kirim_detail VALUES ('$id_kirim', '".$_POST['kode_barang'.$i]."', '".$_POST['qty'.$i]."', '".$_POST['harga'.$i]."', '$subtotal')");
	}
	
	mysql_query("UPDATE tabel_kirim SET qty = '".$tqty."', total_harga = '".$tsub."' WHERE id_kirim = '$id_kirim'");
	
	echo "<script>
	alert('Data Berhasil disimpan!!');
	window.location = '?cat=gudang&page=view_penerima';
	</script>";
}else{
	echo "<script>
	alert('Data GAGAL disimpan!!');
	window.location = '?cat=gudang&page=penerima';
	</script>";
}
?>
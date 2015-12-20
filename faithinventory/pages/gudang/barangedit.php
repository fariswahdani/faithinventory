<?php
	$id = $_GET['id'];
	$rs=mysql_query("
	SELECT table_barang.id_barang, table_barang.nama_barang, table_barang.id_jenis, table_barang.harga, table_stock.stock AS stok
FROM table_barang LEFT JOIN table_stock ON table_barang.id_barang = table_stock.id_barang WHERE table_barang.id_barang = '$id'");
	$row=mysql_fetch_array($rs);
?>
<form action="?cat=gudang&page=test3" method="post">
<label>ID BARANG</label>
	<input type="text" name="id_barang" value="<?=$row['id_barang']?>" readonly="readonly">
<label>NAMA BARANG</label>
	<input type="text" name="nama" value="<?=$row['nama_barang']?>">
<label>JENIS BARANG</label>
	<input type="text" name="jenis" value="<?=$row['id_jenis']?>" readonly="readonly">
<label>HARGA</label>
	<input type="text" name="harga" value="<?=$row['harga']?>">
<label>STOK</label>
	<input type="text" name="stok" value="<?=$row['stok']?>">
    <br />
<input type="submit" value="Simpan" />
</form>
<script src="jquery-1.9.1.js"></script>
<script src="jquery-ui.js"></script>
<script src="jquery-ui.min.js"></script>
<link rel="stylesheet" href="jquery-ui.min.css" />
<script>
$(document).ready(function() {
	$(function() {
		$("#tgl_kirim").datepicker({ 
		dateFormat: 'yy-mm-dd',
		changeMonth: true,
		changeYear: true });
	});
});
</script>
<SCRIPT language="javascript">
//	jQuery.noConflict();
	function addRowToTable()
	{
		var tbl = document.getElementById('tblSample');
		var lastRow = tbl.rows.length;
		// if there's no header row in the table, then iteration = lastRow + 1
		var iteration = lastRow;
		var row = tbl.insertRow(lastRow);

		// left cell
		var cellLeft = row.insertCell(0);
		var textNode = document.createTextNode(iteration);
		cellLeft.appendChild(textNode);

		var count = iteration - 1;

		// first cell
		var cellRight = row.insertCell(1);
		var el = document.createElement('input');
		el.type = 'text';
		el.name = 'kode_barang'+iteration;

		el.onkeypress = keyPressTest;
		cellRight.appendChild(el);
		//

		// second cell
		var cellRight2 = row.insertCell(2);
		var el2 = document.createElement('input');
		el2.name = 'qty'+iteration;
		el2.type = 'text';

		el2.onkeypress = keyPressTest;
		cellRight2.appendChild(el2);

		// third cell
		var cellRight3 = row.insertCell(3);
		var el3 = document.createElement('input');
		el3.name = 'harga'+iteration;
		el3.type = 'text';

		el3.onkeypress = keyPressTest;
		cellRight3.appendChild(el3);
		//


		$("#counter").val(iteration);
//		alert(iteration);
	}
	function keyPressTest(e, obj)
	{
		var validateChkb = document.getElementById('chkValidateOnKeyPress');
		if (validateChkb.checked) {
			var displayObj = document.getElementById('spanOutput');
			var key;
			if(window.event) {
				key = window.event.keyCode;
			}
			else if(e.which) {
				key = e.which;
			}
			var objId;
			if (obj != null) {
				objId = obj.id;
			} else {
				objId = this.id;
			}
			displayObj.innerHTML = objId + ' : ' + String.fromCharCode(key);
		}
	}
	function removeRowFromTable()
	{
		var tbl = document.getElementById('tblSample');
		var lastRow = tbl.rows.length;
		var iteration = lastRow;
		if (lastRow > 2) {
			tbl.deleteRow(lastRow - 1);
			$("#counter").val(iteration - 2);
		}
	}
</script>
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
<h2>Input Pengiriman</h2><br>
<?php 
	/* Koneksi database*/
	include 'pages/web/paging.php'; //include pagination file
	
	$q=mysql_query("SELECT max(id_kirim) AS last FROM tabel_kirim");
	$b=mysql_fetch_array($q);
	$lpo=$b['last'];
	$lurut = substr($lpo, 2,6);
	$nexturut= $lurut + 1;
	$next= "FK".sprintf('%04s', $nexturut);
	

?>
<form action="?cat=gudang&page=test" method="post">
  <label>No Kirim</label>

      <input type="text" name="id_kirim" value="<?=$next?>">
      <label>Status</label>
      <select name="status">
      	<option value="">--Pilih--</option>
        <option value="on_progress">On Progress</option>
        <option value="terkirim">Terkirim</option>
      </select>
      <label>No KTP</label>
      <input type="text" name="ktp">
      <label>Tanggal Kirim</label>
      <input type="text" name="tgl_kirim" id="tgl_kirim"><br><br>

<table width="100%" border="0" cellspacing="0" cellpadding="0" class="responsive table table-striped table-bordered" id="tblSample">
<thead>
	<tr>
    	<td>
        <div align="center">
        <button type="button" onclick="addRowToTable();">+</button>
        <button type="button" onclick="removeRowFromTable();">-</button><br/>
        <strong>No</strong></div>
        </td>
        <td>Kode Barang <input type="hidden" id="counter" name="counter" /></td>
        <td>QTY</td>
        <td>HARGA</td>
    </tr>
</thead>
<tr>
    <td>1</td>
    <td><input type="text" name="kode_barang1" /></td>
    <td><input type="text" name="qty1" /></td>
    <td><input type="text" name="harga1" /></td>
</tr>
</table>
<input type="submit" value="Simpan" />
</form>
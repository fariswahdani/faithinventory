<!--faris coba git-->
<!--NAVIGASI MENU UTAMA-->

<div class="leftmenu">
  <ul class="nav nav-tabs nav-stacked">
    <li class="active"><a href="dashboard.php"><span class="icon-align-justify"></span> Dashboard</a></li>
    
	<?php
	if($_SESSION['login_hash']=="administrator")
	{
	?>
    
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Barang</a>
      <ul>
        <li><a href="?cat=gudang&page=barang">Insert Data Barang</a></li>
        <li><a href="?cat=gudang&page=barangview">View Data Barang</a></li>
      </ul>
    </li>
    
     <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Kiriman</a>
      <ul>
        <li><a href="?cat=gudang&page=penerima">Insert Data Penerima</a></li>
        <li><a href="?cat=gudang&page=view_penerima">View Data Penerima</a></li>
      </ul>
    </li>    
    <!--MENU GUDANG-->
    <?php
	}elseif($_SESSION['login_hash']=="gudang")
	{
	?>
    <li class="dropdown"><a href="#"><span class="icon-th-list"></span> Data Master</a>
      <ul>
        <li><a href="?cat=gudang&page=barang">Input Barang</a></li>
        <li><a href="?cat=gudang&page=barangview">View Barang</a></li>       
      </ul>
    </li>        
   <!--MENU PIMPINAN-->
        <?php
	}elseif($_SESSION['login_hash']=="pimpinan"){
	?>    
     <li class="dropdown"><a href="#"><span class="icon-th-list"></span> View Laporan</a>
      <ul>
        <li><a href="?cat=gudang&page=barangview">View Data Barang</a></li>
        <li><a href="?cat=gudang&page=view_penerima">View Data Penerima</a></li>
      </ul>
    </li>
  	<?php
	}
	?>
  </ul>
</div>
<!--leftmenu-->

</div>
<!--mainleft--> 
<!-- END OF LEFT PANEL -->
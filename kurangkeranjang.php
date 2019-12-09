<?php 
session_start();
if (isset($_GET['id'])) 
{
   $barang_id = $_GET['id'];
    if (isset($_SESSION['keranjang'][$barang_id]))
	   	  {
	    	$_SESSION['keranjang'][$barang_id] -= 1;
	      }

	echo "<script>location='keranjang.php'; </script>";
 }

 ?>
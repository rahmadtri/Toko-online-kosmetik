<?php 
	session_start();
	// mendapat id produk dari url
	$id_produk = $_GET['id'];
	$stok = $_GET['stok'];

	if ($stok == 0) {
		echo "<script>alert('Stok Produk Habis'); </script>";
	    echo "<script>location='index.php'; </script>";		
	}
	else {

	// jk sudah ada produk itu dikeranjang maka produk itu jumlahnya +1
	if (isset($_SESSION['keranjang'][$id_produk])) 
	{
		$_SESSION['keranjang'][$id_produk]+=1;
	}
	// selain itu (belum ada dikeranjang) mk produk dianggap dibeli 1
	else
	{
		$_SESSION['keranjang'][$id_produk] = 1;
	}

	// echo "<pre>";
	// print_r($_SESSION);
	// echo "</pre>";

	// larikan ke halaman belanja
	echo "<script>alert('Produk Telah Masuk Ke keranjang Belanja'); </script>";
    echo "<script>location='keranjang.php'; </script>";
}
 ?>
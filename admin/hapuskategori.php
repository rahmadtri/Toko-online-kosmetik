<?php 

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}


$koneksi->query("DELETE FROM kategori WHERE id_kategori='$_GET[id]'");

echo "<script>alert('kategori terhapus'); </script>";
echo "<script>location='index.php?halaman=kategori'; </script>";

 ?>

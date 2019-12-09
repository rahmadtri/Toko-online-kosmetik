<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">UBAH KATEGORI</h2>
<?php 

$ambil=$koneksi->query("SELECT * FROM kategori WHERE id_kategori='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Katagori Produk</label>
        <input name="kategori" type="text" class="form-control" value="<?= $pecah['nama_kategori']; ?>" />     
    </div>
    <div class="form-group">
        <img src="../foto_kategori/<?= $pecah['gambar_kategori']; ?>" width="200">    
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input name="foto" type="file" class="form-control"/>     
    </div>
    
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{
	// ubah foto dll komplit
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
    $namafix = date("YmdHis").$namafoto;
	// jk foto dirubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../foto_kategori/$namafix");

		$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[kategori]', gambar_kategori='$namafix' WHERE id_kategori='$_GET[id]'") ;
	}
	else
	{
		// fotonya tidak dirubah
		$koneksi->query("UPDATE kategori SET nama_kategori='$_POST[kategori]' WHERE id_kategori='$_GET[id]'") ;
	}

	echo "<script>alert('data kategori berhasil diubah'); </script>";
	echo "<script>location='index.php?halaman=kategori'; </script>";
}
 ?>
<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">UBAH PRODUK</h2>


<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
       <label><strong>PILIH KATEGORI PRODUK</strong></label> <br>
        <select name="kategori">
         <?php 
        $ambil = $koneksi->query("SELECT * FROM kategori");
         while ($pecah = $ambil->fetch_assoc()) {
        ?>
 
         <option value="<?= $pecah['id_kategori']; ?>"><?= $pecah['nama_kategori']; ?></option>
        <?php } ?>
         </select>     
    </div>

<?php 
$ambil=$koneksi->query("SELECT * FROM produk WHERE id_produk='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
// echo "<pre>";
// print_r($pecah);
// echo "</pre>";
?>

    <div class="form-group">
        <label>Nama Produk</label>
        <input name="nama" type="text" class="form-control" value="<?= $pecah['nama_produk']; ?>" />     
    </div>
    <div class="form-group">
        <label>Harga Rp</label>
        <input name="harga" type="number" class="form-control" value="<?= $pecah['harga_produk']; ?>" />     
    </div> 
    <div class="form-group">
        <label>Stok Produk</label>
        <input name="stok" type="number" class="form-control" value="<?= $pecah['stok_produk']; ?>" />     
    </div>
    <div class="form-group">
        <label>Berat Gr</label>
        <input name="berat" type="number" class="form-control" value="<?= $pecah['berat']; ?>" />     
    </div>
    <div class="form-group">
        <img src="../foto_produk/<?= $pecah['foto_produk']; ?>" width="200">    
    </div>
    <div class="form-group">
        <label>Ganti Foto</label>
        <input name="foto" type="file" class="form-control"/>     
    </div>
    <div class="form-group">
        <label>Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="10"><?= $pecah['deskripsi_produk']; ?></textarea>   
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
		move_uploaded_file($lokasifoto, "../foto_produk/$namafix");

		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', id_kategori='$_POST[kategori]', harga_produk='$_POST[harga]',
			berat='$_POST[berat]', foto_produk='$namafix', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]'
			WHERE id_produk='$_GET[id]'") ;
	}
	else
	{
		// fotonya tidak dirubah
		$koneksi->query("UPDATE produk SET nama_produk='$_POST[nama]', id_kategori='$_POST[kategori]', harga_produk='$_POST[harga]',
			berat='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]', stok_produk='$_POST[stok]' WHERE id_produk='$_GET[id]'") ;
	}

	echo "<script>alert('data produk berhasil diubah'); </script>";
	echo "<script>location='index.php?halaman=produk'; </script>";
}
 ?>
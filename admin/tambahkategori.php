<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h4>Tambah Produk</h4>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Nama Kategori Produk</label>
        <input name="kategori" type="text" class="form-control" placeholder="Kategori Produk" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Foto</label>
        <input type="file" name="foto" class="form-control">
    </div>
    <button class="btn btn-primary" name="save">Simpan</button>
</form>
 <?php 
if (isset($_POST['save'])) 
{
    $nama = $_FILES['foto']['name'];
    $lokasi = $_FILES['foto']['tmp_name'];
    $namafix = date("YmdHis").$nama;
    move_uploaded_file($lokasi, "../foto_kategori/$namafix");


    $kategori = htmlspecialchars($_POST[kategori]);

    $koneksi->query("INSERT INTO kategori(nama_kategori, gambar_kategori) VALUES ('$kategori', '$namafix') ");


    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=kategori'>";
} 
  ?>

  
  
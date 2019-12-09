<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">UBAH PELANGGAN</h2>
<?php 

$ambil=$koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Username Pelanggan</label>
        <input name="username" type="text" class="form-control" value="<?= $pecah['username_pelanggan']; ?>" /> 
    </div>
    <div class="form-group">
        <label>Password Pelanggan</label>
        <input name="password" type="text" class="form-control" value="<?= $pecah['password_pelanggan']; ?>" />
    </div> 
    <div class="form-group">
        <label>Nama Pelanggan</label>
        <input name="nama" type="text" class="form-control" value="<?= $pecah['nama_pelanggan']; ?>" />     
    </div>
    <div class="form-group">
        <label>Telepon Pelanggan</label>
        <input name="telepon" type="number" class="form-control" value="<?= $pecah['telepon_pelanggan']; ?>" />     
    </div>
    <div class="form-group">
        <label>Alamat Pelanggan</label>
        <input name="alamat" type="text" class="form-control" value="<?= $pecah['alamat_pelanggan']; ?>" />     
    </div>
    
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{

        // fotonya tidak dirubah
        $koneksi->query("UPDATE pelanggan SET username_pelanggan='$_POST[username]',
            password_pelanggan='$_POST[password]', nama_pelanggan='$_POST[nama]',
            telepon_pelanggan='$_POST[telepon]', alamat_pelanggan='$_POST[alamat]' WHERE id_pelanggan='$_GET[id]'") ;


    echo "<script>alert('data pelanggan berhasil diubah'); </script>";
    echo "<script>location='index.php?halaman=pelanggan'; </script>";
}
 ?>
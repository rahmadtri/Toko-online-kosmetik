<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">UBAH DATA ADMIN</h2>
<?php 

$ambil=$koneksi->query("SELECT * FROM admin WHERE id_admin='$_GET[id]'");
$pecah = $ambil->fetch_assoc();

// echo "<pre>";
// print_r($pecah);
// echo "</pre>";

?>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Username Admin</label>
        <input name="username" type="text" class="form-control" value="<?= $pecah['username']; ?>" /> 
    </div>
    <div class="form-group">
        <label>Password Admin</label>
        <input name="password" type="text" class="form-control" value="<?= $pecah['password']; ?>" />
    </div> 
    <div class="form-group">
        <label>Nama Lengkap Admin</label>
        <input name="nama" type="text" class="form-control" value="<?= $pecah['nama_lengkap']; ?>" />     
    </div>
    
    <button class="btn btn-primary" name="ubah">Ubah</button>
</form>

<?php 
if (isset($_POST['ubah'])) 
{

        // fotonya tidak dirubah
        $koneksi->query("UPDATE admin SET username='$_POST[username]',
            password='$_POST[password]', nama_lengkao='$_POST[nama]' WHERE id_admin='$_GET[id]'") ;


    echo "<script>alert('data Admin berhasil diubah'); </script>";
    echo "<script>location='index.php'; </script>";
}
 ?>
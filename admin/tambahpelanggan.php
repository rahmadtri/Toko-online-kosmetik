<?php 


if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>
<h4>Tambah Pelanggan</h4>

<form action="" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label>Username</label>
        <input name="username" type="text" class="form-control" placeholder="Ketikan Username" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Ketikan Password" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Nama</label>
        <input name="nama" type="text" class="form-control" placeholder="Ketikan Nama Pelanggan" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Telepon</label>
        <input name="telepon" type="number" class="form-control" placeholder="Ketikan Telepon" autocomplete="off" required />     
    </div>
    <div class="form-group">
        <label>Alamat</label>
        <input name="alamat" type="text" class="form-control" placeholder="Ketikan Alamat" autocomplete="off" required />     
    </div>
   
    <button class="btn btn-primary" name="save">Simpan</button>
</form>

<?php 
if (isset($_POST['save'])) 
{
    $koneksi->query("INSERT INTO pelanggan(username_pelanggan, password_pelanggan, nama_pelanggan, telepon_pelanggan, alamat_pelanggan) VALUES ('$_POST[username]', '$_POST[password]', '$_POST[nama]', '$_POST[telepon]', '$_POST[alamat]') ");

    echo "<div class='alert alert-info'>Data Tersimpan</div>";
    echo "<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";
}
  ?>
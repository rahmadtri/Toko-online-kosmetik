<?php 

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h3 class="text-center">SELAMAT DATANG ADMINISTRATOR <?= $_SESSION['admin']['nama_lengkap']; ?></h3>
<!-- <pre><?php print_r($_SESSION); ?></pre> -->

<br><br>
<h2 class="text-center">DATA ADMIN</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Username</th>
      <th>Nama Lengkap</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM admin"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['username']; ?></td>
      <td><?= $pecah['nama_lengkap']; ?></td>
      <td>
        <a href="index.php?halaman=hapusadmin&id=<?= $pecah['id_admin']; ?>" class="btn-danger btn" onclick="return confirm('Yakin hapus?')">hapus</a>
        <a href="index.php?halaman=ubahadmin&id=<?= $pecah['id_admin']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambahadmin" class="btn btn-primary">Tambah Admin</a>
<?php 

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>

<h2 class="text-center">DATA PELANGGAN</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Telepon</th>
      <th>Alamat</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM pelanggan"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_pelanggan']; ?></td>
      <td><?= $pecah['username_pelanggan']; ?></td>
      <td><?= $pecah['telepon_pelanggan']; ?></td>
      <td><?= $pecah['alamat_pelanggan']; ?></td>
      <td>
          <a href="index.php?halaman=hapuspelanggan&id=<?= $pecah['id_pelanggan']; ?>" class="btn btn-danger" onclick="return confirm('Yakin hapus?')">hapus</a>
          <a href="index.php?halaman=ubahpelanggan&id=<?= $pecah['id_pelanggan']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
    <?php } ?>
  </tbody>
</table>

<a href="index.php?halaman=tambahpelanggan" class="btn btn-primary">Tambah Data</a>
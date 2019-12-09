<?php 

if (!isset($_SESSION['admin'])) 
{
    echo "<script>alert('Anda Harus Login'); </script>";
    echo "<script>location='login.php'; </script>";
    header('location:login.php');
    exit();
}
 ?>





<h2 class="text-center">DATA KATEGORI</h2>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>No</th>
      <th>Nama Kategori</th>
      <th>Gambar</th>
      <th>Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php $nomor=1; ?>
    <?php $ambil=$koneksi->query("SELECT * FROM kategori"); ?>
    <?php while($pecah = $ambil->fetch_assoc()) { ?>
    <tr>
      <td><?= $nomor; ?></td>
      <td><?= $pecah['nama_kategori']; ?></td>
      <td>
        <img src="../foto_kategori/<?= $pecah['gambar_kategori']; ?>" width="100">
      </td>
      <td>
        <a href="index.php?halaman=hapuskategori&id=<?= $pecah['id_kategori']; ?>" class="btn-danger btn" onclick="return confirm('Yakin hapus kategori?')">hapus</a>
        <a href="index.php?halaman=ubahkategori&id=<?= $pecah['id_kategori']; ?>" class="btn btn-warning">ubah</a>
      </td>
    </tr>
    <?php $nomor++; ?>
  <?php } ?>
  </tbody>
</table>
<a href="index.php?halaman=tambahkategori" class="btn btn-primary">Tambah Kategori</a>